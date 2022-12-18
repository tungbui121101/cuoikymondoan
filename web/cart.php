<?php
include "header.php";
require_once('../db/config.php');
$id = '';
$id = $_POST['id'];

$action = (isset($_GET['action']))?$_GET['action']:'add';
    
    $gia = '';
    $soluong = '';
    $hinhanh = '';
    $tensp = '';
    
    

    if (isset($_POST['gia']) && isset($_POST['soluong']) && isset($_POST['hinhanh']) && isset($_POST['tensp'])) {
        $gia = $_POST['gia'];
        $soluong = $_POST['soluong'];
        $hinhanh = $_POST['hinhanh'];
        $tensp = $_POST['tensp'];
        
    }

    if ($soluong <=0) {
        $soluong = 1;
    }
// var_dump($action);
// session_destroy();
// die();
$item = [
    'id'=> $id,
    'tensp'=> $tensp,
    'hinhanh'=> $hinhanh,
    'gia'=> $gia,
    'soluong'=> $soluong
];
// var_dump($action);

// die();
if ($action == 'add') {
    if (isset($_SESSION['cart'][$id])) {
        echo'có sản phẩm r';
        $_SESSION['cart'][$id]['soluong'] += $soluong;
    }
    else {
        $_SESSION['cart'][$id] = $item;
    }
}else if ($action == 'delete') {
    unset($_SESSION['cart'][$id]);
} else{
    $_SESSION['cart'][$id]= $item;
}


header('Location: viewcart.php');
echo"<pre>";
print_r($_SESSION['cart'])
?>
