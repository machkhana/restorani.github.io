<?php
class Admin{
    public function createuser($username,$password){
        global $sql;
        $sql->query("insert into users (username,password) values ('".$username."','".md5($password)."')");
        header('location:?p=admin');
        exit();
    }
    public function updateuser($userid,$username,$password){
        global $sql;
        $sql->query("update users set username='".$username."',password='".md5($password)."' where id='".$userid."'");
        header('location:?p=admin');
        exit();
    }
    //////////// company //////////////////////
    public  function selectcompany(){
        global  $sql;
        $query=$sql->query('select * from company');
        if($query){
            return $query;
        }
        return false;
    }
    public function createcompany($company,$logo){
        global $sql;
        $sql->query("insert into company (company,logo) values ('".$company."','".$logo."')");
        header('location:?p=admin');
        exit();
    }
    public function updatecompany($id,$company,$logo){
        global $sql;
        $sql->query("update company set company='".$company."',logo='".$logo."' where id='".$id."'");
        header('location:?p=admin');
        exit();
    }
    /////////////////// select print //////////////////////////
    public function SelectPrint(){
        global $sql;
        $query=$sql->query("select * from printmethod")->fetch_array();
        if($query){
            return $query['printstatus'];
        }
        return false;
    }
    public function UpdatePrint($status){
        global $sql;
        $sql->query("update printmethod set printstatus='$status' where id='1'");
    }
    public  function User(){
        global  $sql;
        $query=$sql->query('select * from users');
        if($query){
            return $query;
        }
        return false;
    }
}
$admin = new Admin();
require_once (REQUESTS.'/AdminRequest.php');