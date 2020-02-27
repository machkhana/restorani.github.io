<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/26/2020
 * Time: 1:47 PM
 */
require_once ('../conn.php');
if(isset($_GET['checkorder'])){
    if(isset($_GET['checkorder'])){$checkorder = $sql->real_escape_string($_GET['checkorder']);}
    global $sql;
    $query = $sql->query("select ordercode from neworder where ordercode=$checkorder");
    if($query->num_rows > 0){
        echo "exist";
    }else{
        echo "no exist";
    }
}
if(isset($_GET["disableorder"])){
    if(isset($_GET['disableorder'])){$id = $sql->real_escape_string($_GET['disableorder']);}
    if(isset($_GET['status'])){$status = $sql->real_escape_string($_GET['status']);}
    global $sql;
    $query=$sql->query("update neworder set orderstatus='$status' where id='$id'");
    if($query==true){
        echo "remove";
    }else{
        echo "not remove";
    }
}
