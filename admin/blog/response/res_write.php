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

if(empty($_POST['title'])){
    AlertMsgAndRedirectTo(ROOT . 'admin/blog/list.php', '잘못된 접근입니다.');
    exit;
}

$uploaddir =  '../../../upload/';
$newImgName = null;
$blog_type=getDataByPost('blog_type');
$thumbnail = null;
$video=null;

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


$query =
    "insert into `cms_board_blog` (`contents`,`title`, `created_dt`, `video`, `thumbnail`, `admin_id`, `blog_type`) ".
    "values (:contents, :title, :created_dt, :video, :thumbnail, :admin_id, :blog_type);";
$value = array(
    ':contents'=> $html,
    ':title'=>$title,
    ':created_dt'=>$date,
    ':video'=>$video,
    ':thumbnail'=>$thumbnail,
    ':admin_id' => $admin_id,
    ':blog_type'=>$blog_type
);
$insertId = $db->insert($query, $value);

//$query = "insert into `cms_board_blog` (`contents`,`title`, `created_dt`) values (:contents, :title, :created_dt);";
//$value = array( ':contents'=> $html, ':title'=>$title, ':created_dt'=>$date);
//$insertId = $db->insert($query, $value);

$db=null;


AlertMsgAndRedirectTo('/admin/blog/view.php?id='.$insertId, '정상적으로 등록되었습니다.');


?>