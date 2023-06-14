<?php

if(! isset($_SESSION)){
    session_start();
}

// 若沒有設定$_SESSION['user]表示沒登入
// 沒登入導向登入頁面
if(! isset($_SESSION['member'])) {
    header('Location: login.php');
    exit;
}