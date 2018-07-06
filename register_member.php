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
            <h1 class="page-title">개인 회원</h1>
            <ul class="breadcrumbs">
                <li><a href="/">Home</a></li>
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
                            <div>* 의도적으로 잘못된 정보 입력하실 경우, 원치 않은 불이익을 당할 수도 있습니다.</div>
                            <!-- 개인 가입 입력창 -->
                            <form action="#" method="post" class="form-private-register" enctype="multipart/form-data">
                                <table class="table table-private-info">
                                    <colgroup>
                                        <col width="25%" />
                                        <col width="25%" />
                                        <col width="50%" />
                                    </colgroup>
                                    <tr>
                                        <th>
                                            성명
                                        </th>
                                        <td colspan="2">
                                            <input type="text"
                                                   name="realname"
                                                   class="field-name"
                                                   placeholder="실명을 입력해주세요."
                                                   autocomplete="off"
                                                   autofocus
                                                   required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>생년월일</th>
                                        <td colspan="2">
                                            <input type="date" name="birthday" class="field-birth" placeholder="생년월일을 선택해주세요." required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>성별</th>
                                        <td colspan="2">
                                            <input type="radio" name="status" id="searching" value="S" checked />
                                            <label for="searching">여</label>

                                            <input type="radio" name="status" id="complete" value="C" />
                                            <label for="complete">남</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            전화번호
                                        </th>
                                        <td colspan="2">
                                            <input type="tel" name="phone" class="field-phone" placeholder="전화 번호를 입력하세요." required />
<!--                                            <a href="#" class="btn" style="margin-top: 5px;">본인인증</a>-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>이메일</th>
                                        <td colspan="2">
                                            <?php echo $_SESSION['user']; ?>
