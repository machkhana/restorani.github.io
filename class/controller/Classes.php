<?php
class Classes{
    public function select($name, $sort=0){
        if($sort==NULL){
            $query = "select * from".$name." order by".$sort." asc";
        }else{
            $query = "select * from".$name;
        }
        return $query;
    }
    public function view($name='dbname', $wherename, $id){
        $query = "select * from".$name." where ". $wherename ."=".$id;
        return $query;
    }
}
$mycs = new Classes();
?>
