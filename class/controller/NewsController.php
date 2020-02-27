<?php
class News{
    public function index($limit=0){
        //global $sql;
        global $sql;
        if($limit == NULL){
            $query = $sql->query("select * from news order by id asc");
        }else{
            $query = $sql->query("select * from news order by id asc limit 0, ".$limit);
        }

        if($query){
            return $query;
        }
        return false;
    }
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
    public function create($title_ge,$title_en,$shorttext_ge,$shorttext_en,$text_ge,$text_en,$editedfilename){
        global $sql;
        $query=$sql->query("insert into news (image,title_ge,title_en,shorttext_ge,shorttext_en,text_ge,text_en) value ('$editedfilename','$title_ge','$title_en','$shorttext_ge','$shorttext_en','$text_ge','$text_en')");
        if($query){
            return true;
        }
        return false;
    }
    public function update($id,$title_ge,$title_en,$shorttext_ge,$shorttext_en,$text_ge,$text_en,$image){
        $this->id=$id;
        global $sql;
        if($image > 0){
            $res=$sql->query("select * from news where id='".$this->id."'")->fetch_array();
            $oldimage = $res['image'];
            if(file_exists('../images/news/'.$oldimage)){
                unlink('../images/news/'.$oldimage);
            }
            $sql->query("update news set image='$image',title_ge='$title_ge',title_en='$title_en',shorttext_ge='$shorttext_ge',shorttext_en='$shorttext_en',text_ge='$text_ge',text_en='$text_en' where id='".$this->id."'");
            return true;
        }else{
            $sql->query("update news set title_ge='$title_ge',title_en='$title_en',shorttext_ge='$shorttext_ge',shorttext_en='$shorttext_en',text_ge='$text_ge',text_en='$text_en' where id='".$this->id."'");
        }

    }
    public function delete($id){
        $this->id=$id;
        global $sql;
        $res=$sql->query("select * from news where id='".$this->id."'")->fetch_array();
        $oldimage = $res['image'];
        if(unlink('../images/news/'.$oldimage)){
            $sql->query("delete from news where id='".$this->id."'");
        }
    }
}
$news = new News();
require_once (REQUESTS.'/NewsRequest.php');
?>
