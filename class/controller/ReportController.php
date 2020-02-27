<?php
class Report{
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
    public function selectrange($start,$end){
        global $sql;
        $query = $sql->query("select * from neworder where substring(orderdate, 0, 10) between '$start' and '$end'");
        if($query){
            return $query;
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
}
$report = new Report();
require_once (CONTROLLER.'/PersonController.php');
require_once (REQUESTS.'/ReportRequest.php');

