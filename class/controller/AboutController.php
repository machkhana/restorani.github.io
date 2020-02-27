<?php
class About{
    public function index(){
        global $sql;
        $query = $sql->query("select * from about");
        if($query){
            return $query;
        }
        return false;
    }
    public function update($text_ge, $text_en, $id){
        global $sql;
        $sql->query("update about set text_ge='$text_ge', text_en='$text_en' where id='$id'");
    }
}
$about = new About();
require_once (REQUESTS.'/AboutRequest.php');
