<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Tbilisi');
//require_once (CONTROLLER.'/Classes.php');
$host = "localhost";
$user = "root";
$pass = "";
$db = "restoran";
$sql = new mysqli($host, $user, $pass, $db);
//$mycs = new Classes($sql);
$sql->query("SET NAMES utf8");
//$sql = new DateTimeZone('Asia/Tbilisi');
?>
