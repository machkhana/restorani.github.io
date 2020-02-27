<?php
require_once ('../conn.php');
require_once ('class/controller/PersonController.php');
if (isset($_GET['daterange'])) {$daterange = $sql->real_escape_string($_GET['daterange']);}
$start = substr($daterange, 0, 10);
$end = substr($daterange, 13, 23);
$report = $sql->query("select * from neworder where (orderdate between '".$start." 00:00:00' and '".$end." 23:59:59')");
//$report2 = $sql->query("select * from neworder where id=$report['id']");
//include ('./class/controller/ReportController.php');
?>
<div class="box filterside">
        <div class="box-body table-responsive">
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
                    <?php foreach ($report as $reports){ ?>
                        <?php if($reports['orderstatus']==0){?>
                            <tr id="orderid-<?=$reports['id'];?>">
                                <td><?=$reports['ordercode'];?></td>
                                <td><?= $person->view($reports['orderperson'],'fullname');?></td>
                                <td><?=$reports['orderdate'];?></td>
                                <td><?=$report->fullproductprice($reports['id']);?> ლარი</td>
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