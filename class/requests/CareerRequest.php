<?php
if(isset($_POST['addcareer'])){
    if(isset($_POST['title_ge'])){$title_ge=$sql->real_escape_string($_POST['title_ge']);}
    if(isset($_POST['title_en'])){$title_en=$sql->real_escape_string($_POST['title_en']);}
    if(isset($_POST['text_ge'])){$text_ge=$sql->real_escape_string($_POST['text_ge']);}
    if(isset($_POST['text_en'])){$text_en=$sql->real_escape_string($_POST['text_en']);}
    if(isset($_POST['startdate'])){$startdate=$sql->real_escape_string($_POST['startdate']);}
    if(isset($_POST['enddate'])){$enddate=$sql->real_escape_string($_POST['enddate']);}

    if(empty($title_ge && $title_en && $text_ge  && $text_en && $startdate && $enddate)){
        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
    }else{
        $career->create($title_ge,$title_en,$text_ge,$text_en,$startdate,$enddate);
    }
}
if(isset($_POST['editcareer'])){
    if(isset($_POST['id'])){$id=$sql->real_escape_string($_POST['id']);}
    if(isset($_POST['title_ge'])){$title_ge=$sql->real_escape_string($_POST['title_ge']);}
    if(isset($_POST['title_en'])){$title_en=$sql->real_escape_string($_POST['title_en']);}
    if(isset($_POST['text_ge'])){$text_ge=$sql->real_escape_string($_POST['text_ge']);}
    if(isset($_POST['text_en'])){$text_en=$sql->real_escape_string($_POST['text_en']);}
    if(isset($_POST['startdate'])){$startdate=$sql->real_escape_string($_POST['startdate']);}
    if(isset($_POST['enddate'])){$enddate=$sql->real_escape_string($_POST['enddate']);}

    if(empty($title_ge && $title_en && $text_ge  && $text_en && $startdate && $enddate)){
        echo "<script> alert ('გთხოვთ შეავსოთ ყველა ველი');</script>";
    }else{
        $res=$career->update($id,$title_ge,$title_en,$text_ge,$text_en,$startdate,$enddate);
    }
}
if(isset($_POST['delcareer'])){
    if(isset($_POST['delcareer'])){$id=$sql->real_escape_string($_POST['delcareer']);}
    $res=$career->delete($id);

}
