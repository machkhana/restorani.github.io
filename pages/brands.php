<?php
require_once (CONTROLLER.'/BrandController.php');
$row = $brand->index()->fetch_array();
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ბრენდები
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 text-right">
                <button class="btn-success btn-sm" data-toggle="modal" data-target="#addBrand" title="დამატება"><i class="fa fa-plus"></i> </button>
            </div>
            <p></p>
            <div id="addBrand" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">ბრენდის დამატება</h4>
                        </div>
                        <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title_ge">სათაური ქართული</label>
                                        <input type="text" name="title_ge" class="form-control" id="title_ge">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">სათაური ინგლისუური</label>
                                        <input type="text" name="title_en" class="form-control" id="title_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="text_ge">ტექსტი ქართული</label>
                                        <textarea cols="70" rows="8" name="text_ge" id="text_ge"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="text_en">ტექსტი ინგლისუური</label>
                                        <textarea cols="70" rows="8" name="text_en" id="text_en"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="sort">სორტირება</label>
                                        <input type="text" name="sort" class="form-control" id="sort">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">აირჩიეთ ფაილი</label>
                                        <input type="file" name="image" id="exampleInputFile">
                                    </div>
                                </div><!-- /.box-body -->

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="addbrand" class="btn btn-primary">დამატება</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($brand->index() as $brands){ ?>
            <div id="brandid-<?=$brands['id'];?>" class="col-md-4">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$brands['title_ge'];?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#editBrand-<?=$brands['id'];?>"  title="edits"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-default btn-sm remove" id="<?=$brands['id'];?>" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <p><img src="../images/brands/<?=$brands['image'];?>" height="100"></p>
                        <p><?=$brands['text_ge'];?></p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->

                <div id="editBrand-<?=$brands['id'];?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title">ბრენდის რედაქტირება</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="box-body">
                                        <input name="id" value="<?=$brands['id'];?>" type="hidden">
                                        <div class="form-group">
                                            <label for="title_ge">სათაური ქართული</label>
                                            <input type="text" name="title_ge" value="<?=$brands['title_ge'];?>" class="form-control" id="title_ge">
                                        </div>
                                        <div class="form-group">
                                            <label for="title_en">სათაური ინგლისუური</label>
                                            <input type="text" name="title_en" value="<?=$brands['title_en'];?>" class="form-control" id="title_en">
                                        </div>
                                        <div class="form-group">
                                            <label for="text_ge">ტექსტი ქართული</label>
                                            <textarea cols="70" rows="8" name="text_ge" id="text_ge"><?=$brands['text_ge'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="text_en">ტექსტი ინგლისუური</label>
                                            <textarea cols="70" rows="8" name="text_en" id="text_en"><?=$brands['text_en'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="sort">სორტირება</label>
                                            <input type="text" name="sort" value="<?=$brands['sort'];?>" class="form-control" id="sort">
                                        </div>
                                        <div class="form-group">
                                            <p><img src="../images/brands/<?=$brands['image'];?>" width="70"/></p>
                                            <p>თუ გსურთ სურათის ცვლილება აირჩიეთ თუ არა დატოვეთ ცარიელი</p>
                                            <label for="exampleInputFile">აირჩიეთ ფაილი</label>
                                            <input type="file" name="image" id="exampleInputFile">
                                        </div>
                                    </div><!-- /.box-body -->

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="editbrand" class="btn btn-primary">რედაქტირება</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
                    data:'delbrands='+id,
                    success:function(data) {
                        if(data) {
                            // $("#alert").css('display','');
                            $("#brandid-"+ id).remove();
                        }
                    }
                });
            }
        });
    });
</script>

