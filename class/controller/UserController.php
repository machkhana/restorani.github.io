<?php

class User{
    public function login($username, $password){
        global $sql;
        $query = $sql->query("select * from users where username='".$username."' and password='".md5($password)."'");
        if($query->num_rows > 0){
            $row=$query->fetch_assoc();
            return $row['id'];
        }else{
            return false;
        }

    }
    public function passwordresset(){

    }
}
$user = new User();
require_once (REQUESTS.'/UserRequests.php');
