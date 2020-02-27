<?php
require_once (CONTROLLER.'/AboutController.php');
$row = $about->index()->fetch_array();
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ჩვენს შესახებ
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class='row'>
            <div class='col-md-12'>
                <div class='box box-info'>
                    <div class='box-body pad'>
                        <form action="" method="post">
                            <input name="id" value="<?= $row['id'];?>" type="hidden">
                            <div class="box-body">
                                <textarea id="editor1" name="text_ge" rows="10" cols="80"><?= $row['text_ge'];?></textarea>
                            </div>
                            <div class="box-body">
                                <textarea id="editor2" name="text_en" rows="10" cols="80"><?= $row['text_en'];?></textarea>
                            </div>
                            <div>
                                <button type="submit" name="editabout" class="btn-success btn-sm">ცვლილება</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col-->
        </div><!-- ./row -->
    </section><!-- /.content -->
</aside>