<?php
require_once('./autoload.php');
require_once('./commons/config.php');
require_once('./commons/utils.php');
require_once('./commons/session.php');


if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT. 'index.php', '로그인을 해야 합니다.');
    exit;
}


//if($_SESSION['user'] === 'C'){
//    AlertMsgAndRedirectTo(ROOT. 'index.php', '로그인을 해야 합니다.');
//    exit;
//}


use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

// TODO 사업장 정보가 여러 개일 경우 테스트를 해볼 것

// TODO ROLE이 C일 경우에만 아래 쿼리를 조회할 수 있도록 한다.

// TODO "정식 가입을 하고 더 많은 혜택을 누리세요." => 정식 가입을 통한 디비 수집을 유도할 수 있도록 한다.



$email = $_SESSION['user'];
$query =
    "select * from `cms_member` as `cm` " .
    "left join `cms_business_info` as `cbi` " .
    "on `cbi`.`cm_id` = `cm`.`id` " .
    "where `cm`.`email`='j.lee@jcorporationtech.com';";
$row=$db->query($query);

$db=null;
?>

<!doctype html>
<html lang="ko">
<head>

    <?php require_once('./inc/head.php') ;?>

    <title>Yoga</title>
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
            <h1 class="page-title">My Page</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li>My Page</li>
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
                                <div style="text-align: right;margin-bottom: 10px;">
                                    <!-- TODO role=U 일 경우 정보를 등록할 수 있도록 하고 정보가 등록이 된 이후에는 U를 C로 업데이트 한다. -->
                                    <?php if($_SESSION['role']=='U') { ?>
                                        <a href="#" class="btn btn-primary">정보등록</a>
                                    <?php }else{ ?>
                                        <a href="#" class="btn btn-primary">정보수정</a>
                                    <?php } ?>
                                </div>

                                <?php for($i=0,$size=count($row);$i<$size;$i++) { ?>
                                <table class="table table-client-info">
                                    <colgroup>
                                        <col width="30%" />
                                        <col width="70%" />
                                    </colgroup>
                                    <tr>
                                        <td colspan="2" class="center section-title">개인 정보</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            이름(실명)
                                        </th>
                                        <td><?php echo $row[$i]['realname'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>닉네임</th>
                                        <td><?php echo $row[$i]['nickname'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>대표사진(프로필)</th>
                                        <td>
                                            <img src="https://www.catholic.edu/assets/images/default_profile.jpg" alt="" width="100" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>이메일</th>
                                        <td>
                                            <?php echo $row[$i]['email']; ?>
                                            <a href="#" class="btn">이메일 인증</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>가입유형</th>
                                        <td>
                                            <?php if($row[$i]['reg_type'] == 'B'){ ?>
                                                기업회원
                                            <?php }else{ ?>
                                                개인회원
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>비밀번호</th>
                                        <td>
                                            **********
                                            <a href="#" class="btn btn-link">비밀번호 수정</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>연락처</th>
                                        <td>
                                            <?php echo $row[$i]['phone']; ?>
                                            <a href="#" class="btn">본인인증</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>주소</th>
                                        <td>
                                            <?php echo $row[$i]['address'] ?>
                                            <a href="#" class="btn">주소변경</a>
                                        </td>
                                    </tr>
                                    <?php if ($row[$i]['reg_type'] == 'B'){ ?>
                                    <tr>
                                        <td colspan="2" class="center section-title">사업자 정보</td>
                                    </tr>
                                    <!-- 가입유형이 사업자인 경우 -->
                                    <tr>
                                        <th>상호명</th>
                                        <td>제이코퍼레이션</td>
                                    </tr>
                                    <tr>
                                        <th>사업자번호</th>
                                        <td>849-05-00337</td>
                                    </tr>
                                    <tr>
                                        <th>사업장명</th>
                                        <td>본부</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            사업장 주소
                                        </th>
                                        <td>
                                            경기도 남양주시 별내동
                                            <a href="#" class="btn">사업장 추가</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
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
