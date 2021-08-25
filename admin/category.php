<?php
if (!defined('SECURITY')) {
	die('Ban khong co quyen truy cap trang nay');
}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Quản lý danh mục</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý danh mục</h1>
		</div>
	</div>
	<!--/.row-->
	<div id="toolbar" class="btn-group">
		<a href="index.php?page_layout=add_category" class="btn btn-success">
			<i class="glyphicon glyphicon-plus"></i> Thêm danh mục
		</a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table data-toolbar="#toolbar" data-toggle="table">

						<thead>
							<tr>
								<th data-field="id" data-sortable="true">ID</th>
								<th>Tên danh mục</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT*FROM category ORDER BY cat_id DESC";
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
													<p class="text-danger">Bạn có chắc chắn muốn xóa danh mục này ?</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<a class="btn btn-danger btn-ok" href="del_category.php?page_layout=category&cat_id=<?php echo $row['cat_id']; ?>">Delete</a>
												</div>
											</div>
										</div>
									</div>
									<td style=""><?php echo $row['cat_id']; ?></td>
									<td style=""><?php echo $row['cat_name']; ?></td>
									<td class="form-group">
										<a href="index.php?page_layout=edit_category&cat_id=<?php echo $row['cat_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
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