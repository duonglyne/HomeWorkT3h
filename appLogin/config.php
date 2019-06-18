<?php
/**
 * khai báo hằng số
 */
define("DB_SERVER","localhost");
define("DB_SERVER_USERNAME","root");
define("DB_SERVER_PASSWORD","");
define("DB_SERVER_NAME","demoapplogin");
/**
 * mysqli_connect()ket nối đến cơ sở dữ liệu
 */
$connection=mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_SERVER_NAME);
/**
 * kiểm tra xem kết nối đến cơ sở dữ liệucó thành công không
 * nếu không thành công thì ngắt kết nối bằng câu lệnh die()
 *
 */
if ($connection==false){
    die("error không thể kết nối đến CSDL").mysqli_connect_error();
}