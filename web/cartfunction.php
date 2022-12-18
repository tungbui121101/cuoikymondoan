<?php

function tongtien($cart){
    $tongtien = 0;
    foreach($cart as $key => $value){
        $tongtien += $value['gia'] * $value['soluong'];
    }
    return $tongtien;
}
?>