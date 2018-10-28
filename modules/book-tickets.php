<?php
/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

$this_page_settings["js_scripts"] = array(
    "book-tickets-validation"
);
?>
<!-- Here we use an ID because we want to specifically target this container and its contents-->
<div id="book-tickets-module" class="fieldset-wrapper">
    <div class="fieldset">
        <h2>Book Tickets</h2>
        <?php if (isset($_POST["no_adults"])) { ?>
            <p>Success!</p>
        <?php } else { ?>

            <!-- action is this page because the module contains the PHP code-->
            <form id="form_book_tickets" method="POST" action="<?=$full_page_specific_url?>">
 <label for="booking_name">Your Full Name</label>                
<input value="" class="display-block" name="booking_name" id="booking_name" type="text" placeholder="Your Full Name" required="required"  />
                <div id="name_errors"></div>
 <label for="booking_email">Your Email Address</label>      
                <input value="" class="display-block" name="booking_email" id="booking_email" type="email" placeholder="Your Email Address" required="required"/>
                <div id="email_errors"></div>
                <h3 class="h4 margin-bottom-10">I'm bringing</h3>
                <input min="0" max="99" size="2" class="small-input" value="0" name="no_adults" id="no_adults" type="number"/>
                <label  for="no_adults" >Adults&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                
                <input min="0" max="99" size="2" class="small-input" value="0" name="no_children" id="no_children" type="number" required="required" />
                <label for="no_children">Children</label>
                <div id="ticket_type_errors"></div>

                <h3 class="h4">I will be visiting for</h3>
                <input class="small-input" min="1" max="7" size="2" value="1" name="number_days" id="number_days" type="number" required="required"/>
                <label for="number_days">days</label>
                <div id="days_errors"></div>



                <button type="submit" class="primary-button">Buy Ticket(s)</button>

               
            </form>

        <?php } ?>
    </div>
</div>



