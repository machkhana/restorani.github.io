<?php
class Finance{
    public function index(){
        global $sql;
        $query = $sql->query("select * from neworder where orderstatus='0'");
        if($query){
            return $query;
        }
        return false;
    }
    public function selperson($id){// ორდერის გამოზახება პერსონალის მიხედვით
        global $sql;
        $query=$sql->query("select * from neworder where orderperson='".$id."' and orderstatus='0'");
        if($query){
            return $query;
        }
        return null;
    }
    public function countpersonorders($id){// ითვლის შეკვეთებს დღის მიხედვით
        global $sql;
        $today=date("Y-m-d");
        $query = $sql->query("select * from neworder where orderperson='".$id."' and orderstatus='0' and (orderdate between '".$today." 00:00:00' and '".$today." 23:59:59')")->num_rows;
        return $query;
    }
    public function countpersonordersformmonth($id){// აქ ითვლის მომსახურე პერსონალის შეკვეთებს თვის მიხედვით
        global $sql;
        $thismonth=date("Y-m");
        $res=0;
        foreach($this->selperson($id) as $val){
            $seldates = substr($val['orderdate'],0,7);
            if($seldates == $thismonth){
                $res += 1;
            }
        }
        return $res;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////
    public function fullproductprice($id){
        global $sql;
        $subtotal='0';
        $query = $sql->query("select fullprice from orderproduct where orderid='$id'");
        foreach ($query as $item) {
            $subtotal += $item['fullprice'];
        }
        return $subtotal;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////
    public function todaytotalsell(){//დღის ნავაჭრი
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
    //////////////////////////////////////////////////////////////////////////////////////////////////
    function days_in_month($year, $month) {//დღეების ჩამონათვალი თვეების მიხედვით
        return round((mktime(0, 0, 0, $month+1, 1, $year) - mktime(0, 0, 0, $month, 1, $year)) / 86400);
    }
    public function countmonth($month,$year){// შეკვეთების დათვლა თვეების მიხედვით და გამოაქვს პროცენტულად
        $count=0;
        global $sql;
        $report = $sql->query("select * from neworder where (orderdate between '".$year."-".$month."-01 00:00:00' and '".$year."-".$month."-".$this->days_in_month($year,$month)." 23:59:59')");
        foreach ($report as $val) {
            if($val['orderstatus']==0){
                $count += 1;
            }
        }
        $selnumrows=$this->index()->num_rows;
        $result= round($count / $selnumrows * 100,2);//აქ ამრგვალებს პროცენტის სახეს
        return $result;
    }
    public function countpersonpercent($id,$percent){// პერსონალის პროცენტი დღის შედეგით
        global $sql;
        $today = date("Y-m-d");
        $subtotal = 0;
        $selpersons = $sql->query("select * from neworder where orderperson='".$id."'");
        foreach($selpersons as $val){
            $seldates = substr($val['orderdate'],0,10);
            if($seldates == $today){
                $subtotal += $this->fullproductprice($val['id']) * $percent / 100;
            }
        }
        return $subtotal;
    }
    public function countpersonpercentformonth($id,$percent){// პერსონალის პროცენტი დღის შედეგით
        global $sql;
        $today = date("Y-m");
        $subtotal = 0;
        $selpersons = $sql->query("select * from neworder where orderperson='".$id."'");
        foreach($selpersons as $val){
            $seldates = substr($val['orderdate'],0,7);
            if($seldates == $today){
                $subtotal += $this->fullproductprice($val['id']) * $percent / 100;
            }
        }
        return $subtotal;
    }
}
$finance = new Finance();
require_once (REQUESTS.'/FinanceRequest.php');
require_once (CONTROLLER.'/OrderController.php');
require_once (CONTROLLER.'/PersonController.php');
