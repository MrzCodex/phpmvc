<?php
// require_once "Core/App.php";
// require_once "Core/Controller.php";
require_once "../app/Config/Config.php";
require_once "../app/Lib/Lib.php";
require_once "../app/Models/Auth_model.php";
require_once "../app/Models/Setting_model.php";


spl_autoload_register(function($class){
    require_once "Core/{$class}.php";
});