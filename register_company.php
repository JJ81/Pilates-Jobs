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
                            <form action="./response/res_reg_company.php" method="post" enctype="multipart/form-data" class="form-register-company">
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
                                                   class="field-name"
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
                                            <input type="tel" name="phone" class="field-phone" placeholder="전화 번호를 입력하세요." required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>이메일</th>
                                        <td>
                                            <?php echo $_SESSION['user']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>사업자번호</th>
                                        <td>
                                            <input type="text" name="business_number" class="field-business-number" placeholder="사업자번호를 입력해주세요." />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>회사소개</th>
                                        <td>
                                            <textarea name="description" class="field-description" id="" cols="30" rows="10" required></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>홈페이지 주소</th>
                                        <td>
                                            <input type="text" name="homepage" placeholder="홈페이지 주소(선택사항)" />
                                        </td>
                                    </tr>
                                </table>

                                <!-- 회사 사업장 명칭 및 주소 입력 -->
                                <table class="table tb-license">
                                    <col width="30%">
                                    <col width="60%">
                                    <col width="10%">
                                    <tr>
                                        <td colspan="3" class="center section-title">사업장 정보</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="business_name[]" placeholder="사업장명, 지정명" class="field-branch-name" />
                                        </td>
                                        <td>
                                            <input type="text" name="address[]" placeholder="주소를 입력해주세요." class="field-branch-addr" />
                                        </td>
                                        <td class="center">
                                            <a href="#" class="delete-btn-license" onclick="deleteAddressInfo(this);">삭제</a>
                                        </td>
                                    </tr>
                                </table>

                                <div style="margin-top: 10px;text-align: right;">
                                    <a href="#" class="btn btn-sm js-btn-add-addr">사업장 추가</a>
                                </div>

                                <div style="margin-top: 20px;">
                                    <input type="checkbox" id="agree_info" />
                                    <label for="agree_info">상기 회원 정보는 구인공고를 위한 정보제공에 동의하십니까?</label>
                                </div>

                                <div class="center" style="padding: 10px 0;">
                                    <button type="submit" class="btn btn-big btn-style-5 js-btn-register-com">등록하기</button>
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>" />
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
        var formCompany = $('.form-register-company');
        var btnSubmit = $('.js-btn-register-com');
        var btnAddAddr = $('.js-btn-add-addr');

        var fieldName = $('.field-name');
        var fieldPhone = $('.field-phone');
        var fieldBusinessNumber = $('.field-business-number');
        var fieldDesc = $('.field-description');
        var check_agree = $('#agree_info');


        btnAddAddr.bind('click', function (e) {
            e.preventDefault();

            console.log('check address');
            console.log ( checkAddressInfo() );

            if(!checkAddressInfo()){
                alert('사업장 정보를 입력한 후에 추가하세요.');
                return;
            }

            var new_el="<tr>\n" +
                "                                        <td>\n" +
                "                                            <input type=\"text\" name=\"business_name[]\" placeholder=\"사업장명, 지정명\" class=\"field-branch-name\" />\n" +
                "                                        </td>\n" +
                "                                        <td>\n" +
                "                                            <input type=\"text\" name=\"address[]\" placeholder=\"주소를 입력해주세요.\" class=\"field-branch-addr\" />\n" +
                "                                        </td>\n" +
                "                                        <td class=\"center\">\n" +
                "                                            <a href=\"#\" class=\"delete-btn-license\" onclick=\"deleteAddressInfo(this);\">삭제</a>\n" +
                "                                        </td>\n" +
                "                                    </tr>";
            $('.tb-license').append(new_el);
        });


        btnSubmit.bind('click', function (e) {
            e.preventDefault();

            // 상호명
            if(fieldName.val().trim() === '' ){
                fieldName.focus();
                alert('상호명을 입력해주세요.');
                return;
            }

            // 연락처
            if(fieldPhone.val().trim() === ''){
                fieldPhone.focus();
                alert('연락처를 입력하세요.');
                return;
            }

            // 사업자번호
            if(fieldBusinessNumber.val().trim() === ''){
                fieldBusinessNumber.focus();
                alert('사업자 번호를 입력하세요.');
                return;
            }

            // 회사소개
            if(fieldDesc.val().trim() === ''){
                fieldDesc.focus();
                alert('회사소개를 입력해주세요.');
                return;
            }


            // 별도의 함수로 체크할 수 있도록 할 것.
            // 사업장 정보 입력 여부, 최소한 1개 이상 입력이 되어야 등록이 될 수 있도록 할 것.
            if(!checkAddressInfo()){
                alert('사업장 정보를 확인해주세요.');
                return;
            }

            if(!check_agree.prop('checked')){
                check_agree.focus();
                alert('정보제공에 동의해주세요.');
                return;
            }

            formCompany.submit();
        });



    } (jQuery));

    function deleteAddressInfo(el){
        window.event.preventDefault();
        $(el).parent().parent().remove();
    }

    function checkAddressInfo(){
        var dtComplete=false;
        var nameComplete=false;

        if($('.field-branch-name').length === 0){
            // console.log('check license name 1');
            // dtComplete=false;
            // nameComplete=false;
            return true;
        }

        $('.field-branch-name').each(function (i, el){
            if($(this).val().trim() === ''){
                //console.log('check license name 2');
                dtComplete=false;
                return false;
            }else{
                dtComplete=true;
            }
        });

        $('.field-branch-addr').each(function (i, el){
            if($(this).val().trim() === ''){
                //console.log('check license name 3');
                nameComplete=false;
                return false;
            }else{
                nameComplete=true;
            }

        });


        // console.log('return value');
        // console.info((dtComplete && nameComplete));

        return (dtComplete && nameComplete);
    }


</script>
</body>
</html>