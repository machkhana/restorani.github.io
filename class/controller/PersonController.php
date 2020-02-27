<?php
class Person{
    public function index(){
        global $sql;
        $query = $sql->query("select * from persons");
        if($query){
            return $query;
        }
        return false;
    }
    public function view($id,$value){
        global $sql;
        $query=$sql->query("select * from persons where id='$id'")->fetch_array();
        if($query){
            return $query[$value];
        }
        return false;
    }
    public function personorders($id){
        global $sql;
        $query=$sql->query("select * from neworder where orderperson='".$id."' and orderstatus='0'");
        if($query){
            return $query;
        }
        return false;
    }
    public function create($fullname,$status,$percent){
        global $sql;
        $sql->query("insert into persons (fullname,status,percent) values ('$fullname','$status','$percent')");
        header("location:?p=persons");
        exit();
    }
    public function update($id,$fullname,$status,$percent){
        global $sql;
        $sql->query("update persons set fullname='$fullname',status='$status',percent='$percent' where id='$id'");
        header("location:?p=persons");
        exit();
    }
    public function delete($id){
        global $sql;
        $sql->query("delete from persons where id='$id'");
    }
    public function fullproductprice($id){
        global $sql;
        $subtotal='0';
        $query = $sql->query("select fullprice from orderproduct where orderid='$id'");
        foreach ($query as $item) {
            $subtotal += $item['fullprice'];
        }
        return $subtotal;
    }
}
$person = new Person();
require_once (REQUESTS.'/PersonRequest.php');

