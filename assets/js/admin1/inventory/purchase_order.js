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

    var r = $("#purchase_order"),
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

    // $("#submit_btn").click(function () {
    //     if ($('#purchase_order').valid()) {
    //         $("#purchase_order").submit();
    //     }
    // });

    ItemIndex = 0;

    $("#add_row_btn").click(function () {
        if ($('#purchase_order').valid()) {

//             delivery_type = $("#delivery_type ").val();
//             errors = false;
//
//             noof_courier_request_items = $('#noof_courier_request_items').val();
//
//             fail_log = 0;
//
//             is_draft = $("#is_draft").val();
// //            if(is_draft==="Yes"){
// //                courier_request_item_date = $("#draft_date").val();
// //                courier_request_item_time = $("#draft_time").val();
// //                $("#is_draft").val("No");
// //                $("#is_draft2").val("Yes");
// //            }else{
//             courier_request_item_date = moment().format("YYYY-MM-DD");
//             courier_request_item_time = moment().format("HH:mm:ss");
// //                courier_request_item_time = moment().format("hh:mm:ss A");
// //            }
            supplier = $('#supplier').val();
            supplier_text = $("#supplier option:selected").text();

            product = $('#product').val();
            product_text = $("#product option:selected").text();

            price = parseFloat($('#product_price_hidden').val());

            qty = $('#qty').val();

            total = parseFloat(qty) * price;

            console.log(total);

            date = moment().format("YYYY-MM-DD");
            time = moment().format("HH:mm:ss");

            console.log(date);

            $('#order_date').val(date);
            $('#order_time').val(time);

            $("#error-alert").hide();
            // if (verification_required_inputs === true) {
            //     verification_code_1 = $('#verification_code_1').val();
            //     verification_code_2 = $('#verification_code_2').val();
            //     verification_code_hint = $('#verification_code_hint').val();
            // } else {
            //     verification_code_1 = "";
            //     verification_code_2 = "";
            //     verification_code_hint = "Tələb Olunmur";
            // }

            ItemIndex++;
            var $template = $('.add-products-row'),
                $clone = $template
                    .clone()
                    .removeClass('hide')
                    .removeClass('add-products-row')
                    //                                .removeAttr('id')
                    .attr('id', 'products-' + ItemIndex + '-row')
                    .attr('data-item-index', ItemIndex)
                    .addClass('added_rows')
                    .insertBefore($template);

            $clone.find('.removeButton').attr('data-index', ItemIndex);
            $clone.find('.removeButton').attr('onclick', "remove_row(" + ItemIndex + ",this);");


            $clone

                .find('[id="0-product"]').attr('id', ItemIndex + '-product').html(product_text).end()
                .find('[name="0-product_hidden"]').attr('name', ItemIndex + '-product_hidden').attr('id', ItemIndex + '-product_hidden').val(product).end()

                .find('[id="0-qty"]').attr('id', ItemIndex + '-qty').html(qty).end()
                .find('[name="0-qty_hidden"]').attr('name', ItemIndex + '-qty_hidden').attr('id', ItemIndex + '-qty_hidden').val(qty).end()

                .find('[id="0-total"]').attr('id', ItemIndex + '-total').html(total.toFixed(2)).end()
                .find('[name="0-total_hidden"]').attr('name', ItemIndex + '-total_hidden').attr('id', ItemIndex + '-total_hidden').val(total.toFixed(2)).end()


            $("#noof_products").val(ItemIndex);
            // $('#supplier_hidden').val(supplier);
            cal_net_tot();

            $('#order-form-submit').removeAttr('disabled');

        }
    });
});


function cal_net_tot() {
    var net_tot = 0;

    $('.added_rows').each(function () {

        net_tot = net_tot + parseFloat($(this).find('.total_hidden').val());

        $('#net_tot').val(net_tot.toFixed(2));
    });
}

function remove_row(item_index,btn){
    ItemIndex--;
    $("#noof_products").val(ItemIndex);
    $(btn).parent().parent().remove();


    ItemIndex2 = 0;


    $('.added_rows').each(function () {
        ItemIndex2++;
        $(this).attr('id', +ItemIndex2 + '-grn_row').attr('data-item-index', ItemIndex2);


        $(this)
            .find('.supplier').attr('id', ItemIndex2 + '-supplier').end()
            .find('.supplier_hidden').attr('name', ItemIndex2 + '-supplier_hidden').attr('id', ItemIndex2 + '-supplier_hidden').end()

            .find('.product').attr('id', ItemIndex2 + '-product').end()
            .find('.product_hidden').attr('name', ItemIndex2 + '-product_hidden').attr('id', ItemIndex2 + '-product_hidden').end()

            .find('.qty').attr('id', ItemIndex2 + '-qty').end()
            .find('.qty_hidden').attr('name', ItemIndex2 + '-qty_hidden').attr('id', ItemIndex2 + '-qty_hidden').end()

    });
    cal_net_tot();
}
