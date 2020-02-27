<?php
if(isset($_POST['editsocial'])){
    if(isset($_POST['id'])){$id=$sql->real_escape_string($_POST['id']);}
    if(isset($_POST['facebook'])){$facebook=$sql->real_escape_string($_POST['facebook']);}
    if(isset($_POST['youtube'])){$youtube=$sql->real_escape_string($_POST['youtube']);}
    if(isset($_POST['instagram'])){$instagram=$sql->real_escape_string($_POST['instagram']);}
    $social->update($id,$facebook, $youtube, $instagram);
}