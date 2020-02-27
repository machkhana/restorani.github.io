<?php
require_once ('../conn.php');

if (isset($_GET['daterange'])) {$daterange = $sql->real_escape_string($_GET['daterange']);}

// some functions //
function selectrange($daterange){
    global $sql;
    $start = substr($daterange, 0, 10);
    $end = substr($daterange, 13, 23);
    $report = $sql->query("select * from neworder where (orderdate between '".$start." 00:00:00' and '".$end." 23:59:59')");
    return $report;
}
function fullproductprice($id){
    global $sql;
    $subtotal='0';
    $query = $sql->query("select fullprice from orderproduct where orderid='$id'");
    foreach ($query as $item) {
        $subtotal += $item['fullprice'];
    }
    return $subtotal;
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

if(selectrange($daterange)->num_rows > 0){
?>
<div class="box filterside">
    <div class="box-body table-responsive" id="employee_table">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ქვითრის ნომერი</th>
                <th>პერსონალი</th>
                <th>გამოწერის თარიღი</th>
                <th>თანხა</th>
                <th>პარამეტრები</th>
            </tr>
            </thead>
            <tbody class="reportstatus">
            <div id="reportid">
                <?php foreach (selectrange($daterange) as $reports){ ?>
                    <?php if($reports['orderstatus']==0){?>
                        <tr id="orderid-<?=$reports['id'];?>">
                            <td><?=$reports['ordercode'];?></td>
                            <td><?= view($reports['orderperson'],'fullname');?></td>
                            <td><?=$reports['orderdate'];?></td>
                            <td><?= fullproductprice($reports['id']);?> ლარი</td>
                            <td>
                                <a href="?p=neworder&view=<?=$reports['id'];?>" class="btn btn-default btn-sm edit" title="ნახვა"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </div>
            </tbody>
            <tfoot>
            <tr>
                <th>ქვითრის ნომერი</th>
                <th>პერსონალი</th>
                <th>გამოწერის თარიღი</th>
                <th>თანხა</th>
                <th>პარამეტრები</th>
            </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
<?php }else{ echo "0";}?>