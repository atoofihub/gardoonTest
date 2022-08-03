<?php
class App{
    public $controller='index';
    public $metod='index';
    public $params=[];
    function __construct()
    {
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url=$this->parsUrl($url);
            $this->controller=$url[0];
            unset($url[0]);
            if(isset($url[1])){
                $this->metod=$url[1];
                unset($url[1]);
                $this->params=array_values($url);
            }
        }
        $controller_url='controller/'.$this->controller.'.php';
        if(file_exists($controller_url)){
            require ($controller_url);
            $object=new $this->controller;
            $object->model($this->controller);
            if(method_exists($object,$this->metod)){
                call_user_func_array([$object,$this->metod],$this->params);
            }

        }
    }
    function parsUrl($url)
    {
        filter_var($url, FILTER_SANITIZE_URL);
        $url=rtrim($url,'/');
        $url = explode('/', $url);
        return $url;
    }
}



?>

