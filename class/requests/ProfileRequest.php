<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/26/2020
 * Time: 8:25 PM
 */
if(isset($_POST['printstatus'])){
    if(isset($_POST['printstatus'])){$status = $sql->real_escape_string($_POST['printstatus']);}
    $profile->UpdatePrint($status);
}