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

$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact"));
$total_pages = ceil($total_rows/$rows_per_page);

$list_pages = '';
$page_prev = $page - 1;
if($page_prev <= 0){
	$page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=contact&page='.$page_prev.'">&laquo;</a></li>';
for($i=1; $i<=$total_pages; $i++){
	if($i==$page){
		$active = 'active';
	}
	else{
		$active = '';
	}
	$list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=contact&page='.$i.'">'.$i.'</a></li>';
}
$page_next = $page + 1;
if($page_next > $total_pages){
	$page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=contact&page='.$page_next.'">&raquo;</a></li>';
?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh sách phản hồi</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách phản hồi</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" data-toggle="table">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>SĐT</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $sql = "SELECT * FROM contact ORDER BY ct_id ASC LIMIT $per_row, $rows_per_page";
                                    $query = mysqli_query($conn,$sql);
                
                                    while($row = mysqli_fetch_array($query)){
                                     ?>
                                <tr>
                                   
                                    <td><?php echo $row['ct_id']; ?></td>
                                    <td><?php echo $row['ct_name']; ?></td>
                                    <td><?php echo $row['ct_email']; ?></td>
                                    <td><?php echo $row['ct_address']; ?></td>
                                    <td><?php echo $row['ct_sdt']; ?></td>
                                    <td><?php echo $row['ct_title']; ?></td>
                                    <td><?php echo $row['ct_content']; ?></td>
                                    
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

