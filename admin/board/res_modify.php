<?php

require_once ('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');


if(empty($_POST['board_id'])){
    AlertMsgAndRedirectTo('/board/list.php', '잘못된 접근입니다.');
    exit;
}

$board_id=getDataByPost('board_id');
$title=getDataByPost('title');
$question=getDataByPost('question');
$nickname=getDataByPost('nickname');
$password=getDataByPost('password');
$public=getDataByPost('expose');

if($password !== null){
    $password=sha1($password);
}

if($public == 'true'){
    $public = 1;
}else{
    $public = 0;
}

if(!empty($_FILES) and $_FILES['thumbnail']['name'] !== ''){

    if($_FILES['thumbnail']['error']){
        AlertMsgAndRedirectTo('/board/view.php?id='.$board_id, 'ERROR : ' . $_FILES['thumbnail']['error']);
        exit;
    }

    if(validateImage($_FILES['thumbnail']['tmp_name'])) {
        $origin_img_name = $_FILES['thumbnail']['name'];
        $newImgName = makeNewImageName( $_FILES['thumbnail']['tmp_name'] );
    }
}

// Upload image
if($newImgName !== null){
    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], UPLOAD_PATH . $newImgName )) {

    } else {
        error_log('Fail to upload img : '. $origin_img_name . ' / origin : ' .$newImgName);
        AlertMsgAndRedirectTo('/board/write.php', '첨부된 이미지 업로드를 실패했습니다.');
        exit;
    }
}else{
    $newImgName = null;
    $origin_img_name = null;
}


use Msg\Database\DBConnection as DBconn;
$db = new DBconn();


// 새로운 첨부파일이 없을 경우 attached, origin_attached를 빼고 업데이트를 해야 한다.
if($newImgName == null){
   // var_dump('no image');
    $update_query =
        "update `cms_board_qna` set `title`='$title', `question`='$question', `nickname`='$nickname', `password`='$password', `public`=$public where `id`=$board_id;";
}else{
    //var_dump('new image');
    $update_query =
        "update `cms_board_qna` set `title`='$title', `question`='$question', `nickname`='$nickname', `password`='$password', `attached`='$newImgName', `origin_attached`='$origin_img_name', `public`=$public where `id`=$board_id;";
}


$result = $db->update($update_query);
$db=null;

AlertMsgAndRedirectTo('/board/list.php', '문의글이 정상적으로 수정되었습니다.');

?>




