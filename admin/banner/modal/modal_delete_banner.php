<!-- Modal -->
<div class="modal fade" id="modalDeleteBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo ROOT;?>admin/banner/response/res_delete_banner.php" method="post" class="form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">배너삭제</h5>
                    <button type="button" class="close btn-modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="center">
                        <img src="" alt="" class="thumbnail_preview" />
                    </div><br />
                    <div class="text-danger center">
                        위의 배너를 삭제하시겠습니까?
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="banner_id" class="banner_id" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
                    <button type="submit" class="btn btn-danger">삭제</button>
                </div>
            </form>
        </div>
    </div>
</div>