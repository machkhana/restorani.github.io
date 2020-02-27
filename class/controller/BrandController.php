<?php
class Brand{

    public function index(){
        global $sql;
        $query = $sql->query("select * from brands");
        if($query){
            return $query;
        }
        return false;
    }
    public function view($c){
        global $sql;
        $query = $sql->query("select * from brands where id='".$c."'");
        if($query){
            return $query;
        }
        return false;
    }
    public function create($sort,$title_ge,$title_en,$text_ge,$text_en,$editedfilename){
        global $sql;
        $query=$sql->query("insert into brands (sort,title_ge,title_en,text_ge,text_en,image) values ('$sort','$title_ge','$title_en','$text_ge','$text_en','$editedfilename')");
        if($query){
            return true;
        }
        return false;
    }
    public function update($id,$sort,$title_ge,$title_en,$text_ge,$text_en,$editedfilename){
        global $sql;
        if($editedfilename==NULL){
            $sql->query("update brands set sort='$sort',title_ge='$title_ge',title_en='$title_en',text_ge='$text_ge',text_en='$text_en' where id='$id'");
            return false;
        }else{
            $res=$sql->query("select * from brands where id='".$this->id."'")->fetch_array();
            $oldimage = $res['image'];
            if(file_exists('../images/brands/'.$oldimage)){
                unlink('../images/brands/'.$oldimage);
            }
            $sql->query("update brands set sort='$sort',title_ge='$title_ge',title_en='$title_en',text_ge='$text_ge',text_en='$text_en',image='$editedfilename' where id='$id'");
            return true;
        }
    }
    public function delete($id){
        global $sql;
        $res=$sql->query("select image from brands where id='$id'")->fetch_array();
        if(unlink('../images/brands/'.$res['image'])){
            $result=$sql->query("delete from brands where id='$id'");
        }
        if($result){
            return true;
        }
        return false;

    }
}
$brand = new Brand();
require_once (REQUESTS.'/BrandRequest.php');
