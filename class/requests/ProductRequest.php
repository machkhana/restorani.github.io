<?php
if(isset($_POST['addproduct'])){
    if(isset($_POST['code'])){$code=$sql->real_escape_string($_POST['code']);}
    if(isset($_POST['name'])){$name=$sql->real_escape_string($_POST['name']);}
    if(isset($_POST['weight'])){$weight=$sql->real_escape_string($_POST['weight']);}
    if(isset($_POST['price'])){$price=$sql->real_escape_string($_POST['price']);}
    if(isset($_POST['catid'])){$catid=$sql->real_escape_string($_POST['catid']);}
    if(empty($name && $weight && $price)){
        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
    }else {
        $res = $product->create($code, $name, $weight, $price,$catid);
    }
    // File upload size //
//    $movefile = "../images/products/";
//    $image = $_FILES['image']['name'];
//    $file_name = md5($image);
//    $exp = explode(".", $image);
//    $extension = end($exp);
//    $datetime = date('YmdHis');
//    $editedfilename = $datetime."-".$file_name.".".$extension;
//    // end file upload size //
//    if(empty($brand && $title_ge && $title_en && $quantity && $weight && $image)){
//        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
//    }else{
//        if($image==NULL){
//            $res=$product->create($brand,$title_ge,$title_en,$quantity,$weight,$image);
//        }else{
//            $res=$product->create($brand,$title_ge,$title_en,$quantity,$weight,$editedfilename);
//        }
//        if($res==TRUE){
//            require_once (CONTROLLER.'/image_upload_form.php');
//            move_uploaded_file($_FILES['image']['name'],$movefile);
//        }
//    }
}
if(isset($_POST['editproduct'])){
    if(isset($_POST['id'])){$id=$sql->real_escape_string($_POST['id']);}
    if(isset($_POST['code'])){$code=$sql->real_escape_string($_POST['code']);}
    if(isset($_POST['name'])){$name=$sql->real_escape_string($_POST['name']);}
    if(isset($_POST['weight'])){$weight=$sql->real_escape_string($_POST['weight']);}
    if(isset($_POST['price'])){$price=$sql->real_escape_string($_POST['price']);}
    if(isset($_POST['catid'])){$catid=$sql->real_escape_string($_POST['catid']);}
    $product->update($id,$code,$name,$weight,$price,$catid);
    // File upload size //
//    $movefile = "../images/products/";
//    $image = $_FILES['image']['name'];
//    $file_name = md5($image);
//    $exp = explode(".", $image);
//    $extension = end($exp);
//    $datetime = date('YmdHis');
//    $editedfilename = $datetime."-".$file_name.".".$extension;
//    // end file upload size //
//    if(empty($quantity || $title_ge || $title_en || $weight || $brand)){
//        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
//    }else{
//        if($image==NULL){
//            $res=$product->update($id,$title_ge,$title_en,$quantity,$brand,$weight,$image);
//        }else{
//            $res=$product->update($id,$title_ge,$title_en,$quantity,$brand,$weight,$editedfilename);
//        }
//        if($res==TRUE){
//            require_once (CONTROLLER.'/image_upload_form.php');
//            move_uploaded_file($_FILES['image']['name'],$movefile);
//        }
//    }
}
if(isset($_POST['delprod'])){
    if(isset($_POST['delprod'])){$id=$sql->real_escape_string($_POST['delprod']);}
    $res=$product->delete($id);

}
