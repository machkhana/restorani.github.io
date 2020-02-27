<?php
class Social{
    public function index(){
        global $sql;
        $query=$sql->query("select * from social");
        return $query;
    }
    public function update($id,$facebook, $youtube, $instagram){
        global $sql;
        $sql->query("update social set facebook='$facebook',youtube='$youtube', instagram='$instagram' where id='$id'");
    }
}
$social = new Social();
require_once (REQUESTS.'/SocialRequest.php');
