jQuery(document).ready(function () {

    item_date = moment().format("YYYY-MM-DD");
    item_time = moment().format("HH:mm:ss");

    $('#pos-date').val(item_date);
    $('#pos-time').val(item_time);

    $("#error-alert").hide();
    $("#error-alert2").hide();

//    $.validator.addMethod("regex", function (value, element, regexpr) {
//        if (value === null || value === "") {
//            return true;
//        } else {
//            return regexpr.test(value);
//        }
//    });

    var r = $("#pos_select_form"),
        t = $("#error-alert", r),
        i = $("#success-alert", r);
    r.validate({
        doNotHideMessage: !0,
        errorElement    : "span",
//        errorClass: "has-error",
        errorClass      : "help-block help-block-error",
        focusInvalid    : !1,
        invalidHandler  : function (e, r) {
            i.hide(), t.show();
        },
        highlight       : function (e) {
            $(e).closest(".input-div").removeClass("has-success").addClass("has-error");
        },
        unhighlight     : function (e) {
            $(e).closest(".input-div").removeClass("has-error");
        },
        success         : function (e) {
            e.closest(".input-div").removeClass("has-error").addClass("has-success"),
                e.remove();
            e.addClass("valid").closest(".input-div").removeClass("has-error").addClass("has-success");
        }
    });

    ItemIndex = 0;
    $("#submit_btn1").click(function () {
        if ($('#pos_select_form').valid()) {
            
            $('#item_select').val('-');

//
            qty        = $('#qty').val();
            cost_price = $('#cost_price').val();
            discount = $('#product_discount').val();

            sub_total_cost = parseFloat(qty) * parseFloat(cost_price);

            total_cost = sub_total_cost * (100 - discount)/100;
//            console.log(sub_total_cost);
//            console.log(100-discount);
//            console.log(total_cost);
            
            
            
//            qty        = $('#qty').val();
//            cost_price = $('#cost_price').val();
//
//            total_cost = parseFloat(qty) * parseFloat(cost_price);
//
//            tax = $('#tax_type1').val();
//
//            tax = parseFloat(total_cost) * parseFloat(tax) / 100;
//
//            total_cost = total_cost + tax;
//            
            // console.log(total_cost);
            


            ItemIndex++;
            var $template = $('.pos-product-row'),
                $clone    = $template
                    .clone()
                    .removeClass('hide')
                    .removeClass('pos-product-row')
                    //                                .removeAttr('id')
                    .addClass('added_row')
                    .attr('id', ItemIndex + '-pos_row')
                    .attr('data-item-index', ItemIndex)
                    .insertBefore($template);
            $clone.find('.removeButton').attr('data-index', ItemIndex);
            $clone.find('.removeButton').attr('onclick', "remove_row(" + ItemIndex + ",this);");

            $clone

                .find('[id="pos-0-category"]').attr('name', 'pos-' + ItemIndex + '-category').attr('id', 'pos-' + ItemIndex + '-category').val($('#category').val()).end()
                .find('[id="pos-0-sub_category"]').attr('name', 'pos-' + ItemIndex + '-sub_category').attr('id', 'pos-' + ItemIndex + '-sub_category').val($('#sub_category').val()).end()

                .find('[id="pos-0-item-description-view"]').attr('id', 'pos-' + ItemIndex + '-item_description_view').html($('#item_description').val()).end()

                .find('[id="pos-0-item-view"]').attr('id', 'pos-' + ItemIndex + '-item_view').html($('[name=item_code]').val()).end()
                .find('[name="pos-0-item"]').attr('name', 'pos-' + ItemIndex + '-item').attr('id', 'pos-' + ItemIndex + '-item').val($('#item_id').val()).end()

                .find('[id="pos-0-qty-view"]').attr('id', 'pos-' + ItemIndex + '-qty_view').html($('#qty').val()).end()
                .find('[name="pos-0-qty"]').attr('name', 'pos-' + ItemIndex + '-qty').attr('id', 'pos-' + ItemIndex + '-qty').val($('#qty').val()).end()

                .find('[id="pos-0-cost-price-view"]').attr('id', 'pos-' + ItemIndex + '-cost_price_view').html($('#cost_price').val()).end()
                .find('[name="pos-0-cost-price"]').attr('name', 'pos-' + ItemIndex + '-cost_price').attr('id', 'pos-' + ItemIndex + '-cost_price').val($('#cost_price').val()).end()

//                .find('[id="pos-0-tax-view"]').attr('id', 'pos-' + ItemIndex + '-tax_view').html($('#tax_type1').val() + '%').end()
//                .find('[name="pos-0-tax"]').attr('name', 'pos-' + ItemIndex + '-tax').attr('id', 'pos-' + ItemIndex + '-tax').val($('#tax_type1').val()).end()
        
                .find('[id="pos-0-product_discount-view"]').attr('id', 'pos-' + ItemIndex + '-product_discount').html($('#product_discount').val()).end()
                .find('[name="pos-0-product_discount"]').attr('name', 'pos-' + ItemIndex + '-product_discount').attr('id', 'pos-' + ItemIndex + '-product_discount').val($('#product_discount').val()).end()

            // .find('[id="pos-0-transport-cost-view"]').attr('id', 'pos-' + ItemIndex + '-transport_cost_view').html($('#transport_cost').val()).end()
            // .find('[name="pos-0-transport-cost"]').attr('name', 'pos-' + ItemIndex + '-transport_cost').attr('id', 'pos-' + ItemIndex + '-transport_cost').val($('#transport_cost').val()).end()

                .find('[id="pos-0-total-view"]').attr('id', 'pos-' + ItemIndex + '-total_view').html(total_cost.toFixed(2)).end()
                .find('[name="pos-0-total"]').attr('name', 'pos-' + ItemIndex + '-total').attr('id', 'pos-' + ItemIndex + '-total').val(total_cost.toFixed(2)).addClass('total_cost').end()



            $("#noof_items").val(ItemIndex);
            
            $('#item_select').val('-').trigger('change');
            $('#qty_addon').addClass('hide');            

//            if ($("#is_draft").val() === "Yes") {
//                $("#courier-request-is_draft").val($("#is_draft").val());
//                $("#courier-request-courier_request_draft_id").val($("#courier_request_draft_id").val());
//                $("#is_draft").val("No");
//                $("#is_draft2").val("No");
//
//                $("#is_draft3").val("Yes");
//                $("#courier_request_draft_id2").val($("#courier_request_draft_id").val());
//
//                console.log($("#courier_request_draft_id").val());
//            }
//             console.log(ItemIndex);

//            $("#data_table").dataTable().draw();
//            date = $('[name="date"]').val();
//            $("#courier_request_date").val(date);
        }
        get_grand_tot();

        $('#pos-form-submit').removeAttr('disabled');
        $('#pos_select_form').trigger('reset');
    });
});

