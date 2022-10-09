<?php

require_once('../../models/Menu.php');

class MenuController{

    public function nav(){
        $menu = new Menu;
        $father_menus = $menu->noDepends();
        $all_menus = array();
        foreach ($father_menus as $one_menu){
            $one_menu->menu_depends = $menu->getDepends($one_menu->id);
            $all_menus[] = $one_menu;
        }
        
        return $all_menus;
    }
    
    public function index(){
        $menu = new Menu;
        $all = $menu->all();
        $all_menus = array();
        foreach($all as $menus){
            if ($menus->depend){
                $menus->father_name = $menu->getFatherName($menus->depend)['name'];
            } else {
                $menus->father_name = null;
            }
            $all_menus[] = $menus;
        }
        return $all_menus;
    }

    public function add(){
        $menu = new Menu;
        if(!empty($_POST['name']) && !empty($_POST['description'])){
            $menu->save($_POST);
            header("location:index.php"); 
        }
        $all_menus = $menu->noDepends();
        return $all_menus;
    }

    public function edit($id){
        $menu = new Menu;
        if(!empty($_POST['name']) && !empty($_POST['description'])){
            $menu->update($_POST);
            header("location:index.php"); 
        }
        $one_menu = $menu->read($id);
        $all_menus = $menu->noDepends();
        $data = array();
        $data['menu'] = $one_menu;
        $data['all'] = $all_menus;
        return $data;
    }

    public function view($id){
        $menu = new Menu;
        $view_menu = $menu->read($id);
        return $view_menu;
    }

    public function delete($id){
        $menu = new Menu;
        $menu->delete($id);
        header("location:index.php"); 
    }

}

?>