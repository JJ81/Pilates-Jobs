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

$email = $_SESSION['user'];

$query="select * from `cms_member` where `email`='$email';";
$row=$db->query($query);

$_SESSION['role']=$row[0]['role'];
$_SESSION['reg_type']=$row[0]['reg_type'];
$user_id=$row[0]['id'];


if($_SESSION['reg_type'] == 'P'){
    $query_license="select * from `cms_license` where `user_id`=$user_id;";
    $license=$db->query($query_license);

    // 개인이 지원한 이력을 조회한다.
    $apply_query
        ="select `cjh`.*, `cji`.`branch`, `cji`.`phone`, `cji`.`salary`, `cji`.`job_time`, `cji`.`job_type`, `cji`.`position`, " .
        "`cbi`.`business_name` as `branch_name`, `cbi`.`address` as `branch_address`, " .
        "`cm`.`homepage`, `cm`.`business_name`, `cm`.`business_number`, `cm`.`description` " .
        "from `cms_job_history` as `cjh` " .
        "left join `cms_job_info` as `cji` " .
        "on `cji`.`id` = `cjh`.`job_info` " .
        "left join `cms_business_info` as `cbi` " .
        "on `cbi`.`id` = `cji`.`branch` " .
        "left join `cms_member` as `cm` " .
        "on `cm`.`id` = `cbi`.`cm_id` " .
        "where `cjh`.`user_id`=$user_id " .
        "order by `cjh`.`id` desc;";
    $history=$db->query($apply_query);


}else if($_SESSION['reg_type'] == 'B'){
    $query_address="select * from `cms_business_info` where `cm_id`=$user_id;";
    $address=$db->query($query_address);

    $query_job_info=
        "select `cji`.* , `cbi`.`business_name`, `cbi`.`address` " .
        "from `cms_job_info` as `cji` " .
        "left join `cms_business_info` as `cbi` " .
        "on `cbi`.`id` = `cji`.`branch` " .
        "where `cji`.`user_id`=$user_id;";
    $job_info=$db->query($query_job_info);
}


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
                                    <?php for($i=0,$size=count($row);$i<$size;$i++) { ?>
                                        <?php if($row[$i]['reg_type'] == "B"){ ?>
                                            <!-- 기업회원인 경우 -->
                                            <div style="text-align: right;margin-bottom: 10px;">
                                                <a href="./modify_company.php" class="btn btn-primary">정보수정</a>
                                            </div>
                                            <table class="table table-client-info">
                                                <colgroup>
                                                    <col width="30%" />
                                                    <col width="70%" />
                                                </colgroup>
                                                <tr>
                                                    <td colspan="2" class="center section-title">기업 정보</td>
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
                                                    <th>이메일</th>
                                                    <td>
                                                        <?php echo $row[$i]['email']; ?>
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
                                                        <a href="#" class="btn btn-link btn-style-3">비밀번호 수정</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>전화번호</th>
                                                    <td>
                                                        <?php echo $row[$i]['phone']; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>회사소개</th>
                                                    <td>
                                                        <div style="white-space: pre-line;"><?php echo $row[$i]['description'] ?></div>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!-- 사업장 정보 -->
                                            <?php if(count($address) > 0){ ?>
                                                <table class="table tb-license table-client-info" style="border-top: none;">
                                                    <colgroup>
                                                        <col width="30%" />
                                                        <col width="70%" />
                                                    </colgroup>
                                                    <tr>
                                                        <td colspan="2" class="center section-title">
                                                            사업장 정보
                                                        </td>
                                                    </tr>
                                                    <?php for($i=0,$size=count($address);$i<$size;$i++){ ?>
                                                        <tr>
                                                            <td class="center"><?php echo $address[$i]['business_name']; ?></td>
                                                            <td><?php echo $address[$i]['address'];?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            <?php }?>

                                            <!-- 구인공고를 낸 정보 출력/입력/수정/삭제  -->
                                            <div style="text-align: right;padding: 10px 0;">
                                                <a href="./register_job_info.php" class="btn btn-sm btn-style3">구인정보추가</a>
                                            </div>

                                            <?php if(count($job_info) == 0) {?>
                                                <div class="center">
                                                    아직 등록된 구인 정보가 없습니다.
                                                </div>
                                            <?php } ?>

                                            <?php for($i=0,$size=count($job_info);$i<$size;$i++){ ?>
                                            <table class="table tb-license table-client-info">
                                                <colgroup>
                                                    <col width="30%" />
                                                    <col width="70%" />
                                                </colgroup>
                                                <tr>
                                                    <td colspan="2" class="center section-title">
                                                        구인 정보
                                                        <span class="pos-right">
                                                            <a href="./modify_job_info.php?job_info_id=<?php echo $job_info[$i]['id']; ?>" class="btn-modify-job-info">수정</a>&nbsp;&nbsp;
                                                            <a href="./response/res_delete_job_info.php?job_info_id=<?php echo $job_info[$i]['id']; ?>" class="btn-delete-job-info">삭제</a>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>사업장</th>
                                                    <td><?php echo $job_info[$i]['business_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>주소</th>
                                                    <td><?php echo $job_info[$i]['address']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>연락처</th>
                                                    <td><?php echo $job_info[$i]['phone']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>급여</th>
                                                    <td><?php echo $job_info[$i]['salary']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>근무시간</th>
                                                    <td>
                                                        <?php echo $job_info[$i]['job_time']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>근무형태</th>
                                                    <td><?php echo $job_info[$i]['job_type']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>직책</th>
                                                    <td><?php echo $job_info[$i]['position']; ?></td>
                                                </tr>
                                            </table>
                                            <?php } ?>


                                            <!-- TODO 지원자 리스트 출력 / 열람 -->

                                        <?php }else if($row[$i]['reg_type'] == "P"){ ?>
                                            <div style="text-align: right;margin-bottom: 10px;">
                                                <a href="./modify_member.php" class="btn btn-primary">정보수정</a>
                                            </div>
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
                                                        <a href="#" class="btn btn-link btn-style-3">비밀번호 변경</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>이메일</th>
                                                    <td>
                                                        <?php echo $row[$i]['email']; ?>
<!--                                                        <a href="#" class="btn btn-link btn-style-3">이메일 변경</a>-->
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
                                            </table>

                                            <!-- 자격사항 테이블 표기 -->
                                            <?php if(count($license) > 0){ ?>
                                                <table class="table tb-license table-client-info" style="margin-top: 20px;">
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


                                           <!-- 지원 이력 / 지원 취소 -->
                                            <table class="table tb-license table-client-info" style="margin-top: 20px;">
                                                <colgroup>
                                                    <col width="30%" />
                                                    <col width="50%" />
                                                    <col width="20%">
                                                </colgroup>
                                                <tr>
                                                    <td colspan="3" class="center section-title">
                                                        지원 이력
                                                    </td>
                                                </tr>
                                                <?php if(count($history) == 0){ ?>
                                                <tr>
                                                    <td colspan="3" class="center">아직 지원한 이력이 없습니다.</td>
                                                </tr>
                                                <?php } ?>

                                                <?php for($i=0,$size=count($history);$i<$size;$i++){ ?>
                                                <tr>
                                                    <td class="center"><?php echo $history[$i]['applied_dt']; ?></td>
                                                    <td><?php echo $history[$i]['business_name']; ?></td>
                                                    <th>
                                                        <a href="#" data-job-id="<?php echo $history[$i]['id']; ?>" class="btn-cancel-apply">지원취소</a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="mypage-job-desc">
                                                            지역 : <?php echo $history[$i]['branch_name']; ?>
                                                            <span class="split">|</span>
                                                            주소 : <?php echo $history[$i]['branch_address']; ?>
                                                            <span class="split">|</span>
                                                            급여 : <?php echo $history[$i]['salary']; ?>
                                                            <span class="split">|</span>
                                                            근무시간 : <?php echo $history[$i]['job_time']; ?>
                                                            <span class="split">|</span>
                                                            근무형태 : <?php echo $history[$i]['job_type']; ?>
                                                            <span class="split">|</span>
                                                            직책 : <?php echo $history[$i]['position']; ?>
                                                        </div>
                                                        <div>
                                                            <span>회사 소개</span>
                                                            <div style="white-space: pre-line;"><?php echo $history[$i]['description']; ?></div>
                                                            <p>
                                                                사업자등록번호 : <?php echo $history[$i]['business_number']; ?>
                                                                <span class="split">|</span>
                                                                연락처 : <?php echo $history[$i]['phone']; ?>
                                                                <span class="split">|</span>
                                                                홈페이지 : <?php echo $history[$i]['homepage']; ?>
                                                            </p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </table>
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
<script>
    var btnCancel = $('.btn-cancel-apply');
    btnCancel.bind('click', function (e) {
        e.preventDefault();

        var formData = new FormData();
        var config = {};

        var data = $(this).attr('data-job-id');

        if(!data){
            alert('잘못된 접근입니다.');
            return;
        }

        formData.append('job_id', data);

        axios.post('<?php echo ROOT;?>response/res_cancel_job.php', formData, config)
            .then(function (res) {
                // console.log(res);
                if(res.data.success){
                    alert(res.data.msg);
                    window.location.reload();
                }else{
                    alert(res.data.msg);
                }
            })
            .catch(function (err) {
                alert('지원취소처리가 실패되었습니다. 잠시 후에 다시 시도해주세요.');
                console.error(err);
            });

    });
</script>
</body>
</html>