<?php
if(isset($_POST['addnews'])){
    if(isset($_POST['title_ge'])){$title_ge=$sql->real_escape_string($_POST['title_ge']);}
    if(isset($_POST['title_en'])){$title_en=$sql->real_escape_string($_POST['title_en']);}
    if(isset($_POST['shorttext_ge'])){$shorttext_ge=$sql->real_escape_string($_POST['shorttext_ge']);}
    if(isset($_POST['shorttext_en'])){$shorttext_en=$sql->real_escape_string($_POST['shorttext_en']);}
    if(isset($_POST['text_ge'])){$text_ge=$sql->real_escape_string($_POST['text_ge']);}
    if(isset($_POST['text_en'])){$text_en=$sql->real_escape_string($_POST['text_en']);}

    // File upload size //
    $movefile = "../images/news/";
    $image = $_FILES['image']['name'];
    $file_name = md5($image);
    $exp = explode(".", $image);
    $extension = end($exp);
    $datetime = date('YmdHis');
    $editedfilename = $datetime."-".$file_name.".".$extension;
    // end file upload size //
    if(empty($title_ge && $title_en && $shorttext_ge  && $shorttext_en && $image)){
        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
    }else{
        $res=$news->create($title_ge,$title_en,$shorttext_ge,$shorttext_en,$text_ge,$text_en,$editedfilename);
        if($res==TRUE){
            require_once (CONTROLLER.'/image_upload_form.php');
            move_uploaded_file($_FILES['image']['name'],$movefile);
        }
    }
}
if(isset($_POST['editnews'])){
    if(isset($_POST['id'])){$id=$sql->real_escape_string($_POST['id']);}
    if(isset($_POST['title_ge'])){$title_ge=$sql->real_escape_string($_POST['title_ge']);}
    if(isset($_POST['title_en'])){$title_en=$sql->real_escape_string($_POST['title_en']);}
    if(isset($_POST['shorttext_ge'])){$shorttext_ge=$sql->real_escape_string($_POST['shorttext_ge']);}
    if(isset($_POST['shorttext_en'])){$shorttext_en=$sql->real_escape_string($_POST['shorttext_en']);}
    if(isset($_POST['text_ge'])){$text_ge=$sql->real_escape_string($_POST['text_ge']);}
    if(isset($_POST['text_en'])){$text_en=$sql->real_escape_string($_POST['text_en']);}
    // File upload size //
    $movefile = "../images/news/";
    $image = $_FILES['image']['name'];
    $file_name = md5($image);
    $exp = explode(".", $image);
    $extension = end($exp);
    $datetime = date('YmdHis');
    $editedfilename = $datetime."-".$file_name.".".$extension;
    // end file upload size //
    if(empty($title_ge && $title_en && $shorttext_ge  && $shorttext_en)){
        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
    }else{
        if($image==NULL){
            $res=$news->update($id,$title_ge,$title_en,$shorttext_ge,$shorttext_en,$text_ge,$text_en,$image);
        }else{
            $res=$news->update($id,$title_ge,$title_en,$shorttext_ge,$shorttext_en,$text_ge,$text_en,$editedfilename);
        }
        if($res==TRUE){
            require_once (CONTROLLER.'/image_upload_form.php');
            move_uploaded_file($_FILES['image']['name'],$movefile);
        }
    }
}
if(isset($_POST['delnews'])){
    if(isset($_POST['delnews'])){$id=$sql->real_escape_string($_POST['delnews']);}
    $res=$news->delete($id);

}
