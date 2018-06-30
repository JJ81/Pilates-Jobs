<?php

require_once ('../../autoload.php');
require_once('../../commons/config.php');
require_once('../../commons/utils.php');
require_once('../../commons/session.php');
define('PAGE','NOTICE');

if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo('/admin/login.php', '로그인이 필요합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo('/index.php', '관리자만 접근할 수 있는 페이지입니다.');
    exit;
}

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query='select * from `cms_banner` order by `order` asc;';
$rows = $db->query($query);
$db=null;

// var_dump($rows);
$top_count=0;
$btm_count=0;

?>


<?php require_once ('../inc/head.php');?>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <?php require_once ('../inc/header.php');?>
    <?php require_once ('../inc/leftmenu.php');?>

    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">배너관리</h3></div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">배너관리</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->

        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title clearfix">
                            <h4>배너관리</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table banner-management">
                                    <tr>
                                        <td>
                                            <?php for($i=0,$size=count($rows);$i<$size;$i++){
                                                if($rows[$i]['type'] == 'T'){
                                                    $top_count++; ?>
                                                <div>
                                                    <img src="<?php echo ROOT; ?>upload/<?php echo $rows[$i]['thumbnail'];?>" alt="" onerror="this.src='<?php echo ROOT; ?>assets/images/guide_top_ban.jpg'" />
                                                </div>
                                                <div>
                                                    <a href="<?php echo $rows[$i]['link'];?>" target="_blank"><?php echo $rows[$i]['link'];?></a>
                                                </div>
                                                <?php }
                                             } ?>

                                            <?php if($top_count == 0){ ?>
                                                <div>
                                                    <img src="<?php echo ROOT; ?>assets/images/guide_top_ban.jpg" alt="" />
                                                </div>
                                                <div class="center">
                                                    상단 배너가 아직 등록되지 않았습니다.
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            상위 배너 (권장사이즈 1000*120)
                                            <?php if($top_count == 0){ ?>
                                                <button class="btn btn-sm btn-primary pull-right">
                                                    <i class="fas fa-plus"></i>
                                                    상단배너등록
                                                </button>
                                            <?php }else{ ?>
                                                <span class="pull-right">
                                                    <button class="btn btn-warning btn-sm">
                                                        <i class="fas fa-eraser"></i>
                                                        상단배너수정
                                                    </button>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                        상단배너삭제
                                                    </button>
                                                </span>
                                            <?php } ?>
                                        </th>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="clearfix page-mid-header center">
                                                <span>중앙배너 (권장사이즈 255*255)</span>
                                                <button class="btn btn-sm btn-info pull-right" data-toggle="modal" data-target="#modalAddBanner">배너추가</button>
                                            </div>

                                            <div class="row mid-banner">
                                                <!-- loop -->
                                                <?php for($i=0,$size=count($rows);$i<$size;$i++){
                                                    if($rows[$i]['type'] == 'M'){ ?>
                                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                                        <div class="img">
                                                            <img src="<?php echo ROOT; ?>upload/<?php echo $rows[$i]['thumbnail'];?>" alt="" onerror="this.src='<?php echo ROOT; ?>assets/images/guide_banner.jpg'" />
                                                        </div>
                                                        <div class="link">
                                                            <a href="<?php echo $rows[$i]['link'];?>" target="_blank"><?php echo $rows[$i]['link'];?></a>
                                                        </div>
                                                        <div class="code">
                                                            <?php echo $rows[$i]['title'];?>
                                                        </div>
                                                        <div class="btnArea">
                                                            <button class="btn btn-warning btn-sm js-btn-modify-mid-banner" data-banner-id="<?php echo $rows[$i]['id'];?>" data-title="<?php echo $rows[$i]['title'];?>" data-link="<?php echo $rows[$i]['link'];?>">
                                                                <i class="fas fa-eraser"></i>
                                                                수정
                                                            </button>

                                                            <button class="btn btn-sm btn-danger js-btn-delete-mid-banner" data-banner-id="<?php echo $rows[$i]['id'];?>" data-thumbnail="<?php echo ROOT; ?>upload/<?php echo $rows[$i]['thumbnail'];?>">
                                                                <i class="fas fa-trash"></i>
                                                                삭제
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php }
                                                } ?>
                                                <!-- // loop -->
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php for($i=0,$size=count($rows);$i<$size;$i++){
                                                if($rows[$i]['type'] == 'B'){ $btm_count++; ?>
                                                    <div>
                                                        <img src="<?php echo ROOT; ?>upload/<?php echo $rows[$i]['thumbnail'];?>" alt="" onerror="this.src='<?php echo ROOT; ?>assets/images/guide_bottom_ban.jpg'" />
                                                    </div>
                                                    <div>
                                                        <a href="<?php echo $rows[$i]['link'];?>" target="_blank"><?php echo $rows[$i]['link'];?></a>
                                                    </div>
                                                <?php }
                                            } ?>

                                            <?php if($btm_count == 0){ ?>
                                                <div>
                                                    <img src="<?php echo ROOT; ?>assets/images/guide_top_ban.jpg" alt="" />
                                                </div>
                                                <div class="center">
                                                    하단 배너가 아직 등록되지 않았습니다.
                                                </div>
                                            <?php } ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>
                                            하위배너 (권장사이즈 1000*120)
                                            <?php if($btm_count == 0){ ?>
                                                <button class="btn btn-sm btn-primary pull-right">
                                                    <i class="fas fa-plus"></i>
                                                    하단배너등록
                                                </button>
                                            <?php }else{ ?>
                                                <span class="pull-right">
                                                    <button class="btn btn-warning btn-sm">
                                                        <i class="fas fa-eraser"></i>
                                                        하단배너수정
                                                    </button>&nbsp;
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                        하단배너삭제
                                                    </button>
                                                </span>
                                            <?php } ?>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
            </div>
            <!-- /# row -->
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->

        <?php require_once ('../inc/footer.php'); ?>
    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->

<?php require_once ('../inc/foot.php'); ?>

<?php require_once ('./modal/modal_add_banner.php'); ?>
<?php require_once ('./modal/modal_delete_banner.php'); ?>
<?php require_once ('./modal/modal_modify_mid_banner.php'); ?>

<script>
    (function ($) {
        var btnDeleteMidBanner = $('.js-btn-delete-mid-banner');
        btnDeleteMidBanner.bind('click', function () {
            var id = $(this).attr('data-banner-id');
            var thumbnail = $(this).attr('data-thumbnail');
            var target=$('#modalDeleteBanner');

            target.find('.thumbnail_preview').attr('src', thumbnail);
            target.find('.banner_id').val(id);
            target.modal('show');
        });

        var BtnModifyMidBanner = $('.js-btn-modify-mid-banner');
        BtnModifyMidBanner.bind('click', function () {
            var id = $(this).attr('data-banner-id');
            var link = $(this).attr('data-link');
            var title = $(this).attr('data-title');
            var target=$('#modalModifyBanner');

            target.find('.banner_id').val(id);
            target.find('.code-name').val(title);
            target.find('.link-name').val(link);
            target.modal('show');
        });
    }(jQuery));
</script>
</body>
</html>