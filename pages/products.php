<?php
require_once (CONTROLLER.'/ProductController.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            პროდუქცია
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
                                <h4 class="modal-title">პროდუქციის დამატება</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title_ge">კოდი</label>
                                        <input type="text" name="code" class="form-control" id="title_ge">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">დასახელება</label>
                                        <input type="text" name="name" class="form-control" id="title_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">მოცულობა</label>
                                        <select name="weight" class="form-control">
                                            <option value="" selected disabled>აირჩიეთ</option>
                                            <option value="ცალი">ცალი</option>
                                            <option value="ლიტრი">ლიტრი</option>
                                            <option value="გრამი">გრამი</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">ფასი</label>
                                        <input type="text" name="price" class="form-control" id="title_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="sort">კატეგორია</label>
                                        <select name="catid" class="form-control">
                                            <option value="" selected disabled>აირჩიეთ</option>
                                            <?php foreach ($product->category() as $categories) {
                                                echo "<option value='".$categories['id']."'>".$categories['name']."</option>";
                                            }?>
                                        </select>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="addproduct" class="btn btn-primary">დამატება</button>
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
                                <th>კოდი</th>
                                <th>დასახელაბა</th>
                                <th>ფასი</th>
                                <th>მოცულობა</th>
                                <th>კატეგორია</th>
                                <th>პარამეტრები</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($product->index() as $products){ ?>
                                <tr id="prodid-<?=$products['id'];?>">
                                    <td><?=$products['code'];?></td>
                                    <td><?=$products['name'];?></td>
                                    <td><?=$products['price'];?> ლარი</td>
                                    <td><?=$products['weight'];?></td>
                                    <td><?=$product->selcat($products['catid']);?></td>
                                    <td>
                                        <button class="btn btn-default btn-sm edit"
                                                data-toggle="modal"
                                                data-target="#editprod-<?=$products['id'];?>"
                                                title="edits"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-default btn-sm remove" id="<?=$products['id'];?>"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>

                                <div id="editprod-<?=$products['id'];?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <form role="form" action="" method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">პროდუქციის რედაქტირება</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <input type="hidden" name="id" class="form-control" value="<?=$products['id'];?>">
                                                        <div class="form-group">
                                                            <label for="code">კოდი</label>
                                                            <input type="text" name="code" class="form-control" value="<?=$products['code'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">დასახელება</label>
                                                            <input type="text" name="name" class="form-control" value="<?=$products['name'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="weight">მოცულობა</label>
                                                            <select name="weight" class="form-control" id="weight">
                                                                <option value="<?=$products['weight'];?>" selected><b><?=$products['weight'];?></b></option>
                                                                <option value="ცალი">ცალი</option>
                                                                <option value="ლიტრი">ლიტრი</option>
                                                                <option value="გრამი">გრამი</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="price">ფასი</label>
                                                            <input type="text" name="price" class="form-control" value="<?=$products['price'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="sort">კატეგორია</label>
                                                            <select name="catid" class="form-control" id="catid">
                                                                <option value="<?=$products['catid'];?>"><b><?=$product->selcat($products['catid']);?></b></option>
                                                                <?php foreach ($product->category() as $categories) {
                                                                    echo "<option value='".$categories['id']."'>".$categories['name']."</option>";
                                                                }?>
                                                            </select>
                                                        </div>
                                                    </div><!-- /.box-body -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="editproduct" class="btn btn-primary">რედაქტირრება</button>
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
                                <th>კოდი</th>
                                <th>დასახელება</th>
                                <th>ფასი</th>
                                <th>მოცულობა</th>
                                <th>კატეგორია</th>
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

