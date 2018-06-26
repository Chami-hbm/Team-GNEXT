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
    
    var r = $("#category_add"),
        t = $("#error-alert", r),
        i = $("#success-alert", r);
    r.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        rules: {
            c_code: {
              required: !0,
            },
            c_name: {
              required: !0,
            }            
        },
        messages: {
            c_code: {
              required: "Please enter a valid code"
            },
            c_name: {
              required: "Please enter a category name"
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
    
    var r2 = $("#sub_category_add"),
        t2 = $("#error-alert", r2),
        i2 = $("#success-alert", r2);
    r2.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        rules: {
            select_cat: {
              required: !0,
            },
            sub_cat_code: {
              required: !0,
            },            
            sub_cat_name: {
              required: !0,
            }            
        },
        messages: {
            select_cat: {
              required: "Please select a category"
            },
            sub_cat_code: {
              required: "Please enter a sub category code"
            },
            sub_cat_name: {
              required: "Please enter a sub category name"
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
    
    $("#category_add_btn").click(function() {        
        if ($('#category_add').valid()){
            
            $("#category_add").submit();            
        }
    });
    
    $("#sub_category_add_btn").click(function() {        
        if ($('#sub_category_add').valid()){
            
            $("#sub_category_add").submit();            
        }
    });
    
    $('.data-table').dataTable();
});
