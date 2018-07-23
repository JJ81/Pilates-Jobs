<?php
require_once('./autoload.php');
require_once('./commons/config.php');
require_once('./commons/utils.php');
require_once('./commons/session.php');


if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT. 'index.php', '로그인을 해야 합니다.');
    exit;
}

// 사업장 정보를 가져온다.

$user_id=$_SESSION['user_id'];

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query="select * from `cms_business_info` where `cm_id`=$user_id;";
$branch=$db->query($query);


?>
<!doctype html>
<html lang="ko">
<head>

<?php require_once('./inc/head.php') ;?>
    
<title>필라하우스 Pilahaus, 구인정보등록하기</title>
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
            <h1 class="page-title">구인정보등록</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li>구인정보등록</li>
                <li>Job Info.</li>
            </ul>
        </div>
    </div>
    <!-- - - - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
    <div id="content" class="page-content-wrap">
        <div class="container">
            <div class="row">
                <main id="main" class="col-lg-12 col-md-12">
                    <div class="content-element5 register-private-member">
                        <div class="entry-box">
                            <form action="./response/res_register_job.php" method="post" class="form-private-register" enctype="multipart/form-data">
                                <table class="table table-private-info">
                                    <colgroup>
                                        <col width="30%" />
                                        <col width="70%" />
                                    </colgroup>
                                    <tr>
                                        <th>
                                            사업장
                                        </th>
                                        <td>
                                            <select name="branch" class="field-address" required>
                                                <option value="">사업장을 선택하세요.</option>
                                                <?php for($i=0,$size=count($branch);$i<$size;$i++){ ?>
                                                    <option value="<?php echo $branch[$i]['id']; ?>"><?php echo $branch[$i]['business_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>연락처</th>
                                        <td>
                                            <input type="tel" name="phone" class="field-phone" placeholder="전화 번호를 입력하세요." required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>급여</th>
                                        <td>
                                            <input type="text" name="salary" class="field-salary" placeholder="급여를 입력하세요." required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>근무시간</th>
                                        <td>
                                            <input type="text" name="time" class="field-time" placeholder="근무시간을 입력해주세요." required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>근무형태</th>
                                        <td>
                                            <input type="text" name="job_type" class="field-job-type" placeholder="근무형태 (1:1 , 그룹 , 데스크 , 운영)" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>직책</th>
                                        <td>
                                            <input type="text" name="position" class="field-position" placeholder="직책 (견습 , 일반 , 매니저 , 원장)" required />
                                        </td>
                                    </tr>
                                </table>
                                <div class="center" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-big btn-style-1">등록</button>
                                    <a href="./mypage.php" class="btn btn-big btn-style-2">취소</a>
                                </div>
                            </form>
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