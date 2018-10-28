<?php
/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

/* Set custom page variables */
$this_page_settings = array(
    "meta_title" => "Rides & Attractions - INFOLAND",
    "meta_description" => "Discover the exciting list of Rides on offer at Infoland, including Roller Coasters, Water Rides, Carousels and other rides."
);
?>
<div class="main-content">
    <div class="section">
        <h1><i class="fa fa-map-signs"></i> Rides & Attractions</h1>
    </div>
    <div class="row">
        <aside class="col-md-3">
            <ul class="sidebar-nav nav nav-pills nav-stacked"  role="tablist">
                <li role="presentation" class="active">
                    <a href="#SwingRide" aria-controls="SwingRide" role="tab" data-toggle="tab">Swing Ride</a>
                </li>
                <li role="presentation">
                    <a href="#DodgeCars" aria-controls="DodgeCars" role="tab" data-toggle="tab">Dodge Cars</a>
                </li>
                <li role="presentation">
                    <a href="#WoodenRollercoaster" aria-controls="WoodenRollercoaster" role="tab" data-toggle="tab">Wooden Rollercoaster</a>
                </li>
                <li role="presentation">
                    <a href="#Waterslide" aria-controls="Waterslide" role="tab" data-toggle="tab">Waterslide</a>
                </li>
                <li role="presentation">
                    <a href="#DropTower" aria-controls="DropTower" role="tab" data-toggle="tab">Drop Tower</a>
                </li>
                <li role="presentation">
                    <a href="#KidsTrainRide" aria-controls="KidsTrainRide" role="tab" data-toggle="tab">Kids Train Ride</a>
                </li>
                <li role="presentation">
                    <a href="#WaterLogRide" aria-controls="WaterLogRide" role="tab" data-toggle="tab">Water Log Ride</a>
                </li>
                <li role="presentation">
                    <a href="#Carousel" aria-controls="Carousel" role="tab" data-toggle="tab">Carousel</a>
                </li>
                <li role="presentation">
                    <a href="#CorkscrewRollercoaster" aria-controls="CorkscrewRollercoaster" role="tab" data-toggle="tab">Corkscrew Rollercoaster</a>
                </li>
            </ul>
        </aside>
        <div class="col-md-9">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="SwingRide">                
                    <article> 
                        <figure class="ride-banner-image">
                            <img src="/images/rides_swingride.jpg" alt="Swing Ride" title="Swing Ride" />
                            <div class="ride-banner-image-screen"></div>
                            <figcaption><h2>Swing Ride</h2></figcaption>
                        </figure>
                        <h3>Awesome Centrifugal G-forces!</h3>
                        <p>Experience the power of physics by taking a ride on this rotating swing ride. The excitement and entertainment of this ride will have you on the edge of your seat and will have you dying with laughter.</p>
                    </article>
                </div>
                <div role="tabpanel" class="tab-pane" id="DodgeCars">               
                    <article> 
                        <figure class="ride-banner-image"  >
                            <img alt="Dodgem Cars" title="Dodgem Cars" src="/images/rides_bumpercars.jpg" />
                            <div class="ride-banner-image-screen"></div>
                            <figcaption><h2>Dodge Cars</h2></figcaption>
                        </figure>
                        <h3>Time for a car crash!</h3>
                        <p>Do you enjoy losing control of motorised vehicles and causing accidents? Then this ride is for you! Come zoom around the ride and repeatedly collide with other vehicles to relieve that road rage at InfoLand!.</p>
                    </article>
                </div>
                <div role="tabpanel" class="tab-pane" id="WoodenRollercoaster">
                    <article> 
                        <figure class="ride-banner-image">
                            <img src="/images/rides_wooden_rollercoaster.jpg" alt="Wodden Rollercoaster" title="Wodden Rollercoaster" />
                            <div class="ride-banner-image-screen"></div>
                            <figcaption><h2>Wooden Rollercoaster</h2></figcaption>
                        </figure>
                        <h3>Our most Earthquake-friendly ride</h3>
                        <p>Just like most homes in the Canterbury region, this roller coaster is built from wood. This results in a flexible and pliable frame during one of the frequent aftershocks in the region. Come take a ride and you might just experience an earthquake in the most fun place possible.</p>
                    </article>
                </div>
                <div role="tabpanel" class="tab-pane" id="Waterslide">
                    <article> 
                        <figure class="ride-banner-image">
                            <img src="/images/rides_waterslide.jpg" alt="Waterslides" title="Waterslides" />
                            <div class="ride-banner-image-screen"></div>
                            <figcaption><h2>Waterslide</h2></figcaption>
                        </figure>
                        <h3 class="">It's a slide with water!</h3>
                        <p>This ride involves climbing stairs then sliding down a tube lubricated by dihidrogen monoxide and some potential traces of human fluids. Enough said.</p>
                    </article>
                </div>
                <div role="tabpanel" class="tab-pane" id="DropTower">
                    <article> 
                        <figure class="ride-banner-image">
                            <img src="/images/rides_droptower.jpg" alt="Drop Tower" title="Drop Tower" />
                            <div class="ride-banner-image-screen"></div>
                            <figcaption><h2>Drop Tower</h2></figcaption>
                        </figure>
                        <h3>Get Dropped Son!</h3>
                        <p>Another of our incredible physics-powred rides. Discover the effects of Gravity, which by the way have less scientific proof than global warming. Think about that next time you ask for a plastic bag at the grocery store.</p>
                    </article>
                </div>
                <div role="tabpanel" class="tab-pane" id="KidsTrainRide" >
                    <article> 
                        <figure class="ride-banner-image">
                            <img alt="Kids Train Ride" title="Kids Train Ride" src="/images/rides_kidstrainride.jpg" />
                            <div class="ride-banner-image-screen"></div>
                            <figcaption><h2>Kids Train Ride</h2></figcaption>
                        </figure>
                        <h3>For Children and slightly Older Children</h3>
                        <p>A miniature steam-powered ride. An oval traintrack. Some bonzai trees and bushes. Yep.</p>
                    </article>
                </div>
                <div role="tabpanel" class="tab-pane" id="WaterLogRide">
                    <article> 
                        <figure class="ride-banner-image">
                            <img  alt="Water Log Ride" title="Water Log Ride"  src="/images/rides_waterlog.jpg" />
                            <div class="ride-banner-image-screen"></div>
                            <figcaption><h2>Water Log Ride</h2></figcaption>
                        </figure>
                        <h3>A Slightly Bigger Hydroslide!</h3>
                        <p>We promise that the only logs in the water are the ones you are riding on.</p>
                    </article>
                </div>
                <div role="tabpanel" class="tab-pane" id="Carousel" >
                    <article> 
                        <figure class="ride-banner-image">
                            <img alt="Carousel" title="Carousel" src="/images/rides_carousel.jpg" />
                            <div class="ride-banner-image-screen"></div>
                            <figcaption><h2>Carousel</h2></figcaption>
                        </figure>
                        <h3>For all the boring visitors out there.</h3>
                        <p>Experience our most stereotypical ride, featuring everything you expect from a carousel.</p>
                    </article>
                </div>
                <div role="tabpanel" class="tab-pane" id="CorkscrewRollercoaster">
                    <article> 
                        <figure class="ride-banner-image">
                            <img  alt="Corkscrew Roller Coaster" title="Corkscrew Roller Coaster" src="/images/rides_corkscrew.jpg" />
                            <div class="ride-banner-image-screen"></div>
                            <figcaption><h2>Corkscrew Rollercoaster</h2></figcaption>
                        </figure>
                        <h3>Pretty Self Explanatory Ride!</h3>
                        <p>You will enjoy being rotated repeatedly and rapidly on our most popular and least secure ride.</p>
                    </article>
                </div> 
            </div>
        </div>
    </div>
</div>