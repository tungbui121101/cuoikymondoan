<?php
require_once('../db/dbhelper.php');

if (!empty($_POST)) {
    $id = $_POST['id'];

    $sql = 'delete from donhang where id = "' . $id . '"';
    execute($sql);
    $sqlgiohang = 'delete from giohang where id_donhang = "' . $id . '"';
    execute($sqlgiohang);
    header('Location: donhang.php');
    die();
}

?>