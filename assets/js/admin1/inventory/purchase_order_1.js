jQuery(document).ready(function () {

    $("#error-alert").hide();
    $("#error-alert2").hide();

    $.validator.addMethod("regex", function (value, element, regexpr) {
        if (value === null || value === "") {
            return true;
        } else {
            return regexpr.test(value);
        }
    });

    var r = $("#purchase_order"),
            t = $("#error-alert", r),
            i = $("#success-alert", r);
    r.validate({
        doNotHideMessage: !0,
        errorElement: "span",
//        errorClass: "has-error",
        errorClass: "help-block help-block-error",
        focusInvalid: !1,
        rules: {
            address: {
                required: !0,
            },
            date: {
                required: !0,
            },
            remarks: {
                required: !0,
            },
            branch: {
                required: !0,
            },
            gross_total: {
                required: !0,
            }
        },
        messages: {
            address: {
                required: "Please enter address",
            },
            date: {
                required: "Please select date",
            },
            remarks: {
                required: "Please enter remarks",
            },
            branch: {
                required: "Please enter branch",
            },
            gross_total: {
                required: "Please enter gross total",
            }
        },
        invalidHandler: function (e, r) {
            i.hide(), t.show();
        },
        highlight: function (e) {
            $(e).closest(".input-div").removeClass("has-success").addClass("has-error");
        },
        unhighlight: function (e) {
            $(e).closest(".input-div").removeClass("has-error");
        },
        success: function (e) {
            e.closest(".input-div").removeClass("has-error").addClass("has-success"),
                    e.remove();
            e.addClass("valid").closest(".input-div").removeClass("has-error").addClass("has-success");
        }
    });

    $("#submit_btn").click(function () {
        if ($('#purchase_order').valid()) {
            $("#purchase_order").submit();
        }
    });

    ItemIndex = 0;
       
    $('#purchase_order')
            // Add button click handler
            .on('click', '.addButton', function () {
                console.log('test');
                ItemIndex++;
                var $template = $('#product_list_template'),
                        $clone = $template
                        .clone()
                        .removeClass('hide')
                        .removeAttr('id')
                        .attr('data-item-index', ItemIndex)
                        .insertBefore($template);

//                $('select').select2();
                // Update the name attributes
                $clone
                        .find('[name="product1"]').attr('name', 'products-' + ItemIndex + '-product').end()
                        .find('[name="quantity1"]').attr('name', 'products-' + ItemIndex + '-quantity').end()
//                        .find('[name="cost_price"]').attr('name', 'products[' + ItemIndex + '].cost_price').end()
//                        .find('[name="tax_type1"]').attr('name', 'products[' + ItemIndex + '].tax_type1').end()
//                        .find('[name="transport_cost"]').attr('name', 'products[' + ItemIndex + '].transport_cost').end()
//                        .find('[name="total_item_cost"]').attr('name', 'products[' + ItemIndex + '].total_item_cost').end();

                // Add new fields
                // Note that we also pass the validator rules for new field as the third parameter
//            $('#purchase_order_form')
//                .formValidation('addField', 'products[' + ItemIndex + '].product')
//                .formValidation('addField', 'products[' + ItemIndex + '].quantity')
//                .formValidation('addField', 'products[' + ItemIndex + '].cost_price')
//                .formValidation('addField', 'products[' + ItemIndex + '].tax_type1')
//                .formValidation('addField', 'products[' + ItemIndex + '].transport_cost')
//                .formValidation('addField', 'products[' + ItemIndex + '].total_item_cost');
//        
                $("#noofitems").val(ItemIndex + 1);
            })

            // Remove button click handler
            .on('click', '.removeButton', function () {
                ItemIndex--;
                var $row = $(this).parents('.form-group'),
                        index = $row.attr('data-item-index');

                // Remove fields
//            $('#purchase_order_form')
//                .formValidation('removeField', $row.find('[name="products[' + index + '].product"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].quantity"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].cost_price"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].tax_type1"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].transport_cost"]'))
//                .formValidation('removeField', $row.find('[name="products[' + index + '].total_item_cost"]'));
////                .attr('data-item-index', ItemIndex);
                // Remove element containing the fields
                $("#noofitems").val(ItemIndex + 1);
                $row.remove();
            });
            
});
