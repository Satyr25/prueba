<?php

require_once('Base.php');

class Menu extends Base{

    public $id;
    public $name;
    public $description;
    public $depend;
    public $menu_depends;
    public $father_name;

    
    public function save($post){
        $conection = $this->conect();
        $response = $conection->prepare("insert into menus (name, description, depend) values ('".$post['name']."', '".$post['description']."', '".$post['depend']."')");
        $data = $response->execute();
        return $data;
    }

    public function update($post){
        $conection = $this->conect();
        $response = $conection->prepare("update menus set name='".$post['name']."', description='".$post['description']."', depend='".$post['depend']."' where id=".$post['id']);
        $data = $response->execute();
        return $data;
    }

    public function read($id){
        $conection = $this->conect();
        $response = $conection->prepare("select * from menus where id =".$id);
        $response->execute();
        $data = $response->fetchObject();
        return $data;
    }

    public function all(){
        $conection = $this->conect();
        $response = $conection->prepare("select * from menus");
        $response->execute();
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    
    public function noDepends(){
        $conection = $this->conect();
        $response = $conection->prepare("select * from menus where depend=0");
        $response->execute();
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function getDepends($depend){
        $conection = $this->conect();
        $response = $conection->prepare("select * from menus where depend =".$depend);
        $response->execute();
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function getFatherName($id){
        $conection = $this->conect();
        $response = $conection->prepare("select name from menus where id =".$id);
        $response->execute();
        $data = $response->fetch();
        return $data;
    }

    public function delete($id){
        $conection = $this->conect();
        $response = $conection->prepare("delete from menus where id=".$id);
        $data = $response->execute();
        return true;
    }

}

?>