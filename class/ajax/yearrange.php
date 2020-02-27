<?php
require_once ('../conn.php');
class Finance{
    public function index(){
        global $sql;
        $query = $sql->query("select * from neworder where orderstatus='0'");
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
    public function monthtotalsell($year,$key){//დღის ნავაჭრი
        $today = date($year."-".$key);
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
}
$finance = new Finance();
$subtotal=0;
if(isset($_GET["selectyear"])){
    $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
    $monthname = array('იანვარი','თებერვალი','მარტი','აპრილი','მაისი','ივნისი','ივლისი','აგვისტო','სექტემბერი','ოქტომბერი','ნოემბერი','დეკემბერი');
    if(isset($_GET["selectyear"])){$selyear=$sql->real_escape_string($_GET["selectyear"]);}
    echo '
        <table class="table table-condensed" id="yearrange">
            <tr>
                <th style="width: 10px">#</th>
                <th>წელი</th>
                <th>თვე</th>
                <th>თანხა</th>
            </tr>';
            foreach ($month as $val=>$key){
                echo '
                <tr>
                    <td></td>
                    <td>'.$selyear.'</td>
                    <td>'.$monthname[$val].'</td>
                    <td>'.$finance->monthtotalsell($selyear,$key).' ლარი</td>
                </tr>';
                $subtotal += $finance->monthtotalsell($selyear,$key);
            }
            echo '
            <tr>
                <th style="width: 10px"></th>
                <th></th>
                <th></th>
                <th>ჯამი: '.$subtotal.' ლარი</th>
            </tr>
            ';
    echo'</table>';
}
?>
