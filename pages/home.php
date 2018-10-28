<?php
/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

/* Set custom page variables */
$this_page_settings = array(
    "meta_title" => "Welcome to INFOLAND",
    "meta_description" => "It's fun on demand at INFOLAND, the most outstanding theme park in Christchurch. We thrive to make each of our customers have the best and most memorable experience possible; we hope you enjoy your visit with us."
);
?>
<div id="home-carousel" class="hp-carousel carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#home-carousel" data-slide-to="1"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
        <!-- Title tags not appropriate because of the caption-->
            <img src="/images/hp_slide_rolly.jpg" alt="Big Woodend Rollercoaster">
            <div class="carousel-caption">
                <h3>Where your dreams come to die</h3>
            </div>
        </div>
        <div class="item">
         <!-- Title tags not appropriate because of the caption-->
            <img src="/images/hp_slide_atlantis_castle.jpg" alt="Atlantis Castle">
            <div class="carousel-caption">
                <h3>Lost children will be forced to work in the park</h3>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class=" main-content">
    <div class="section">
        <div class="row">
            <article class="col-md-8">
                <h1>Welcome to INFOLAND</h1>
                <p class="lead">It's fun on demand at INFOLAND, the most outstanding theme park in Christchurch.</p>
                <p>At INFOLAND we thrive to make each of our customers have the best and most memorable experience possible, we hope you enjoy your visit with us.</p>
                

                <video class="homepage-video" controls>
                    <source src="/video/theme-park.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>


            </article>

            <aside class="col-md-4">
                <?php include_once($modules_path . "book-tickets.php"); ?>
            </aside>
        </div>
    </div>
    <div class="section">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <img src="/images/rides_and_attractions_thumb.jpg" alt="" title="Rides and Attractions" />
                <h3>Rides and Attractions</h3>
                <p> Hold on to your tights and get ready for the ride of your life.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="/images/special_events_thumb.jpg" alt="" title="Special Events" />
                <h3>Special Events</h3>
                <p>These even are limited time only so come and visit us soon.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="/images/shopping.jpg" alt="" title="Food and Shopping" />
                <h3>Food and Shopping</h3>
                <p>Eating can be just as fun as the rides at INFOLAND. Buts that’s not all folks Bring home the magic and memories by shopping at any of our fabulously themed retail outlets throughout the park. Click here to check out our amazing food and drink options now! </p>
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="/images/events_thumb.jpg" alt="" title="Special Events" />
                <h3>Events</h3>
                <p>Some event we have going during the year and you might enjoy, know what events are on during your visit now.</p>
            </div>
        </div>
    </div>
</div>