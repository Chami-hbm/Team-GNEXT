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
    
    var r = $("#category_form"),
        t = $("#error-alert", r),
        i = $("#success-alert", r);
    r.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
//        rules: {
//            name: {
//              required: !0,
//            },           
//            description: {
//              required: !0,
//            }
//        },
//        messages: {
//            name: {
//              required: "Please enter name",
//            },          
//            description: {
//              required: "Please enter description",
//            }
//        },

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
    
    var r2 = $("#sub_cat_form"),
        t2 = $("#error-alert", r2),
        i2 = $("#success-alert", r2);
    r2.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
//        rules: {
//            category: {
//                required: !0,
//            },
//            name: {
//              required: !0,
//            },           
//            description: {
//              required: !0,
//            }
//        },
        messages: {
            category: {
                required: "Please select a category",
            },
            name: {
              required: "Please enter name",
            },          
            description: {
              required: "Please enter description",
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
    
    var r3 = $("#products_form"),
        t3 = $("#error-alert", r3),
        i3 = $("#success-alert", r3);
    r3.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
//        rules: {
//            supplier: {
//                required: !0,
//            },
//            barcode: {
//              required: !0,
//            },           
//            name: {
//              required: !0,
//            },
//            category: {
//              required: !0,
//            },
//            sub_category: {
//              required: !0,
//            },
//            warrenty: {
//              required: !0,
//            },
//            stock_type: {
//              required: !0,
//            },
//            re_order_level: {
//              required: !0,
//            },
//            availble_stock: {
//              required: !0,
//            },
//            lead_in_time: {
//              required: !0,
//            },
//            price_1: {
//              required: !0,
//            },
//            price_2: {
//              required: !0,
//            },
//            price_3: {
//              required: !0,
//            },
//            price_4: {
//              required: !0,
//            },
//            price_5: {
//              required: !0,
//            }
//        },
//        messages: {
//            supplier: {
//                required: "Please select supplier",
//            },
//            barcode: {
//              required: "Please enter item code",
//            },           
//            name: {
//              required: "Please enter item name",
//            },
//            category: {
//              required: "Please select a category",
//            },
//            sub_category: {
//              required: "Please select a sub category",
//            },
//            warrenty: {
//              required: "Please select warranty type",
//            },
//            stock_type: {
//              required: "Please select stock type",
//            },
//            re_order_level: {
//              required: "Please enter re order level",
//            },
//            availble_stock: {
//              required: "Please enter available stock",
//            },
//            lead_in_time: {
//              required: "Please enter lead in time",
//            },
//            price_1: {
//              required: "Please enter price 1",
//            },
//            price_2: {
//              required: "Please enter price 2",
//            },
//            price_3: {
//              required: "Please enter price 3",
//            },
//            price_4: {
//              required: "Please enter price 4",
//            },
//            price_5: {
//              required: "Please enter price 5",
//            }
//        },

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
        if ($('#category_form').valid()){
            $("#category_form").submit();                      
        }
    });
    $("#submit_btn2").click(function() {
        if ($('#sub_cat_form').valid()){
            $("#sub_cat_form").submit();                      
        }
    });
    $("#submit_btn3").click(function() {
        if ($('#products_form').valid()){
            $("#products_form").submit();                      
        }
    });
      
});
