<?php
if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM `room_list` where id = '{$_GET['id']}'");
    if ($qry->num_rows > 0) {
        $res = $qry->fetch_array();
        foreach ($res as $k => $v) {
            if (!is_numeric($k))
                $$k = $v;
        }
    }
}
?>

<style>
    #banner-img {
        object-fit: scale-down;
        object-position: center center;
    }
</style>
<div class="card card-outline card-primary rounded-0 shadow mb-5">
    <div class="card-header">
        <h4 class="card-title"><b>Chi tiết phòng</b></h4>
        <div class="card-tools">
            <button class="btn btn-primary btn-sm btn-flat" type="button" id="edit_room"><i class="fa fa-edit"></i>
                Chỉnh sửa chi tiết</button>
            <button class="btn btn-danger btn-sm btn-flat" type="button" id="delete_room"><i class="fa fa-trash"></i>
                Xoá</button>
            <a class="btn btn-light border btn-sm btn-flat" href="./?page=rooms"><i class="fa fa-angle-left"></i> Trở
                lại danh sách</a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12">
                    <img src="<?= validate_image(isset($image_path) ? $image_path : "") ?>" alt="Room Image"
                        class="img-thumbnail bg-gradient-dark" id="banner-img">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <dl>
                        <dt class="text-muted">Tên Phòng</dt>
                        <dd class='pl-4 fs-4 fw-bold'>
                            <?= isset($name) ? $name : 'N/A' ?>
                        </dd>
                        <dt class="text-muted">Loại phòng</dt>
                        <dd class='pl-4 fs-4 fw-bold'>
                            <?= isset($type) ? $type : 'N/A' ?>
                        </dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <dl>
                        <dt class="text-muted">Giá</dt>
                        <dd class='pl-4 fs-4 fw-bold'>
                            <?= isset($price) ? number_format($price, 2) : '0.00' ?>
                        </dd>
                        <dt class="text-muted">Trạng thái</dt>
                        <dd class='pl-4 fs-4 fw-bold'>
                            <?php
                            if (isset($status)) {
                                switch ($status) {
                                    case '1':
                                        echo '<span class="px-4 badge badge-success rounded-pill">Kích Hoạt</span>';
                                        break;
                                    case '0':
                                        echo '<span class="px-4 badge badge-danger rounded-pill">Chưa Kích Hoạt</span>';
                                        break;
                                }
                            }
                            ?>

                        </dd>
                    </dl>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <small class="text-muted">Mô tả</small>
                    <div>
                        <?= isset($description) ? html_entity_decode($description) : "N/A" ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function delete_room() {
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=delete_room",
            method: "POST",
            data: { id: '<?= isset($id) ? $id : '' ?>' },
            dataType: "json",
            error: err => {
                console.log(err)
                alert_toast("Đã xảy ra lỗi.", 'error');
                end_loader();
            },
            success: function (resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    location.href = './?page=rooms';
                } else {
                    alert_toast("Đã xảy ra lỗi.", 'error');
                    end_loader();
                }
            }
        })
    }
    $(function () {
        $('#edit_room').click(function () {
            uni_modal("Cập nhật chi tiết phòng", "rooms/manage_room.php?id=<?= isset($id) ? $id : '' ?>", 'large')
        })
        $('#delete_room').click(function () {
            _conf("Bạn có chắc chắn xóa Phòng này vĩnh viễn không?", "delete_room", [])
        })
    })
</script>