<div class="modal fade" id="modalModifyPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo ROOT;?>admin/response/res_admin_reset_pass.php" method="post" class="form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">비밀번호 변경</h5>
                    <button type="button" class="close btn-modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="password" class="form-control form-admin-pass" name="password" placeholder="변경할 비밀번호" autofocus />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-admin-pass" name="re_password" placeholder="변경할 비밀번호 확인" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
                    <button type="submit" class="btn btn-primary">변경하기</button>
                </div>
            </form>
        </div>
    </div>
</div>