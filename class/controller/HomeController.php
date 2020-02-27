<?php
require_once (CONTROLLER.'/SlideController.php');
require_once (CONTROLLER.'/NewsController.php');
require_once (CONTROLLER.'/ProductController.php');
require_once (CONTROLLER.'/Classes.php');
class Home {
    public function view($id){
        global $sql;
        $this->id=$id;
        $query = $sql->query("select * from news where id='".$this->id."'");
        if($query){
            return $query;
        }
        return query;
    }
    public function edit($id){
        $this->id=$id;
        global $sql;
        $query=$sql->query("select * from news where id='".$this->id."'");
        if($query){
            return $query;
        }
        return false;
    }
    public function insert($image,$title,$text){
        global $sql;
        $query=$sql->query("insert into news (image,title,text) value ('$image','$title','$text')");
        if($query){
            return true;
        }
        return false;
    }
    public function update($image,$title,$text,$id){
        $this->id=$id;
        global $sql;
        if($image > 0){
            $res=$sql->query("select * from news where id='".$this->id."'")->fetch_array();
            $oldimage = $res['image'];
            if(unlink($oldimage)){
                $sql->query("update news set image='$image',title='$title',text='$text' where id='".$this->id."'");
            }
        }else{
            $sql->query("update news set title='$title',text='$text' where id='".$this->id."'");
        }

    }
    public function delete($id){
        $this->id=$id;
        global $sql;
        $res=$sql->query("select * from news where id='".$this->id."'")->fetch_array();
        $oldimage = $res['image'];
        if(unlink($oldimage)){
            $sql->query("delete from news where id='".$this->id."'");
        }
    }
}
$home = new Home();
?>
