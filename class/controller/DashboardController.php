<?php

class Dashboard {
    public function index(){
        global $sql;
        $query = $sql->query("select * from neworder where orderstatus='0'");
        if($query){
            return $query;
        }
        return false;
    }
    public function monthtotalsell($key){//დღის ნავაჭრი
        $today = date("Y-".$key);
        $subtotal = 0;
        foreach($this->index() as $val){
            $seldates = substr($val['orderdate'],0,7);
            if($seldates == $today){
                $subtotal += $this->fullproductprice($val['id']);
            }
        }
        return $subtotal;
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
    public function todaytotalsell(){
        $today = date("Y-m-d");
        $subtotal = 0;
        foreach($this->index() as $val){
            $seldates = substr($val['orderdate'],0,10);
            if($seldates == $today){
                $subtotal += $this->fullproductprice($val['id']);
            }
        }
        return $subtotal;
    }
    public function todayordercount(){
        $today = date("Y-m-d");
        $res = 0;
        foreach($this->index() as $val){
            $seldates = substr($val['orderdate'],0,10);
            if($seldates == $today){
                $res += 1;
            }
        }
        return $res;
    }
    function days_in_month($year, $month) {
        return round((mktime(0, 0, 0, $month+1, 1, $year) - mktime(0, 0, 0, $month, 1, $year)) / 86400);
    }
    public function countmonth($month){
        $count=0;
        global $sql;
        $year=date('Y');
        $report = $sql->query("select * from neworder where (orderdate between '".$year."-".$month."-01 00:00:00' and '".$year."-".$month."-".$this->days_in_month($year,$month)." 23:59:59')");
        foreach ($report as $val) {
            if($val['orderstatus']==0){
                $count += 1;
            }
        }
        $selnumrows=$this->index()->num_rows;
        return round($count / $selnumrows * 100,2);
    }

}
$dash = new Dashboard();
//require_once (REQUESTS.'/OrderRequest.php');
require_once (CONTROLLER.'/PersonController.php');
require_once (CONTROLLER.'/ProductController.php');
