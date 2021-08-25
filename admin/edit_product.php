<?php
if (!defined("SECURITY")) {
    die("ban khong co quyen truy cap vao file nay!");
}

$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM product WHERE prd_id = '$prd_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if (isset($_POST['sbm'])) {
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_warranty = $_POST['prd_warranty'];
    if ($_FILES['prd_image']['name'] == "") {
        $prd_image = $row['prd_image'];
    } else {
        $prd_image = $_FILES['prd_image']['name'];
        $tmp_name = $_FILES['prd_image']['tmp_name'];
        move_uploaded_file($tmp_name, "img/products/.$prd_image");
    }
    $cat_id = $_POST['cat_id'];
    $prd_status = $_POST['prd_status'];
    $prd_details = $_POST['prd_details'];
    $sql_update = "UPDATE product SET prd_name = '$prd_name', prd_price = $prd_price, prd_warranty = '$prd_warranty', prd_image = '$prd_image', cat_id = $cat_id, prd_status = '$prd_status', prd_details = '$prd_details' WHERE prd_id = $prd_id";
    $query_update = mysqli_query($conn, $sql_update);
    header("location: index.php?page_layout=product");
}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active"><?php echo $row['prd_name']; ?></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $row['prd_name']; ?></h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="prd_name" required class="form-control" value="<?php echo $row['prd_name']; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" name="prd_price" required value="<?php echo $row['prd_price']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input type="text" name="prd_warranty" required value="<?php echo $row['prd_warranty']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                            <label>Danh mục</label>
                            <select name="cat_id" class="form-control">
                                <?php
                                $sql_cat = "SELECT * FROM category ORDER BY cat_id DESC";
                                $query_cat = mysqli_query($conn, $sql_cat);
                                while ($row_cat = mysqli_fetch_array($query_cat)) {
                                ?>
                                    <option <?php if ($row_cat['cat_id'] == $row['cat_id']) {
                                                echo 'selected';
                                            } ?> value="<?php echo $row_cat['cat_id']; ?>"><?php echo $row_cat['cat_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="prd_status" class="form-control">
                                        <option <?php if($row['prd_status'] == 1){echo 'selected';}?> value=1>Còn hàng</option>
                                        <option <?php if($row['prd_status'] == 0){echo 'selected';}?> value=0>Hết hàng</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea name="prd_details" required class="form-control" rows="3"><?php echo $row['prd_details'] ?></textarea>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input type="file" name="prd_image" required>
                            <br>
                            <div>
                            <img width="130" height="180" src="img/product/<?php echo $row['prd_image'];?>">
                            </div>
                        </div>
                      
                        <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->