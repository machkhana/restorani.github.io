<?php
if(isset($_POST['addorder'])){
    include (CONTROLLER.'/ProductController.php');
    // ----------------------------------------------------------------------//
    if(isset($_POST['ordercode'])){$ordercode = $sql->real_escape_string($_POST['ordercode']);}
    if(isset($_POST['orderperson'])){$orderperson = $sql->real_escape_string($_POST['orderperson']);}
    // insert neworder on database neworder //
    if(empty($_POST['ordercode']) && empty($_POST['orderperson'])) {
        echo "<script> alert ('ქვითრის ნომერი ან პერსონალი არ არის მითითებული');</script>";
    }
    // repeat for multiple POST form and insert on database product //
    if(!isset($_POST['productid']) && !isset($_POST['quantity'])){
        echo "<script> alert ('პროდუქცია ცარიელია ან არ არის მითითებული');</script>";
    }else{
        if(empty($_POST['productid'] && $_POST['quantity'])) {
            echo "<script> alert ('პროდუქცია ცარიელია ან არ არის მითითებული');</script>";
        }else{
            $orderid=$order->createorder($ordercode,$orderperson);
            if($orderid == null){

            }else{
                for($i=0;$i<count($_POST['productid']);$i++){
                    if(isset($_POST['productid'][$i])){$productid=$sql->real_escape_string($_POST['productid'][$i]);}
                    $price = $product->view($productid);
                    if(isset($_POST['quantity'][$i])){$quantity = $sql->real_escape_string($_POST['quantity'][$i]);}
                    $fullprice=$quantity*$price['price'];
                    $order->createorderproduct($orderid,$productid,$price['price'],$quantity,$fullprice);
                }
            }

            header("Location:?p=neworder&view=".$orderid);
            echo "<script>window.print();</script>";
            exit();
//            if($order =='1'){
//                $message="<div class='alert alert-danger alert-dismissable'>
//                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
//                        შეკვეთა ასეთი ნომრით უკვე არსებობს !
//                    </div>";
//            }
        }
    }
}
//if(isset($_GET["disableorder"])){
//    if(isset($_GET['disableorder'])){$id = $sql->real_escape_string($_GET['disableorder']);}
//    if(isset($_GET['status'])){$status = $sql->real_escape_string($_GET['status']);}
//    $result = $order->DisableOrder($id,$status);
//    if($result==true){
//        echo "remove";
//    }else{
//        echo "not remove";
//    }
//}
?>