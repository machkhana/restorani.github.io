<?php
require_once (CONTROLLER.'/OrderController.php');
require_once (CONTROLLER.'/ProfileController.php');
$print= $profile->SelectPrint();
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            შეკვეთები <span><?= $message; ?></span>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 text-left mb-3" style="margin-bottom:10px;">
                <div id="removebuttons">
                    <a href="?p=neworder" class="btn btn-primary btn-sm ">აქტიური</a>
                    <a href="?p=neworder&st=1" class="btn btn-danger btn-sm ">გაუქმებული</a>
                    <button class="btn btn-success btn-sm addbutton" id=""  title="დამატება">ახალი შეკვეთა</button>
                </div>
                <button class="btn btn-success btn-sm reset"  title="უკან დაბრუნება">უკან დაბრუნება</button>
            </div>
            <p></p>
        </div>
        <div class="row" id="addside">
            <!-- general form elements -->
            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">ახალი შეკვეთის დამატება</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="" method="post">
                        <div class="box-body">
                            <div class="form-group" id="checkcode">
                                <label for="code">ქვითრის ნომერი (მიუთითე ან დატოვე ცარიელი)</label>
                                <input type="text" class="form-control" id="code" onblur="checkCode()" name="ordercode">
                            </div>
                            <div class="form-group">
                                <label for="person">მომსახურე პერსონალი</label>
                                <select name="orderperson" class="form-control" id="person" required>
                                    <option value="0" selected disabled>აირჩიეთ</option>
                                    <?php
                                    foreach($person->index() as $persons){
                                        echo "<option value='".$persons['id']."'>".$persons['fullname']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <label for="hereproduct">პროდუქციის ჩამონათვალი</label>
                            <div class="row" id="hereproduct"></div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="addorder" class="btn btn-primary addorder">დამატება</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
            <div class="col-sm-6">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">პროდუქციის დამატება</h3>
                    </div><!-- /.box-header -->
                    <form action="" id="">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="selectproduct">აირჩიეთ პროდუქტი</label><br/>
                                <select class="form-control js-example-basic-single"  id="selectproduct" style="width: 100%">
                                    <option value="" selected disabled>აირჩიეთ</option>
                                    <?php foreach($product->index() as $products){?>
                                        <option value="<?=$products['id'];?>"><?=$products['name'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('.js-example-basic-single').select2();
                                });
                            </script>
                            <div class="form-group">
                                <label for="quant">რაოდენობა</label>
                                <input name="quantity" type="text" class="form-control" id="quant">
                            </div>
                        </div>
                    </form>
                    <div class="box-footer">
                        <button class="btn-success btn-sm addproduct"  title="დამატება"><i class="fa fa-plus"></i> </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="viewside">
            <div class="box">
                <?php if($view){ $row=$order->view($view)->fetch_array(); require_once ('printarea.php'); }else{?>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ქვითრის ნომერი</th>
                                <th>გამოწერის თარიღი</th>
                                <th>თანხა</th>
                                <th>პერსონალი</th>
                                <th>პერს. %</th>
                                <th>პარამეტრები</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($_GET['st'])){?>
                                <?php foreach ($order->index() as $orders){ ?>
                                    <?php if($orders['orderstatus']==1){?>
                                        <tr id="orderid-<?=$orders['id'];?>">
                                            <td><?=$orders['ordercode'];?></td>
                                            <td><?= $person->view($orders['orderperson'],'fullname');?></td>
                                            <td><?=$orders['orderdate'];?></td>
                                            <td> <?=$order->fullproductprice($orders['id']);?> ლარი</td>
                                            <td>
                                                <a href="?p=neworder&view=<?=$orders['id'];?>" class="btn btn-default btn-sm edit" title="ნახვა"><i class="fa fa-eye"></i></a>
                                                <button class="btn btn-success btn-sm remove" id="<?=$orders['id'];?>" data-status="0" title="აღდგენა"><i class="fa fa-arrow-circle-o-up"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php }else{ ?>
                                <?php foreach ($order->index() as $orders){ ?>
                                    <?php if($orders['orderstatus']==0){?>
                                        <tr id="orderid-<?=$orders['id'];?>">
                                            <td><?=$orders['ordercode'];?></td>
                                            <td><?=$orders['orderdate'];?></td>
                                            <td> <?=$order->fullproductprice($orders['id']);?> ლარი</td>
                                            <td><?= $person->view($orders['orderperson'],'fullname');?></td>
                                            <td><?= $person->view($orders['orderperson'],'percent') * $order->fullproductprice($orders['id']) / 100;?> ლარი</td>
                                            <td>
                                                <a href="?p=neworder&view=<?=$orders['id'];?>" class="btn btn-default btn-sm edit" title="ნახვა"><i class="fa fa-eye"></i></a>
                                                <button class="btn btn-danger btn-sm remove" id="<?=$orders['id'];?>" data-status="1" title="გაუქმება"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ქვითრის ნომერი</th>
                                <th>გამოწერის თარიღი</th>
                                <th>თანხა</th>
                                <th>პერსონალი</th>
                                <th>პერს. %</th>
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
<script src="js/neworder.js" type="text/javascript"></script>

