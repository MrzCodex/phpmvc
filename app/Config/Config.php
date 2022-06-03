<?php
//DB
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','phpmvc');

require_once "../app/Models/Setting_model.php";
require_once "../app/Core/Database.php";
$dbsetting = new Setting_model();
// Name APP
define('NAMEAPP', $dbsetting->getnameapp());


define('BASEURL','http://localhost/phpzamvc/public');

//DEFAULT TIME ZONE
date_default_timezone_set('Asia/Jakarta');

