<?php

class BaseController{

    function view($view, $data)
    {
        var_dump($data);exit;
        include('views/'.$view.'.php');
    }
}

?>