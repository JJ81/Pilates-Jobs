<?php

require_once('../../../autoload.php');
require_once('../../../commons/config.php');
require_once('../../../commons/utils.php');
require_once('../../../commons/session.php');

if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo('/admin/login.php', '로그인이 필요합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo('/index.php', '관리자만 접근할 수 있는 페이지입니다.');
    exit;
}

if(!isset($_POST['link'])){
    AlertMsgAndRedirectTo(ROOT . 'admin/banner/index.php', '잘못된 접근입니다.');
    exit;
}

$uploaddir =  '../../../upload/';
$newImgName = null;
$id=getDataByPost('banner_id');
$title=getDataByPost('title');
$link=getDataByPost('link');

if( $title == '' or $link == ''){
    AlertMsgAndRedirectTo('/admin/banner/index.php', '잘못된 접근입니다.');
    exit;
}

if(!empty($_FILES)){
    if(validateImage($_FILES['thumbnail']['tmp_name'])) {
        $newImgName = makeNewImageName( $_FILES['thumbnail']['tmp_name'] );
    }
}

if($newImgName !== null){
    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploaddir . $newImgName )) {

    } else {
        error_log('Fail to upload img '. $newImgName);
        var_dump('Fail to upload img');
        exit;
    }
}


use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

try{

    if($newImgName == null){
        $query = "update `cms_banner` set `title`='$title', `link`='$link' where `id`=$id;";
    }else{
        $query = "update `cms_banner` set `title`='$title', `link`='$link', `thumbnail`='$newImgName' where `id`=$id;";
    }

    $result = $db->update($query);
    $db=null;


}catch(Exception $e){
    echo $e->getMessage();
}

$db=null;

AlertMsgAndRedirectTo(ROOT . 'admin/banner/index.php', '정상적으로 수정되었습니다.');


?>