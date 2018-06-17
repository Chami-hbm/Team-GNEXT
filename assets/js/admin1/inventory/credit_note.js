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
    
    var r = $("#credit_note_form"),
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
    
    $("#submit_btn").click(function() {
        if ($('#credit_note_form').valid()){
            $("#credit_note_form").submit();                      
        }
    });

    ItemIndex = 0;
    $('#add_new_row').click(function () {

        date = moment().format("YYYY-MM-DD");
        time = moment().format("HH:mm:ss");

        product = $('#product').val();
        product_text = $("#product option:selected").text();

        price = $('#product_price').val();
        price_text = $('#product_price').val();
        // sub_category_text = $("#sub_category option:selected").text();

        qty = $('#product_qty').val();

        total = parseFloat(price) * parseFloat(qty);

        console.log(total);

        ItemIndex++;
        var $template = $('.credit_note_product_row'),
            $clone = $template
                .clone()
                .removeClass('hide')
                .removeClass('credit_note_product_row')
                //                                .removeAttr('id')
                .attr('id', + ItemIndex + '-credit_note_row')
                .attr('data-item-index', ItemIndex)
                .insertBefore($template);
        $clone.find('.removeButton').attr('data-index', ItemIndex);
        $clone.find('.removeButton').attr('onclick', "remove_row(" + ItemIndex + ",this);");

        $clone
            .find('[id="0-credit_note_product"]').attr('id', ItemIndex + '-credit_note_product').html(product_text).end()
            .find('[name="0-credit_note_product_hidden"]').attr('name', ItemIndex + '-credit_note_product_hidden').attr('id', ItemIndex + '-credit_note_product_hidden').val(product).end()

            .find('[id="0-credit_note_price"]').attr('id', ItemIndex + '-credit_note_price').html(price_text).end()
            .find('[name="0-credit_note_price_hidden"]').attr('name', ItemIndex + '-credit_note_price_hidden').attr('id', ItemIndex + '-credit_note_price_hidden').val(price).end()

            .find('[id="0-credit_note_qty"]').attr('id', ItemIndex + '-credit_note_qty').html(qty).end()
            .find('[name="0-credit_note_qty_hidden"]').attr('name', ItemIndex + '-credit_note_qty_hidden').attr('id', ItemIndex + '-credit_note_qty_hidden').val(qty).end()

            .find('[id="0-credit_note_total"]').attr('id', ItemIndex + '-credit_note_total').addClass('text-right').html(total.toFixed(2)).end()
            .find('[name="0-credit_note_total_hidden"]').attr('name', ItemIndex + '-credit_note_total_hidden').attr('id', ItemIndex + '-credit_note_total_hidden').val(total).end()


        $("#noof_items").val(ItemIndex);
    });

});
