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
            name: {
              required: !0,
            },
            phone1: {
              required: !0,
            },
//            phone2: {
//              required: !0,
//            },
            address: {
              required: !0,
            },
//            country: {
//              required: !0,
//            },
//            email: {
//              required: !0,
//            },
//            fax: {
//              required: !0,
//            },
//            web: {
//              required: !0,
//            },
//            credit_limit: {
//              required: !0,
//            },
//            shipping_method: {
//              required: !0,
//            },
//            description: {
//              required: !0,
//            },
//            cheque_name: {
//              required: !0,
//            },
//            sales_manager: {
//              required: !0,
//            },
//            sales_rep: {
//              required: !0,
//            }
        },
        messages: {
            name: {
              required: "Please enter name",
            },
            phone1: {
              required: "Please enter phone number",
            },
//            phone2: {
//              required: "Please enter phone number 2",
//            },
            address: {
              required: "Please enter address",
            },
//            country: {
//              required: "Please enter country",
//            },
//            email: {
//              required: "Please enter valid email",
//            },
//            fax: {
//              required: "Please enter valid fax number",
//            },
//            web: {
//              required: "Please enter valid web site url",
//            },
//            credit_limit: {
//              required: "Please enter credit limit",
//            },
//            shipping_method: {
//              required: "Please enter shipping method",
//            },            
//            description: {
//              required: "Please enter description",
//            },
//            cheque_name: {
//              required: "Please enter cheque name",
//            },
//            sales_manager: {
//              required: "Please enter sales manager",
//            },
//            sales_rep: {
//              required: "Please enter sales rep",
//            }
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
        if ($('#suppliers_form').valid()){
            $("#suppliers_form").submit();                      
        }
    });
      
});
