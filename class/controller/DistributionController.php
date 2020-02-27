<?php
class Distribution{
    public function index(){
        global $sql;
        $query = $sql->query("select * from distribution");
        if($query){
            return $query;
        }
        return false;
    }
    public function update($id, $text_ge, $text_en){
        global $sql;
        $sql->query("update distribution set text_ge='$text_ge', text_en='$text_en' where id='$id'");
    }
}
$distribution = new Distribution();
require_once (REQUESTS.'/DistributionRequest.php');
