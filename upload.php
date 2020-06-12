<?php
session_start();
/*
$filename =  date("YmdHis").".jpg";
move_uploaded_file($_FILES['imageform']['tmp_name'], $filename);
*/

$title=$_POST['title'];
$price=$_POST['price'];
$dbLat = $_POST['dbLat'];
$dbLng = $_POST['dbLng'];

echo $title."<br>\n";
echo $price."<br>\n";
echo $dbLat."<br>\n";
echo $dbLng;
?>