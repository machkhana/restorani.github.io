<?php
require_once (CONTROLLER.'/DashboardController.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            მთავარი
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <?= $dash->todaytotalsell();?>
                    </h3>
                    <p>
                        დღის ნავაჭრი
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="?p=neworder" class="small-box-footer">
                    გადასვლა <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        <?= $dash->todayordercount(); ?>
                    </h3>
                    <p>
                        შეკვეთის რაოდენობა
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    გადასვლა <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        0
                    </h3>
                    <p>
                        User
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    გადასვლა <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        <?= $dash->monthtotalsell(date('m'));?>
                    </h3>
                    <p>
                        თვის ნავაჭრი
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    გადასვლა <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        </div><!-- /.row -->
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">შეკვეთების დაჯამება თვეების მიხედვით (წელი: <?=date('Y');?>)</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php

                        foreach ($month as $val=>$key){ ?>
                            <div class="progress">
                                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: <?= $dash->countmonth($key);?>%; color:#000000">
                                    <label><?= $monthname[$val]; ?> - <?= $dash->countmonth($key);?> %</label>
                                </div>
                            </div>
                        <?php } ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (right) -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</aside>
<script src="./js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<script src="js/dashboard.js" type="text/javascript"></script>