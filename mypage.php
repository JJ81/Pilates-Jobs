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
//$query =
//    "select * from `cms_member` as `cm` " .
//    "left join `cms_business_info` as `cbi` " .
//    "on `cbi`.`cm_id` = `cm`.`id` " .
//    "where `cm`.`email`='$email';";

$query="select * from `cms_member` where `email`='$email';";
$row=$db->query($query);

$_SESSION['role']=$row[0]['role'];
$_SESSION['reg_type']=$row[0]['reg_type'];

$user_id=$row[0]['id'];

// 자격증 사항 조회하기
$query_license="select * from `cms_license` where `user_id`=$user_id;";
$license=$db->query($query_license);

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
                                <?php if($_SESSION['role'] == 'U'){ ?>
                                <!-- 간편가입자 정보 출력 -->
                                <div class="client-simple-info center">
                                    <p>
                                        <strong>개인 회원</strong> 혹은 <strong>기업 회원</strong>으로 정식 가입을 하시면<br />
                                        더 많은 혜택을 누릴 수가 있습니다.
                                    </p>
                                    <div>
                                        <a href="<?php echo ROOT;?>register_member.php" class="btn btn-big">개인회원</a> &nbsp;&nbsp;
                                        <a href="<?php echo ROOT;?>register_company.php" class="btn btn-big btn-style-3">기업회원</a>
                                    </div>

                                </div>
                                <?php }else if($_SESSION['role'] == 'C'){ ?>
<!--                                    <div style="text-align: right;margin-bottom: 10px;">-->
<!--                                        <a href="#" class="btn btn-primary">정보수정</a>-->
<!--                                    </div>-->

                                    <?php for($i=0,$size=count($row);$i<$size;$i++) { ?>
                                        <!-- 개인회원인 경우 -->
                                        <?php if($row[$i]['reg_type'] == "B"){ ?>
                                            <!-- 기업회원인 경우 -->
                                            <table class="table table-client-info">
                                                <colgroup>
                                                    <col width="30%" />
                                                    <col width="70%" />
                                                </colgroup>
                                                <tr>
                                                    <td colspan="2" class="center section-title">기업 정보</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        상호명
                                                    </th>
                                                    <td><?php echo $row[$i]['business_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>상호로고</th>
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
                                                        기업회원
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
                                                    <th>전화번호</th>
                                                    <td>
                                                        <?php echo $row[$i]['phone']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>사업자번호</th>
                                                    <td>849-05-00337</td>
                                                </tr>
                                                <tr>
                                                    <th>사업자등록증</th>
                                                    <td>
                                                        <img src="" alt="" />
                                                        <a href="#" class="btn">사업자등록증 변경</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>사업장 주소</th>
                                                    <td>
                                                        <?php echo $row[$i]['address'] ?>
                                                        <a href="#" class="btn">주소변경</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>상호명</th>
                                                    <td><?php echo $row[$i]['business_name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>사업자번호</th>
                                                    <td><?php echo $row[$i]['business_number'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>회사소개</th>
                                                    <td>
                                                        <div style="white-space: pre-line;"><?php echo $row[$i]['description'] ?></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">회사주소</th>
                                                    <td>
                                                        <div>서울시 노원구 상계동</div>
                                                        <a href="#" class="btn">주소지 변경</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php }else if($row[$i]['reg_type'] == "P"){ ?>
                                            <table class="table table-client-info">
                                                <colgroup>
                                                    <col width="30%" />
                                                    <col width="70%" />
                                                </colgroup>
                                                <tr>
                                                    <td colspan="2" class="center section-title">개인 정보</td>
                                                </tr>
                                                <tr>
                                                    <th>성명</th>
                                                    <td><?php echo $row[$i]['realname']; ?></td>
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
                                                    <th>최초가입일</th>
                                                    <td><?php echo $row[$i]['created_dt']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>비밀번호</th>
                                                    <td>
                                                        **********
                                                        <a href="#" class="btn btn-link btn-style-3">비밀번호 변경</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>이메일</th>
                                                    <td>
                                                        <?php echo $row[$i]['email']; ?>
                                                        <a href="#" class="btn btn-link btn-style-3">이메일 변경</a>
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
                                                        <a href="#" class="btn btn-link btn-style-3">연락처 변경</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>프로필</th>
                                                    <td>
                                                        <img src="<?php echo ROOT; ?>upload/<?php echo $row[$i]['thumbnail']; ?>" alt="" width="150" onerror="this.src='https://www.catholic.edu/assets/images/default_profile.jpg'" />
                                                        <a href="#" class="btn btn-link btn-style-3">사진 변경</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>이력사항</th>
                                                    <td>
                                                        <div style="white-space: pre-line;"><?php echo $row[$i]['description']; ?></div>
                                                        <a href="#" class="btn btn-link btn-style-3">이력사항 수정</a>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!-- 자격사항 테이블 표기 -->
                                            <?php if(count($license) > 0){ ?>
                                                <div style="margin-top: 10px;text-align: right;">
                                                    <a href="#" class="btn btn-style-3">자격정보수정</a>
                                                </div>
                                                <table class="table tb-license table-client-info" style="margin-top: 10px;">
                                                    <colgroup>
                                                        <col width="30%" />
                                                        <col width="70%" />
                                                    </colgroup>
                                                    <tr>
                                                        <td colspan="2" class="center section-title">
                                                            자격 사항
                                                        </td>
                                                    </tr>
                                                    <?php for($i=0,$size=count($license);$i<$size;$i++){ ?>
                                                    <tr>
                                                        <td class="center"><?php echo $license[$i]['taken_dt']; ?></td>
                                                        <td><?php echo $license[$i]['license_name'];?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                            <?php }?>


                                           <!-- TODO 지원이력-->

                                        <?php } ?>
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