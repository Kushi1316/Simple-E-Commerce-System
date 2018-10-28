<?php

if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

class Member {

    private static $db;
    public static $member_data = array();

    function __construct($db) {
        self::$db = $db;
        session_start();
        if ($_SESSION['member_id'] > 0) {
            $db = self::$db;
            $statement = $db->prepare("SELECT * FROM members WHERE member_id = ? LIMIT 1");
            $statement->execute(array($_SESSION['member_id']));
            $return = $statement->fetchObject();

            self::$member_data = array(
                "member_id" => $return->member_id,
                "name" => $return->first_name
            );
        } else {
            $_SESSION['member_id'] = 0;
            self::$member_data = array(
                "member_id" => 0,
                "name" => "Guest"
            );
        }
    }

    function createNewMember() {
        //check if that username already exists
        $db = self::$db;
        $statement = $db->prepare("SELECT username FROM members WHERE username = ? LIMIT 1");
        $statement->execute(array($_POST["username"]));
        $return = $statement->fetchObject();
        
        $error_string = "";
        $username = Validation::length(2, $_POST["username"]);
        $password = Validation::length(2, $_POST["Password"]);
        $first_name = Validation::length(2, $_POST["billing_first_name"]);
        $last_name = Validation::length(2, $_POST["billing_last_name"]);
        $address = Validation::length(2, $_POST["billing_address_1"]);
        $city = Validation::length(2, $_POST["billing_city"]);
        $postcode = Validation::length(2, $_POST["billing_postcode"]);

        
        $email = Validation::isEmail($_POST["billing_email"]);


        //TEST THIS BY ENTERING 1 CHARACTER INTO THE REQUIRED FIELDS ON THE 
        //REGISRATION PAGE 
        
        
        if (!$username) {
            $error_string .= "Username must be at least 2 characters. ";
        }
        if (!$password) {
            $error_string .= "Password must be at least 2 characters. ";
        }
        if (!$first_name) {
            $error_string .= "First name must be at least 2 characters. ";
        }
        if (!$last_name) {
            $error_string .= "Last name must be at least 2 characters. ";
        }
        if (!$address) {
            $error_string .= "Address one must be at least 2 characters. ";
        }
        if (!$city) {
            $error_string .= "Town/City must be at least 2 characters. ";
        }
        if (!$postcode) {
            $error_string .= "Postcode must be at least 2 characters. ";
        }
        
        if (!$email) {
            $error_string .= "Email not valid. ";
        }

        if ($error_string == "") {
            if (!($return->username)) {

                $pass_hash = self::generatePassHash($_POST["Password"]);
                $statement = $db->prepare("INSERT INTO members(
          username,
          email,
          pass_hash,
          country,
          first_name,
          last_name,
          company_name,
          address_one,
          address_two,
          town_city,
          state,
          postcode,
          registration_date                
)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $statement->execute(array(
                    htmlspecialchars($username),
                    htmlspecialchars($email),
                    htmlspecialchars($pass_hash),
                    htmlspecialchars($_POST["billing_country"]),
                    htmlspecialchars($first_name),
                    htmlspecialchars($last_name),
                    htmlspecialchars($_POST["billing_company"]),
                    htmlspecialchars($address),
                    htmlspecialchars($_POST["billing_address_2"]),
                    htmlspecialchars($city),
                    htmlspecialchars($_POST["billing_state"]),
                    htmlspecialchars($postcode),
                    time(),
                ));

                if ($_POST["checkout"] == 1) {
                    self::autoLogin($_POST["username"]);
                } else {
                    header("Location: /shop/?msg=1");
                }
            } else {
                return array(
                    "status" => "fail",
                    "reason" => "This username already exists"
                );
            }
        } else {
            return array(
                "status" => "fail",
                "reason" => $error_string
            );
        }
    }

    private function generatePassHash($pass) {
        return substr(md5($pass), 0, 50);
    }

    public function login($username, $password) {
        $pass_hash = self::generatePassHash($password);
        $db = self::$db;
        $statement = $db->prepare("SELECT member_id FROM members WHERE UCASE(username) = ? AND pass_hash = ? LIMIT 1");
        $statement->execute(array(strtoupper($username), $pass_hash));
        $return = $statement->fetchObject();
        if ($return->member_id) {
            self::convertCartItems($return->member_id);
            $_SESSION['member_id'] = $return->member_id;
            header("Location: " . $_POST["this_url"] . "?msg=2");
        } else {
            return array(
                "status" => "fail",
                "reason" => "Your username or password is incorrect."
            );
        }
    }

    //absrob guest cart items into member items 
    private function convertCartItems($member_id) {
        if ($_COOKIE["my_cart"]) {
            $cart = unserialize($_COOKIE["my_cart"]);
            //only show items belonging to that person. 
            foreach ($cart as $key => $i) {
                if ($i["mid"] == 0) {
                    $cart[$key]["mid"] = $member_id;
                }
            }
            $cart = serialize($cart);
            setcookie("my_cart", $cart, strtotime('+200 days'), "/");
        }
    }

    public function autoLogin($username) {
        $db = self::$db;
        $statement = $db->prepare("SELECT member_id FROM members WHERE UCASE(username) = ?");
        $statement->execute(array(strtoupper($username)));
        $return = $statement->fetchObject();

        if ($return->member_id) {
            self::convertCartItems($return->member_id);
            $_SESSION['member_id'] = $return->member_id;
            header("Location: /checkout/");
        } else {
            echo "error";
            exit;
        }
    }

    public function logout() {
        $_SESSION['member_id'] = 0;
        header("Location: " . $_POST["this_url"] . "?msg=3");
    }

}

//launch functions from here
$member = new Member($database_object);

//get member data from here 
$member_data = $member::$member_data;
