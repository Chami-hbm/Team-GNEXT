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
    
    var r = $("#restaurant_table"),
        t = $("#error-alert", r),
        i = $("#success-alert", r);
    r.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        rules: {
            t_code: {
              required: !0,
            },
            t_name: {
              required: !0,
            }
        },
        messages: {
            t_code: {
              required: "Please enter table code",
            },
            t_name: {
              required: "Please enter table name",
            }
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
    
    var r2 = $("#bar_table"),
        t2 = $("#error-alert", r2),
        i2 = $("#success-alert", r2);
    r2.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        rules: {
            t_code: {
              required: !0,
            },
            t_name: {
              required: !0,
            }
        },
        messages: {
            t_code: {
              required: "Please enter table code",
            },
            t_name: {
              required: "Please enter table name",
            }
        },

        invalidHandler: function(e, r2) {
            i2.hide(), t2.show();
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
    
    var r3 = $("#pub_table"),
        t3 = $("#error-alert", r3),
        i3 = $("#success-alert", r3);
    r3.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        rules: {
            t_code: {
              required: !0,
            },
            t_name: {
              required: !0,
            }
        },
        messages: {
            t_code: {
              required: "Please enter table code",
            },
            t_name: {
              required: "Please enter table name",
            }
        },

        invalidHandler: function(e, r3) {
            i3.hide(), t3.show();
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
    
    $("#submit_btn1").click(function() {
        if ($('#restaurant_table').valid()){
            $("#restaurant_table").submit();                      
        }
    });
    
    $("#submit_btn2").click(function() {
        if ($('#bar_table').valid()){
            $("#bar_table").submit();                      
        }
    });
    $("#submit_btn3").click(function() {
        if ($('#pub_table').valid()){
            $("#pub_table").submit();                      
        }
    });
    
    
});
