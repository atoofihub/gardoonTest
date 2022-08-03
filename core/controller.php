<?php
class Controller {
    function __construct()
    {
        require_once 'jdf.php';
        require_once 'class.phpmailer.php';
        require_once 'class.smtp.php';
    }
    function viwe($viewurl,$data=[]){

//        require ('include/head.php');
        require ('views/'.$viewurl.'.php');
//        require ('include/script.php');
    }
    function model($modelurl){
        require ('model/model_'.$modelurl.'.php');
        $classname='model_'.$modelurl;
        $this->model=new $classname;
    }

}