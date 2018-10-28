<footer class="footer">
    <div class="section footer-inner">
        <div class="row">
            <div class="col-md-3  col-sm-6">
                <h3>INFOLAND</h3>
                <p>It's fun on demand at INFOLAND, the most outstanding theme park in Christchurch. At INFOLAND we thrive to make each of our customers have the best and most memorable experience possible, we hope you enjoy your visit with us.</p>
            </div>
            <div class="col-md-2  col-sm-6">
                <h3>Site Map</h3>
                <ul class="plain-list">
                    <li>
                        <a href="/" class="remove-style"><span>Home</span></a>
                    </li>
                    <li>
                        <a href="/rides-and-attractions/" class="remove-style"><span>Rides &amp; Attractions</span></a>
                    </li>
                    <li>
                        <a href="/plan-your-day/" class="remove-style"><span>Plan Your Day</span></a>
                    </li>
                    <li>
                        <a href="/tickets-and-deals/" class="remove-style"><span>Tickets &amp; Deals</span></a>
                    </li>
                    <li>
                        <a href="/special-events/" class="remove-style"><span>Special Events</span></a>
                    </li>

                </ul>

            </div>
            <div class="col-md-4 col-sm-6">
                <h3>Disclaimer</h3>
                <p>INFOLAND does not accept any liability for catastrophic injuries or death caused by any ride, nor does it take responsibility for serious food poisoning that may or may not be caused by onsite restaurants.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                <h3>CONTACT US</h3>
                <address>20 Kirkwood Ave<Br />Upper Riccarton<Br />Christchurch 8041</address>
                <p><a href="tel:6433667001"><i class="fa fa-phone"></i> +64 3-366 7001</a><Br />
                    <a href="mailto:infoland@canterbury.ac.nz"><i class="fa fa-envelope"></i> infoland@canterbury.ac.nz</a>
                </p>
            </div>
        </div>
    </div>
    <div class="bottom-footer clearfix">

        <p class="pull-left copyright">Copyright &copy; <?= date("Y") ?> INFOLAND Limited</p>
        <ul class="footer-menu pull-right">
            <li><a href="/legal">Legal</a></li>
            <li><a href="/privacy-policy">Privacy Policy</a></li>
        </ul>
    </div>
</footer>
</div>


<!-- Core JS files added to the bottom of the page for increased page speed -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
/* Add javascript file(s) to the page */



if (!(empty($page_settings["js_scripts"]))) {
    foreach ($page_settings["js_scripts"] as $script) {
        //Add scripts to the page from the page's settings.
        echo "<script src=\"/js/" . $script . ".js\"></script>";
    }
}
?>
<script>
 /*   $(function () {
        $('#sort_form select').change(function () {
         $("#sort_form").submit();
        });
    });*/
</script>
</body>
</html>
