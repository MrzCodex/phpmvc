<?php
class App{
    private $controller='auth';
    private $method='index';
    private $params=[];
    public function __construct(){
        $url = $this->ParseUrl();
        //controller
        if(isset($url[0])){
            if(file_exists('../app/Controllers/'.$url[0].'.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }else{
                $war = $url[0];
                echo "<script>
                        alert('Controller $war Tidak Ada');
                    </script>";
            }
        }
        require_once "../app/Controllers/{$this->controller}.php";
        $this->controller = new $this->controller;
        //method
        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }else{
                $war = $url[1];
                echo "<script>
                        alert('Method $war Tidak Ada');
                    </script>";
            }
        }
        //params
        if(!empty($url)){
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller,$this->method],$this->params);
    }
    public function ParseUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}