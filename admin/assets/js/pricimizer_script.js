jQuery(function($){
     window.onbeforeunload = function(e) {
        alert("The Window is closing!");
    }
    $.validator.setDefaults({
        submitHandler: function () {
            var get_ajax_url = pricimizer_admin.ajax_url;
            var button_text= $("#cart_sync #cartsync_btn").html();
            $.ajax({
                type : "POST",
                dataType : "json",
                url : get_ajax_url,
                data : $('#cart_sync').serialize(),
                beforeSend: function () {
                    $("#cart_sync #cartsync_btn").html('Please Wait <i class="fa fa-spinner fa-spin" style="font-size:20px"></i>');
                },
                success: function(resp) {
                    $("#cart_sync #cartsync_btn").html(button_text);
                    if(resp.code==200){                       
                        Swal.fire({
                            title: "Success!", 
                            text: resp.message,
                            confirmButtonColor: '#000', 
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            title: "Error!", 
                            text: resp.message,
                            confirmButtonColor: '#000', 
                            icon: "error"
                        });                    
                    }
                }, error:function(){
                   $("#cart_sync #cartsync_btn").html(button_text);
                   Swal.fire({
                        title: "Error!", 
                        text: "Please try again later",
                        confirmButtonColor: '#000', 
                        icon: "error"
                    });
                }
            });
        }
    });


    $('#cart_sync').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.alternate td').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });


    $("body").on("click", ".pricimizer_stock_price",function(){
        var get_val=$(this).val();
        $(".prici_setting").hide();
        $("." + get_val).show();
    });
    var value = jQuery("input#price_input_type").val();
    jQuery("fieldset.form-field.price_input_radio_field ul li").each(function(){
        if(jQuery(this).find("input.select.short").val()== value){
            jQuery(this).find("input.select.short").prop('checked', true);
             $("#show_"+value).show();
        }
    });

    $('.wc-radios li input.select.short').click(function(){
        
        var value = $(this).val(); 
        console.log(value);
        $("div.price_set").hide();
        $("#show_"+value).show();
            if(value=="range")
        {
            console.log("test");
           $("#show_"+value).find('#range_min').prop('required',true);
            $("#show_"+value).find('#range_max').prop('required',true);
            $("#show_"+value).find('#range_steps').prop('required',true);
            
            $("#show_"+value).find('#custom_price').removeAttr('required');
            
         }else if(value=="custom_price"){
            console.log("tercustom");
            $("#show_"+value).find('#range_min').removeAttr('required');
            $("#show_"+value).find('#range_max').removeAttr('required');
            $("#show_"+value).find('#range_steps').removeAttr('required');

            $("#show_"+value).find('#custom_price').prop('required',true);
            
         }
    });
    
});