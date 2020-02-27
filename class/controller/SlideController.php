<?php

class Slide {
    public function index(){
        global $sql;
        $query = $sql->query("select * from slide order by sort asc");
        if($query){
            return $query;
        }
        return false;
    }
    public function create($title,$sort,$editedfilename){
        global $sql;
        $query=$sql->query("insert into slide (image,title,sort) value ('$editedfilename','$title','$sort')");
        if($query){
            return true;
        }
        return false;
    }
    public function update($id,$title,$sort,$image){
        $this->id=$id;
        global $sql;
        if($image > 0){
            $res=$sql->query("select * from slide where id='".$this->id."'")->fetch_array();
            $oldimage = $res['image'];
            if(file_exists('../images/main-slider/'.$oldimage)){
                unlink('../images/main-slider/'.$oldimage);
            }
            $sql->query("update slide set image='$image',title='$title',sort='$sort' where id='".$this->id."'");
            return true;
        }else{
            $sql->query("update slide set title='$title',sort='$title' where id='".$this->id."'");
        }

    }
    public function delete($id){
        $this->id=$id;
        global $sql;
        $res=$sql->query("select * from slide where id='".$this->id."'")->fetch_array();
        $oldimage = $res['image'];
        if(file_exists('../images/main-slider/'.$oldimage)){
            unlink('../images/main-slider/'.$oldimage);
        }
        $sql->query("delete from slide where id='".$this->id."'");
    }
}
$slide = new Slide();
require_once (REQUESTS.'/SlideRequest.php');
?>
