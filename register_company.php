<?php
require_once('./autoload.php');
require_once('./commons/config.php');
require_once('./commons/utils.php');
require_once('./commons/session.php');

// ROLE이 U일 경우에만 진입할 수 있도록 한다.
if($_SESSION['role'] !== 'U'){
    AlertMsgAndRedirectTo('/', '이미 가입된 회원입니다');
    exit;
}

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
            <h1 class="page-title">기업 회원</h1>
            <ul class="breadcrumbs">
                <li><a href="/">Home</a></li>
                <li>기업회원</li>
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
                            <div>* 의도적으로 잘못된 정보 입력하실 경우, 원치 않은 불이익을 당할 수도 있습니다.</div>
                            <!-- 개인 가입 입력창 -->
                            <form action="#" method="post">
                                <table class="table table-private-info">
                                    <colgroup>
                                        <col width="30%" />
                                        <col width="70%" />
                                    </colgroup>
                                    <tr>
                                        <th>
                                            상호명
                                        </th>
                                        <td>
                                            <input type="text"
                                                   name="realname"
                                                   placeholder="상호명 입력해주세요."
                                                   autocomplete="off"
                                                   autofocus
                                                   required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            전화번호
                                        </th>
                                        <td>
                                            <input type="tel" name="phone" placeholder="전화 번호를 입력하세요." required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>이메일</th>
                                        <td>
                                            j.lee@jcorporationtech.com
                                            <a href="#" class="btn">이메일 일증</a>
                                            <a href="#" class="btn">이메일 변경</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            상호로고
                                        </th>
                                        <td>
                                            <input type="file" name="logo" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>사업자등록증</th>
                                        <td>
                                            <input type="file" name="business_sheet" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>사업자번호</th>
                                        <td>
                                            <input type="text" name="business_number" placeholder="사업자번호를 입력해주세요." />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>회사소개</th>
                                        <td>
                                            <textarea name="" id="" cols="30" rows="10" required></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">회사주소</th>
                                        <td>
                                            <select name="" id="">
                                                <option value="">지역선택</option>
                                            </select>
                                            <select name="" id="">
                                                <option value="">세부지역선택</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="상세주소" required />
                                        </td>
                                    </tr>
                                </table>

                                <div class="center" style="padding: 10px 0;">
                                    <button type="submit" class="btn btn-big btn-style-5">등록하기</button>
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