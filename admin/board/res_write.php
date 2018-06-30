<?php

require_once ('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');


if(empty($_POST['title'])){
    AlertMsgAndRedirectTo('/board/write.php', '잘못된 접근입니다.');
    exit;
}

$title=getDataByPost('title');
$question=getDataByPost('question');
$nickname=getDataByPost('nickname');
$password=getDataByPost('password');
$public=getDataByPost('expose');

if($password !== null){
    $password=sha1($password);
}

if($public == 'true'){
    $public = true;
}else{
    $public = false;
}


if(!empty($_FILES) and $_FILES['thumbnail']['name'] !== ''){
    if($_FILES['thumbnail']['error']){
        AlertMsgAndRedirectTo('/board/write.php', $_FILES['thumbnail']['error']);
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

// 공개인지 비공개인지에 따라서 쿼리의 값을 변경해야 한다?

$insert_query =
    "insert into `cms_board_qna` (`title`, `question`, `nickname`, `password`, `attached`, `origin_attached`, `public`) " .
    "values (:title, :question, :nickname, :password, :attached, :origin_attached, :public);";
$value = array(':title'=>$title, ':question'=>$question, ':nickname'=>$nickname, ':password'=>$password, ':attached'=>$newImgName, ':origin_attached'=>$origin_img_name, ':public'=>$public);
$insertId = $db->insert($insert_query, $value);
$db=null;

AlertMsgAndRedirectTo('/board/list.php', '문의글이 정상적으로 등록되었습니다.');

?>




