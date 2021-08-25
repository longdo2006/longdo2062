<?php
if(!defined('SECURITY')){
	die('Bạn không có quyền truy cập vào file này !');
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách thành viên</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_user" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
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
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM user ORDER BY user_id ASC";

                            $query = mysqli_query($conn, $sql);
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
                                                    <p class="text-danger">Bạn có chắc chắn muốn xóa thành viên này ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-danger btn-ok" href="del_user.php?page_layout=user&user_id=<?php echo $row['user_id']; ?>">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td style=""><?php echo $row['user_id']; ?></td>
                                    <td style=""><?php echo $row['user_full']; ?></td>
                                    <td style=""><?php echo $row['user_mail']; ?></td>
                                    <td><?php if ($row['user_level'] == 1) {
                                            echo '<span class="label label-danger">Admin</span>';
                                        } else {
                                            echo '<span class="label label-success">Member</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_user&user_id=<?php echo $row['user_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a data-href="#" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
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