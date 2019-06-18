<?php
class Database{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $database = "simple_shop";
    public $connection;
    /*
     * phương thức khởi tạo
     */
    public function __construct() {
        $this->connection = $this->connectDatabase();
    }
    /*
     * Phương thức kết nối đến cơ sở dữ liệu
     * */
    public function connectDatabase(){
        $connection = mysqli_connect($this->host,$this->user,$this->password,$this->database );
        mysqli_set_charset($connection,'UTF_*');
        return $connection;
    }
    /*
     * Phương thức để chạy câu truy vấn sql
     */
    public function runQuery($sql){
        $data = array();
        $result = mysqli_query($this->connection,$sql);
        while($row = mysqli_fetch_assoc($result) ){
            $data[] = $row;
        }
        return $data;
    }
    /*Phương thức đếm số bản ghi trong câu lệnh query*/
    public function numRows($sql){
        $result = mysqli_connect($this->connection,$sql);
        $count = mysqli_fetch_row($result);
        return $count;
    }
}
?>