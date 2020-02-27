<?php
if(isset($_GET["selectyear"])){
    require_once ('../conn.php');
    include ('../controller/FinanceController.php');
    $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
    if(isset($_GET["selectyear"])){$selyear=$sql->real_escape_string($_GET["selectyear"]);}
    //$finance->countmonth($month,$selyear);
    $finance= new Finance();
    foreach ($month as $val=>$key){
        echo '<div id="yearrange" data-toggle="tooltip" title="ნავაჭრი '.$finance->monthtotalsell($key).' ლარი" class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: '.$finance->countmonth($key,$selyear).'; color:#000000;\">
               <label>'.$monthname[$val].' - '.$finance->countmonth($key,$selyear).'%</label>
              </div>';
    }
}
