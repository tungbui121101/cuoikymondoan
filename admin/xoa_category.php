<?php
require_once('../db/dbhelper.php');

// xóa hãng
if (isset($_POST["xoa"])) {
    $tenhang = $_POST['tenhang'];

    $sql = 'delete from hang where tenhang = "' . $tenhang . '"';
    execute($sql);
    header('Location: category.php');
    die();
}

?>