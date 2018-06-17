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

    var r = $("#suppliers_form"),
            t = $("#error-alert", r),
            i = $("#success-alert", r);
    r.validate({
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        rules: {
            supplier: {
                required: !0,
            },
            inv_no: {
                required: !0,
            },
            warehouse: {
                required: !0,
            },
            branch1: {
                required: !0,
            },
            branch2: {
                required: !0,
            },
            sub_tot: {
                required: !0,
            },
            discount: {
                required: !0,
            },
            tax_1: {
                required: !0,
            },
            tax_2: {
                required: !0,
            },
            transport_cost: {
                required: !0,
            },
            other: {
                required: !0,
            },
            grand_tot: {
                required: !0,
            }
        },
        messages: {
            supplier: {
                required: "Please select supplier ",
            },
            inv_no: {
                required: "Please enter invoice number",
            },
            warehouse: {
                required: "Please enter warehouse",
            },
            branch1: {
                required: !0,
            },
            branch2: {
                required: !0,
            },
            sub_tot: {
                required: !0,
            },
            discount: {
                required: !0,
            },
            tax_1: {
                required: !0,
            },
            tax_2: {
                required: !0,
            },
            transport_cost: {
                required: !0,
            },
            other: {
                required: !0,
            },
            grand_tot: {
                required: !0,
            }
        },
        invalidHandler: function(e, r) {
            i.hide(), t.show();
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

    $("#button-submit").click(function() {
        if ($('#suppliers_form').valid()) {
            $("#suppliers_form").submit();
        }
    });


    var r2 = $("#add_new_row_form,#supplier_select_form"),
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

    date = moment().format("YYYY-MM-DD");
    time = moment().format("HH:mm:ss");

    $('#date').val(date);
    $('#time').val(time);

//    ItemIndex = 0;
    $('#add_row_btn').click(function() {
        if ($('#add_new_row_form').valid() && $('#supplier_select_form').valid()) {



            product = $('#product').val();
            product_text = $("#product option:selected").text();

            price = $('#unit_price').val();
            // price_text = $('#product_price_hidden').val();
            // sub_category_text = $("#sub_category option:selected").text();

            qty = $('#products-qty').val();
            price = $('#unit_price').val();
//            console.log(price);

            total = parseFloat(price) * parseFloat(qty);

//            console.log(total);

            // $('#supplier_hidden').val($('#supplier').val());
            $('#inv_no_hidden').val($('#inv_no').val());
            $('#supplier_hidden').val($('#supplier').val());
            ItemIndex=$('#noof_items').val();
            ItemIndex++;
            var $template = $('.add_row_template'),
                    $clone = $template
                    .clone()
                    .removeClass('hide')
                    .removeClass('add_row_template')
                    //                                .removeAttr('id')
                    .attr('id', +ItemIndex + '-grn_row')
                    .attr('data-item-index', ItemIndex)
                    .addClass('added_row')
                    .insertBefore($template);
            $clone.find('.removeButton').attr('data-index', ItemIndex);
            $clone.find('.removeButton').attr('onclick', "remove_row(" + ItemIndex + ",this);");

            $clone
                    .find('[id="product-0-description"]').attr('id', 'product-' + ItemIndex + '-name').html(product_text).end()
                    .find('[name="pos-0-id_hidden"]').attr('name', 'pos-' + ItemIndex + '-id_hidden').attr('id', 'pos-' + ItemIndex + '-id_hidden').val(product).end()

                    .find('[id="pos-0-price_hidden"]').attr('id', 'pos-' + ItemIndex + '-price_hidden').attr('name', 'pos-' + ItemIndex + '-price_hidden').attr('onkeyup', "set_total(" + ItemIndex + ")").val(price).end()
//                    .find('[name="pos-0-price_hidden"]').attr('name', 'pos-' + ItemIndex + '-price_hidden').attr('id', 'pos-' + ItemIndex + '-price_hidden').val(price).end()

                    .find('[id="pos-0-qty"]').attr('id', 'pos-' + ItemIndex + '-qty').attr('onkeyup', "set_total(" + ItemIndex + ")").val(qty).end()
                    .find('[name="pos-0-qty_hidden"]').attr('name', 'pos-' + ItemIndex + '-qty_hidden').attr('id', 'pos-' + ItemIndex + '-qty_hidden').val(qty).end()

                    .find('[id="pos-0-total_view"]').attr('id', 'pos-' + ItemIndex + '-total_view').html(total).end()
                    .find('[name="pos-0-total_hidden"]').attr('name', 'pos-' + ItemIndex + '-total_hidden').attr('id', 'pos-' + ItemIndex + '-total_hidden').val(total).end()

            $("#noof_items").val(ItemIndex);
            $("product").trigger('reset');
            $('#products-qty').val('1');
            $('#unit_price').val('');
            // $('#sub_tot').val(tot);
            cal_sub_tot();

            $('#grn-form-submit').removeAttr('disabled');
        }
    });

});

function set_total(index) {
    qty = $('#pos-' + index + '-qty_hidden').val();
    price = $('#pos-' + index + '-price_hidden').val();
//    console.log(qty,price);
    total = parseFloat(price) * parseFloat(qty);
//    console.log(total);

    $('#pos-' + index + '-total_view').html(total.toFixed(2));
    $('#pos-' + index + '-price_hidden').val(price);
    $('#pos-' + index + '-qty_hidden').val(qty);
    $('#pos-' + index + '-total_hidden').val(total);
    $('[name="pos-'+index+'-total"]').val(total.toFixed(2));

    cal_sub_tot();
}

function cal_sub_tot() {
    var sub_tot = 0;
    $('.td_row').each(function() {
        sub_tot = sub_tot + parseFloat($(this).find('.product_tot_hidden').html());
//        console.log(sub_tot);

        $('#sub_tot').val(sub_tot.toFixed(2));
//        console.log()
        discount = $('#discount').val();
        net_total = sub_tot - parseFloat(discount);
//
        $('#net_tot').val(net_total.toFixed(2));
    });
}

function cal_grand_tot_with_discount(val) {
    discount = $(val).val();

    sub_tot = $('#sub_tot').val();

    net_total = parseFloat(sub_tot) - parseFloat(discount);

    $('#net_tot').val(net_total.toFixed(2));
}

function remove_row(item_index, btn) {
//    ItemIndex--;
    $(btn).parent().parent().remove();

    ItemIndex2 = 0;

    $('.added_row').each(function() {
//        console.log('sdsdgvsdv');
        ItemIndex2++;
        $(this).attr('id', +ItemIndex2 + '-grn_row').attr('data-item-index', ItemIndex2);

        $(this).find('.product_description').attr('id', 'product-' + ItemIndex2 + '-description');
        $(this).find('.product_id_hidden').attr('name', 'pos-' + ItemIndex2 + '-id_hidden').attr('id', 'pos-' + ItemIndex2 + '-id_hidden');
        
//        $(this).find('.price').attr('id', 'pos-' + ItemIndex2 + '-price');
        $(this).find('.price_hidden').attr('name', 'pos-' + ItemIndex2 + '-price_hidden').attr('id', 'pos-' + ItemIndex2 + '-price_hidden').attr('onkeyup', "set_total(" + ItemIndex2 + ")");

//        $(this).find('.product_qty').attr('id', 'pos-' + ItemIndex2 + '-qty');
        $(this).find('.qty_hidden').attr('name', 'pos-' + ItemIndex2 + '-qty_hidden').attr('id', 'pos-' + ItemIndex2 + '-qty_hidden').attr('onkeyup', "set_total(" + ItemIndex2 + ")");

//        $(this).find('.pos_tot').attr('id', 'product-' + ItemIndex2 + '-total');
        $(this).find('.product_tot_hidden').attr('name', 'pos-' + ItemIndex2 + '-total_view').attr('id', 'pos-' + ItemIndex2 + '-total_view');
//        console.log(ItemIndex2);
    });
    $("#noof_items").val(ItemIndex2);
    cal_sub_tot();

}