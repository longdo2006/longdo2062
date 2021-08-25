<?php
if (!defined('SECURITY')) {
    die('Ban khong co quyen truy cap trang nay');
}


if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}
$rows_per_page = 5;
$per_row = $page*$rows_per_page-$rows_per_page;

$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product"));
$total_pages = ceil($total_rows/$rows_per_page);

$list_pages = '';
$page_prev = $page - 1;
if($page_prev <= 0){
	$page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$page_prev.'">&laquo;</a></li>';
for($i=1; $i<=$total_pages; $i++){
	if($i==$page){
		$active = 'active';
	}
	else{
		$active = '';
	}
	$list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=product&page='.$i.'">'.$i.'</a></li>';
}
$page_next = $page + 1;
if($page_next > $total_pages){
	$page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$page_next.'">&raquo;</a></li>';
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_product" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id ORDER BY prd_id DESC LIMIT $per_row, $rows_per_page";
                            $query = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($query);
                            while ($row = mysqli_fetch_array($query)) {

                            ?>
                                <tr>
                                    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <b>CaoCao Medical Equipment</b>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">Bạn có chắc chắn muốn xóa sản phẩm này ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-danger btn-ok" href="del_product.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td style=""><?php echo $row['prd_id']; ?></td>
                                    <td style=""><?php echo $row['prd_name']; ?></td>
                                    <td style=""><?php echo number_format($row['prd_price']); ?></td>
                                    <td style="text-align: center"><img width="130" height="180" src="img/product/<?php echo $row['prd_image']; ?>"></td>
                                    <td>
                                            <?php if ($row['prd_status'] == 1) {
                                                echo '<span class="label label-success">Còn hàng</span>';
                                            } else {
                                                echo '<span class="label label-danger">Hết hàng</span>';
                                            }
                                            ?>
                                        </span></td>
                                    <td><?php echo $row['cat_name']; ?></td>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_product&prd_id=<?php echo $row['prd_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a data-href="#" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo $list_pages; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->
<script>
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>