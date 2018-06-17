/*------------------------------------------------------
    Author : www.webthemez.com
    License: Commons Attribution 3.0
    http://creativecommons.org/licenses/by/3.0/
---------------------------------------------------------  */

(function ($) {
    $(document).ready(function(){
	//select2	
	$(".select-box").select2();

        $('.btn').addClass('btn-raised');
        $('.btn-sliders-green').addClass('btn-primary');

	//        mainApp.initFunction();
//	$("#datepicker1,#datepicker2").datepicker({todayHighlight: true,format: 'yyyy-mm-dd'});
	$("#reports .times input").datepicker({todayHighlight: true,format: 'yyyy-mm-dd'});
	
    ItemIndex = 0;
    $('#purchase_order_form')
        // Add button click handler
        .on('click', '.addButton', function() {
            console.log('test');
            ItemIndex++;
            var $template = $('#product_list_template'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .attr('data-item-index', ItemIndex)
                                .insertBefore($template);

            // Update the name attributes
            $clone
                .find('[name="product"]').attr('name', 'products[' + ItemIndex + '].product').end()
                .find('[name="quantity"]').attr('name', 'products[' + ItemIndex + '].quantity').end()
                .find('[name="cost_price"]').attr('name', 'products[' + ItemIndex + '].cost_price').end()
                .find('[name="tax_type1"]').attr('name', 'products[' + ItemIndex + '].tax_type1').end()
                .find('[name="transport_cost"]').attr('name', 'products[' + ItemIndex + '].transport_cost').end()
                .find('[name="total_item_cost"]').attr('name', 'products[' + ItemIndex + '].total_item_cost').end();

            // Add new fields
            // Note that we also pass the validator rules for new field as the third parameter
//            $('#purchase_order_form')
//                .formValidation('addField', 'products[' + ItemIndex + '].product')
//                .formValidation('addField', 'products[' + ItemIndex + '].quantity')
//                .formValidation('addField', 'products[' + ItemIndex + '].cost_price')
//                .formValidation('addField', 'products[' + ItemIndex + '].tax_type1')
//                .formValidation('addField', 'products[' + ItemIndex + '].transport_cost')
//                .formValidation('addField', 'products[' + ItemIndex + '].total_item_cost');
//        
            $("#noofitems").val(ItemIndex+1);
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            ItemIndex--;
            var $row  = $(this).parents('.form-group'),
                index = $row.attr('data-item-index');
                
            // Remove fields
//            $('#purchase_order_form')
//                .formValidation('removeField', $row.find('[name="products[' + index + '].product"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].quantity"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].cost_price"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].tax_type1"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].transport_cost"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].total_item_cost"]'));
////                .attr('data-item-index', ItemIndex);
            // Remove element containing the fields
            $("#noofitems").val(ItemIndex+1);
            $row.remove();
        });  
        
    $('#credit_note_form')
        // Add button click handler
        .on('click', '.addButton', function() {
            console.log('test');
            ItemIndex++;
            var $template = $('#credit_note_form_list_temp'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .attr('data-item-index', ItemIndex)
                                .insertBefore($template);

            // Update the name attributes
            $clone
                .find('[name="product"]').attr('name', 'products[' + ItemIndex + '].product').end()
                .find('[name="quantity"]').attr('name', 'products-' + ItemIndex + '-quantity').end()
                .find('[name="cost_price"]').attr('name', 'products[' + ItemIndex + '].cost_price').end()
                .find('[name="tax_type1"]').attr('name', 'products[' + ItemIndex + '].tax_type1').end()
                .find('[name="transport_cost"]').attr('name', 'products[' + ItemIndex + '].transport_cost').end()
                .find('[name="total_item_cost"]').attr('name', 'products[' + ItemIndex + '].total_item_cost').end();

                   
            $("#noofitems").val(ItemIndex+1);
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            ItemIndex--;
            var $row  = $(this).parents('.form-group'),
                index = $row.attr('data-item-index');
                
            // Remove fields
//            $('#purchase_order_form')
//                .formValidation('removeField', $row.find('[name="products[' + index + '].product"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].quantity"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].cost_price"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].tax_type1"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].transport_cost"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].total_item_cost"]'));
////                .attr('data-item-index', ItemIndex);
            // Remove element containing the fields
            $("#noofitems").val(ItemIndex+1);
            $row.remove();
        });  
    });
    
}(jQuery));
