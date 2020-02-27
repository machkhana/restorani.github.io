<?php
require_once (CONTROLLER.'/SocialController.php');
$result=$social->index()->fetch_array();
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            სოციალური ლინკები
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box">
            <form action="" method="post">
                <input name="id" type="hidden" value="<?= $result['id'];?>">
                <div class="box-body">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                        <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="<?= $result['facebook'];?>">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                        <input type="text" name="youtube" class="form-control" placeholder="Youtube" value="<?= $result['youtube'];?>">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                        <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?= $result['instagram'];?>">
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" name="editsocial" class="btn btn-primary">რედაქტირება</button>
                </div>
            </form>
        </div>
        </div>
    </section><!-- /.content -->
</aside>

