<?php

require_once('../../autoload.php');
require_once('../../commons/config.php');
require_once('../../commons/utils.php');
require_once('../../commons/session.php');
define('PAGE','NOTICE');

if(empty($_GET['id'])){
    AlertMsgAndRedirectTo(ROOT . 'admin/notice/list.php', '잘못된 접근입니다');
    exit;
}

$id=getDataByGet('id');

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query="select * from `cms_board_notice` where `id`=$id;";
$row= $db->query($query);

$db=null;

if(count($row) === 0){
    AlertMsgAndRedirectTo(ROOT . 'admin/notice/list.php', '작성된 글이 없습니다.');
    exit;
}


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
                            <h4>
                                <?php echo $row[0]['title']; ?>
                                <?php
                                if($row[0]['active'] == 0){
                                    echo '<span class="badge badge-danger">비활성화</span>';
                                }else{
                                    echo '<span class="badge badge-success">활성화</span>';
                                }
                                ?>
                            </h4>
                            <span class="pull-right">
                                <?php if($row[0]['active'] == 1){ ?>
                                    <form action="./response/res_inactive.php" method="post" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $row[0]['id'];?>" />
                                        <button type="submit" class="btn btn-warning btn-sm">비활성화</button>
                                    </form>
                                <?php }else{ ?>
                                    <form action="./response/res_active.php" method="post" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $row[0]['id'];?>" />
                                        <button type="submit" class="btn btn-success btn-sm">활성화</button>
                                    </form>
                                <?php } ?>
                                <a href="./modify.php?id=<?php echo $row[0]['id']; ?>" class="btn btn-danger btn-sm">수정</a>
                                <a href="./list.php" class="btn btn-sm btn-primary">목록으로</a>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>#ID</th>
                                        <td><?php echo $row[0]['id']; ?></td>
                                        <th>제목</th>
                                        <td><?php echo $row[0]['title']; ?></td>
                                        <th>공지일</th>
                                        <td><?php echo setDate($row[0]['created_dt']);?></td>
                                        <th>조회수</th>
                                        <td><?php echo separateCommaNumber($row[0]['hits']);?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8">
                                            <!-- TODO 개행관련, 기본 다지인 관련 재세팅이 필요 -->
                                            <div class="editHtmlArea" style="padding: 20px 0;font-size: 9pt;color: #000;line-height: 12px;">
                                                <?php echo $row[0]['contents'] ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="8">
                                            <?php if($row[0]['active'] == 1){ ?>
                                                <a href="#" class="btn btn-warning btn-sm">비활성화</a>
                                            <?php }else{ ?>
                                                <a href="#" class="btn btn-sm btn-success">활성화</a>
                                            <?php } ?>
                                            <a href="./modify.php?id=<?php echo $row[0]['id']; ?>" class="btn btn-danger btn-sm">수정</a>
                                            <a href="./list.php" class="btn btn-sm btn-primary">목록으로</a>
                                        </td>
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
</body>
</html>


<!--<!doctype html>-->
<!--<html lang="ko">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">-->
<!--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
<!--    <title></title>-->
<!--</head>-->
<!---->
<!--<body>-->
<!---->
<!---->
<!--    <div class="container">-->
<!--        --><?php //echo $row[0]['contents'] ?>
<!--    </div>-->
<!---->
<!---->
<!--</body>-->
<!--</html>-->