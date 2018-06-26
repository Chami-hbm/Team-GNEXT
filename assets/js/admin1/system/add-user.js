jQuery(document).ready(function() {
    
    $("#error-alert").hide();    
    $("#error-alert2").hide();
    
//    $.validator.addMethod("pass_validation", function(value, element) {          
//        if (value == $('#password').val()) {
//            $('#check').show();
//            $('#close').hide();
//            return true;
//        } else {
//            $('#close').show();
//            $('#check').hide();
//            return false;
//        }
//    });
//    $.validator.addMethod("edit_pass_validation", function(value, element) {          
//        if (value == $('#edit_password').val()) {
//            $('#edit_check').show();
//            $('#edit_close').hide();
//            
//        } else {
//            $('#edit_close').show();
//            $('#edit_check').hide();
//        }
//    });
    
    var r = $("#user_ad_form"),
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
            username: {
              required: !0,
            },
            password: {
              required: !0,
//              regex: /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{6,20}$/,
            },
            password_confirm: {               
              required: !0,
              equalTo: "#password",
//              pass_validation: !0
            },
            user_image: {
              required: !0,
            },
            user_description: {
              required: !0,
            }
        },
        messages: {
            name: {
              required: "Please enter a valid name"
            },
            username: {
              required: "Please enter a username"
            },
            password: {
              required: "Please enter a password",
              regex: "Please use at least 1 upper case letter, 1 digit, 1 lower case letter and minimum 6 characters.",
            },
            password_confirm: {
//              onkeyup: "Please re-enter the password correctly.",
              required: "Please re-enter the password correctly.",
              equalTo: "Confirmed password and the password is not the same."
            },
            user_image: {
              required: "Please select image"
            },
            user_description: {
              required: "Please add a description"
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
            e.closest(".form-group").removeClass("has-error").addClass("has-success"), 
            e.remove();
            e.addClass("valid").closest(".form-group").removeClass("has-error").addClass("has-success");
        }
    });
    
    $("#button-submit").click(function() {
        if ($('#user_ad_form').valid()){
            $("#user_ad_form").submit();                      
        }
    });
    
    var r2 = $("#user_update_form"),
        t2 = $("#error-alert", r2),
        i2 = $("#success-alert", r2);
    r2.validate({                    
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        rules: {
            edit_name: {
              required: !0,
            },
            edit_username: {
              required: !0,
            },
            edit_password: {
//              required: !0,
//              regex: /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{6,20}$/,
            },
            edit_password_confirm: {
//              required: !0,
              equalTo: "#edit_password",
              edit_pass_validation: !0
            },
//            edit_user_img: {
//              required: !0,
//            },
            edit_user_description: {
              required: !0,
            }
        },
        messages: {
            edit_name: {
              required: "Please enter a valid name"
            },
            edit_username: {
              required: "Please enter a username"
            },
            edit_password: {
//              required: "Please enter a password",
//              regex: "Please use at least 1 upper case letter, 1 digit, 1 lower case letter and minimum 6 characters.",
            },
            edit_password_confirm: {
//              required: "Please re-enter the password correctly.",
              equalTo: "Confirmed password and the password is not the same."
            },
//            edit_user_img: {
//              required: "Please select image"
//            },
            edit_user_description: {
              required: "Please add a description"
            }
        },

        invalidHandler: function(e, r2) {
            i2.hide(), t2.show();
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
    
    $("#user_update_btn").click(function() {
        if ($('#user_update_form').valid()){
            $("#user_update_form").submit();                      
        }
    });
    
    $("#password_confirm").on('keyup',function (){
        if ($(this).val() === $('#password').val()) {
            $('#check').show();
            $('#close').hide();
        } else {
            $('#close').show();
            $('#check').hide();
        }
    });
    $("#edit_password_confirm").on('keyup',function (){
        if ($(this).val() === $('#edit_password').val()) {
            $('#edit_check').show();
            $('#edit_close').hide();
            return false;
        } else {
            $('#edit_close').show();
            $('#edit_check').hide();
            return true;
        }
    });
    
});
