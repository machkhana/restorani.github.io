<?php

class Menu {
    public function index(){
        global $sql;
        $query = $sql->query("select * from menu order by sort asc");
        //$query = $myclasses->select(menu,sort);
        if($query){
            return $query;
        }
        return false;
    }
    public function insert($request){

    }
    public function edit($id){

    }
    public function update($request, $id){

    }
    public function delete($id){

    }
}
class TopSubMenu {
    public function index($id){
        global $sql;
        $query = $sql->query("select * from submenu where menuid='".$id."' order by sort asc");
        if($query){
            return $query;
        }
        return false;
    }
    public function insert($title_ge, $title_en, $sort, $menuid){
    global $sql;
    $sql->query("insert into submenu (title_ge,title_en,sort,menuid) values ('$title_ge','$title_en','$sort','$menuid')");
    }
    public function edit($id){

    }
    public function update($request, $id){

    }
    public function delete($id){

    }
}
$menu = new Menu();
$submenu = new TopSubMenu();
?>