<?php
require_once('../../../autoload.php');
require_once('../../../commons/config.php');
require_once('../../../commons/utils.php');
require_once('../../../commons/session.php');

if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT . '/admin/login.php', '로그인이 필요합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo(ROOT . '/', '관리자만 접근할 수 있는 페이지입니다.');
    exit;
}

if(empty($_POST['id'])){
    AlertMsgAndRedirectTo(ROOT . 'admin/blog/list.php', '잘못된 접근입니다.');
    exit;
}

$uploaddir =  '../../../upload/';
$newImgName = null;
$blog_type=getDataByPost('blog_type');
$thumbnail = null;

/*
 * T타입일 경우
 * V타입일 경우
 * */

if($blog_type == 'T'){
    if(!empty($_FILES['thumbnail']['tmp_name'])){
        if(validateImage($_FILES['thumbnail']['tmp_name'])) {
            $newImgName = makeNewImageName( $_FILES['thumbnail']['tmp_name'] );
        }
    }

    if($newImgName !== null){
        if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploaddir . $newImgName )) {

        } else {
            AlertMsgAndRedirectTo(ROOT . 'admin/blog/list.php', '잘못된 설정으로 이미지 업로드에 실패하였습니다.');
            exit;
        }
    }

    $thumbnail=$newImgName;

} else if($blog_type == 'V'){
    // 비디오 썸네일일 경우
    $video=getDataByPost('video_yt');

}


$id=getDataByPost('id');
$title=getDataByPost('title');
$date=getDataByPost('date');
if($date == null){
    $date=getToday('Y-m-d H:i:s');
}

// html 관련 처리가 필요할 것 같다 공격방지처리
$html = $_POST["ir1"];
$admin_id=$_SESSION['user_id'];



use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query = null;


if($blog_type == 'T' and $thumbnail == null){ // 썸네일형이면서 기존 이미지 그대로일 경우
    $query = "update `cms_board_blog` set `title`='$title', `contents`='$html', `blog_type`='T', `modified_dt`='getToday()', `created_dt`='$date' where `id`=$id;";
} else if($blog_type == 'T' and $thumbnail !== null){ // 썸네일형이면서 새로운 이미지일 경우
    $query = "update `cms_board_blog` set `title`='$title', `contents`='$html', `blog_type`='T', `modified_dt`='getToday()', `thumbnail`='$thumbnail', `created_dt`='$date' where `id`=$id;";
} else if($blog_type == 'V' and $video == null){ // 비디오형이면서 기존 그대로일 경우
    $query = "update `cms_board_blog` set `title`='$title', `contents`='$html', `blog_type`='V', `modified_dt`='getToday()', `created_dt`='$date' where `id`=$id;";
} else if($blog_type == 'V' and $video !== null){ // 비디오형이면서 새로운 아이디를 받을 경우
    $query = "update `cms_board_blog` set `title`='$title', `contents`='$html', `blog_type`='V', `modified_dt`='getToday()', `video`='$video', `created_dt`='$date' where `id`=$id;";
}

// $query = "update `cms_board_blog` set `title`='$title', `created_dt`='$date', `contents`='$html' where `id`=$id;";
$result = $db->update($query);
$db=null;


AlertMsgAndRedirectTo('/admin/blog/view.php?id='.$id, '정상적으로 수정되었습니다.');
?>