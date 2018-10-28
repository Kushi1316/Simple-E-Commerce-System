$(document).ready(function () {
    //Run when the form is submitted
    $("form#form_book_tickets").submit(function (event) {
        //reset errors, if any. 
        $("#ticket_type_errors").html("");
        $("#days_errors").html("");
        $("#name_errors").html("");
        $("#email_errors").html("");

        //Get variables 
        var $_this = $(this), // this is just good practice... 
                $_booking_name = $("#booking_name").val(),
                $_booking_email = $("#booking_email").val(),
                $_no_days = $("#number_days").val(),
                $_no_adults = $("#no_adults").val(),
                $_no_children = $("#no_children").val(),
                $_number_regex = /^[0-9]*(?:\.\d{1,2})?$/, //http://stackoverflow.com/questions/21203729/regular-expression-in-javascript-allow-only-numbers-optional-2-decimals
                $_email_regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i, //http://stackoverflow.com/questions/46155/validate-email-address-in-javascript        
                $_name_errors_string = "",//We'll generate a sentence with all errors for each type
                $_email_errors_string = "",
                $_ticket_type_errors_string = "",
                $_days_errors_string = "",
                $_count_errors = 0;//we'll count how many errors we encounter. 
        
        //Lets look for the type of validation we need. 

        //Numbers - NOTE: HTML takes precedence this is isnt seen. 
        if (!$_number_regex.test($_no_days)) {
            $_days_errors_string += "Please enter a numerical value in the above field.&nbsp;";
            $_count_errors++;
        }
        if (!$_number_regex.test($_no_adults) || !$_number_regex.test($_no_children)) {
            $_ticket_type_errors_string += "Please enter numerical values in the above fields.&nbsp;";
            $_count_errors++;
        }

        //Required 
        if ($_booking_name.length === 0) {
            $_name_errors_string += "Please enter your Full Name.&nbsp;";
            $_count_errors++;
        }
        if ($_booking_email.length === 0) {
            $_email_errors_string += "Please enter your Email Address.&nbsp;";
            $_count_errors++;
        } else if (!$_email_regex.test($_booking_email)) {
            //email an email?
            //Must be in the else if to prevent both errors occuring at the
            //same time 
            $_email_errors_string += "That's not a valid email address.&nbsp;";
            $_count_errors++;

        }
        if ($_no_days.length === 0) {
            $_days_errors_string += "Please enter a value in the above field.&nbsp;";
            $_count_errors++;
        }
        if ($_number_regex.length === 0) {
            $_ticket_type_errors_string += "Please enter values in the above fields.&nbsp;";
            $_count_errors++;
        }

        //At least one ticket 
        if (parseInt($_no_children) + parseInt($_no_adults) === 0) {
            $_ticket_type_errors_string += "Please choose at least 1 ticket.&nbsp;";
            $_count_errors++;
        }

        //if one or more errors...
        if ($_count_errors > 0) {
            //Stop the form from submitting 
            event.preventDefault();
            
            //Make errors show up
            if ($_ticket_type_errors_string.length > 0) {
                $("#ticket_type_errors").html("<label class=\"form-error\"><i class=\"fa fa-warning\"></i> " + $_ticket_type_errors_string + "</label>");
            }
            if ($_days_errors_string.length > 0) {
                $("#days_errors").html("<label class=\"form-error\"><i class=\"fa fa-warning\"></i> " + $_days_errors_string + "</label>");
            }
            if ($_name_errors_string.length > 0) {
                $("#name_errors").html("<label class=\"form-error\"><i class=\"fa fa-warning\"></i> " + $_name_errors_string + "</label>");
            }
            if ($_email_errors_string.length > 0) {
                $("#email_errors").html("<label class=\"form-error\"><i class=\"fa fa-warning\"></i> " + $_email_errors_string + "</label>");
            }
        }
        //otherwise all checks pass, allow form to submit. 
    });
});