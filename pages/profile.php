<?php
require_once (CONTROLLER.'/ProfileController.php');
$print= $profile->SelectPrint();
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            პროფილი <span><?= $message; ?></span>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 text-left mb-10 border-grey p-05 printside">
                <p>პრიტერზე ბეჭდვის მეთოდი</p>
                <input type="radio" name="printmethod" class="print" <?php if($print['printstatus']==1){ echo "checked";}?> value="1"> <span>ჩვეულებრივ პრინტერზე ბეჭდვა</span><br>
                <input type="radio" name="printmethod" class="print" <?php if($print['printstatus']==2){ echo "checked";}?> value="2"> <span>POS თერმულ პრინტერზე ბეჭდვა</span><br>
                <button class="btn btn-success btn-sm changeprintmethod">ცვლილება</button>
            </div>
            <p></p>
        </div>
    </section>
</aside>
<script src="js/profile.js" type="text/javascript"></script>

