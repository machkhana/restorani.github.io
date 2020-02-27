<?php
require_once (CONTROLLER.'/PersonController.php');
require_once (CLASS_PATH.'/targets.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            პერსონალი
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 text-right">
                <button class="btn-success btn-sm" data-toggle="modal" data-target="#addProduct" title="დამატება"><i class="fa fa-plus"></i> </button>
            </div>
            <p></p>
            <div id="addProduct" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title">დამატება</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title_ge">სრული სახელი</label>
                                        <input type="text" name="fullname" class="form-control" id="title_ge" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">პოზიცია</label>
                                        <select name="status" class="form-control">
                                            <option value="" selected disabled>აირჩიეთ</option>
                                            <option value="1">მენეჯერი</option>
                                            <option value="2">მოლარე</option>
                                            <option value="3">მიმტანი</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">პროცენტი</label>
                                        <input type="text" name="percent" class="form-control" id="title_en">
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="addperson" class="btn btn-primary">დამატება</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="box">
                <div class="box-body table-responsive">
                    <?php if(isset($_GET['user'])){ ?>
                    <?php if($view){ $row=$order->view($view)->fetch_array(); require_once ('printarea.php'); }else{?>
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
                        <tbody>
                            <?php foreach ($person->personorders($pers) as $orders){ ?>
                                <tr id="orderid-<?=$orders['id'];?>">
                                    <td><?=$orders['ordercode'];?></td>
                                    <td><?= $person->view($orders['orderperson'],'fullname');?></td>
                                    <td><?=$orders['orderdate'];?></td>
                                    <td> <?=$person->fullproductprice($orders['id']);?> ლარი</td>
                                    <td>
                                        <a href="?p=neworder&view=<?=$orders['id'];?>" class="btn btn-default btn-sm edit" title="ნახვა"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
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
                    <?php }}else{ ?>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>სახელი</th>
                            <th>პოზიცია</th>
                            <th>პროცენტი</th>
                            <th width="200">პარამეტრები</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($person->index() as $persons){ ?>
                            <tr id="personid-<?=$persons['id'];?>">
                                <td><?=$persons['fullname'];?></td>
                                <td><?=$personstatus[$persons['status']];?></td>
                                <td><?=$persons['percent'];?></td>
                                <td>
                                    <a href="?p=persons&user=<?=$persons['id'];?>" class="btn btn-default btn-sm edit"><i class="fa fa-eye"></i></a>
                                    <button class="btn btn-default btn-sm edit" data-toggle="modal" data-target="#editperson-<?=$persons['id'];?>" title="edits"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-sm remove" id="<?=$persons['id'];?>"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            <div id="editperson-<?=$persons['id'];?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h4 class="modal-title">რედაქტირება</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <input type="hidden" name="id" class="form-control" value="<?=$persons['id'];?>">
                                                    <div class="form-group">
                                                        <label for="title_ge">სრული სახელი</label>
                                                        <input type="text" name="fullname" class="form-control" id="title_ge" value="<?=$persons['fullname'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="weight">პოზიცია</label>
                                                        <select name="status" class="form-control">
                                                            <option value="<?=$persons['status'];?>" selected><?=$personstatus[$persons['status']];?></option>
                                                            <option value="1">მენეჯერი</option>
                                                            <option value="2">მოლარე</option>
                                                            <option value="3">მიმტანი</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title_en">პროცენტი</label>
                                                        <input type="text" name="percent" class="form-control" id="title_en" value="<?=$persons['percent'];?>">
                                                    </div>
                                                </div><!-- /.box-body -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="editperson" class="btn btn-primary">რედაქტირრება</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>სახელი</th>
                            <th>პოზიცია</th>
                            <th>პროცენტი</th>
                            <th>პარამეტრები</th>
                        </tr>
                        </tfoot>
                    </table>
                    <?php } ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </section><!-- /.content -->
</aside>
<script type="text/javascript">
    $(document).ready(function () {
        $(".remove").click(function(){
            if(confirm("გსურთ წაიშალოს ?")){
                var id = $(this).attr('id');
                $.ajax({
                    type:'POST',
                    url:'',
                    data:'delperson='+id,
                    success:function(data) {
                        if(data) {
                            // $("#alert").css('display','');
                            $("#personid-"+ id).remove();
                        }
                    }
                });
            }
        });
        // $(document).on('show.bs.modal','#editprod', function () {
        //     //e.preventDefault();
        //     var id = $(this).data('id');
        //     var code = $(this).data('code');
        //     console.log(code);
        //     var name = $(this).data('name');
        //     var weight = $(this).data('weight');
        //     var price = $(this).data('price');
        //     var catid = $(this).data('catid');
        //     //$('#id').val(id);
        //     //$('#code').val(code);
        //     //document.getElementById('code').val(code)
        //     // $('#name').val(name);
        //     // $('#weight').append('<option value="'+ weight +'">'+ weight +'</option>');
        //     // $('#price').val(price);
        //     // $('#catid').val(catid);
        // })
    })

</script>

