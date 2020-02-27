<?php
if(isset($_POST['editabout'])){
    if(isset($_POST['id'])){$id=$sql->real_escape_string($_POST['id']);}
    if(isset($_POST['text_ge'])){$text_ge=$sql->real_escape_string($_POST['text_ge']);}
    if(isset($_POST['text_en'])){$text_en=$sql->real_escape_string($_POST['text_en']);}
    $about->update($text_ge,$text_en,$id );
}
?>