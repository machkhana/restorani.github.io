<?php
if(isset($_POST['login'])){
    if(isset($_POST['username'])){$username = $sql->real_escape_string($_POST['username']);}
    if(isset($_POST['password'])){$password = $sql->real_escape_string($_POST['password']);}
    $result=$user->login($username, $password);
    if($result > 0){
        $_SESSION['id'] = $result;
    }else{
        return false;
    }
}
if(isset($_POST['logout'])){

}