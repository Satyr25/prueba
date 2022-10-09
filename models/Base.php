<?php

class Base {
    
    public function conect(){
        try {
            $conection = new PDO("mysql:host=localhost;dbname=credit","root","");
            return $conection;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}

?>