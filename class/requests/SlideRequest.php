<?php
if(isset($_POST['addslide'])){
    if(isset($_POST['title'])){$title=$sql->real_escape_string($_POST['title']);}
    if(isset($_POST['sort'])){$sort=$sql->real_escape_string($_POST['sort']);}

    // File upload size //
    $movefile = "../images/main-slider/";
    $image = $_FILES['slideimage']['name'];
    $file_name = md5($image);
    $exp = explode(".", $image);
    $extension = end($exp);
    $datetime = date('YmdHis');
    $editedfilename = $datetime."-".$file_name.".".$extension;
    // end file upload size //
    if(empty($title && $image)){
        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
    }else{
        $res=$slide->create($title,$sort,$editedfilename);
        if($res==TRUE){
            require_once (CONTROLLER.'/image_upload_form.php');
            move_uploaded_file($_FILES['slideimage']['name'],$movefile);
        }
    }
}
if(isset($_POST['editslide'])){
    if(isset($_POST['id'])){$id=$sql->real_escape_string($_POST['id']);}
    if(isset($_POST['title'])){$title=$sql->real_escape_string($_POST['title']);}
    if(isset($_POST['sort'])){$sort=$sql->real_escape_string($_POST['sort']);}
    // File upload size //
    $movefile = "../images/main-slider/";
    $image = $_FILES['slideimage']['name'];
    $file_name = md5($image);
    $exp = explode(".", $image);
    $extension = end($exp);
    $datetime = date('YmdHis');
    $editedfilename = $datetime."-".$file_name.".".$extension;
    // end file upload size //
    if(empty($title)){
        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
    }else{
        if($image==NULL){
            $res=$slide->update($id,$title,$sort,$image);
        }else{
            $res=$slide->update($id,$title,$sort,$editedfilename);
        }
        if($res==TRUE){
            require_once (CONTROLLER.'/image_upload_form.php');
            move_uploaded_file($_FILES['image']['name'],$movefile);
        }
    }
}
if(isset($_POST['delslide'])){
    if(isset($_POST['delslide'])){$id=$sql->real_escape_string($_POST['delslide']);}
    $res=$slide->delete($id);

}