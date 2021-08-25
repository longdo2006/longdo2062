<?php
// Phan trang
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$row_per_page = 8;
$per_row = $page * $row_per_page - $row_per_page;
$total_row = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product"));
$total_page = ceil($total_row / $row_per_page);
// Preview
$list_page = "";
$prev = $page - 1;
if ($prev <= 0) {
    $prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page=' . $prev . '">&laquo;</a></li>';
// So page
for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_page .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
}
// next page
$next = $page + 1;
if ($next >= $total_page) {
    $next = $total_page;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page=' . $next . '">&raquo;</a></li>';
$sql = "SELECT * FROM product
		ORDER BY prd_id DESC
		LIMIT $per_row, $row_per_page";
$query = mysqli_query($conn, $sql);
?>

<div class="col-lg-9 col-md-8 col-sm-12">
    <div class="products">
        <div class="product-list row">
        <?php while($row=mysqli_fetch_array($query)){ ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'];?>"><img src="admin/img/product/<?php echo $row['prd_image'];?>"></a>
                    <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'];?>"><?php echo $row['prd_name'];?></a></h4>
                    <p>Giá Bán: <span><?php echo $row['prd_price']; ?></span></p>
                </div>
            </div>
        <?php } ?>
           
        </div>
    </div>
    <div id="pagination">
        <ul class="pagination">
            <?php echo $list_page; ?>
        </ul>
    </div>
</div>