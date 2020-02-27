<?php
require_once (CONTROLLER.'/CareerController.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            კარიერა
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
                                <h4 class="modal-title">კარიერის დამატება</h4>
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
                                        <textarea type="text" name="text_ge" class="form-control" id="text_ge"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="text_en">ტექსტი ინგლისური</label>
                                        <textarea type="text" name="text_en" class="form-control" id="text_en"></textarea>
                                    </div>
                                    <label>დაწყების თარიღი:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="startdate" class="form-control pull-right" id="startdate"/>
                                    </div><!-- /.input group -->
                                    <label>დასრულების თარიღი:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="enddate" class="form-control pull-right" id="enddate"/>
                                    </div><!-- /.input group -->
                                </div><!-- /.box-body -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="addcareer" class="btn btn-primary">დამატება</button>
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
                            <th>დაწყ. თარიღი</th>
                            <th>დამთ. თარიღი</th>
                            <th>პარამეტრები</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($career->index() as $careers){ ?>
                            <tr id="careerid-<?=$careers['id'];?>">
                                <td><?=$careers['title_ge'];?></td>
                                <td><?=$careers['startdate'];?></td>
                                <td><?=$careers['enddate'];?></td>
                                <td>
                                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#editcareer-<?=$careers['id'];?>"  title="edits"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-sm remove" id="<?=$careers['id'];?>"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            <div id="editcareer-<?=$careers['id'];?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <input name="id" value="<?=$careers['id'];?>" type="hidden">
                                            <div class="modal-header">
                                                <h4 class="modal-title">ბრენდის რედაქტირება</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="title_ge">სათაური ქართული</label>
                                                        <input type="text" name="title_ge" class="form-control" id="title_ge" value="<?=$careers['title_ge'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title_en">სათაური ინგლისუური</label>
                                                        <input type="text" name="title_en" class="form-control" id="title_en" value="<?=$careers['title_en'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text_ge">ტექსტი ქართული</label>
                                                        <textarea type="text" name="text_ge" class="form-control" id="text_ge"><?=$careers['text_ge'];?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text_en">ტექსტი ინგლისური</label>
                                                        <textarea type="text" name="text_en" class="form-control" id="text_en"><?=$careers['text_en'];?></textarea>
                                                    </div>
                                                    <label>დაწყების თარიღი:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" name="startdate" class="form-control pull-right" id="startdate1" value="<?=$careers['startdate'];?>">
                                                    </div><!-- /.input group -->
                                                    <label>დასრულების თარიღი:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" name="enddate" class="form-control pull-right" id="enddate1" value="<?=$careers['enddate'];?>">
                                                    </div><!-- /.input group -->
                                                </div><!-- /.box-body -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="editcareer" class="btn btn-primary">რედაქტირება</button>
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
                            <th>დაწყ. თარიღი</th>
                            <th>დამთ. თარიღი</th>
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
                    data:'delcareer='+id,
                    success:function(data) {
                        if(data) {
                            // $("#alert").css('display','');
                            $("#careerid-"+ id).remove();
                        }
                    }
                });
            }
        });
    })
</script>

