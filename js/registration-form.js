$(document).ready(function () {
    $("#registration_form").validate({
        errorClass: "form-error",
        rules: {
            billing_first_name: {
                required: true
            },
            username:{
                required:true
            },
            billing_email: {
                required: true,
                email: !0
            },
            billing_last_name :{
                required: true
            },
            Password:{
                required:true
            },
            billing_address_1:{
                required:true
            },
            billing_city:{
                required:true
            },
            billing_postcode:{
                required:true
            }
        
        },
        messages: {
           
        },
        submitHandler: function (e) {
            e.submit();
        }
    });
    
    $("#login_form").validate({
        errorClass: "form-error",
        rules: {
            username: {
                required: true
            },
            password:{
                required:true
            }
        
        },
       
        submitHandler: function (e) {
            e.submit();
        }
    });
});
