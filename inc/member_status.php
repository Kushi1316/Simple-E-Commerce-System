<?php
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

if (isset($_POST["login_form_submitted"])) {
   $login_attempt = $member->login($_POST["username"], $_POST["password"]);
}

if (isset($_POST["logout_form_submitted"])) {
  $member->logout();
}


?>
<h4 class=" margin-bottom-5"><i class="fa fa-user"></i> Login</h4>
<?php
if (isset($_POST["login_form_submitted"])) {
    if ($login_attempt["status"] == "fail") {
        echo "<label class='form-error'>" . $login_attempt["reason"] . "</label>";
    }
}

if($member_data["member_id"]==0){
?>
<form class="login-form" id="login_form" method="POST" action="<?=THIS_URL?>">
    <label>Username</label>
    <input class="input-block-level" type="text" name="username" />
    <label>Password</label>
    <input class="input-block-level" type="password" name="password" />
    <input  type="hidden" name="login_form_submitted" />
     <input  type="hidden" name="this_url" value="<?=THIS_URL?>" />
    <button type="submit" class="primary-button">Login</button>
</form>
<Hr /> 
<p>Don't have an account?</p>
<a href="/register/" class="primary-button">Register</a>
<?php }else{?>
<p>Hi <?=$member_data["name"]?></p>
<form class="logout-form" id="logout_form" method="POST" action="<?=THIS_URL?>">
    <input  type="hidden" name="logout_form_submitted" />
     <input  type="hidden" name="this_url" value="<?=THIS_URL?>" />
<button type="submit" class="primary-button">Logout</button>
</form>
    
<?php } ?>