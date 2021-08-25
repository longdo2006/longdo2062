<?php
if (!defined('SECURITY')) {
    die('Ban khong co quyen truy cap trang nay');
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rows_per_page = 5;
$per_row = $page * $rows_per_page - $rows_per_page;

$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
$total_pages = ceil($total_rows / $rows_per_page);

$list_pages = '';
$page_prev = $page - 1;
if ($page_prev <= 0) {
    $page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=orders&page=' . $page_prev . '">&laquo;</a></li>';
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=orders&page=' . $i . '">' . $i . '</a></li>';
}
$page_next = $page + 1;
if ($page_next > $total_pages) {
    $page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=orders&page=' . $page_next . '">&raquo;</a></li>';
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Quản lí đơn hàng</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lí đơn hàng</h1>
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
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tình trạng</th>
                                <th>Fix</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sql = "SELECT * FROM orders ORDER BY od_id ASC LIMIT $per_row, $rows_per_page";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>

                                <tr>

                                    <td class="text-center"><?php echo $row['od_id']; ?></td>
                                    <td><?php echo $row['od_name']; ?></td>
                                    <td><?php echo $row['od_phone']; ?></td>
                                    <td><?php echo $row['od_mail']; ?></td>
                                    <td><?php echo $row['od_address']; ?></td>
                                    <td><?php echo $row['od_prd_name']; ?></td>
                                    <td><?php echo $row['od_qtt']; ?></td>
                                    <td><?php echo number_format($row['od_all_price']); ?></td>
                                    <td>
                                    <span class="label <?php if($row['od_check'] == 1){echo 'label-success';}else{echo 'label-danger';}?>"><?php if($row['od_check'] == 1){echo 'Đã xử lý';}else{echo 'Chưa xử lý';}?>
                                    </span>
                                    </td>
                                    <td>
                                    <a href="index.php?page_layout=orders_check&od_id=<?php echo $row['od_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
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
