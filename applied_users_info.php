<?php

// TODO 조건!!
// TODO 조회 결과가 없거나

require_once('./autoload.php');
require_once('./commons/config.php');
require_once('./commons/utils.php');
require_once('./commons/session.php');


if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT. 'index.php', '로그인을 해야 합니다.');
    exit;
}

if(empty($_SESSION['role'])){
    AlertMsgAndRedirectTo(ROOT. 'mypage.php', '기업 회원만 접근이 가능합니다.');
    exit;
}

if(empty($_POST['applied_users']) or empty($_POST['company_id'])){
    AlertMsgAndRedirectTo(ROOT. 'mypage.php', '잘못된 접근입니다.');
    exit;
}


$user_id = $_SESSION['user_id'];
$applied_users=getDataByPost('applied_users');
$company_id=getDataByPost('company_id');

if($user_id !== $company_id){
    AlertMsgAndRedirectTo(ROOT. 'mypage.php', '잘못된 접근입니다.');
    exit;
}

$row=null;
$license=null;


use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

// 지원한 유저의 리스트 조회
$query_lists="select * from `cms_member` where `id` IN ($applied_users);";
$row=$db->query($query_lists);


// 지원자 자격증을 모두 리스트로 내려줌
$query_license_info = "select * from `cms_license` where `user_id` IN ($applied_users) order by `id` asc;";
$license=$db->query($query_license_info);


$db=null;
?>

<!doctype html>
<html lang="ko">
<head>

    <?php require_once('./inc/head.php') ;?>

    <title>필라하우스 Pilahaus</title>
</head>

<body>

<div class="loader"></div>

<!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->
<div id="wrapper" class="wrapper-container">
    <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->
    <nav id="mobile-advanced" class="mobile-advanced"></nav>

    <?php require_once ('./inc/header.php');?>

    <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
    <div class="breadcrumbs-wrap">
        <div class="container">
            <h1 class="page-title">지원자 정보 열람</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li>Users Info.</li>
            </ul>
        </div>
    </div>
    <!-- - - - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
    <div id="content" class="page-content-wrap">
        <div class="container">
            <div class="row">
                <main id="main" class="col-lg-12 col-md-12">
                    <div class="content-element5">
                        <div class="entry-box">
                            <div class="client-info-wrp">

                                <?php for($i=0,$size=count($row);$i<$size;$i++) { ?>
                                    <?php if($row[$i]['reg_type'] == "P"){ ?>
                                        <table class="table table-client-info" style="margin-top: 20px;">
                                            <colgroup>
                                                <col width="30%" />
                                                <col width="70%" />
                                            </colgroup>
                                            <tr>
                                                <td colspan="2" class="center section-title">
                                                    지원자
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>성명</th>
                                                <td><?php echo $row[$i]['realname']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>이메일</th>
                                                <td>
                                                    <?php echo $row[$i]['email']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>생년월일</th>
                                                <td><?php echo $row[$i]['birthday']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>성별</th>
                                                <td>
                                                    <?php if($row[$i]['gender'] == 'F'){ echo '여성';}else{ echo '남성';} ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>전화번호</th>
                                                <td>
                                                    <?php echo $row[$i]['phone']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>프로필</th>
                                                <td>
                                                    <img src="<?php echo ROOT; ?>upload/<?php echo $row[$i]['thumbnail']; ?>" alt="" width="150" onerror="this.src='https://www.catholic.edu/assets/images/default_profile.jpg'" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>이력사항</th>
                                                <td>
                                                    <div style="white-space: pre-line;"><?php echo $row[$i]['description']; ?></div>
                                                </td>
                                            </tr>

                                        <!-- 자격사항 테이블 표기 -->
                                        <?php if(count($license) > 0){ ?>
                                            <tr>
                                                <td colspan="2" class="center section-title">
                                                    자격 사항
                                                </td>
                                            </tr>
                                            <?php for($j=0,$size2=count($license);$j<$size2;$j++){ ?>
                                                <?php if($license[$j]['user_id'] == $row[$i]['id']){ ?>
                                                <tr>
                                                    <td class="center"><?php echo $license[$j]['taken_dt']; ?></td>
                                                    <td><?php echo $license[$j]['license_name'];?></td>
                                                </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </table>
                                        <?php }?>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </main>
            </div> <!-- // end row -->
        </div> <!-- // end container -->
    </div> <!-- // end content -->
    <!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->

    <?php require_once ('./inc/footer.php');?>
    <?php require_once ('./popup/sign.php');?>
    <?php require_once ('./popup/login.php');?>
</div>

<!-- - - - - - - - - - - - end Wrapper - - - - - - - - - - - - - - -->
<?php require_once ('./inc/tail.php');?>
</body>
</html>