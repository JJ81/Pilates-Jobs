<?php


date_default_timezone_set('UTC');
date_default_timezone_set('Asia/Seoul');
define('SET_CURRENT_TIME', date('Y-m-d H:i:s', time()));
define('SET_CURRENT_DATE', date('Y-m-d', time()));

setlocale(LC_MONETARY, 'en_US');
//define('ROOT', $PATH);
define('ROOT', $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/');
define('SESS_DURATION', 60 * 60); // set 60min for expiry time
define('IMG_PATH', '/upload/');
// define('CLIENT_IMG_PATH', ROOT . 'assets/images/');
define('DOCUMENT_PATH', $_SERVER['DOCUMENT_ROOT'] . "/upload/");

?>