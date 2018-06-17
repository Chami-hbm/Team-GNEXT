$(function() {

	$.wijets.make(); 	// Make yo Widjit - see docs for more details.
	prettyPrint(); 		//Apply Code Prettifier

    $('.refresh-panel').click(function () {
        var panel = $(this).closest('.panel');
        panel.append('<div class="panel-loading"><div class="panel-loader-circular"></div></div>');
        setTimeout(function () {
            panel.find('.panel-loading').remove();
        }, 1500)
    });

	// Bootstrap JS
    $('.popovers').popover({container: 'body', trigger: 'hover', placement: 'top'}); //bootstrap's popover
    $('.tooltips, [data-toggle="tooltip"]').tooltip(); //bootstrap's tooltip

    $('.select').dropdown(); // DropdownJS

    //Tabdrop
    jQuery.expr[':'].noparents = function(a,i,m){
            return jQuery(a).parents(m[3]).length < 1;
    }; // Only apply .tabdrop() whose parents are not (.tab-right or tab-left)
    $('.nav-tabs').filter(':noparents(.tab-right, .tab-left)').tabdrop();

	//Demo Background Pattern
	$(".demo-blocks").click(function(){
		$('.layout-boxed').css('background',$(this).css('background'));
		return false;
	});
});