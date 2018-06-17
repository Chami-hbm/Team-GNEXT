jQuery(document).ready(function () {

    //
    $('#barcode .typeahead').on('keyup focus' , function () {
        
        textVal = $(this).val();
        if (textVal == null || textVal == '') {
            $('input.typeahead').removeAttr('disabled');
        }
        $(this).removeClass('selected');
        $.ajax({
            url     : base_url + 'player/inventory/invoice/item-with-barcode',
            type    : 'POST',
            data    : 'val=' + textVal,
            dataType: 'JSON',
            async   : true,
            success : function (data) {

                console.log(data);
                if (!$.trim(data)) {
                    $('#barcode .load_ajax_data').find('span').remove();
                    $('#barcode .load_ajax_data').append('<span onclick="load_new_item_modal()"> Add New Item</span>');
                    $('#barcode .load_ajax_data').append('<span class="error">No data found!</span>');

                    $('#barcode .load_ajax_data').slideDown('slow');
                } else {
                    var d = $.parseJSON(JSON.stringify(data));

                    $('#barcode .load_ajax_data').find('span').remove();
                    $('#barcode .load_ajax_data').append('<span onclick="load_new_item_modal()"> Add New Item</span>');
                    $('#barcode .load_ajax_data').slideDown('slow');

                    $.each(d, function (i, e) {
                        $('#barcode .load_ajax_data').append('<span data-price="' + e.product_customer_price + '" data-warranty="'+e.item_warranty+'" data-qty="'+e.available_stock+'" data-description="' + e.description + '" data-item-id="' + e.product_id + '" data-barcode="'+e.barcode+'" onclick="set_price_when_click_span(this)">' + e.barcode +' / '+ e.description + '</span>');
                    });
                }
            }
        });

    }); 


    $(document).click(function () {
        $('.load_ajax_data').slideUp('slow');
    });
    $('.load_ajax_data,input.typeahead').click(function () {
        return false;
    });

});

function set_price_when_click_span(t) {
     
     
    $('#cost_price').val($(t).attr('data-price'));
    $('#qty_addon').removeClass('hide');
    $('#qty_addon').html('Available Quantity - '+$(t).attr('data-qty'));
//    $('#qty_addon').html('Quantity-(Available');
    $('#aqty').val($(t).attr('data-qty'));
    console.log($('#aqty').val($(t).attr('data-qty')));
    $('#item_description').val($(t).attr('data-item_name'));
    $('#item_id').val($(t).attr('data-item-id'));
    $('#barcode input').val($(t).attr('data-barcode'));
    
    $('.load_ajax_data').slideUp('slow');
    $(t).parent().parent().find('input').val($(t).text()).addClass('selected');
    $('input.typeahead:not(.selected)').attr('disabled', 'disabled');
}



