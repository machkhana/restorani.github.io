<div class="box-body">
    <h4>ქვითრის ნომერი: <?=$row['ordercode'];?></h4>
    <p>პერსონალი: <?= $person->view($row['orderperson'],'fullname');?></p>
    <p>გამოწერის თარიღი: <?=$row['orderdate'];?></p>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>დასახელება</th>
            <th>ფასი</th>
            <th>რაოდენობა</th>
            <th>სულ</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($order->orderproduct($row['id']) as $products){ ?>
            <tr>
                <td><?php $res=$product->view($products['productid']); echo $res['name'];?></td>
                <td><?=$products['price'];?></td>
                <td><?=$products['quantity'];?></td>
                <td> <?=$products['price'] * $products['quantity'];?> ლარი</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <p>თანხა: <b><?=$order->fullproductprice($row['id']);?> ლარი</b></p>
    <p>10% მომსახურების: <b><?= $person->view($row['orderperson'],'percent') * $order->fullproductprice($row['id']) / 100;?> ლარი</b></p>
    <p>პარამეტრები</p>
    <p><button class="btn btn-default btn-sm" onclick="printDiv(<?php if($print['printstatus']==1){ echo "'printarea'";}else{echo "'printarea_pos'";}?>)"><i class="fa fa-print"></i></button></p>
</div>
<div id="printarea">
    <p style="margin:auto 0px;"><img src="./img/logo.png" width="40"></p>
    <h4>ქვითრის ნომერი: <?=$row['ordercode'];?></h4>
    <p>პერსონალი: <?= $person->view($row['orderperson'],'fullname');?></p>
    <p>გამოწერის თარიღი: <?=$row['orderdate'];?></p>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>დასახელება</th>
            <th>ფასი</th>
            <th>რაოდენობა</th>
            <th>სულ</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($order->orderproduct($row['id']) as $products){ ?>
            <tr>
                <td><?php $res=$product->view($products['productid']); echo $res['name'];?></td>
                <td><?=$products['price'];?></td>
                <td><?=$products['quantity'];?></td>
                <td> <?=$products['price'] * $products['quantity'];?> ლარი</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <p>სულ თანხა: <b><?= $order->fullproductprice($row['id']);?> ლარი</b></p>
    <p>მადლობას გიხდით მობრძანებისთვის !</p>
    <p>Thank You for Visit !</p>
</div>
<div id="printarea_pos">
    <p style="margin-left: 30px;"><img src="./img/logo.png" width="40"></p>
    <h4>ქვითრის ნომერი: <?=$row['ordercode'];?></h4>
    <p>პერსონალი: <?= $person->view($row['orderperson'],'fullname');?></p>
    <p>გამოწერის თარიღი: <?=$row['orderdate'];?></p>
    <br>
    <div class="divborder">
    <?php foreach ($order->orderproduct($row['id']) as $products){ ?>

            <p><b><?php $res=$product->view($products['productid']); echo $res['name'];?></b>: </p>
            <p><?=$products['price'];?> X <?=$products['quantity'];?> - <?=$products['price'] * $products['quantity'];?> ლარი</p>
            <p></p>

    <?php } ?>
    </div>
    <br/>
    <p>სულ თანხა: <b><?= $order->fullproductprice($row['id']);?> ლარი</b></p>
    <p>მადლობას გიხდით მობრძანებისთვის !</p>
    <p>Thank You for Visit !</p>
</div>