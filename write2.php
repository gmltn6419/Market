<?php
session_start();

$filename =  date("YmdHis").".jpg";
move_uploaded_file($_FILES['imageform']['tmp_name'], $filename);

$title=$_POST['title'];
$price=$_POST['price'];

$Lat = $_SESSION['dbLat'];
$Lng = $_SESSION['dbLng'];

echo $title;
echo $price;
echo $Lat;
echo $Lng;
?>