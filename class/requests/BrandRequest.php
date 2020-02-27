<?php
if(isset($_POST['addbrand'])){
    if(isset($_POST['sort'])){$sort=$sql->real_escape_string($_POST['sort']);}
    if(isset($_POST['title_ge'])){$title_ge=$sql->real_escape_string($_POST['title_ge']);}
    if(isset($_POST['title_en'])){$title_en=$sql->real_escape_string($_POST['title_en']);}
    if(isset($_POST['text_ge'])){$text_ge=$sql->real_escape_string($_POST['text_ge']);}
    if(isset($_POST['text_en'])){$text_en=$sql->real_escape_string($_POST['text_en']);}
    // File upload size //
    $movefile = "../images/brands/";
    $image = $_FILES['image']['name'];
    $file_name = md5($image);
    $exp = explode(".", $image);
    $extension = end($exp);
    $datetime = date('YmdHis');
    $editedfilename = $datetime."-".$file_name.".".$extension;
    // end file upload size //
    if(empty($sort || $title_ge || $title_en || $text_ge || $text_en || $image)){
        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
    }else{
        if($image==NULL){
            $res=$brand->create($sort,$title_ge,$title_en,$text_ge,$text_en,$image);
        }else{
            $res=$brand->create($sort,$title_ge,$title_en,$text_ge,$text_en,$editedfilename);
        }
        if($res==TRUE){
            require_once (CONTROLLER.'/image_upload_form.php');
            move_uploaded_file($_FILES['image']['name'],$movefile);
        }
    }
}
if(isset($_POST['editbrand'])){
    if(isset($_POST['id'])){$id=$sql->real_escape_string($_POST['id']);}
    if(isset($_POST['sort'])){$sort=$sql->real_escape_string($_POST['sort']);}
    if(isset($_POST['title_ge'])){$title_ge=$sql->real_escape_string($_POST['title_ge']);}
    if(isset($_POST['title_en'])){$title_en=$sql->real_escape_string($_POST['title_en']);}
    if(isset($_POST['text_ge'])){$text_ge=$sql->real_escape_string($_POST['text_ge']);}
    if(isset($_POST['text_en'])){$text_en=$sql->real_escape_string($_POST['text_en']);}
    // File upload size //
    $movefile = "../images/brands/";
    $image = $_FILES['image']['name'];
    $file_name = md5($image);
    $exp = explode(".", $image);
    $extension = end($exp);
    $datetime = date('YmdHis');
    $editedfilename = $datetime."-".$file_name.".".$extension;
    // end file upload size //
    if(empty($sort || $title_ge || $title_en || $text_ge || $text_en)){
        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
    }else{
        if($image==NULL){
            $res=$brand->update($id,$sort,$title_ge,$title_en,$text_ge,$text_en,$image);
        }else{
            $res=$brand->update($id,$sort,$title_ge,$title_en,$text_ge,$text_en,$editedfilename);
        }
        if($res==TRUE){
            require_once (CONTROLLER.'/image_upload_form.php');
            move_uploaded_file($_FILES['image']['name'],$movefile);
        }
    }
}
if(isset($_POST['delbrands'])){
    if(isset($_POST['delbrands'])){$id=$sql->real_escape_string($_POST['delbrands']);}
    $res=$brand->delete($id);

}
