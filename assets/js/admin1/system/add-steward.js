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
    
    var r = $("#add_steward"),
        t = $("#error-alert", r),
        i = $("#success-alert", r);
    r.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        rules: {
            st_id: {
              required: !0,
            },
            st_name: {
              required: !0,
            },
            st_image: {
              required: !0,
            },
            st_desc: {
              required: !0,
            }
        },
        messages: {
            st_id: {
              required: "Please enter steward ID",
            },
            st_name: {
              required: "Please enter steward name",
            },
            st_image: {
              required: "Please select steward image",
            },
            st_desc: {
              required: "Please enter steward description",
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
    
    $("#add_steward_btn").click(function() {
        if ($('#add_steward').valid()){
            $("#add_steward").submit();                      
        }
    });
    
    
});
