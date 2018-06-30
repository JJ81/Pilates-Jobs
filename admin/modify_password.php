<?php

require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');

if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo('/admin', '로그인을 해야 합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo('index.php', '관리자만 접근이 가능합니다.');
    exit;
}


?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="/admin/assets/css/admin.style.css" />
    <title>관리자 비밀번호 수정</title>
</head>

<body>

<div class="container login-container">
    <div class="loginmodal-container">
        <form action="/admin/response/res_reset_password.php" method="post">
            <h1 class="admin-login-header">DUM&DUM 관리자 비밀번호 수정</h1>
            <input type="password" class="form-control form-admin-pass" name="password" placeholder="변경할 비밀번호" autofocus />
            <input type="password" class="form-control form-admin-pass" name="re_password" placeholder="변경할 비밀번호 확인" />
            <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
        </form>
    </div>
</div>


</body>
</html>