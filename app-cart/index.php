<?php
session_start();
require_once "database.php";
$database = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <h2>Giỏ Hàng</h2>
    <p>Chi tiết giỏ hàng</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá tiền</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xóa khỏi giỏ hàng</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Camera</td>
            <td></td>
            <td>100000</td>
            <td>2</td>
            <td>200000</td>
            <td><a href="#">Xóa</a> </td>
        </tr>
        </tbody>
    </table>
    <div>Tổng hóa đơn thanh toán <strong>200000đ</strong></div>
</div>
<div class="container" style="margin-top: 50px">
    <div class="row">
        <?php
        $sql = "SELECT * FROM products";
        $products = $database->runQuery($sql);
        ?>
        <?php
        if(!empty($products)) :?>
            <?php foreach ($products as $product):?>
                <div class="col-sm-6">
                    <form action="process.php" name="product<?php echo $product["id"]?>" method="post">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"  style="height:250px; width: auto; display: block;" src="images/<?php echo $product['product_image']?>" data-holder-rendered="true">
                            <div class="card-body">
                                <p class="card-text" style="font-weight:bold">Product <?php echo $product['product_name']?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-inline">
                                        <input type="text" class="form-control" id="quantity" value="1">
                                        <input type="hidden" class="form-control" name="product_id" value="<?php echo $product["id"]?>">
                                        <input type="hidden" class="form-control" name="action" value="add">
                                        <label style="margin-left: 10px">
                                            <input type="submit" name="submit" class="btn btn-primary" value="thêm vào giỏ hàng">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">thêm vào giỏ hàng</button>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>
</div>
</body>
</html>