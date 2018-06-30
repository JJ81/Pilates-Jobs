<?php

require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');

if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT.'/admin/login.php', '로그인이 필요합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo(ROOT.'/index.php', '관리자만 접근할 수 있는 페이지입니다.');
    exit;
}

//use Msg\Database\DBConnection as DBconn;

// $db = new DBconn();

?>
<!doctype html>
<html lang="ko">
<head>
    <meta name="description" content="" />
    <title>TEST</title>
</head>

<body>

    EMAIL : <?php echo $_SESSION['user']; ?>
    ROLE : <?php echo $_SESSION['role']; ?>
    TIMEOUT : <?php echo date("Y-m-d H:i:s", $_SESSION['expire']); ?>

</body>
</html>