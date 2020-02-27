<?php
require_once (CONTROLLER.'/FinanceController.php');
$subtotal=0;
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ბუღალტერია
        </h1>
    </section
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">დღის ნავაჭრი: <?= $finance->todaytotalsell();?> ლარი</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">თვის ნავაჭრი: <?= $finance->monthtotalsell(date('m'));?> ლარი (<?= $month2[date("n")];?>)</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">მომსახურე პერსონალი (ერთი დღის შედეგი)</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>სახელი</th>
                                <th>შეკვეთების რაოდენობა</th>
                                <th style="width: 100px">თანხა 10%</th>
                            </tr>
                            <?php foreach ($person->index() as $persons){ ?>
                                <tr>
                                    <td></td>
                                    <td><?= $persons['fullname'];?></td>
                                    <td><?= $finance->countpersonorders($persons['id']);?></td>
                                    <td><?= $finance->countpersonpercent($persons['id'], $persons['percent']);?> ლარი</td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">მომსახურე პერსონალი (ერთი თვის შედეგი)</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>სახელი</th>
                                <th>შეკვეთების რაოდენობა</th>
                                <th style="width: 100px">თანხა 10%</th>
                            </tr>
                            <?php foreach ($person->index() as $persons){ ?>
                                <tr>
                                    <td></td>
                                    <td><a href="?p=persons&user=<?=$persons['id'];?>"><?= $persons['fullname'];?></a></td>
                                    <td><?= $finance->countpersonordersformmonth($persons['id']);?></td>
                                    <td><?= $finance->countpersonpercentformonth($persons['id'], $persons['percent']);?> ლარი</td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <div class="col-md-10">
                            <h3 class="box-title">რომელ თვეს ქონდა მაღალი შედეგი(წელი: <?=date('Y');?>) </h3>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body" >
                        <div >
                            <?php foreach ($month as $val=>$key){?>
                                <div class="progress">
                                    <div data-toggle="tooltip" title="ნავაჭრი <?= $finance->monthtotalsell($key);?> ლარი" class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: <?= $finance->countmonth($key,date('Y'));?>%; color:#000000;">
                                        <label><?= $monthname[$val]; ?> - <?= $finance->countmonth($key,date('Y'));?>%</label>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (right) -->
            <div class="col-md-5 col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-sm-8">
                            <h3 class="box-title">ნავაჭრი წლების მიხედვით </h3>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control col-sm-2" id="selectyear">
                                <option selected disabled value="#">აირჩიეთ წელი</option>
                                <?php
                                for($i=date('Y');$i >= 2000;$i--){
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding" id="yearrangeprogressbar">
                        <table class="table table-condensed" id="yearrange">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>წელი</th>
                                <th>თვე</th>
                                <th>თანხა</th>
                            </tr>
                            <?php foreach ($month as $val=>$key){ ?>
                                <tr>
                                    <td></td>
                                    <td><?= date('Y'); ?></td>
                                    <td><?= $monthname[$val]; ?></td>
                                    <td><?= $finance->monthtotalsell($key); ?> ლარი</td>
                                </tr>
                                <?php $subtotal += $finance->monthtotalsell($key);} ?>
                            <tr>
                                <th style="width: 10px"> </th>
                                <th></th>
                                <th></th>
                                <th>ჯამი: <?= $subtotal; ?> ლარი</th>
                            </tr>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div><!-- /.row -->
        <!-- row -->
    </section><!-- /.content -->
    <div id="row">

    </div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="./js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<script src="js/financial.js" type="text/javascript"></script>