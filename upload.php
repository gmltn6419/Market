<?php
session_start();
/*
$filename =  date("YmdHis").".jpg";
move_uploaded_file($_FILES['imageform']['tmp_name'], $filename);
*/

$title=$_POST['title'];
$price=$_POST['price'];
$dbLat = $_POST['dbLat'];

echo $title;
echo $price;
echo $dbLat;
?>