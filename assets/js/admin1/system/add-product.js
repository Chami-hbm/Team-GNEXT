jQuery(document).ready(function() {
    
    $("#error-alert").hide();    
    $("#error-alert2").hide();
    
    $.validator.addMethod("regex", function(value, element, regexpr) {          
        if(value===null || value===""){
            return true;
        }else{
            return regexpr.test(value);            
        }
    });
    
    var r = $("#product_add"),
        t = $("#error-alert", r),
        i = $("#success-alert", r);
    r.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        

        invalidHandler: function(e, r) {
            i.hide(), t.show();
        },
        highlight: function(e) {
            $(e).closest(".form-group").removeClass("has-success").addClass("has-error");
        },
        unhighlight: function(e) {
            $(e).closest(".form-group").removeClass("has-error");
        },
        success: function(e) {
            e.closest(".form-group").removeClass("has-error").addClass("has-success"), 
            e.remove();
            e.addClass("valid").closest(".form-group").removeClass("has-error").addClass("has-success");
        }
    });
    
    $("#pro_add_btn").click(function() {
        if ($('#product_add').valid()){
            $("#product_add").submit();                      
        }
    });
    
    
});
