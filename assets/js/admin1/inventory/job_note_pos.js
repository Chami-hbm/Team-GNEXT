jQuery(document).ready(function () {

    item_date = moment().format("YYYY-MM-DD");
    item_time = moment().format("HH:mm:ss");

    $('#pos-date').val(item_date);
    $('#pos-time').val(item_time);

    $("#error-alert").hide();
    $("#error-alert2").hide();


    var r = $("#pos_select_form"),
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
});

ItemIndex = 0;
item_index_for_wastage = 0;
function add_data_to_table_from_js(tab_type) {


    if (ItemIndex == 0) {

        $('tr.added_row').each(function () {
            ItemIndex++;
        });
    }

    if (tab_type == 'other_') {
        $('#item_description').val($('#other_item_name_new').val());
    }

    $("#" + tab_type + "item_select").attr('id', 'item_select');
    $("#" + tab_type + "cost_price").attr('id', 'cost_price');
    $("#" + tab_type + "qty").attr('id', 'qty');


    $('#customer_uther_information').addClass('hide');
    if ($('#pos_select_form').valid()) {

//        add_option_to_w_select_box($('#item_description').val(),$('#item_id').val());

        job_item_id = $('#item_select').val();
//        if ($('#item_select option:selected').data('item_sub_category') === 'MUG' || $('#item_select option:selected').data('item_sub_category') === 'STAMP' || $('#item_select option:selected').data('item_sub_category') === 'PLATE' || $('#item_select option:selected').data('item_sub_category') === 'GRANITE' || $('#item_select option:selected').data('item_sub_category') === 'PHOTO FRAME' || $('#item_select option:selected').data('item_sub_category') === 'PHOTO PRINTING' || $('#item_select option:selected').data('item_sub_category') === 'Number Plate') {
        if ($('#item_select option:selected').data('item_calculation_with_size') === 'No') {

            table_item_name = $('#item_select option:selected').data('item_sub_category') + " / " + $('#item_description').val();
//            add_option_to_w_select_box(table_item_name);
//            add_option_to_w_select_box($('#item_description').val());


            add_other_item_wastages(job_item_id, $('#qty').val());

        } else if ($('#item_select option:selected').data('item_calculation_with_size') === 'Yes') {
//        } else if ($('#item_select option:selected').data('item_sub_category') === 'BANNER / Flex Printing' || $('#item_select option:selected').data('item_sub_category') === 'PVC / Sticker Printing' || $('#item_select option:selected').data('item_sub_category') === 'Sign Cutting') {

            width_2 = $('#' + tab_type + 'width').val();
            width_in_2 = $('#' + tab_type + 'width_in').val();
            height_2 = $('#' + tab_type + 'height').val();
            height_in_2 = $('#' + tab_type + 'height_in').val();
            item_price = $('#' + tab_type + 'item_cash_price_hidden').val();

            width = 0;
            width_in = 0;
            height = 0;
            height_in = 0;



            if (width_2 > 0) {
                width = width_2;
            }
            if (width_in_2 > 0) {
                width_in = width_in_2;
            }
            if (height_2 > 0) {
                height = height_2;
            }
            if (height_in_2 > 0) {
                height_in = height_in_2;
            }

            real_height = (parseInt(height) * 12) + parseInt(height_in);
            real_width = (parseInt(width) * 12) + parseInt(width_in);

//            alert(real_height);
//            alert(real_width);

            if (real_height > 0 && 0 < real_width) {
                get_nearest_inventory_item_by_width(job_item_id, real_width, real_height, $('#extra_space_on_select_div').val());
            }

            table_item_name = $('#item_select option:selected').data('item_sub_category') + " / " + $('#item_description').val() + " ( " + width + "ft . " + width_in + "In X " + height + "ft . " + height_in + "In ) ft<sup>2</sup>";

        }


        img_url = $('#item_select option:selected').data('item_img_url');

        $('#item_select').val('-');
        $('#item_measure_type1').val('-').trigger('change');

//
        qty = $('#qty').val();
        cost_price = $('#cost_price').val();
        discount = 0.00;
        discount2 = $('#' + tab_type + 'product_discount').val();
        if (discount2 > 0) {
            discount = parseFloat(discount2);
        }

        sub_total_cost = parseFloat(qty) * parseFloat(cost_price);

        total_cost = sub_total_cost - discount;



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
        item_index_for_wastage++;
        var $template = $('.pos-product-row'),
                $clone = $template
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

        $('#hidden_item_index_for_wastage').val(item_index_for_wastage);

        $clone

                .find('[id="pos-0-category"]').attr('name', 'pos-' + ItemIndex + '-category').attr('id', 'pos-' + ItemIndex + '-category').val($('#category').val()).end()
                .find('[id="pos-0-sub_category"]').attr('name', 'pos-' + ItemIndex + '-sub_category').attr('id', 'pos-' + ItemIndex + '-sub_category').val($('#sub_category').val()).end()

                .find('[id="pos-0-item-remark"]').attr('id', 'pos-' + ItemIndex + '-item_remark').html($('#' + tab_type + 'remark').val()).end()
                .find('[name="pos-0-remark"]').attr('name', 'pos-' + ItemIndex + '-remark').attr('id', 'pos-' + ItemIndex + '-remark').val($('#' + tab_type + 'remark').val()).end()


                .find('[id="pos-0-item-description-view"]').attr('id', 'pos-' + ItemIndex + '-item_description_view').html(table_item_name).end()

                .find('[id="pos-0-item-img"]').attr('id', 'pos-' + ItemIndex + '-item_img').attr('src', img_url).end()
                .find('[name="pos-0-item"]').attr('name', 'pos-' + ItemIndex + '-item').attr('id', 'pos-' + ItemIndex + '-item').val($('#item_id').val()).end()
                .find('[name="pos-0-item_display_name"]').attr('name', 'pos-' + ItemIndex + '-item_display_name').attr('id', 'pos-' + ItemIndex + '-item_display_name').val(table_item_name).end()

                .find('[id="pos-0-qty-view"]').attr('id', 'pos-' + ItemIndex + '-qty_view').html($('#qty').val()).end()
                .find('[name="pos-0-qty"]').attr('name', 'pos-' + ItemIndex + '-qty').attr('id', 'pos-' + ItemIndex + '-qty').val($('#qty').val()).end()

                .find('[id="pos-0-cost-price-view"]').attr('id', 'pos-' + ItemIndex + '-cost_price_view').html($('#cost_price').val()).end()
                .find('[name="pos-0-cost-price"]').attr('name', 'pos-' + ItemIndex + '-cost_price').attr('id', 'pos-' + ItemIndex + '-cost_price').val($('#cost_price').val()).end()

//                .find('[id="pos-0-tax-view"]').attr('id', 'pos-' + ItemIndex + '-tax_view').html($('#tax_type1').val() + '%').end()
//                .find('[name="pos-0-tax"]').attr('name', 'pos-' + ItemIndex + '-tax').attr('id', 'pos-' + ItemIndex + '-tax').val($('#tax_type1').val()).end()

//                .find('[id="pos-0-product_discount-view"]').attr('id', 'pos-' + ItemIndex + '-product_discount').html($('#product_discount').val()).end()
//                .find('[name="pos-0-product_discount"]').attr('name', 'pos-' + ItemIndex + '-product_discount').attr('id', 'pos-' + ItemIndex + '-product_discount').val($('#product_discount').val()).end()

                .find('[id="pos-0-product_discount-view"]').attr('id', 'pos-' + ItemIndex + '-product_discount').html(discount).end()
                .find('[name="pos-0-product_discount"]').attr('name', 'pos-' + ItemIndex + '-product_discount').attr('id', 'pos-' + ItemIndex + '-product_discount').val(discount).end()
                .find('[name="pos-0-item_index_for_wastage"]').attr('name', 'pos-' + ItemIndex + '-item_index_for_wastage').attr('id', 'pos-' + ItemIndex + '-item_index_for_wastage').val(item_index_for_wastage).end()

                // .find('[id="pos-0-transport-cost-view"]').attr('id', 'pos-' + ItemIndex + '-transport_cost_view').html($('#transport_cost').val()).end()
                // .find('[name="pos-0-transport-cost"]').attr('name', 'pos-' + ItemIndex + '-transport_cost').attr('id', 'pos-' + ItemIndex + '-transport_cost').val($('#transport_cost').val()).end()

                .find('[id="pos-0-total-view"]').attr('id', 'pos-' + ItemIndex + '-total_view').html(total_cost.toFixed(2)).end()
                .find('[name="pos-0-total"]').attr('name', 'pos-' + ItemIndex + '-total').attr('id', 'pos-' + ItemIndex + '-total').val(total_cost.toFixed(2)).addClass('total_cost').end();



        $("#noof_items").val(ItemIndex);

        $('#flex_submit_btn1').attr('disabled', 'disabled');
        $('#item_select').val('-').trigger('change');
        $('#extra_space_on_select_div').val('-').trigger('change');
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
    set_west_job_item_select_box_options();
    get_grand_tot();

//        $('#pos-form-submit').removeAttr('disabled');

    customer_name = $('#name').val();
    customer_mobile = $('#mobile').val();
    customer_mobile2 = $('#mobile2').val();
    customer_nic = $('#nic').val();
    customer_email = $('#email').val();
    customer_address = $('#address').val();
    customer_type = $('#customer_type').val();
    customers_customer_id = $('#customer').val();
    note_percentage = $('#' + customer_type + '_percentage_div').find('.percentage_input').val();

    $('#pos_select_form').trigger('reset');
    $('#name').val(customer_name);
    $('#mobile').val(customer_mobile);
    $('#mobile2').val(customer_mobile2);
    $('#nic').val(customer_nic);
    $('#email').val(customer_email);
    $('#address').val(customer_address);
    $('#customer_type').val(customer_type);
    $('#job_note_percentage').val(note_percentage);
    $('#' + customer_type + '_percentage_div').find('.percentage_input').val(note_percentage);
    $('#customer').val(customers_customer_id).trigger('change');

    set_select_box_options($('#item_id').val(), table_item_name);

    remove_item_data_hide_class();
    $("#item_select").attr("id", tab_type + 'item_select');
    $("#cost_price").attr("id", tab_type + 'cost_price');
    $("#qty").attr("id", tab_type + 'qty');
//    });
}
//});
pre_designer_price = 0;
function get_grand_tot() {
    tot = 0;
    wastage_price = 0;
    designer_price = 0;
    $('input.total_cost').each(function ($this) {
        tot = tot + parseFloat($(this).val());

        designer_price = parseFloat($('#designer_price').val());
        wastage_price = parseFloat($('#text_wastage_price').val());


//        if(parseFloat(designer_price) != pre_designer_price){
//            console.log(parseFloat(designer_price));
//            console.log('designer_price');
//            console.log(parseFloat(pre_designer_price));
//            console.log('pre_designer_price');
//            console.log(tot);
//            
//            tot = tot - pre_designer_price;
//            console.log(tot);
//            console.log('tot after - pre_price');
//            
//            
//            pre_designer_price = parseFloat(designer_price);
//            console.log(pre_designer_price);
//            console.log('pre_designerprice new');
//            tot = tot+parseFloat(designer_price);
//            console.log(tot);
//            console.log('tot with designer_price');
//        }


    });
    $('input.e_c_price_hid').each(function () {

        price = parseFloat($(this).val());
        if (price > 0) {
            tot += parseFloat($(this).val());
        }
    });

    if (parseFloat(wastage_price) > 0) {
        console.log(wastage_price);
        tot = tot + parseFloat(wastage_price);
    }

    if (parseFloat(designer_price) > 0) {
        tot = tot + parseFloat(designer_price);
    }

    $('#gross_total').val(tot.toFixed(2));

    discount = $('#discount').val();

    net_tot = parseFloat(tot) - parseFloat(discount);
    $('#net_total').val(net_tot.toFixed(2));
    $('#balance').val(net_tot.toFixed(2));
    $('#total_payment_price').val(net_tot.toFixed(2));
//        console.log($('#total_payment_price').val());
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
    if (ItemIndex === 0) {

        $('tr.added_row').each(function () {
            ItemIndex++;
        });
    }
    ItemIndex--;
    $("#noof_courier_request_items").val(ItemIndex);
    $("#noof_items").val(ItemIndex);

    hidden_item_index_for_wastage = $(btn).closest('tr').attr('data-item-index');
    $('.' + hidden_item_index_for_wastage + '_wast_item_index_for_wastage').parent().find('.btn').click();
    
//    $('.' + hidden_item_index_for_wastage + '_wast_item_index_for_wastage').closest('tr').remove();
    $(btn).closest('tr').remove();

//    get_grand_tot();

    if (ItemIndex === 0) {
        $('#gross_total').val('0');
        $('#net_total').val('0');
        $('#discount').val('0');
        $('#balance').val('0');
//        $('#pos-form-submit').attr('disabled','disabled');
    } else {
        get_grand_tot();
        net_total_on_discount();
    }
    ItemIndex2 = 0;

    $('.added_row').each(function () {
        ItemIndex2++;
        previous_wast_index = $(this).attr('data-item-index');
        $(this).attr('id', +ItemIndex2 + '-pos_row').attr('data-item-index', ItemIndex2);

        $(this)
                .find('.product_view').attr('id', 'pos-' + ItemIndex2 + '-product_view').end()
                .find('.product_hidden').attr('name', 'pos-' + ItemIndex2 + '-product').attr('id', 'pos-' + ItemIndex2 + '-product').end()

                .find('.item_hidden').attr('id', 'pos-' + ItemIndex2 + '-item').attr('name', 'pos-' + ItemIndex2 + '-item').end()
                .find('.item_display_name_hidden').attr('id', 'pos-' + ItemIndex2 + '-item_display_name').attr('name', 'pos-' + ItemIndex2 + '-item_display_name').end()
                .find('.total_hidden').attr('id', 'pos-' + ItemIndex2 + '-total').end()

                .find('.qty_view').attr('id', 'pos-' + ItemIndex2 + '-qty_view').end()
                .find('.qty_hidden').attr('name', 'pos-' + ItemIndex2 + '-qty').attr('id', 'pos-' + ItemIndex2 + '-qty').end()

                .find('.cost_price_view').attr('id', 'pos-' + ItemIndex2 + '-cost_price_view').end()
                .find('.cost_price_hidden').attr('name', 'pos-' + ItemIndex2 + '-cost_price').attr('id', 'pos-' + ItemIndex2 + '-cost_price').end()


                .find('.item_description_view').attr('id', 'pos-' + ItemIndex2 + '-item_description_view').end()

                .find('.item_remark').attr('id', 'pos-' + ItemIndex2 + '-item_remark').end()
                .find('.remark_hidden').attr('name', 'pos-' + ItemIndex2 + '-remark').attr('id', 'pos-' + ItemIndex2 + '-remark').end()

                .find('.product_discount_view').attr('id', 'pos-' + ItemIndex2 + '-discount_view').end()

                .find('.product_discount_hidden').attr('name', 'pos-' + ItemIndex2 + '-discount_hidden').attr('id', 'pos-' + ItemIndex2 + '-discount_hidden').end()

                .find('.total_view').attr('id', 'pos-' + ItemIndex2 + '-total_view').end()
                .find('.total_hidden').attr('name', 'pos-' + ItemIndex2 + '-total').attr('id', 'pos-' + ItemIndex2 + '-total').end();

//        previous_wast_index = $(this).find('.item_index_for_wastage').val();
        $('.' + previous_wast_index + '_wast_item_index_for_wastage').val(ItemIndex2).removeClass(previous_wast_index + '_wast_item_index_for_wastage').addClass(ItemIndex2 + '_wast_item_index_for_wastage');

        $(this).find('.item_index_for_wastage').attr('id', 'pos-' + ItemIndex2 + '-item_index_for_wastage').attr('name', 'pos-' + ItemIndex2 + '-item_index_for_wastage').val(ItemIndex2).end();
    });
    set_west_job_item_select_box_options();

//    get_grand_tot();
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
    discount = parseFloat($('#discount').val());
    gros_total = parseFloat($('#gross_total').val());

    net_tot = gros_total - discount;
    if (net_tot >= 0) {
        $('#net_total').val(net_tot.toFixed(2));

    } else {
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
        type: "post",
        url: base_url + "player/inventory/items/get-price",
        cache: false,
        data: 'product=' + id,
        success: function (res) {
            val = parseFloat(res);
            $('#cost_price').val(val.toFixed(2));

        }
    });


}


function set_select_box_options(id, name) {

    $('#selected_job_items_select').append($('<option>', {
        value: id,
        text: name
    }));

}

function set_west_job_item_select_box_options() {
    
    $('#w_job_item').html('');
    $('.added_row').each(function () {
        
        text = $(this).find('.item_display_name_hidden').val();
        val = $(this).find('.item_hidden').val();
        w_item_index_new = $(this).data('item-index');
        
        $('#w_job_item').append($("<option></option>").attr({"value": val, "data-w_item_index": w_item_index_new }).text(text));

    });

}