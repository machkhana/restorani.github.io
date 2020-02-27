<?php
class Product{
    public function category(){
        global $sql;
        $query = $sql->query("select * from category");
        if($query){
            return $query;
        }
        return false;
    }
    public function selcat($id){
        global $sql;
        $query = $sql->query("select * from category where id='$id'")->fetch_array();
        if($query){
            return $query['name'];
        }
        return false;
    }
    public function index(){
        global $sql;
        $query = $sql->query("select * from products order by id asc");
        if($query){
            return $query;
        }
        return false;
    }
    public function view($id){
        global $sql;
        $query = $sql->query("select * from products where id='$id'")->fetch_array();
        if($query){
            return $query;
        }
        return query;
    }
    public function create($code, $name, $weight, $price,$catid){
        global $sql;
        if($code==NULL){
            $code = rand(100,10000);
        }
        $query=$sql->query("insert into products (name,weight,code,price,catid) values ('$name','$weight','$code','$price','$catid')");
        if($query){
            return true;
        }
        return false;
    }
    public function update($id,$code,$name,$weight,$price,$catid){
        $this->id=$id;
        global $sql;
        $sql->query("update products set name='$name',weight='$weight',code='$code',price='$price',catid='$catid' where id='".$this->id."'");
        return true;
//        if($image > 0){
//            $res=$sql->query("select * from product where id='".$this->id."'")->fetch_array();
//            $oldimage = $res['image'];
//            if(file_exists('../images/products/'.$oldimage))
//            {
//                unlink('../images/products/'.$oldimage);
//            }
//            $sql->query("update product set title_ge='$title_ge',title_en='$title_en',image='$image',quantity='$quantity',weight='$weight', brand_id='$brand' where id='".$this->id."'");
//            return true;
//        }else{
//            $sql->query("update product set title_ge='$title_ge',title_en='$title_en',quantity='$quantity',weight='$weight', brand_id='$brand' where id='".$this->id."'");
//            return false;
//        }

    }
    public function delete($id){
        $this->id=$id;
        global $sql;
        $sql->query("delete from products where id='".$this->id."'");
//        $oldimage = '../images/products/'.$res['image'];
//        if(unlink($oldimage)){
//            $sql->query("delete from product where id='".$this->id."'");
//        }
    }
}
$product = new Product();
require_once (REQUESTS.'/ProductRequest.php');
?>
