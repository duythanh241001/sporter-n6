<?php
include 'ketnoi.php';
session_start();

if(isset($_GET['IDSP'])){
    $IDSP = $_GET['IDSP'];
}
$SoLuong =(isset($_GET['SoLuong'])) ? $_GET['SoLuong'] : 1;
$Size = (isset($_GET['Size'])) ? $_GET['Size'] : "S";
// session_destroy();
// die();
$sql = "select * from sanpham where IDSP='$IDSP'";
$thucthi=mysqli_query($conn,$sql);
$dulieu = mysqli_fetch_array($thucthi);


$item = [
    'IDSP'=>$dulieu['IDSP'],
    'TenSP'=>$dulieu['TenSP'],
    'Anh'=>$dulieu['Anh'],
    'Gia'=>$dulieu['Gia'],
    'Size'=>$Size,
    'SoLuong'=>$SoLuong
];



$action = (isset($_GET['action']))? $_GET['action'] : 'add';



if(isset($_SESSION['cart'][$IDSP])){
    $_SESSION['cart'][$IDSP]['SoLuong'] += $SoLuong;
    $_SESSION['cart'][$IDSP]['Size'] =$Size;
}
else{
    $_SESSION['cart'][$IDSP] =$item;
}


if($action == 'delete'){
    unset($_SESSION['cart'][$IDSP]);
}

if($action == 'update'){
    $_SESSION['cart'][$IDSP]['SoLuong'] =$SoLuong;
    $_SESSION['cart'][$IDSP]['Size'] =$Size;
}
header('location: giohangmain.php')

?>