<?php

/* Prevent direct acess to this file */
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

class Database {

    private static $db;

    public function ProductListing($category_id = null, $sort_column = "last_update") {
        $db = self::$db;

        //build query, depending on our inputs 
        $query = "SELECT product_id,title,sku,stock,price,discount_price,description,category_id,last_update FROM products";
        if (!is_null($category_id)) {
            //if we set a category, add where clause 
            $query .= " WHERE category_id = ?";
        }
        $query .= " ORDER BY ? DESC";
        $statement = $db->prepare($query);
        if (is_null($category_id)) {
            $statement->execute(array($sort_column));
          
        } else {
            $statement->execute(array($category_id, $sort_column));
        }
      
        $data = $statement->fetchAll();
        $i = 0;
        while ($i < count($data)) {
            $data[$i]["title_slugged"] = self::slugify($data[$i]["title"]);
            $i++;
        }
        return $data;
    }

    public function getProduct($product_id) {
        $db = self::$db;
        $statement = $db->prepare("SELECT p.product_id,p.title,p.sku,p.stock,p.price,p.discount_price,p.description,p.category_id,p.last_update,c.category_title,c.category_id "
                . "FROM products AS p "
                . "LEFT JOIN categories AS c ON p.category_id = c.category_id "
                . "WHERE p.product_id = ?");
        $statement->execute(array($product_id));
        $data = $statement->fetchObject();
        $data->last_updated = date("d M Y", $data->last_update);
        $data->title_slugged = self::slugify($data->title);
        $data->category_title_slugged = self::slugify($data->category_title);
        return $data;
    }

    public function listCategories() {
        $db = self::$db;
        $statement = $db->prepare("SELECT c.category_id,c.category_title,COUNT(product_id) as count_products "
                . "FROM categories AS c "
                . "LEFT JOIN products as p ON p.category_id = c.category_id "
                . "GROUP BY p.category_id "
                . "ORDER BY c.category_order ASC");
        $statement->execute();
        $data = $statement->fetchAll();
        $i = 0;
        $total_products_count = 0;
        while ($i < count($data)) {
            $data[$i]["slugged_title"] = self::slugify($data[$i]["category_title"]);
            $total_products_count +=$data[$i]["count_products"];
            $i++;
        }
        $data = array(
            "data" => $data,
            "total_products_count" => $total_products_count
        );
        return $data;
    }

    public function getCategory($category_id) {
        $db = self::$db;
        $statement = $db->prepare("SELECT category_id,category_title FROM categories WHERE category_id = ?");
        $statement->execute(array($category_id));
        $data = $statement->fetchObject();
        $data->title_slugged = self::slugify($data->category_title);

        return $data;
    }

    //This functions turns a string such as a title into a url friendly string
    public static function slugify($string) {
        $string = preg_replace("/&#?[a-z0-9]{2,8};/i", "", $string);
        // replace non letter or digits by -
        $string = preg_replace('~[^\\pL\d]+~u', '-', $string);
        $string = trim($string, '-');
        if (function_exists('iconv')) {
            $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
        }
        $string = strtolower($string);
        $string = preg_replace('~[^-\w]+~', '', $string);

        if (empty($string)) {
            return 'n-a';
        }
        return $string;
    }

    public function insertOrders($member_id, $orders) {
        $my_orders = array();
        foreach ($orders as $key => $order) {
            $my_orders[$key]["product_id"] = $order["id"];
            $my_orders[$key]["price"] = $order["prc"];
            $my_orders[$key]["quantity"] = $order["qty"];
        }
        $my_orders = addslashes(serialize($my_orders));

        $db = self::$db;
        $statement = $db->prepare("INSERT INTO orders (order_member_id,order_order,order_date) VALUES(?,?,?)");
        $statement->execute(array($member_id, $my_orders, time()));

        return true;
    }

    public function getMyOrders($member_id) {
        $db = self::$db;
        $statement = $db->prepare("SELECT order_id,order_member_id,order_order,order_date "
                . "FROM orders "
                . "WHERE order_member_id = ?  "
                . "ORDER BY order_date DESC");
        $statement->execute(array($member_id));
        $data = $statement->fetchAll();

        if ($data) {
            $i = 0;
            while ($i < count($data)) {
                $order_data = unserialize(stripslashes($data[$i]["order_order"]));
                foreach ($order_data as $key => $product) {
                    $product_data = self::getProduct($product["product_id"]);
                    $order_data[$key]["product_name"] = $product_data->title;
                    $order_data[$key]["product_name_slugged"] = self::slugify($product_data->title);
                }
                $order_time = date("d/m/Y", $data[$i]["order_date"]) . " at " . date("h:iA", $data[$i]["order_date"]);
                $data[$i]["order_date"] = $order_time;
                $data[$i]["order_order"] = $order_data;
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }

}

//Database 
$db = new Database($database_object);

