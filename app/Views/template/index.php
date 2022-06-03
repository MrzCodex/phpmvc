<?php
if(!session_id()){
session_start();
}
$db = new Database();
$data['session'] = $this->model('Auth_model')->session_login($_SESSION['user_data']);
//user
$user = $db->query("SELECT id FROM user");
$user = $db->resultset();
$data['countuser'] = count($user);
//barang
$barang = $db->query("SELECT id FROM barang");
$barang = $db->resultset();
$data['countbarang'] = count($barang);
//laku
$laku = $db->query("SELECT laku.id FROM laku INNER JOIN user ON laku.user_id=user.id INNER JOIN barang ON laku.id_barang=barang.id");
$laku = $db->resultset();
$data['countlaku'] = count($laku);
//core view//
require_once "../app/Views/template/header.php";
require_once "../app/Views/{$contents}.php";
require_once "../app/Views/template/footer.php";
?>
