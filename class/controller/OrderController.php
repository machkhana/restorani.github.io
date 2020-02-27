<?php

class Order {
    public function index(){
        global $sql;
        $query = $sql->query("select * from neworder");
        if($query){
            return $query;
        }
        return false;
    }
    public function view($id){
        global $sql;
        $query = $sql->query("select * from neworder where id=$id");
        if($query){
            return $query;
        }
        return false;
    }
    public function orderproduct($id){
        global $sql;
        $query = $sql->query("select * from orderproduct where orderid='$id'");
        if($query){
            return $query;
        }
        return false;
    }
    public function DisableOrder($id,$status){
        global $sql;
        $query=$sql->query("update neworder set orderstatus='$status' where id='$id'");
        if($query){
            return true;
        }
        return false;
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
    public function createorder($ordercode, $orderperson){
        global $sql;
        if($ordercode==null){
            $ordercode = date('Hms');
        }
        $check = $sql->query("select id from neworder where ordercode=$ordercode");
        if($check->num_rows > 0){
            //return '1';
        }else{
            $sql->query("insert into neworder (ordercode,orderstatus,orderperson) values ('$ordercode','0','$orderperson')");
            $result = $sql->query("select id from neworder where id=LAST_INSERT_ID()")->fetch_array();
            if($result==TRUE){
                return $result['id'];
            }
            return false;
        }
    }
    public function createorderproduct($orderid,$productid,$price,$quantity,$fullprice){
        global $sql;
        $sql->begin_transaction();
        try{
            $sql->query("insert into orderproduct (orderid,productid,price,quantity,fullprice) values ('$orderid','$productid','$price','$quantity','$fullprice')");
            $sql->commit();
        }catch (\Exception $e){
            $sql->rollback();
        }

    }
}
$order = new Order();
require_once (REQUESTS.'/OrderRequest.php');
require_once (CONTROLLER.'/PersonController.php');
require_once (CONTROLLER.'/ProductController.php');
