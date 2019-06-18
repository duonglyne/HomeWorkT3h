<?php
session_start();
include_once "Database.php";
$database = new Database();
if (isset($_POST) && !empty($_POST)){ //check $_POST có dữ liệu được gửi đi hay không?
    if (isset($_POST["action"])){       //!empty để kiểm tra xem có dữ liêu hay không?
        switch ($_POST["action"]){
            case 'add':
                if (isset($_POST["quantily"]) && isset($_POST["product_id"])){
                    $sql = "SELECT *FROM products WHERE id=".(int)$_POST["product_id"];
                    $product = $database ->runQuery($sql);
                    $product = current($product);
                    echo "<pre> PRODUCT  <br>";
                    print_r($product);
                    echo "<pre>";
//                    current để lấy giá trị trong mảng vd mang lồng mảng thì ta lấy giá trị trong mang;
                    if (isset($_SESSION["cart_item"]) && !empty($_SESSION["cart_item"])){
                        foreach ($_SESSION["cart_item"] as $key_id => $val_id){
                            echo"<br>".'duyệt mảng';
                            echo"<pre>";
                            print_r($key_id);
                            echo"</pre>";
                            echo"<pre>";
                            print_r($val_id);
                            echo"</pre>";
                        }
//                        nếu đúng  giỏ hàng này có dữ liệu
                        if(isset($_SESSION['cart_item'][$product_id])){
                            /**
                             * sản phẩm  đã tồn tại trong giở hàng
                             */
                            $exist_cart_item = $_SESSION['cart_item'][$product_id];
                            $exist_quantity = $exist_cart_item['quantity'];
                            $cart_item = array();
                            $cart_item['id']= $product['id'];
                            $cart_item['product_name'] = $product['product_name'];
                            $cart_item['product_image']=$product['product_image'];
                            $cart_item['price']=$product['price'];
                            $cart_item['quantily'] = $exist_quantity + $_POST['quantily'];
                            $_SESSION['cart_item'][$product_id]= $cart_item;
                        }else{
                            /**
                             * sản phẩm chưa tồn tại trong giở hàng
                             */
                            $cart_item = array();
                            $cart_item['id']= $product['id'];
                            $cart_item['product_name'] = $product['product_name'];
                            $cart_item['product_image']=$product['product_image'];
                            $cart_item['price']=$product['price'];
                            $cart_item['quantily'] = $_POST['quantily'];
                            $_SESSION['cart_item'][$product_id]= $cart_item;
                        }
                    }
                    else {
                        $_SESSION["cart_item"] = array();
                        $product_id = $product["id"];
//                        tạo mot mang va gan cac gia trị lây ra dk vao mang
                        $cart_item = array();
                        $cart_item["id"] = $product["id"];
                        $cart_item["product_name"] = $product["product_name"];
                        $cart_item["product_image"] = $product["product_image"];
                        $cart_item["price"] = $product["price"];
                        $cart_item["quantily"] = $_POST["quantily"];
                        $_SESSION["cart_item"]["$product_id"] = $cart_item;
                    }
                }
                break;
            default:
                echo "action khong ton tai";
                die;
        }
    }
    echo "<pre> POST <br>";
    print_r($_POST);
    echo "<pre>";
    echo "<br> <pre> SEssION <br>";
    print_r($_SESSION);
    echo "<pre>";
    echo "<br> <pre> SEssION car-item <br>";
    print_r($_SESSION["cart_item"]);
    echo "<pre>";
}