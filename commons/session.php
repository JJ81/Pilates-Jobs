<?php

session_start();

/**
 * 세션 만료 확인 처리
 */
if(!empty($_SESSION['expire']))
{
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_destroy();
        AlertMsgAndRedirectTo(ROOT, '세션이 만료했습니다.');
        exit;
    }
}

?>