<?php
if(isset($_POST['addperson'])){
    if(isset($_POST['fullname'])){$fullname=$sql->real_escape_string($_POST['fullname']);}
    if(isset($_POST['status'])){$status=$sql->real_escape_string($_POST['status']);}
    if(isset($_POST['percent'])){$percent=$sql->real_escape_string($_POST['percent']);}
    if(empty($fullname && $status)){
        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
    }else {
        $person->create($fullname, $status, $percent);
    }
}
if(isset($_POST['editperson'])){
    if(isset($_POST['id'])){$id=$sql->real_escape_string($_POST['id']);}
    if(isset($_POST['fullname'])){$fullname=$sql->real_escape_string($_POST['fullname']);}
    if(isset($_POST['status'])){$status=$sql->real_escape_string($_POST['status']);}
    if(isset($_POST['percent'])){$percent=$sql->real_escape_string($_POST['percent']);}
    $person->update($id,$fullname, $status, $percent);
}
if(isset($_POST['delperson'])){
    if(isset($_POST['delperson'])){$id=$sql->real_escape_string($_POST['delperson']);}
    $res=$person->delete($id);

}
