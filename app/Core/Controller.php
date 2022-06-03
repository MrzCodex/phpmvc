<?php 
abstract class Controller{
    public function view($template,$contents=[],$data=[]){
        require_once '../app/Views/'.$template.'.php';
    }
    public function model($model){
        require_once '../app/Models/'.$model.'.php';
        return new $model;
    }
    public function session($s){
        return $s;
    }
}