jQuery(document).ready(function() {

    $("#error-alert").hide();
    $("#error-alert2").hide();

    $.validator.addMethod("regex", function(value, element, regexpr) {
        if (value === null || value === "") {
            return true;
        } else {
            return regexpr.test(value);
        }
    });

    var r2 = $("#expenses_add"),
            t2 = $("#error-alert", r2),
            i2 = $("#success-alert", r2);
    r2.validate({
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        invalidHandler: function(e, r2) {
            i2.hide(), t2.show();
        },
        highlight: function(e) {
            $(e).closest(".input-div").removeClass("has-success").addClass("has-error");
        },
        unhighlight: function(e) {
            $(e).closest(".input-div").removeClass("has-error");
        },
        success: function(e) {
            e.closest(".input-div").removeClass("has-error").addClass("has-success"),
                    e.remove();
            e.addClass("valid").closest(".input-div").removeClass("has-error").addClass("has-success");
        }
    });

    ItemIndex = 0;
    $('#add_row_btn').click(function() {
        if ($('#expenses_add').valid()) {

            date = moment().format("YYYY-MM-DD");

            type = $('#expenses_type').val();
            invoice_no = $('#invoice_no').val();
            company = $('#company').val();
            details = $('#expenses_details').val();
            type_text = $('#expenses_type option:selected').text();
            amount = $('#amount').val();
            $('#date').val(date);

            // console.log(type);

            ItemIndex++;
            var $template = $('.add_row_template'),
                    $clone = $template
                    .clone()
                    .removeClass('hide')
                    .removeClass('add_row_template')
                    //                                .removeAttr('id')
                    .attr('id', +ItemIndex + '-grn_row')
                    .attr('data-item-index', ItemIndex)
                    .addClass('added_rows')
                    .insertBefore($template);
            $clone.find('.removeButton').attr('data-index', ItemIndex);
            $clone.find('.removeButton').attr('onclick', "remove_row(" + ItemIndex + ",this);");

            $clone
                    .find('[id="0-type"]').attr('id', ItemIndex + '-type').html(type_text).end()
                    .find('[id="0-type_hidden"]').attr('id', ItemIndex + '-type_hidden').attr('name', ItemIndex + '-type_hidden').val(type).end()

                    .find('[id="0-invoice_no"]').attr('id', ItemIndex + '-invoice_no').html(invoice_no).end()
                    .find('[id="0-invoice_no_hidden"]').attr('id', ItemIndex + '-invoice_no_hidden').attr('name', ItemIndex + '-invoice_no_hidden').val(invoice_no).end()

                    .find('[id="0-company"]').attr('id', ItemIndex + '-company').html(company).end()
                    .find('[id="0-company_hidden"]').attr('id', ItemIndex + '-company_hidden').attr('name', ItemIndex + '-company_hidden').val(company).end()

                    .find('[id="0-details"]').attr('id', ItemIndex + '-details').html(details).end()
                    .find('[id="0-details_hidden"]').attr('id', ItemIndex + '-details_hidden').attr('name', ItemIndex + '-details_hidden').val(details).end()

                    .find('[id="0-amount"]').attr('id', ItemIndex + '-amount').html(amount).end()
                    .find('[id="0-amount_hidden"]').attr('id', ItemIndex + '-amount_hidden').attr('name', ItemIndex + '-amount_hidden').val(amount).end()

            $("#noof_items").val(ItemIndex);

            $('#submit-btn').removeAttr('disabled');
        }
    });
});


function remove_row(item_index, btn) {
    ItemIndex--;
    $("#noof_items").val(ItemIndex);
    $(btn).parent().parent().remove();

    if (ItemIndex == 0) {
        $('#submit-btn').attr('disabled', 'disabled');
    }
    ItemIndex2 = 0;

    $('.added_rows').each(function() {
        ItemIndex2++;
        $(this).attr('id', +ItemIndex2 + '-grn_row').attr('data-item-index', ItemIndex2);

        $(this).find('.type').attr('id', ItemIndex2 + '-type');
        $(this).find('.type_hidden').attr('name', ItemIndex2 + '-type_hidden').attr('id', ItemIndex2 + '-type_hidden');
        
        $(this).find('.details').attr('id', ItemIndex2 + '-details');
        $(this).find('.details_hidden').attr('name', ItemIndex2 + '-details_hidden').attr('id', ItemIndex2 + '-details_hidden');

        $(this).find('.amount').attr('id', ItemIndex2 + '-amount');
        $(this).find('.amount_hidden').attr('name', ItemIndex2 + '-amount_hidden').attr('id', ItemIndex2 + '-amount_hidden');

    });
}