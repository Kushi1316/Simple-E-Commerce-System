<?php
/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

/* Set custom page variables */
$this_page_settings = array(
    "meta_title" => "Tickets & Deals - INFOLAND",
    "meta_description" => "Book your next visit to Infoland online, including standard passes, Group Deals, Week Passes, Family Passes, Discounts and Corporate Events."
);
?>
<div class=" main-content">
    <div class="container ">
        <div class="section">
            <h1><i class="fa fa-ticket"></i> Tickets & Deals</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?php include_once($modules_path . "book-tickets.php"); ?>
            </div>
            <article class="col-md-8">
                <h2 >Latest Deals</h2>
                <h3>Standard Day Pass</h3>
                <p>Unlimited entry to INFOLAND for 24h *Please keep your printed e-Ticket and a form of ID if entering the park more than once.</p>
                <Hr />
                <h3>Group Deal</h3>
                <p> Buy 3 get 1 free! (Limited time only) *4 entries must be purchased to benefit from discount. Free pass must be of equal or lower value to purchased tickets ie. 3 adult tickets purchased, 1 adult or 1 child free.</p>
                <Hr />
                <h3>Week Long Pass</h3>
                <p>Unlimited Entry to INFOLAND for 5 days for 1 person *ID required for re-entry</p>
                <Hr />
                <h3>Family Pack</h3>
                <p>2 Adult and 3 child Pass. *2 Adult and 3 Child Passes must be selected from the Quantity section</p>
                <Hr />
                <h3>Corporate Events</h3>
                <p>This leads to the contact page and the “Corporate” section, no online purchase.</p>
                <Hr />
                <h3>Member Discount Pass</h3>
                <p>Receive a 30% discount on your day pass with a platinum membership. *Applicable only to passes under the name of a platinum member.</p>
            </article>
        </div>
    </div>
</div>
