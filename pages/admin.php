<?php
require_once (CONTROLLER.'/AdminController.php');
require_once (CLASS_PATH.'/targets.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ადმინისტრირება
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 text-left p-05 border-grey printside">
                <p>პრიტერზე ბეჭდვის მეთოდი</p>
                <div class="col-sm-8">
                    <input type="radio" name="printmethod" class="print" <?php if($admin->SelectPrint()==1){ echo "checked";}?> value="1"> <span>ჩვეულებრივ პრინტერზე ბეჭდვა</span><br>
                    <input type="radio" name="printmethod" class="print" <?php if($admin->SelectPrint()==2){ echo "checked";}?> value="2"> <span>POS თერმულ პრინტერზე ბეჭდვა</span><br>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success btn-sm changeprintmethod">ცვლილება</button>
                </div>
            </div>
            <p></p>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div id="addProduct" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="userid" id="userid">
                            <div class="modal-header">
                                <h4 class="modal-title">დამატება</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title_ge">ავტორიზაციის სახელი</label>
                                        <input type="text" name="username" class="form-control" id="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">პაროლი</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="addadmin" class="btn btn-primary">დამატება</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button class="btn-success btn-sm" data-toggle="modal" data-target="#addProduct" title="დამატება"><i class="fa fa-plus"></i> </button>
                <div class="box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>სახელი</th>
                                <th width="60">პარამეტრები</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($admin->User() as $admin){ ?>
                                <tr id="admin-<?=$admin['id'];?>" id="userlist">
                                    <td id="user_data"><?=$admin['username'];?></td>
                                    <td>
                                        <button data-id="<?=$admin['id'];?>" data-username="<?=$admin['username'];?>" data-target="#addProduct" data-toggle="modal"  class="btn btn-warning btn-sm edit" title="ნახვა"><i class="fa fa-pencil"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>სახელი</th>
                                <th>პარამეტრები</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

        </div>
    </section><!-- /.content -->
</aside>
<script src="js/admin.js" type="text/javascript"></script>

