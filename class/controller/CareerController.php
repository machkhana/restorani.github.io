<?php

class Career {
    public function index(){
        global $sql;
        $query = $sql->query("select * from career");
        if($query){ return $query; } return false;
    }
    public function view($id){
        global $sql;
        $query = $sql->query("select * from career where id='". $id ."'");
        if($query){
            return $query;
        }
        return false;
    }
    public function create($title_ge,$title_en,$text_ge,$text_en,$startdate,$enddate){
        global $sql;
        $sql->query("insert into career (title_ge,title_en,text_ge,text_en,startdate,enddate) values ('$title_ge','$title_en','$text_ge','$text_en','$startdate','$enddate')");
    }
    public function update($id,$title_ge,$title_en,$text_ge,$text_en,$startdate,$enddate){
        global $sql;
        $sql->query("update career set title_ge='$title_ge',title_en='$title_en',text_ge='$text_ge',text_en='$text_en',startdate='$startdate',enddate='$enddate' where id='$id'");

    }
    public function delete($id){
        global $sql;
        $sql->query("delete from career where id='$id'");
    }
}
$career = new Career();
require_once (REQUESTS.'/CareerRequest.php');