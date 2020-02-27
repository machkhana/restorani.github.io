<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/26/2020
 * Time: 8:04 PM
 */
class Profile{
    public  function SelectPrint(){
        global $sql;
        $query=$sql->query("select * from printmethod")->fetch_array();
        if($query){
            return $query;
        }
        return false;
    }
    public function UpdatePrint($status){
        global $sql;
        $sql->query("update printmethod set printstatus='$status' where id='1'");
    }
}
$profile = new Profile();
require_once (REQUESTS.'/ProfileRequest.php');

