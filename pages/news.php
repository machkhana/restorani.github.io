<?php
require_once (CONTROLLER.'/NewsController.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            სიახლეები
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 text-right">
                <button class="btn-success btn-sm" data-toggle="modal" data-target="#addNews" title="დამატება"><i class="fa fa-plus"></i> </button>
            </div>
            <p></p>
            <div id="addNews" class="modal fade" role="dialog">
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
                                        <label for="title_ge">სათაური ქართული</label>
                                        <input type="text" name="title_ge" class="form-control" id="title_ge">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">სათაური ინგლისუური</label>
                                        <input type="text" name="title_en" class="form-control" id="title_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="shorttext_ge">ტექსტი შეკვეცილი ქართული</label>
                                        <textarea type="text" name="shorttext_ge" class="form-control" id="shorttext_ge"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="shorttext_en">ტექსტი შეკვეცილი ინგლისური</label>
                                        <textarea type="text" name="shorttext_en" class="form-control" id="shorttext_en"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="text_ge">ტექსტი ქართული</label>
                                        <textarea type="text" name="text_ge" class="form-control" id="text_ge"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="text_en">ტექსტი ინგლისური</label>
                                        <textarea type="text" name="text_en" class="form-control" id="text_en"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">აირჩიეთ ფაილი</label>
                                        <input type="file" name="image" id="exampleInputFile">
                                    </div>
                                </div><!-- /.box-body -->

                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="addnews" class="btn btn-primary">დამატება</button>
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
                            <th>დამ. თარიღი</th>
                            <th>მოკლე აღწერა</th>
                            <th>პარამეტრები</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($news->index() as $newses){ ?>
                            <tr id="newsid-<?=$newses['id'];?>">
                                <td><?=$newses['title_ge'];?></td>
                                <td><img src="../images/news/<?=$newses['image'];?>" width="60"></td>
                                <td><?=$newses['date'];?></td>
                                <td><?=$newses['shorttext_ge'];?></td>
                                <td>
                                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#editnews-<?=$newses['id'];?>"  title="edits"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-sm remove" id="<?=$newses['id'];?>"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            <div id="editnews-<?=$newses['id'];?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <input name="id" value="<?=$newses['id'];?>" type="hidden">
                                            <div class="modal-header">
                                                <h4 class="modal-title">ბრენდის რედაქტირება</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="title_ge">სათაური ქართული</label>
                                                        <input type="text" name="title_ge" class="form-control" id="title_ge" value="<?=$newses['title_ge'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title_en">სათაური ინგლისუური</label>
                                                        <input type="text" name="title_en" class="form-control" id="title_en" value="<?=$newses['title_en'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="shorttext_ge">ტექსტი შეკვეცილი ქართული</label>
                                                        <textarea type="text" name="shorttext_ge" class="form-control" id="shorttext_ge"><?=$newses['shorttext_ge'];?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="shorttext_en">ტექსტი შეკვეცილი ინგლისური</label>
                                                        <textarea type="text" name="shorttext_en" class="form-control" id="shorttext_en"><?=$newses['shorttext_en'];?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text_ge">ტექსტი ქართული</label>
                                                        <textarea type="text" name="text_ge" class="form-control" id="text_ge"><?=$newses['text_ge'];?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text_en">ტექსტი ინგლისური</label>
                                                        <textarea type="text" name="text_en" class="form-control" id="text_en"><?=$newses['text_en'];?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <img src="../images/news/<?=$newses['image'];?>" height="70"><br>
                                                        <label for="exampleInputFile">აირჩიეთ ფაილი (თუ შეცვლა არ გსურთ დატოვეთ ცარიელი)</label>
                                                        <input type="file" name="image" id="exampleInputFile">
                                                    </div>
                                                </div><!-- /.box-body -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="editnews" class="btn btn-primary">რედაქტირება</button>
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
                            <th>დამ. თარიღი</th>
                            <th>მოკლე აღწერა</th>
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
                    data:'delnews='+id,
                    success:function(data) {
                        if(data) {
                            // $("#alert").css('display','');
                            $("#newsid-"+ id).remove();
                        }
                    }
                });
            }
        });
    })
</script>

