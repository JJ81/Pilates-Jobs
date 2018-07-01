<?php

require_once('./commons/config.php');
require_once('./commons/utils.php');
require_once('./commons/session.php');

/**
 * 빈 배열로 세션 변수까지 초기화
 */
if(!empty($_SESSION['user']))
{
    $_SESSION = array();
    // 세션의 정보를 선택적으로 비워버릴 수 있도록 할 수 있나?
    // 세션네임은 유저와 관리자가 각각 로그인했을 때 다르게 발급이 되는지 파악해보아야 한다.
}

/**
 * 쿠키를 사용해 세션 ID를 설정한 경우, 세션ID는 세션 이름과 함께 쿠키에 저장된다.
 * 로그아웃시 PHPSESSID가 쿠키상에서 변경되는 것을 볼 수 있다.
 */
if(isset($_COOKIE[session_name()]))
{
    setcookie(session_name(), '', time() - 3600); // 만기시점으로부터 1시간전으로 설정하여 쿠키를 삭제한다.
}

/**
 * 세션 종료
 */
session_destroy();

/**
 * Redirect
 */

Redirect(ROOT . 'index.php');

?>