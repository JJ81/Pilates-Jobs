<?php
require_once('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');


if($_SESSION['role'] !== 'C'){
    AlertMsgAndRedirectTo(ROOT. 'mypage.php', '잘못된 접근입니다.');
    exit;
}

if(empty($_POST['user_id'])){
    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '잘못된 접근입니다.');
    exit;
}

$user_id=getDataByPost('user_id');
$realname=getDataByPost('realname');
$birthday=getDataByPost('birthday');
$gender=getDataByPost('gender');
$phone=getDataByPost('phone');
$description=getDataByPost('description');

// 하단은 여러개를 받아서 넘어올 수가 있다.
$license_dt=$_POST['license_dt'];
$license_name=$_POST['license_name'];
$license_id=$_POST['license_id'];

$role="C";
$reg_type="P";

// TODO 이미지를 업로드하는 로직은 클래스나 별도의 함수로 만들어서 사용하기 편하도록 로직을 개선할 수 있도록 한다.
$uploaddir =  '../upload/';
$newImgName = null;

if(!empty($_FILES['thumbnail']['tmp_name'])){
    if(validateImage($_FILES['thumbnail']['tmp_name'])) {
        $newImgName = makeNewImageName( $_FILES['thumbnail']['tmp_name'] );
    }
}

if($newImgName !== null){
    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploaddir . $newImgName )) {

    } else {
        AlertMsgAndRedirectTo(ROOT . 'mypage.php', '잘못된 설정으로 이미지 업로드에 실패하였습니다.');
        exit;
    }
}
use Msg\Database\DBConnection as DBconn;
$db = new DBconn();


try{
    $db->getDBINS()->beginTransaction();


    // 새로운 썸네일이 업로드되었는지에 따라 쿼리 변경
    if($newImgName == null){
        $personal_info=
            "update `cms_member` " .
            "set `realname`='$realname', `birthday`='$birthday', " .
            "`phone`='$phone', `gender`='$gender', `description`='$description' ".
            "where `id`=$user_id;";
    }else{
        $personal_info=
            "update `cms_member` " .
            "set `realname`='$realname', `birthday`='$birthday', `thumbnail`='$newImgName', " .
            "`phone`='$phone', `gender`='$gender', `description`='$description' ".
            "where `id`=$user_id;";
    }

    $result = $db->update($personal_info);

//    if($result == 0){
//        throw new Exception('Failed to update new personal info.');
//    }


    for($i=0,$size=count($license_dt);$i<$size;$i++){
        // 라이센스 아이디가 있는 경우는 업데이트
        if($license_id[$i]){
            $input_license=
                "update `cms_license` set `taken_dt`='$license_dt[$i]', `license_name`='$license_name[$i]' where `id`=$license_id[$i]";
            $result = $db->update($input_license);
        }else{

            // 라이센스 아이디가 없는 경우는 추가
            $input_license=
                "insert into `cms_license` (`user_id`, `taken_dt`, `license_name`) values";

            if($i !== ($size-1)){
                $input_license .= "($user_id, '$license_dt[$i]','$license_name[$i]'),";
            }else{
                $input_license .= "($user_id, '$license_dt[$i]','$license_name[$i]');";
            }


            $insertId = $db->insert($input_license, null);

            if(!$insertId){
                throw new Exception('Failed to insert license info.');
            }
        }
    }


    $db->getDBINS()->commit();
    $db=null;

    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '정보가 수정되었습니다.');

}catch(Exception $e){
    $db->getDBINS()->rollBack();
    error_log($e);
    echo $e;
    $db=null;
    // AlertMsgAndRedirectTo(ROOT . 'mypage.php', '처리도중 에러가 발생하였습니다. 다시 시도해주세요.');
}


?>