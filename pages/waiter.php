<?php
require_once (CONTROLLER.'/ProductController.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            მიმტანი
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
                                            <option value="მენეჯერი">მენეჯერი</option>
                                            <option value="მოლარე">მოლარე</option>
                                            <option value="მიმტანი">მიმტანი</option>
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>სახელი</th>
                            <th>პოზიცია</th>
                            <th>პროცენტი</th>
                            <th width="20">პარამეტრები</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($person->index() as $persons){ ?>
                            <tr id="order-<?=$persons['id'];?>">
                                <td><?=$persons['fullname'];?></td>
                                <td><?=$persons['status'];?></td>
                                <td><?=$persons['percent'];?></td>
                                <td>
                                    <button class="btn btn-default btn-sm edit" data-toggle="modal" data-target="#editprod-<?=$persons['id'];?>" title="edits"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-sm remove" id="<?=$persons['id'];?>"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>

                            <div id="editprod-<?=$persons['id'];?>" class="modal fade" role="dialog">
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
                                                        <input type="text" name="fullname" class="form-control" id="title_ge" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="weight">პოზიცია</label>
                                                        <select name="status" class="form-control">
                                                            <option value="" selected disabled>აირჩიეთ</option>
                                                            <option value="მენეჯერი">მენეჯერი</option>
                                                            <option value="მოლარე">მოლარე</option>
                                                            <option value="მიმტანი">მიმტანი</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title_en">პროცენტი</label>
                                                        <input type="text" name="percent" class="form-control" id="title_en">
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
                            <th width="20">პარამეტრები</th>
                        </tr>
                        </tfoot>
                    </table>
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
                    data:'delprod='+id,
                    success:function(data) {
                        if(data) {
                            // $("#alert").css('display','');
                            $("#prodid-"+ id).remove();
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

