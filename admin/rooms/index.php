<style>
	.img-thumb-path {
		width: 100px;
		height: 80px;
		object-fit: scale-down;
		object-position: center center;
	}
</style>
<div class="card card-outline card-primary rounded-0 shadow">
	<div class="card-header">
		<h3 class="card-title">Danh sách phòng</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-sm btn-primary"><span
					class="fas fa-plus"></span> Thêm phòng mới</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				<table class="table table-bordered table-hover table-striped">
					<colgroup>
						<col width="5%">
						<col width="20%">
						<col width="25%">
						<col width="20%">
						<col width="15%">
						<col width="15%">
					</colgroup>
					<thead>
						<tr class="bg-gradient-primary text-light">
							<th>#</th>
							<th>Ngày tạo</th>
							<th>Tên</th>
							<th>Kiểu</th>
							<th>Giá</th>
							<th>Hoạt động</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$qry = $conn->query("SELECT * from `room_list` where delete_flag = 0 order by `name` asc ");
						while ($row = $qry->fetch_assoc()):
							?>
							<tr>
								<td class="text-center">
									<?php echo $i++; ?>
								</td>
								<td class="">
									<?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?>
								</td>
								<td class="">
									<p class="m-0 truncate-1">
										<?php echo $row['name'] ?>
									</p>
								</td>
								<td class="">
									<p class="m-0 truncate-1">
										<?php echo $row['type'] ?>
									</p>
								</td>
								<td class="text-right">
									<?= number_format($row['price'], 0, '.', '.') ?>đ/ngày
								</td>
								<td align="center">
									<button type="button"
										class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon"
										data-toggle="dropdown">
										Lựa chọn
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" href="./?page=rooms/view_room&id=<?= $row['id'] ?>"
											data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span>
											Xem</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item edit_data" href="javascript:void(0)"
											data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span>
											Chỉnh Sửa</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item delete_data" href="javascript:void(0)"
											data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span>
											Xoá</a>
									</div>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$('#create_new').click(function () {
			uni_modal("Thêm Phòng Mới", "rooms/manage_room.php", 'large')
		})
		$('.edit_data').click(function () {
			uni_modal("Cập Nhật Thông Tin Phòng", "rooms/manage_room.php?id=" + $(this).attr('data-id'), 'large')
		})
		$('.delete_data').click(function () {
			_conf("Bạn có chắc chắn xóa Phòng này vĩnh viễn không?", "delete_room", [$(this).attr('data-id')])
		})
		$('.view_data').click(function () {
			uni_modal("Chi tiết phòng", "rooms/view_room.php?id=" + $(this).attr('data-id'))
		})
		$('.table td, .table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
			columnDefs: [
				{ orderable: false, targets: 5 }
			],
		});
	})
	function delete_room($id) {
		start_loader();
		$.ajax({
			url: _base_url_ + "classes/Master.php?f=delete_room",
			method: "POST",
			data: { id: $id },
			dataType: "json",
			error: err => {
				console.log(err)
				alert_toast("Đã xảy ra lỗi.", 'error');
				end_loader();
			},
			success: function (resp) {
				if (typeof resp == 'object' && resp.status == 'success') {
					location.reload();
				} else {
					alert_toast("Đã xảy ra lỗi.", 'error');
					end_loader();
				}
			}
		})
	}
</script>