function get_subcategories(category_id) {
    $('#get_subcategories').load(base_url + 'user/get-sub-category/' + category_id);
}
function get_products(sub_category_id) {
    $('#get_products').load(base_url + 'user/get-items/' + sub_category_id);
}
function select_product(product_id, clicked) {
    var product_price = $('#' + product_id + '-price').val();
    var product_name = $('#' + product_id + '-name').val();
    var product_category = $('#' + product_id + '-category').val();
    var product_sub_category = $('#' + product_id + '-sub_category').val();

    $(clicked).removeAttr('onclick');
//$('#added_products')
//        // Add button click handler
//        .on('click', '.addButton', function() {
    console.log('test');

    ItemIndex++;

    var $template = $('#added_products_temp'),
            $clone = $template
            .clone()
            .removeClass('hide')
            .removeAttr('id')
//                                .attr('data-item-index', ItemIndex)
            .addClass('added_product')
            .insertBefore($template);

    // Update the name attributes
    console.log(ItemIndex);
    $clone
            .find('[name="pro_name"]').attr('name', 'products-' + ItemIndex + '-product_name').val(product_name).end()
            .find('[name="pro_price"]').attr('name', 'products-' + ItemIndex + '-product_price').val(product_price).end()
            .find('[name="pro_id"]').attr('name', 'products-' + ItemIndex + '-product_id').val(product_id).end()
            .find('[name="pro_cat"]').attr('name', 'products-' + ItemIndex + '-product_category').val(product_category).end()
            .find('[name="pro_sub_cat"]').attr('name', 'products-' + ItemIndex + '-product_sub_category').val(product_sub_category).end()
            .find('[name="hidden_tot"]').attr('name', 'products-' + ItemIndex + '-product_tot').end()
            .find('[name="pro_qty"]').attr('name', 'products-' + ItemIndex + '-qty').end()
//                .find('[name="transport_cost"]').attr('name', 'products-' + ItemIndex + '-.transport_cost').end()
//                .find('[name="total_item_cost"]').attr('name', 'products-' + ItemIndex + '-.total_item_cost').end();
            .find('#pro-name').attr('id', product_id + '-name').html(product_name).end()
            .find('#u-price').attr('id', product_id + '-price').html(product_price).end()
            .find('#total').attr('id', product_id + '-total').html(product_price).end()
            .find('#hide_tot').attr('id', product_id + '-hidden_tot').addClass('active-tot').val(product_price).end()



//    $(this).parent().addClass('disabled');
    get_sub_tot();

    time = moment().format("hh:mm:ss A");
    date = moment().format("YYYY-MM-DD");

    $('#num_of_items').val(ItemIndex);
    $('#receipt_date').val(date);
    $('#receipt_time').val(time);
}

function get_sub_tot() {
//    var sub_tot = parseFloat($('#sub-total').text());

//    sub_tot = sub_tot + parseFloat($('#'+product_id+'-total').text());
    var sub_tot = 0;
    $('input.active-tot').each(function () {
//            sub_tot = parseFloat($('#sub-total').text());
//            console.log(sub_tot+'-1');
        sub_tot = sub_tot + parseFloat($(this).val());
//            console.log(sub_tot+'-2');
//            sub_tot = sub_tot.toFixed(2);
        $('#sub-total').text(sub_tot.toFixed(2));
        $('#hidden_sub_tot').val(sub_tot.toFixed(2));
    });

//            $('#sub-total').text(sub_tot.toFixed(2));
    var tax = $('#hidden_tax').val();
    var cal_tax = parseFloat(sub_tot * tax / 100);

    var service_charge = $('#hidden_s_charge').val();
    var cal_service_charge = parseFloat(sub_tot * service_charge / 100);

    var discount = $('#discount-add').val();

    var cal_sub_tot = cal_tax + cal_service_charge;

    cal_sub_tot = parseFloat(sub_tot) + parseFloat(cal_sub_tot);

    cal_sub_tot = parseFloat(cal_sub_tot) - parseFloat(discount);

    $('#net-total').text(cal_sub_tot.toFixed(2));
    $('#hidden_net_total').val(cal_sub_tot.toFixed(2));
}

function remove_product(btn) {
//    alert('succes');
    $(btn).parent().parent().remove();
    get_sub_tot();

    $('a.select_product').each(function () {
        var product_id = $(this).attr('id');
        $(this).attr('onclick', 'select_product(' + product_id + ',this)');
    });

    ItemIndex--
    $('#num_of_items').val(ItemIndex);

    ItemIndex2 = 0;
//   $('.pro_hidden_id').each(function (){
//       ItemIndex2++;
//       $(this).attr('name', 'products-' + ItemIndex2 + '-.product_id');
//   }); 
//   
//   ItemIndex2 = 0;
//   $('.pro_hidden_name').each(function (){
//       ItemIndex2++;
//       $(this).attr('name', 'products-' + ItemIndex2 + '-.product_name');
//   }); 
//   
//   ItemIndex2 = 0;
//   $('.pro_hidden_price').each(function (){
//       ItemIndex2++;
//       $(this).attr('name', 'products-' + ItemIndex2 + '-.product_price');
//   }); 
//   
//   ItemIndex2 = 0;
//   $('.pro_hidden_qty').each(function (){
//       ItemIndex2++;
//       $(this).attr('name', 'products-' + ItemIndex2 + '-.qty');
//   }); 
//   
//   ItemIndex2 = 0;
//   $('.hidden_tot').each(function (){
//       ItemIndex2++;
//       $(this).attr('name', 'products-' + ItemIndex2 + '-.product_tot');
//   }); 
    $('.added_product').each(function () {
        ItemIndex2++;
        $(this).find('.pro_hidden_id').attr('name', 'products-' + ItemIndex2 + '-product_id');
        $(this).find('.pro_hidden_cat').attr('name', 'products-' + ItemIndex2 + '-product_category');
        $(this).find('.pro_hidden_name').attr('name', 'products-' + ItemIndex2 + '-product_name');
        $(this).find('.pro_hidden_price').attr('name', 'products-' + ItemIndex2 + '-product_price');
        $(this).find('.pro_hidden_qty').attr('name', 'products-' + ItemIndex2 + '-qty');
        $(this).find('.hidden_tot').attr('name', 'products-' + ItemIndex2 + '-product_tot');
    });
}

function get_total(qty) {
    var val = $(qty).val();
    var unit_price = $(qty).parent().prev().find('span').text();

//    $('.pro_hidden_qty').val(val);
    $(qty).parent().find('input.pro_hidden_qty').val(val);
    var tot = parseFloat(val) * parseFloat(unit_price);
    $(qty).parent().next().find('span:nth-child(1)').text(tot.toFixed(2));
    $(qty).parent().next().find('.hidden_tot').val(tot.toFixed(2));

    get_sub_tot();
}
