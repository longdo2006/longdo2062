<?php
$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM product WHERE prd_id = '$prd_id'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

$cat_id = $row['cat_id'];

?>

<div class="col-lg-12 col-md-12 col-sm-12">
    <div id="product">
        <div id="product-head" class="row">
            <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
                <img src="admin/img/product/<?php echo $row['prd_image'];?>">
            </div>
            <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
                <h1><?php echo $row['prd_name'] ?></h1>
                <ul>
                    <li><span>Bảo hành:</span> <?php echo $row['prd_warranty']; ?></li>
                    <li id="price"><b>Giá Bán:</b> </li>
                    <li id="price-number"><?php echo number_format($row['prd_price']); ?> VNĐ</li>
                    <li id="status">
                    <?php
                    if($row['prd_status']==1){
                        echo 'Còn hàng';
                    }
                    else{
                        echo 'Hết hàng';
                    }
                     
                     ?>
                     </li>
                </ul>
              
                
                <div id="add-cart"><a href="modules/cart/add_cart.php?prd_id=<?php echo $row['prd_id'];?>">Mua ngay</a></div>


            </div>
        </div>
        <div id="product-body" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3>Thông tin sản phẩm</h3>
                <p><?php echo $row['prd_details'] ?></p>
            </div>
        </div>
    </div>

</div>
<div class="col-lg-12 col-md-12 col-sm-12">
    <h3 class="mt-3" style="color: red;">Sản phẩm liên quan</h3>

    <div class="products">
        <div class="product-list row">
            <?php 
            $sql = "SELECT * FROM product WHERE cat_id = '$cat_id' LIMIT 6";
            $query = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($query)){
            ?>
            <div class="col-lg-2 col-md-4 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'];?>"><img src="admin/img/product/<?php echo $row['prd_image'];?>"></a>
                    <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'];?>"><?php echo $row['prd_name']; ?></a></h4>
                    <p>Giá Bán: <span><?php echo $row['prd_price']; ?></span></p>
                </div>
            </div>
            <?php } ?>

          
        </div>
    </div>

</div>