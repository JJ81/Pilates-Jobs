<!-- Modal -->
<div class="modal fade" id="modalAddBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo ROOT;?>admin/banner/response/res_modal_add_banner.php" method="post" class="form" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">배너추가</h5>
                    <button type="button" class="close btn-modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="코드명" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="link" class="form-control" placeholder="링크" required />
                        </div>
                        <div class="form-group">
                            <input type="file" name="thumbnail" class="form-control" accept="image/*" required />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
                    <button type="submit" class="btn btn-primary">저장</button>
                </div>
            </form>
        </div>
    </div>
</div>