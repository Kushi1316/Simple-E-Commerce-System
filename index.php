<?php

/* ==================================================================
 * 
 * Settings 
 * 
  =================================================================== */
date_default_timezone_set('NZ');
$base_url = "http://infoland.cf"; /* Note: no trailing slash */
$full_page_specific_url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

$page_url = explode("?", $full_page_specific_url);
$page_url = $page_url[0];

$modules_path = __DIR__ . DIRECTORY_SEPARATOR . "modules" . DIRECTORY_SEPARATOR;
$database_settings = array(
    "host"=>"localhost",
    "port"=>"3306",
    "database"=>"marked_infoland",
    "username"=>"marked_userinfo",
    "password"=>"D}G&+@a%d?7Q"
);

define('ALLOWED_ACCESS', TRUE); /* Security measure */
define('BASE_PATH', __DIR__); /* Security measure */
define('THIS_URL', $page_url); /* Security measure */
$breadcrumbs = array();
$breadcrumbs[0]["name"] ="Home";
$breadcrumbs[0]["url"] ="/";

$messages = array(
    1 => "Your account was succesfully created. Please log in below.",
    2 => "You have succesfully logged in.",
    3 => "You have succesfully logged out."
);
$global_my_cart = $_COOKIE["my_cart"];

//THIS GIVES US THE VARIABLE $DB
require_once(BASE_PATH . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "open_db.php");
require_once(BASE_PATH . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "validation.php");
require_once(BASE_PATH . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "db.php");

//THIS GIVES US THE VARIABLE $MEMBER
require_once(BASE_PATH . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "member.php");


/* DB stuff will go in here later */

/* ==================================================================
 * 
 * Get Page
 * 
  =================================================================== */

/* This will give us the current URL AFTER the domain. str_replace is used 
 * to subtract the domain from the string, which is needed in case our
 * index.php file stored deeper than the root directory. 
 *  */
$uri = str_replace($base_url, "",$full_page_specific_url);

/* explode will give us the path and filename of our page. The last item in the
 * array will be the name of the php file, and any preceding items will be the
 * directories the page is stored . ltrim and rtrim remove slashes from start
 * and end of the string. */
$uri_no_query = explode("?", $uri); /* after domain, BEFORE ?query_string */
$uri_no_query = $uri_no_query[0];
$uri_parts = explode("/", rtrim(ltrim($uri_no_query, "/"), "/"));

/* If we're on the homepage, there'll be no URI bits to collect, so our array
 * will come back empty. When this happens, we intervene by setting the array
 * to the name of the home page PHP file so our homepage will load. 
 *  */
if ($uri_parts[0] == "") {
    $uri_parts = array("home");
}
$css_page_name = $uri_parts[count($uri_parts) - 1]; /* going to put this as a class
  in the body so we can do tricky CSS things. */

/* We have to ensure we use PHP's Directory Seperator because these are 
 * different on linux and windows servers. Implode creates a string 
 * from an array, and "glues" the items together with DIRECTORY_SEPARATOR
 *  */

//URL vars are those vars which are at 3rd level and above 
$url_variables = $uri_parts;
unset($url_variables[0]);
unset($url_variables[1]);

//remove 3rd level and above from the array 
$i =0;
while($i < count($uri_parts)){
    if($i>1){
        unset($uri_parts[$i]);
    }
    $i++;
}

$page_location = implode(DIRECTORY_SEPARATOR, $uri_parts);


/* Set the full path, because we'll use the string multiple times. __DIR__ will 
 * give us the path of index.php, so we find all our pages relative to its path.
 * This is ok, because every single page runs through index.php. 
 *  */
$full_page_path = __DIR__ . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . $page_location . ".php";

/* ob_start is a PHP function that allows us to store an output into a variable. */
ob_start();

/* If the doesn't exist, ensure we load our 404 page. */
if (file_exists($full_page_path)) {
    /*
     * REQUIRED VS INCLUDE 
     * The require() function is identical to include(), except that it handles 
     * errors differently. If an error occurs, the include() function generates 
     * a warning, but the script will continue execution. The require() generates 
     * a fatal error, and the script will stop. 
     */
    
    require_once($full_page_path);
} else {
    header("HTTP/1.0 404 Not Found"); /* so Google knows whats up and doesn't index nothing */
    require_once(__DIR__ . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "404.php");
}
$page_content = ob_get_clean(); /* stores the output of our require_once aka the page */

/* ==================================================================
 * 
 * Set Variables 
 * 
  =================================================================== */
/* Default page settings - here we use variables from our require_once and set 
 * them in an array here so that we can plug them into the header or footer.
 * This is obviously needed, because the header is loaded before the page
 * content, but we're storing this information in the pages' PHP files. So 
 * we need to extract that data out first before we render the output. 
 */
$page_settings = array();
/* If no meta title comes through, default will be INFOLAND */
$page_settings["meta_title"] = (isset($this_page_settings["meta_title"]) ? $this_page_settings["meta_title"] : "INFOLAND");
$page_settings["meta_description"] = (isset($this_page_settings["meta_description"]) ? $this_page_settings["meta_description"] : "");
$page_settings["js_scripts"] = (isset($this_page_settings["js_scripts"]) ? $this_page_settings["js_scripts"] : "");


/* ==================================================================
 * 
 * Print Output
 * 
  =================================================================== */

ob_start(); /* Send our output GZIP compressed for speed */

require_once(__DIR__ . DIRECTORY_SEPARATOR . "header.php");

echo($page_content); /* make it rain */
require_once(__DIR__ . DIRECTORY_SEPARATOR . "footer.php");
ob_flush();


?>