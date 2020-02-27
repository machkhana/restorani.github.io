<?php
require_once ('../conn.php');
if (isset($_POST['exportexcel'])) {$daterange = $sql->real_escape_string($_POST['exportexcel']);}
$export='';
// some functions //
function selectrange($daterange){
    global $sql;
    if($daterange=='all'){
        $report = $sql->query("select * from neworder where orderstatus='0'");
        return $report;
    }else{
        $start = substr($daterange, 0, 10);
        $end = substr($daterange, 13, 23);
        $report = $sql->query("select * from neworder where orderstatus='0' and (orderdate between '".$start." 00:00:00' and '".$end." 23:59:59')");
        return $report;
    }
}
function fullproductprice($id){
    global $sql;
    $subtotal='0';
    $query = $sql->query("select fullprice from orderproduct where id='$id'");
    foreach ($query as $item) {
        $subtotal += $item['fullprice'];
    }
    return $subtotal;
}
function selectorderproducts($id){
    global $sql;
    $query = $sql->query("select * from orderproduct where orderid='$id'");
    if($query){
        return $query;
    }
    return false;
}
function selectproduct($id){
    global $sql;
    $query = $sql->query("select * from products where id='$id'")->fetch_array();
    if($query){
        return $query['name'];
    }
    return false;
}
function view($id,$value){
    global $sql;
    $query=$sql->query("select * from persons where id='$id'")->fetch_array();
    if($query){
        return $query[$value];
    }
    return false;
}
// end some function //
$export .='
        <table class="table" border="1">
            <tr>
                <th>ქვითრის ნომერი</th>
                <th>გამოწერის თარიღი</th>
                <th>დასახელება</th>
                <th>ფასი</th>
                <th>რაოდენობა</th>
                <th>თანხა</th>
                <th>პერსონალი</th>
                <th>პერს. %</th>
            </tr>';
    foreach (selectrange($daterange) as $reports){
        foreach (selectorderproducts($reports['id']) as $products) {
            $export .= '
            <tr>
                <td>' . $reports['ordercode'] . '</td>
                <td>' . $reports['orderdate'] . '</td>
                <td>' . selectproduct($products['productid']) . '</td>
                <td>' . $products['price'] . '</td>
                <td>' . $products['quantity'] . '</td>
                <td>' . fullproductprice($products['id']) . '</td>
                <td>' . view($reports['orderperson'], 'fullname') . '</td>
                <td>' . fullproductprice($products['id']) * view($reports['orderperson'], 'percent') / 100 . '</td>
            </tr>';
        }
    }
$export .='</table>';

header('Content-Type: application/xls');
header('Content-disposition: attachment; filename=CMS_'.rand().'_'.date("Y-m-d").'.xls');
echo $export;
?>