function get_grand_tot() {
    tot = 0;
    $('input.total_cost').each(function ($this) {
//                console.log($(this).val()+" " + $(this).attr('id'));
//                console.log(parseFloat($('input.total_cost').val()));
        tot = tot + parseFloat($(this).val());
        $('#gross_total').val(tot.toFixed(2));

        discount = $('#discount').val();

        net_tot = parseFloat(tot) - parseFloat(discount);
        $('#net_total').val(net_tot.toFixed(2));
        $('#balance').val(net_tot.toFixed(2));
        $('#total_payment_price').val(net_tot.toFixed(2));
        console.log($('#total_payment_price').val());
        
    });
}
/*

 function cal_total_cost() {
 qty = parseFloat($('#qty').val());
 price = parseFloat($("#cost_price").val());
 transport = parseFloat($('#transport_cost').val());
 tax = parseFloat($('#tax_type1').val());

 item_price = qty * price;
 cal_tax = item_price * tax / 100;

 sum = item_price + cal_tax + transport;

 $('#total_item_cost').val(sum.toFixed(2));
 }
 */

function remove_row(item_index, btn) {
    ItemIndex--;
    $("#noof_courier_request_items").val(ItemIndex);
    $(btn).parent().parent().remove();

    console.log(item_index);
//    get_grand_tot();

    if (ItemIndex === 0) {
        $('#gross_total').val('0');
        $('#net_total').val('0');
        $('#discount').val('0');
        $('#pos-form-submit').attr('disabled','disabled');
    } else {
        get_grand_tot();
        net_total_on_discount();
    }
    ItemIndex2=0;

    $('.added_row').each(function () {
        ItemIndex2++;
        $(this).attr('id', +ItemIndex2 + '-pos_row').attr('data-item-index', ItemIndex2);

        $(this)
            .find('.product_view').attr('id', 'pos-' + ItemIndex2 + '-product_view').end()
            .find('.product_hidden').attr('name', 'pos-' + ItemIndex2 + '-product').attr('id', 'pos-' + ItemIndex2 + '-product').end()

            .find('.qty_view').attr('id', 'pos-' + ItemIndex2 + '-qty_view').end()
            .find('.qty_hidden').attr('name', 'pos-' + ItemIndex2 + '-qty').attr('id', 'pos-' + ItemIndex2 + '-qty').end()

            .find('.cost_price_view').attr('id', 'pos-' + ItemIndex2 + '-cost_price_view').end()
            .find('.cost_price_hidden').attr('name', 'pos-' + ItemIndex2 + '-cost_price').attr('id', 'pos-' + ItemIndex2 + '-cost_price').end()

            .find('.product_discount_view').attr('id', 'pos-' + ItemIndex2 + '-product_discount_view').end()
            .find('.product_discount_hidden').attr('name', 'pos-' + ItemIndex2 + '-product_discount').attr('id', 'pos-' + ItemIndex2 + '-product_discount').end()

            .find('.product_discount_view').attr('id', 'pos-' + ItemIndex2 + '-total_view').end()
            .find('.product_discount_hidden').attr('name', 'pos-' + ItemIndex2 + '-total').attr('id', 'pos-' + ItemIndex2 + '-total').addClass('total_cost').end()
    
//        $(this)
//            .find('.product_view').attr('id', 'pos-' + ItemIndex2 + '-product_view').html($('#products>option:selected').text()).end()
//            .find('.product_hidden').attr('name', 'pos-' + ItemIndex2 + '-product').attr('id', 'pos-' + ItemIndex2 + '-product').val($('#products').val()).end()
//
//            .find('.qty_view').attr('id', 'pos-' + ItemIndex2 + '-qty_view').html($('#qty').val()).end()
//            .find('.qty_hidden').attr('name', 'pos-' + ItemIndex2 + '-qty').attr('id', 'pos-' + ItemIndex2 + '-qty').val($('#qty').val()).end()
//
//            .find('.cost_price_view').attr('id', 'pos-' + ItemIndex2 + '-cost_price_view').html($('#cost_price').val()).end()
//            .find('.cost_price_hidden').attr('name', 'pos-' + ItemIndex2 + '-cost_price').attr('id', 'pos-' + ItemIndex2 + '-cost_price').val($('#cost_price').val()).end()
//
//            .find('.product_discount_view').attr('id', 'pos-' + ItemIndex2 + '-product_discount_view').html($('#product_discount').val()).end()
//            .find('.product_discount_hidden').attr('name', 'pos-' + ItemIndex2 + '-product_discount').attr('id', 'pos-' + ItemIndex2 + '-product_discount').val($('#product_discount').val()).end()
//
//            .find('.product_discount_view').attr('id', 'pos-' + ItemIndex2 + '-total_view').html(total_cost.toFixed(2)).end()
//            .find('.product_discount_hidden').attr('name', 'pos-' + ItemIndex2 + '-total').attr('id', 'pos-' + ItemIndex2 + '-total').val(total_cost.toFixed(2)).addClass('total_cost').end()

//            .find('.tax_view').attr('id', 'pos-' + ItemIndex2 + '-tax_view').html($('#tax_type1').val() + '%').end()
//            .find('.tax_hidden').attr('name', 'pos-' + ItemIndex2 + '-tax').attr('id', 'pos-' + ItemIndex2 + '-tax').val($('#tax_type1').val()).end()
//
//            .find('.tax_view').attr('id', 'pos-' + ItemIndex2 + '-total_view').html(total_cost.toFixed(2)).end()
//            .find('.tax_hidden').attr('name', 'pos-' + ItemIndex2 + '-total').attr('id', 'pos-' + ItemIndex2 + '-total').val(total_cost.toFixed(2)).addClass('total_cost').end()
    });

}

function get_sub_categories($this) {
    id = $($this).val();
    $('#load_sub_category').load(base_url + 'player/inventory/items/load-sub-category/' + id);
}
function load_products($this) {
    id = $($this).val();
    $('#load_products').load(base_url + 'player/inventory/items/items-by-sub-category-load/' + id);
}

function net_total_on_discount() {
    discount   = parseFloat($('#discount').val());
    gros_total = parseFloat($('#gross_total').val());

    net_tot = gros_total - discount;
    if(net_tot >= 0){
        $('#net_total').val(net_tot.toFixed(2));
        
    }else{
        $('#net_total').val(gros_total.toFixed(2));
    }
//    $('#balance').val(net_tot.toFixed(2));

    balance_calculation();
}

function set_price1(val) {
//    alert('ss');
    id = $(val).val();
    // alert(id);
    $.ajax({
        type   : "post",
        url    : base_url + "player/inventory/items/get-price",
        cache  : false,
        data   : 'product=' + id,
        success: function (res) {
            val = parseFloat(res);
            $('#cost_price').val(val.toFixed(2));

        }
    });
    
    
}