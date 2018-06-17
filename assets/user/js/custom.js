$(function(){
    $(document).ready(function(){
              
        var inputBox = $('.searchbox .searchbox-input');
        var btn = $('.searchbox .searchbox-submit');
        var isOpen = false;
        
        btn.click(function(){
           if(isOpen == false){
               inputBox.css('width','100%');
//                inputBox.animate({'min-width' : "380px"},300);
                inputBox.focus();
                isOpen = true;
           }else{
               inputBox.css('width','0px');
//                inputBox.animate({'min-width' : "0"},300);
               inputBox.focusout();
               isOpen = false;
           }
        });
        inputBox.mouseup(function(){
            return false;
        });
        btn.mouseup(function(){
            return false;
        });
        $(document).mouseup(function(){
            if(isOpen == true){
                inputBox.css('width','0px');
//                inputBox.animate({'min-width' : "0"},300);
                btn.click();
            }
        });
    });
    
//    $(document).ready(function(){
//        var btn = $('.sidebar-toggle');
//        var sidebar = $('.sidebar');        
//        var sidebaropen = false;
//        
//        sidebar.css('width','0');
//        
//        btn.click(function(){
//            if(sidebaropen == false){
//                sidebar.css('width','260px');
//                sidebaropen = true;
//            }else{
//                sidebar.css('width','0');
//                sidebaropen = false;
//            }
//        })
//        sidebar.mouseup(function(){
//           return false;
//        });
//        
//        $(document).mouseup(function(){
//            if(sidebaropen == true){
//                sidebar.css('width','0');
//                sidebaropen = false;
//            }
//        });
//    });

    $(document).ready(function (){
        var sidebar_height = $('nav').height();
        $('#sidebar-wrapper').css('top',sidebar_height);
        
        var button = $('#toggle-sidebar');
        var isOpen2 = false;
        var wrapper = $('#sidebar-wrapper');
        var sidebar = $('#sidebar-content');
        
        button.click(function(){
           if(isOpen2 != true){
               wrapper.fadeIn(500);               
               sidebar.animate({
                   left:'0'
               },300);
               
               isOpen2 = true;
               
               button.find('i').removeClass('fa-bars');
               button.find('i').addClass('fa-close');
               
               console.log('if');
           }else{
               wrapper.fadeOut(500);               
               sidebar.animate({
                   left:'-270'
               },300);
               
               isOpen2 = false;
               button.find('i').removeClass('fa-close');
               button.find('i').addClass('fa-bars');
               
               console.log('else');
           } 
        });
        
        sidebar.mouseup(function(){
           return false;
        });
        
        
        
        $('#sidebar-wrapper').mouseup(function(){
            if(isOpen2 == true){
               wrapper.fadeOut(500);               
               sidebar.animate({
                   left:'-270'
               },300);
               
               isOpen2 = false;
               button.find('i').removeClass('fa-close');
               button.find('i').addClass('fa-bars');
               
           }
        });
        
        $('#sample,#show-modal').mouseup(function(){
            if(isOpen2 == true){
               wrapper.fadeOut(500);               
               sidebar.animate({
                   left:'-270'
               },300);
               
               isOpen2 = false;
               button.find('i').removeClass('fa-close');
               button.find('i').addClass('fa-bars');
               
           }
        });
        
        
    });
    
    $(document).ready(function (){
        $('li.dropdown-btn').click(function (){
//            var subOpen = false;
            var submenu = $('ul.dropdown');
            $('li.dropdown-btn > a').toggleClass('active');
            submenu.slideToggle('slow');            
        });
	
	
	$('.order-details #reset').click(function(){
	   $('.content .added_product').remove();
	   $('#sub-total').text('0.00');
	   $('#net-total').text('0.00');
//	   $('#tax').text('0%');
//	   $('#s-charge').text('0%');
	   $('#discount-add').val('0');
           
           $('a.select_product').each(function (){               
                var product_id = $(this).attr('id');
                $(this).attr('onclick','select_product('+product_id+',this)');
           });
           
	});
    });
    
    $(document).ready(function () {
	//Initialize tooltips
	$('.nav-tabs > li a[title]').tooltip();

	//Wizard
	$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

	    var $target = $(e.target);

	    if ($target.parent().hasClass('disabled')) {
		return false;
	    }
	});

//	$(".next-step").click(function (e) {
//            
//	    var $active = $('.wizard .nav-tabs li.active');
//	    $active.next('li.disabled').removeClass('disabled');
//	    nextTab($active);
//            
//	});
//	$(".prev-step").click(function (e) {
//
//	    var $active = $('.wizard .nav-tabs li.active');            
//	    prevTab($active);
////            $active.prev().addClass('disabled');
//            $active.addClass('disabled');
//	});
        
    });
    
    $(document).ready(function () {
     $('#pos')
        // Add button click handler
        .on('click', '.addButton', function() {
            console.log('test');
            ItemIndex++;
            var $template = $('#item-row'),
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
//                .attr('data-item-index', ItemIndex);
            // Remove element containing the fields
            $("#noofitems").val(ItemIndex+1);
            $row.remove();
        });  
    });

    function nextTab(elem) {
	$(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
	$(elem).prev().find('a[data-toggle="tab"]').click();
    }
    
   
});