<!--                                            <a href="#" class="btn">이메일 일증</a>-->
<!--                                            <a href="#" class="btn">이메일 변경</a>-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            프로필
                                        </th>
                                        <td colspan="2">
                                            <input type="file"
                                                   name="thumbnail"
                                                   class="field-thumbnail"
                                                   accept="image/png, image/gif, image/jpg, image/jpeg" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>이력사항</th>
                                        <td colspan="2">
                                            <textarea
                                                    name="description"
                                                    cols="30"
                                                    rows="10"
                                                    placeholder="이력사항을 입력해주세요."
                                                    class="field-desc"></textarea>
                                        </td>
                                    </tr>
                                </table>

                                <h5 style="margin-top: 20px;">자격사항</h5>
                                <table class="table tb-license">
                                    <colgroup>
                                        <col width="30%">
                                        <col width="60%">
                                        <col width="10%">
                                    </colgroup>
                                    <!-- 자격증 관련 정보 입력 -->
                                    <tr>
                                        <td>
                                            <div class="dateWrp">
                                                <!-- 모바일일때와 PC일 때를 구분하여 처리할 수 있어야 한다. -->
                                                <input type="text" value="<?php echo getToday('Y-m-d');?>" class="license_dt" readonly />
                                                <input type="date"
                                                       name="get_license_dt"
                                                       class="dateController"
                                                       min="1900-01-01"
                                                       max="2018-12-31"
                                                       value="<?php echo getToday('Y-m-d');?>"
                                                       placeholder="취득일" <?php if(!isMobile()){ echo 'style="opacity:1;"';} ?> />
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="자격증 명칭" name="license" class="field-license-name" />
                                        </td>
                                        <td class="center">
                                            <a href="#" class="delete-btn-license" onclick="deleteLicense(this);">삭제</a>
                                        </td>
                                    </tr>
                                </table>
                                <div style="margin-top: 10px;text-align: right;">
                                    <a href="#" class="btn btn-sm js-btn-add-license">자격증 추가</a>
                                </div>

                                <div style="margin-top: 20px;">
                                    <input type="checkbox" id="agree_info" />
                                    <label for="agree_info">상기 회원 정보는 구인공고에 지원시, 구인 사업장 요청시 해당 사업장만에 제공됩니다. 동의하십니까?</label>
                                </div>
                                <div class="center" style="padding: 10px 0;">
                                    <button type="submit" class="btn btn-big btn-style-5 js-btn-register">등록하기</button>
                                    <p>* 각 기입란을 다 채워주셔야 지원시 연결될 확율이 높습니다</p>
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
<script>
    (function ($) {
        var btnSubmit = $('.js-btn-register');
        var formPrivate = $('.form-private-register');

        var fieldName = $('.field-name');
        var fieldBirth = $('.field-birth');
        var fieldPhone = $('.field-phone');
        var fieldProfile = $('.field-thumbnail');
        var fieldDesc = $('.field-desc');

        var check_agree = $('#agree_info');


        var btnAddLicense = $('.js-btn-add-license');


        btnSubmit.bind('click', function (e) {
            e.preventDefault();

            if(fieldName.val().trim() === '' ){
                fieldName.focus();
                alert('성명을 입력해주세요.');
                return;
            }

            if(fieldBirth.val().trim() === ''){
                fieldBirth.focus();
                alert('생년월일을 입력하세요.');
                return;
            }

            if(fieldPhone.val().trim() === ''){
                fieldPhone.focus();
                alert('연락처를 입력하세요.');
                return;
            }

            if(fieldProfile.val().trim() === ''){
                fieldProfile.focus();
                alert('프로필을 입력해주세요.');
                return;
            }

            if(fieldDesc.val().trim() === ''){
                fieldDesc.focus();
                alert('이력사항을 입력해주세요.');
                return;
            }


            if(!checkLicenseInfo()){
                alert('자격증 정보를 확인해주세요.');
                return;
            }

            if(!check_agree.prop('checked')){
                check_agree.focus();
                alert('정보제공에 동의해주세요.');
                return;
            }

            alert('전송');
            //formPrivate.submit();
        });


        btnAddLicense.bind('click', function (e) {
            e.preventDefault();

            if(!checkLicenseInfo()){
                alert('자격증 정보를 입력한 후에 추가하세요.');
                return;
            }

            var new_el = "<tr>\n" +
                "                                        <td>\n" +
                "                                            <div class=\"dateWrp\">\n" +
                "                                                <input type=\"text\" value=\"<?php echo getToday('Y-m-d');?>\" class=\"license_dt\" readonly />\n" +
                "                                                <input type=\"date\"\n" +
                "                                                       name=\"get_license_dt\"\n" +
                "                                                       class=\"dateController\"\n" +
                "                                                       min=\"1900-01-01\"\n" +
                "                                                       max=\"2018-12-31\"\n" +
                "                                                       value=\"<?php echo getToday('Y-m-d');?>\"\n" +
                "                                                       placeholder=\"취득일\" <?php if (!isMobile()) {
                    echo 'style=\"opacity:1;\"';
                } ?>/>\n" +
                "                                            </div>\n" +
                "                                        </td>\n" +
                "                                        <td>\n" +
                "                                            <input type=\"text\" placeholder=\"자격증 명칭\" name=\"license\" class=\"field-license-name\" />\n" +
                "                                        </td>\n" +
                "                                        <td class=\"center\">\n" +
                "                                            <a href=\"#\" class=\"delete-btn-license\" onclick=\"deleteLicense(this);\">삭제</a>\n" +
                "                                        </td>\n" +
                "                                    </tr>";

            $('.tb-license').append(new_el);
        });

    }(jQuery));

    /**
     * 라이센서 관련 현재 입력된 정보에 대해서 값을 출력한다.
     * 1. 폼전송시 사용
     * 2. 자격증 리스트를 추가할 경우 사용
     */
    function checkLicenseInfo(){
        var dtComplete=false;
        var nameComplete=false;

        if($('.license_dt').length === 0){
            console.log('check license dt 2');
            dtComplete=false;
            nameComplete=false;
            return true;
        }

        $('.license_dt').each(function (i, el){
            console.log( $(this).val() );
            if($(this).val().trim() === ''){
                console.log('check license dt 2');
                dtComplete=false;
                return false;
            }
            dtComplete=true;
        });

        $('.field-license-name').each(function (i, el){
            if($(this).val().trim() === ''){
                console.log('check license dt 4');
                nameComplete=false;
                return false;
            }

            console.log('check license dt 5');
            nameComplete=true;
        });


        console.log('check license dt 6');


        return (dtComplete && nameComplete);
    }

    function deleteLicense(el){
        window.event.preventDefault();
        $(el).parent().parent().remove();
        console.log('삭제');
    }



</script>

</body>
</html>