<?php
if(isset($_POST['printstatus'])){
    if(isset($_POST['printstatus'])){$status = $sql->real_escape_string($_POST['printstatus']);}
    $admin->UpdatePrint($status);
}
if(isset($_POST['addadmin'])){
    if(isset($_POST['userid'])){$userid = $sql->real_escape_string($_POST['userid']);}
    if(isset($_POST['username'])){$username = $sql->real_escape_string($_POST['username']);}
    if(isset($_POST['password'])){$password = $sql->real_escape_string($_POST['password']);}
    if($_POST['userid']==null){
        $admin->createuser($username,$password);
    }else{
        $admin->updateuser($userid,$username,$password);
    }


}

