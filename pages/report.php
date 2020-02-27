<?php
require_once (CONTROLLER.'/ReportController.php');
require_once (CONTROLLER.'/ProfileController.php');
$print= $profile->SelectPrint();
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            რეპორტი
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 text-left mb-3" style="margin-bottom:10px;">
                <div id="reportbuttons">
<!--                    <button class="btn btn-success btn-sm">დღის ნავაჭრი</button>-->
<!--                    <button class="btn btn-success btn-sm">თვის ნავაჭრი</button>-->
                    <button class="btn btn-success btn-sm filter">გაფილტვრა</button>
                    <button class="btn btn-success btn-sm" id="sendexcel">XLS ექსპორტი</button>
                </div>
            </div>
            <form action="./class/ajax/exportxls.php" id="exportform" method="post">
                <input id="create_excel" name="exportexcel" value="all" type="hidden">
            </form>
            <div class="col-sm-12" id="daterange">
                <div class="form-group">
                    <label>დროის განსაზღვრა:</label>
                    <div class="input-group col-sm-4">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservation"/>
                    </div><!-- /.input group -->
                </div>
            </div>
            <p></p>
        </div>
        <div class="row" id="filterside"></div>
        <div class="row" id="viewside">
            <div class="box filterside">
                <?php if($view){ $row=$order->view($view)->fetch_array(); require_once ('printarea.php'); }else{?>
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
                                <?php foreach ($report->index() as $reports){ ?>
                                    <?php if($reports['orderstatus']==0){?>
                                        <tr id="orderid-<?=$reports['id'];?>">
                                            <td><?=$reports['ordercode'];?></td>
                                            <td><?= $person->view($reports['orderperson'],'fullname');?></td>
                                            <td><?=$reports['orderdate'];?></td>
                                            <td> <?=$report->fullproductprice($reports['id']);?> ლარი</td>
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
                <?php } ?>
            </div><!-- /.box -->
        </div>
    </section><!-- /.content -->
</aside>
<script src="js/report.js" type="text/javascript"></script>

