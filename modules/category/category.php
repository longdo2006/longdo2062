<?php
$cat_id = $_GET['cat_id'];
$cat_name = $_GET['cat_name'];

//	Pagination
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;	
}
$rows_per_page = 6;
$per_row = $page*$rows_per_page - $rows_per_page;

$sql = "SELECT * FROM product
		WHERE cat_id = $cat_id
		ORDER BY prd_id DESC
		LIMIT $per_row, $rows_per_page";
$query = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($query);

//	Pagination Bar
$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product WHERE cat_id = $cat_id"));
$total_pages = ceil($total_rows/$rows_per_page);

$list_pages = '';
$page_prev = $page - 1;

if($page == 1){
	$disabled_prev = ' disabled';
}
else{
	$disabled_prev = '';
}

$list_pages .= '<li class="page-item'.$disabled_prev.'"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$page_prev.'">Trang trước</a></li>';
for($j = 1; $j<=$total_pages; $j++){
	
	if($j == $page){
		$active = ' active';
	}
	else{
		$active = '';
	}
	
	$list_pages .= '<li class="page-item'.$active.'"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$j.'">'.$j.'</a></li>';
}
$page_next = $page + 1;

if($page == $total_pages){
	$disabled_next = ' disabled';
}
else{
	$disabled_next = '';
}

$list_pages .= '<li class="page-item'.$disabled_next.'"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$page_next.'">Trang sau</a></li>';
?>
<div class="col-lg-9 col-md-9 col-sm-12">
                        
    <!--	List Product	-->
    <div class="products">
        <h3><b><?php echo $cat_name;?></b> <i>(hiện có <?php echo $total_rows;?> sản phẩm)</i></h3>
        <div class="product-list row">
        <?php while($row = mysqli_fetch_array($query)){ ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'];?>"><img src="admin/img/product/<?php echo $row['prd_image'];?>"></a>
                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'];?>"><?php echo $row['prd_name'];?></a></h4>
                <p>Giá Bán: <span><?php echo $row['prd_price'];?>đ</span></p>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <!--	End List Product	-->
    
    <div id="pagination">
        <ul class="pagination">
            <?php echo $list_pages; ?>
        </ul> 
    </div>
    </div>