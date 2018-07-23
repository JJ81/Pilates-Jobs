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

$query='select * from `cms_member` where `role` != \'A\' order by `id` desc limit 0, 5000;';
$rows = $db->query($query);

$query_count="select count(*) as total from `cms_member` where `role` != 'A';";
$total = $db->query($query_count);

$db=null;

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
                <h3 class="text-primary">회원관리</h3></div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Member</li>
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
                            <h4>회원정보 <small>(총 <?php echo $total[0][total]; ?>명)</small></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>이름</th>
                                        <th>유형</th>
                                        <th>가입일</th>
                                        <th>이메일</th>
                                        <th style="text-align: center;">전화번호</th>
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
                                                <td>
                                                    <?php
                                                    if($r['reg_type'] == 'B'){
                                                        if ($r['business_name']) {
                                                            echo $r['business_name'];
                                                        } else {
                                                            echo '-';
                                                        }
                                                    }else if($r['reg_type'] == 'P') {
                                                        if ($r['realname']) {
                                                            echo $r['realname'];
                                                        } else {
                                                            echo '-';
                                                        }
                                                    }else{
                                                        echo '-';
                                                    }
                                                    ;?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($r['role'] == 'U') {
                                                        echo '임시';
                                                    }else{
                                                        if($r['reg_type'] == 'P'){
                                                            echo '개인';
                                                        } else if($r['reg_type'] == 'B'){
                                                            echo '기업';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo setDate($r['created_dt']);?>
                                                </td>
                                                <td>
                                                    <?php echo $r['email'];?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if($r['phone']) {
                                                        echo $r['phone'];
                                                    }else{
                                                        echo '-';
                                                    }
                                                    ?>
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