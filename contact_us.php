<style>
    .connact__container {
        position: relative;
        right: -990px;
        top: 150px;
        z-index: 2;
    }

    .conntact__thumb_height {
        height: 100px;
        width: 100px;
    }
</style>
<div class="col-12">
    <div class="connact__container">
        <img class="conntact__thumb_height" src="uploads/blogb-decor.png" alt="">
    </div>
    <div class="row my-5 ">
        <div class="col-md-5">
            <div class="card card-outline card-navy rounded-0 shadow">
                <div class="card-header">
                    <h4 class="card-title">Thông Tin Liên Hệ</h4>
                </div>
                <div class="card-body rounded-0">
                    <dl>
                        <dt class="text-muted"><i class="fa fa-envelope"></i> Email</dt>
                        <dd class="pl-4">
                            <?= $_settings->info('email') ?>
                        </dd>
                        <dt class="text-muted"><i class="fa fa-phone"></i> Liên Hệ #</dt>
                        <dd class="pl-4">
                            <?= $_settings->info('contact') ?>
                        </dd>
                        <dt class="text-muted"><i class="fa fa-map-marked-alt"></i> Địa Điểm</dt>
                        <dd class="pl-4">
                            <?= $_settings->info('address') ?>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card rounded-0 card-outline card-navy shadow">
                <div class="card-body rounded-0">
                    <h2 class="text-center">Nhắn tin cho chúng tôi</h2>
                    <center>
                        <hr class="bg-navy border-navy w-25 border-2">
                    </center>
                    <?php if ($_settings->chk_flashdata('pop_msg')): ?>
                        <div class="alert alert-success">
                            <i class="fa fa-check mr-2"></i>
                            <?= $_settings->flashdata('pop_msg') ?>
                        </div>
                        <script>
                            $(function () {
                                $('html, body').animate({ scrollTop: 0 })
                            })
                        </script>
                    <?php endif; ?>
                    <form id="message-form">
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm form-control-border"
                                    id="fullname" name="fullname" required placeholder="VD:Nguyen Van A">
                                <small class="px-3 text-muted">Họ và tên</small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm form-control-border" id="contact"
                                    name="contact" required placeholder="xxxxxxxxxxxxx">
                                <small class="px-3 text-muted">Liên Hệ #</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="email" class="form-control form-control-sm form-control-border" id="email"
                                    name="email" required placeholder="xxxxxx@xxxxxx.xxx">
                                <small class="px-3 text-muted">Email</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <small class="text-muted">Tin nhắn</small>
                                <textarea name="message" id="message" rows="4"
                                    class="form-control form-control-sm rounded-0" required
                                    placeholder="Write your message here"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 text-center">
                                <button class="btn btn-primary rounded-pill col-5">Gửi tin nhắn</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#message-form').submit(function (e) {
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
            el.addClass("pop-msg alert")
            el.hide()
            start_loader();
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=save_message",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error: err => {
                    console.log(err)
                    alert_toast("An error occured", 'error');
                    end_loader();
                },
                success: function (resp) {
                    if (resp.status == 'success') {
                        location.reload();
                    } else if (!!resp.msg) {
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    } else {
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html, body').animate({ scrollTop: 0 }, 'fast')
                    end_loader();
                }
            })
        })
    })
</script>