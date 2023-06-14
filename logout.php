<?php
require "./parts/db-connect.php";

unset($_SESSION['user']); # 只清除某個 session 變數
session_destroy(); # 所有的 session 資料全部清除

$come_from = $_SERVER['HTTP_REFERER'] ?? 'index_.php';
header("Location: $come_from");
