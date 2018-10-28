<?php
/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}
if ($_POST["submitted"] == 1) {
    $create = $member->createNewMember();
}

$breadcrumbs[1]["name"] = "Shop";
$breadcrumbs[1]["url"] = "/shop/";
$breadcrumbs[2]["name"] = "Register";
$breadcrumbs[2]["url"] = "/register/";
/* Set custom page variables */
$this_page_settings = array(
    "meta_title" => "Register - INFOLAND",
    "meta_description" => "",
    "js_scripts" => array("jquery.validate.min", "registration-form")
);
?>
<div class=" main-content">
    <div class="section">
        <h1 class="remove-margin-top">Register</h1>
        <div class="row registration-form">
            <div class="col-md-6">
                <?php
                if ($_POST["submitted"] == 1) {
                    if ($create["status"] == "fail") {
                        echo "<label class='form-error'>" . $create["reason"] . "</label>";
                    }
                }
                ?>
                <form id="registration_form" action="" method="POST">
                    <h3>Account Details</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="username" class="">Username <abbr class="required" title="required">*</abbr></label>
                            <input type="text" class="input-text " name="username" id="username" placeholder=""  value=""  />
                        </div>
                        <div class="col-md-6">
                            <label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
                            <input type="text" class="input-text " name="billing_email" id="billing_email" placeholder=""  value=""  />
                        </div>
                    </div>
                    <label for="Password" class="">Password <abbr class="required" title="required">*</abbr></label>
                    <input type="password" class="input-text " name="Password" id="Password" placeholder=""  value=""  />
                    <h3>Shipping & Billing Details</h3>
                    <label for="billing_country" class="">Country <abbr class="required" title="required">*</abbr></label>
                    <select name="billing_country" id="billing_country" class="country_to_state country_select " >
                        <option value="">Select a country&hellip;</option>
                        <option value="NZ"  selected='selected'>New Zealand</option>
                    </select>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
                            <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder=""  value=""  />
                        </div>
                        <div class="col-md-6">
                            <label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
                            <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder=""  value=""  />
                        </div>
                    </div>
                    <label for="billing_company" class="">Company Name</label>
                    <input type="text" class="input-text " name="billing_company" id="billing_company" placeholder=""  value=""  />
                    <label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Street address"  value=""  />
                    <input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)"  value=""  />
                    <label for="billing_city" class="">Town / City <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="Town / City"  value=""  />
                    <div class="row">
                        <div class="col-md-6">
                            <label for="billing_state" class="">State</label>
                            <select name="billing_state" id="billing_state" class="state_select "  placeholder="">
                                <option value="">Select a state&hellip;</option>
                                <option value="NL" >Northland</option>
                                <option value="AK" >Auckland</option>
                                <option value="WA" >Waikato</option>
                                <option value="BP" >Bay of Plenty</option>
                                <option value="TK" >Taranaki</option>
                                <option value="HB" >Hawke&rsquo;s Bay</option>
                                <option value="MW" >Manawatu-Wanganui</option>
                                <option value="WE" >Wellington</option>
                                <option value="NS" >Nelson</option>
                                <option value="MB" >Marlborough</option>
                                <option value="TM" >Tasman</option>
                                <option value="WC" >West Coast</option>
                                <option value="CT" >Canterbury</option>
                                <option value="OT" >Otago</option>
                                <option value="SL" >Southland</option>
                                <option value="GI" >Gisborne</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="billing_postcode" class="">Postcode / Zip <abbr class="required" title="required">*</abbr></label>
                            <input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="Postcode / Zip"  value=""  />
                        </div>
                    </div>
                     <?php
                if ($_GET["checkout"] == 1) { ?>
                      <input type="hidden" name="checkout" value="1" />
                <?php }else{ ?>
                        <input type="hidden" name="checkout" value="0" />
                        <?php } ?>
                    <input type="hidden" name="submitted" value="1" />
                    <button type="submit" class="primary-button">Register</button>
                </form>
            </div>
            <div class="col-md-1">
                &nbsp;
            </div>
            <div class="col-md-4">
                <?php
                if ($_GET["checkout"] == 1) {
                    if (isset($_POST["login_form_submitted"])) {
                        $login_attempt = $member->login($_POST["username"], $_POST["password"]);
                         if ($login_attempt["status"] == "fail") {
                            echo "<label class='form-error'>" . $login_attempt["reason"] . "</label>";
                        }
                    }
                    if (isset($_POST["logout_form_submitted"])) {
                        $member->logout();
                    }
                    ?>
                    <h2>Login</h2>
                    <form class="login-form" id="login_form" method="POST" action="<?= THIS_URL ?>?checkout=1">
                        <label>Username</label>
                        <input class="input-block-level" type="text" name="username" />
                        <label>Password</label>
                        <input class="input-block-level" type="password" name="password" />
                        <input  type="hidden" name="login_form_submitted" />
                        <input  type="hidden" name="this_url" value="/checkout/" />
                        <button type="submit" class="primary-button">Login</button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>