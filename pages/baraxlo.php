<!--printeris dros momsaxurebis % is gamochena-->
<p>თანხა: <b><?=$order->fullproductprice($row['id']);?> ლარი</b></p>
<p>10% მომსახურების: <b><?= $person->view($row['orderperson'],'percent') * $order->fullproductprice($row['id']) / 100;?> ლარი</b></p>
<p>სულ თანხა: <b><?= $order->fullproductprice($row['id']) + ($person->view($row['orderperson'],'percent') * $order->fullproductprice($row['id']) / 100);?> ლარი</b></p>


<div class="col-md-6">
    <div class="box">
        <div class="box-body">
            <form role="form" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="userid" id="userid">
                <div class="modal-header">
                    <h4 class="modal-title">კომპანიის ინფორმაცია</h4>
                    <div class="row">
                        <div class="col-sm-6"><img src="<?= $admin->selectcompany('logo');?>"></div>
                        <div class="col-sm-6"><?= $admin->selectcompany('name');?></div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title_ge">კომპანიის სახელი</label>
                            <input type="text" name="company" class="form-control" id="company" required>
                        </div>
                        <div class="form-group">
                            <label for="title_en">კომპანიის ლოგო</label>
                            <input type="file" name="logo" class="form-control" id="logo" required>
                        </div>
                    </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="submit" name="addcompany" class="btn btn-primary">დამატება</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                </div>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
