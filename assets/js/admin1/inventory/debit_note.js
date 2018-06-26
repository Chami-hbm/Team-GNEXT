jQuery(document).ready(function () {

    $("#error-alert").hide();
    $("#error-alert2").hide();

    $.validator.addMethod("regex", function (value, element, regexpr) {
        if (value === null || value === "") {
            return true;
        } else {
            return regexpr.test(value);
        }
    });

    var r = $("#debit_note_select_form"),
        t = $("#error-alert", r),
        i = $("#success-alert", r);
    r.validate({
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,

        invalidHandler: function (e, r) {
            i.hide(), t.show();
        },
        highlight: function (e) {
            $(e).closest(".input-div").removeClass("has-success").addClass("has-error");
        },
        unhighlight: function (e) {
            $(e).closest(".input-div").removeClass("has-error");
        },
        success: function (e) {
            e.closest(".input-div").removeClass("has-error").addClass("has-success"),
                e.remove();
            e.addClass("valid").closest(".input-div").removeClass("has-error").addClass("has-success");
        }
    });
    //
    // $("#submit_btn").click(function () {
    //     if ($('#debit_note_form').valid()) {
    //         $("#debit_note_form").submit();
    //     }
    // });

    ItemIndex = 0;
    $('#add-row-btn').click(function () {
        if($('#debit_note_select_form').valid()){


            date = moment().format("YYYY-MM-DD");
            time = moment().format("HH:mm:ss");

            main_category = $('#category').val();
            main_category_text = $("#category option:selected").text();

            sub_category = $('#sub_category').val();
            sub_category_text = $("#sub_category option:selected").text();

            product = $('#products').val();
            product_text = $("#products option:selected").text();

            console.log(product +' ' +product_text);

            ItemIndex++;
            var $template = $('.debit_note_product_row'),
                $clone = $template
                    .clone()
                    .removeClass('hide')
                    .removeClass('debit_note_product_row')
                    //                                .removeAttr('id')
                    .attr('id', + ItemIndex + '-debit_note_row')
                    .attr('data-item-index', ItemIndex)
                    .insertBefore($template);
            $clone.find('.removeButton').attr('data-index', ItemIndex);
            $clone.find('.removeButton').attr('onclick', "remove_row(" + ItemIndex + ",this);");

            $clone
                .find('[id="0-main_category"]').attr('id', ItemIndex + '-main_category').html(main_category_text).end()
                .find('[name="0-main_category_hidden"]').attr('name', ItemIndex + '-main_category_hidden').attr('id', ItemIndex + '-main_category_hidden').val(main_category).end()

                .find('[id="0-sub_category"]').attr('id', ItemIndex + '-sub_category').html(sub_category_text).end()
                .find('[name="0-sub_category_hidden"]').attr('name', ItemIndex + '-sub_category_hidden').attr('id', ItemIndex + '-sub_category_hidden').val(sub_category).end()

                .find('[id="0-product"]').attr('id', ItemIndex + '-product').html(product_text).end()
                .find('[name="0-product_hidden"]').attr('name', ItemIndex + '-product_hidden').attr('id', ItemIndex + '-product_hidden').val(product).end()


            $("#noof_items").val(ItemIndex);

        }
    });
});

function remove_row(item_index,btn){
    ItemIndex--;
    $("#noof_courier_request_items").val(ItemIndex);
    $(btn).parent().parent().remove();
}