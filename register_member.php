<!doctype html>
<html lang="ko">
<head>

    <?php require_once('./inc/head.php') ;?>

    <title>Yoga</title>
</head>

<body>

<div class="loader"></div>

<!--cookie-->
<!-- <div class="cookie">
        <div class="container">
          <div class="clearfix">
            <span>Please note this website requires cookies in order to function correctly, they do not store any specific information about you personally.</span>
            <div class="f-right"><a href="#" class="button button-type-3 button-orange">Accept Cookies</a><a href="#" class="button button-type-3 button-grey-light">Read More</a></div>
          </div>
        </div>
      </div>-->

<!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->
<div id="wrapper" class="wrapper-container">
    <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->
    <nav id="mobile-advanced" class="mobile-advanced"></nav>

    <?php require_once ('./inc/header.php');?>

    <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
    <div class="breadcrumbs-wrap">
        <div class="container">
            <h1 class="page-title">정식 개인 회원</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li>개인회원</li>
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
                            <div>의도적으로 잘못된 정보 입력하실 경우, 원치 않은 불이익을 당할 수도 있습니다.</div>
                            <!-- 개인 가입 입력창 -->
                            <form action="#" method="post">
                                <table class="table">
                                    <colgroup>
                                        <col width="30%" />
                                        <col width="70%" />
                                    </colgroup>
                                    <tr>
                                        <th>
                                            성명(실명)
                                        </th>
                                        <td>
                                            <input type="text"
                                                   name="realname"
                                                   placeholder="실명을 입력해주세요."
                                                   autocomplete="off"
                                                   autofocus
                                                   required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>생년월일</th>
                                        <td>
                                            <input type="date" name="birday" placeholder="생년월일을 선택해주세요." required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            전화번호
                                        </th>
                                        <td>
                                            <input type="tel" name="phone" placeholder="전화 번호를 입력하세요." required />
                                            <a href="#" class="btn">본인인증</a>
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
                                            프로필 이미지
                                        </th>
                                        <td>
                                            <input type="file" name="thumbnail" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>구직여부</th>
                                        <td>
                                            <input type="radio" name="status" id="searching" value="S" checked />
                                            <label for="searching">구직중</label>

                                            <input type="radio" name="status" id="complete" value="C" />
                                            <label for="complete">구직완료</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>이력서 등록</th>
                                        <td>
                                            <input type="file" name="resume" />
                                            <small>이력서는 나중에 얼마든지 등록하실 수가 있으나, 구직중이신 경우 등록을 하시는 것이 좋습니다.</small>
                                        </td>
                                    </tr>
                                </table>

                                <div class="center">
                                    <button type="submit" class="btn">등록하기</button>
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