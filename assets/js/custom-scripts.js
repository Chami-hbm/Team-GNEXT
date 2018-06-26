/*------------------------------------------------------
    Author : www.webthemez.com
    License: Commons Attribution 3.0
    http://creativecommons.org/licenses/by/3.0/
---------------------------------------------------------  */

(function ($) {
    $(document).ready(function () {
        //select2
        $(".select-box").select2({
            placeholder: 'Select one...'
        });

        $('.btn').addClass('btn-raised');
        $('.btn-sliders-green').addClass('btn-primary');

        $("#reports .times input").datepicker({todayHighlight: true, format: 'yyyy-mm-dd'});

        $('form').parsley();
    });

}(jQuery));
