<?php
require_once (CONTROLLER.'/SlideController.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            სლაიდი
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 text-right">
                <button class="btn-success btn-sm" data-toggle="modal" data-target="#addSlide" title="დამატება"><i class="fa fa-plus"></i> </button>
            </div>
            <p></p>
            <div id="addSlide" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title">სიახლის დამატება</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title">სათაური</label>
                                        <input type="text" name="title" class="form-control" id="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="sort">სორტირება</label>
                                        <input type="text" name="sort" class="form-control" id="sort">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">აირჩიეთ ფაილი (ზომა: 1920 x 850)</label>
                                        <input type="file" name="slideimage" id="exampleInputFile">
                                    </div>
                                </div><!-- /.box-body -->

                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="addslide" class="btn btn-primary">დამატება</button>
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
                            <th>დასახელება</th>
                            <th>სურათი</th>
                            <th>სორტირება</th>
                            <th>პარამეტრები</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($slide->index() as $slides){ ?>
                            <tr id="slideid-<?=$slides['id'];?>">
                                <td><?=$slides['title'];?></td>
                                <td><img src="../images/main-slider/<?=$slides['image'];?>" width="60"></td>
                                <td><?=$slides['sort'];?></td>
                                <td>
                                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#editslide-<?=$slides['id'];?>"  title="edits"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-sm remove" id="<?=$slides['id'];?>"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            <div id="editslide-<?=$slides['id'];?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <input name="id" value="<?=$slides['id'];?>" type="hidden">
                                            <div class="modal-header">
                                                <h4 class="modal-title">სლაიდის რედაქტირება</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="title_ge">სათაური ქართული</label>
                                                        <input type="text" name="title" class="form-control" id="title_ge" value="<?=$slides['title'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title_en">სათაური ინგლისუური</label>
                                                        <input type="text" name="sort" class="form-control" id="title_en" value="<?=$slides['sort'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <img src="../images/main-slider/<?=$slides['image'];?>" height="70"><br>
                                                        <label for="exampleInputFile">აირჩიეთ ფაილი აირჩიეთ ფაილი (ზომა: 1920 x 850) (თუ შეცვლა არ გსურთ დატოვეთ ცარიელი)</label>
                                                        <input type="file" name="slideimage" id="exampleInputFile">
                                                    </div>
                                                </div><!-- /.box-body -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="editslide" class="btn btn-primary">რედაქტირება</button>
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
                            <th>დასახელება</th>
                            <th>სურათი</th>
                            <th>სორტირება</th>
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
                    data:'delslide='+id,
                    success:function(data) {
                        if(data) {
                            // $("#alert").css('display','');
                            $("#slideid-"+ id).remove();
                        }
                    }
                });
            }
        });
    })
</script>

