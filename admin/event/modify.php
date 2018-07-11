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

if(empty($_GET['id'])){
    AlertMsgAndRedirectTo(ROOT . 'admin/event/list.php', '잘못된 접근입니다');
    exit;
}

$id=getDataByGet('id');

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query="select * from `cms_board_event` where `id`=$id;";
$row= $db->query($query);

$db=null;

if(count($row) === 0){
    AlertMsgAndRedirectTo(ROOT . 'admin/event/list.php', '작성된 글이 없습니다.');
    exit;
}


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
                <h3 class="text-primary">이벤트 글쓰기</h3></div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Event</li>
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
                            <h4>이벤트 글쓰기</h4>
                            <a href="javascript:window.history.back(-1);" class="btn btn-primary pull-right">뒤로</a>
                        </div>
                        <div class="card-body">
                            <!-- contents -->
                            <div class="_container">
                                <form action="./response/res_modify.php" method="post" enctype="multipart/form-data" class="form">
                                    <div class="form-group">
                                        <label for="">제목</label>
                                        <input type="text" name="title" placeholder="제목을 입력하세요." class="form-control form-title" autofocus required value="<?php echo $row[0]['title']; ?>" />
                                    </div>

<!--                                    <div class="form-group">-->
<!--                                        <label for="">대표썸네일</label>-->
<!--                                        <input type="file" name="thumbnail" class="form-control" placeholder="글을 대표할 썸네일을 입력해주세요." required accept="image/*" />-->
<!--                                    </div>-->

                                    <!--                                    <div class="form-group">-->
                                    <!--                                        <label for="">첨부파일</label>-->
                                    <!--                                        <input type="file" name="attached" class="form-control" />-->
                                    <!--                                    </div>-->

                                    <div class="form-group">
                                        <label for="">공지일</label>
                                        <input type="date" name="date" class="form-control" value="<?php echo setDate($row[0]['created_dt']);?>" />
                                    </div>

                                    <!-- smart editor -->
                                    <div>
                                        <textarea name="ir1" id="ir1" rows="10" cols="100" style="width: 100%; height:412px; display:none;"><?php echo $row[0]['contents'] ?></textarea>
                                        <!--                                        <p>-->
                                        <!--                                            <input type="button" onclick="pasteHTML();" value="본문에 내용 넣기" />-->
                                        <!--                                            <input type="button" onclick="showHTML();" value="본문 내용 가져오기" />-->
                                        <!--                                            <input type="button" onclick="submitContents(this);" value="서버로 내용 전송" />-->
                                        <!--                                            <input type="button" onclick="setDefaultFont();" value="기본 폰트 지정하기 (궁서_24)" />-->
                                        <!--                                        </p>-->
                                    </div>
                                    <!-- smart editor -->

                                    <input type="hidden" name="id" value="<?php echo $row[0]['id']; ?>" />

                                    <div style="text-align: center;margin-top: 10px;">
                                        <button type="button" onclick="submitContents(this);" class="btn btn-success">전송</button>
                                    </div>

                                </form>
                            </div>
                            <!-- // contents -->
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
<script type="text/javascript" src="/plugin/se2/js/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript">
    var oEditors = [];

    // 추가 글꼴 목록
    //var aAdditionalFontSet = [["MS UI Gothic", "MS UI Gothic"], ["Comic Sans MS", "Comic Sans MS"],["TEST","TEST"]];

    nhn.husky.EZCreator.createInIFrame({
        oAppRef: oEditors,
        elPlaceHolder: "ir1",
        sSkinURI: "/plugin/se2/SmartEditor2Skin.html",
        htParams : {
            bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
            bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
            bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
            //aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
            fOnBeforeUnload : function(){
                //alert("완료!");
            }
        }, //boolean
        fOnAppLoad : function(){
            //예제 코드
            //oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
        },
        fCreator: "createSEditor2"
    });

    function pasteHTML() {
        var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
        oEditors.getById["ir1"].exec("PASTE_HTML", [sHTML]);
    }

    function showHTML() {
        var sHTML = oEditors.getById["ir1"].getIR();
        alert(sHTML);
    }

    function submitContents(elClickedObj) {

        var formTitle = $('.form-title');
        var editorArea = $('#ir1');

        // 이 방식으로는 에디터에 입력값이 있는지 판단을 할 수가 없다.
        if(formTitle.val().trim() === ''){
            alert('제목을 입력해주세요');
            formTitle.focus();
            return;
        }

        oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.


        if(editorArea.val().trim() === ''){
            alert('글을 입력해주세요.');
            return;
        }

        // 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

        try {
            elClickedObj.form.submit();
        } catch(e) {}
    }

    function setDefaultFont() {
        var sDefaultFont = '궁서';
        var nFontSize = 24;
        oEditors.getById["ir1"].setDefaultFont(sDefaultFont, nFontSize);
    }
</script>
</body>
</html>