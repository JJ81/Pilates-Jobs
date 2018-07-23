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

$query='select * from `cms_board_notice` order by `id` desc limit 0, 1000;';
$rows = $db->query($query);
$db=null;


// TODO dumdum에서 페이지네이션 로직 가져와서 붙여넣을 것


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
                <h3 class="text-primary">공지사항</h3></div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Notice</li>
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
                            <h4>공지사항</h4>
                            <a href="<?php echo ROOT;?>admin/notice/write.php" class="btn btn-sm btn-info pull-right">글쓰기</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>제목</th>
                                        <th>상태</th>
                                        <th>공지일</th>
                                        <th>조회수</th>
                                        <th>액션</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($rows) == 0){ ?>
                                        <tr>
                                            <td colspan="6">No Data.</td>
                                        </tr>
                                    <?php }else{ ?>
                                        <?php foreach ($rows as $r) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $r['id'];?></th>
                                                <td class="color-primary"><?php echo $r['title'];?></td>
                                                <td>
                                                    <?php
                                                        if($r['active'] == 0){
                                                            echo '<span class="badge badge-danger">비활성화</span>';
                                                        }else{
                                                            echo '<span class="badge badge-success">활성화</span>';
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo setDate($r['created_dt']);?>
                                                </td>
                                                <td>
                                                    <?php echo separateCommaNumber($r['hits']);?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo ROOT;?>admin/notice/view.php?id=<?php echo $r['id'];?>" class="btn btn-sm btn-primary">보기</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>

                                    </tbody>
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
<?php require_once ('../modal/modal_modify_pass.php'); ?>
</body>
</html>