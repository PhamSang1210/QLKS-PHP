<?php
require_once('../../config.php');
if (isset($_GET['id'])) {

    $qry = $conn->query("SELECT r.*,rr.name as room_name, rr.type as room_type from `reservation_list` r inner join `room_list` rr on r.room_id = rr.id where r.id = '{$_GET['id']}' ");

    // $qry trả về dữ liệu của MySQL 
    if ($qry->num_rows > 0) {
        $res = $qry->fetch_array();
        foreach ($res as $k => $v) {
            if (!is_numeric($k)) {
                $$k = $v;
            }
        }
    } else {
        echo '<script> alert("ID đặt phòng không xác định.");location.replace("./?page=reservations") </script>';
    }
} else {
    echo '<script> alert("Cần có ID đặt chỗ để xem trang này.");location.replace("./?page=reservations") </script>';
}
$train_group = ['', 'First Class', 'Economy'];
?>
<style>
    #uni_modal .modal-footer {
        display: none;
    }
</style>
<div class="container-fluid">
    <fieldset class="border-bottom">
        <legend class="text-muted">Chi tiết Đặt chỗ</legend>
        <div class="row">
            <div class="col-md-6">
                <dl>
                    <dt class="text-muted">Mã đặt chỗ</dt>
                    <dd class="pl-4">
                        <?= isset($code) ? $code : 'N/A' ?>
                    </dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl>
                    <dt class="text-muted">Trạng Thái</dt>
                    <dd class="pl-4">
                        <?php
                        switch ($status) {
                            case 0:
                                echo '<span class="rounded-pill badge badge-secondary col-6">Chưa giải quyết</span>';
                                break;
                            case 1:
                                echo '<span class="rounded-pill badge badge-primary col-6">Đã xác nhận</span>';
                                break;
                            case 2:
                                echo '<span class="rounded-pill badge badge-danger col-6">Đã hủy</span>';
                                break;
                        }
                        ?>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <dl>
                    <dt class="text-muted">Ngày nhận phòng</dt>
                    <dd class="pl-4">
                        <?= isset($check_in) ? date("F d, Y", strtotime($check_in)) : 'N/A' ?>
                    </dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl>
                    <dt class="text-muted">Ngày trả phòng</dt>
                    <dd class="pl-4">
                        <?= isset($check_out) ? date("F d, Y", strtotime($check_out)) : 'N/A' ?>
                    </dd>
                </dl>
            </div>
        </div>
    </fieldset>
    <fieldset class="border-bottom">
        <legend class="text-muted">Chi tiết phòng</legend>
        <div class="row">
            <div class="col-md-6">
                <dl>
                    <dt class="text-muted">Tên phòng</dt>
                    <dd class="pl-4">
                        <?= isset($room_name) ? $room_name : 'N/A' ?>
                    </dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl>
                    <dt class="text-muted">Loại phòng</dt>
                    <dd class="pl-4">
                        <?= isset($room_type) ? $room_type : 'N/A' ?>
                    </dd>
                </dl>
            </div>
        </div>
    </fieldset>

    <fieldset class="border-bottom">
        <legend class="text-muted">Chi tiết kỳ quan</legend>
        <div class="row">
            <div class="col-md-6">
                <dl>
                    <dt class="text-muted">Họ và tên</dt>
                    <dd class="pl-4">
                        <?= isset($fullname) ? ucwords($fullname) : 'N/A' ?>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <dl>
                    <dt class="text-muted">Liên hệ #</dt>
                    <dd class="pl-4">
                        <?= isset($contact) ? $contact : 'N/A' ?>
                    </dd>
                    <dt class="text-muted">Địa chỉ</dt>
                    <dd class="pl-4">
                        <?= isset($address) ? $address : 'N/A' ?>
                    </dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl>
                    <dt class="text-muted">Email</dt>
                    <dd class="pl-4">
                        <?= isset($email) ? $email : 'N/A' ?>
                    </dd>
                </dl>
            </div>
        </div>
    </fieldset>
    <div class="clear-fix my-2"></div>
    <div class="text-right">
        <button class="btn btn-sm btn-flat btn-primary" type="button" id="update_status"><i class="fa fa-edit"></i>
            Cập nhật trạng thái</button>
        <button class="btn btn-sm btn-flat btn-dark" type="button" data-dismiss="modal"><i class="fa fa-times"></i>
            Đóng</button>
    </div>
</div>

<script>

    $(function () {
        $('#update_status').click(function () {
            uni_modal("Cập nhật <b><?= isset($code) ? $code : "N/A" ?> Tình trạng đặt chỗ.</b>", "reservations/update_status.php?id=<?= isset($id) ? $id : "" ?>&status=<?= isset($status) ? $status : '' ?>")
        })
    })

</script>