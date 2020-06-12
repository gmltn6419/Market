<?php
session_start();

$id=$_SESSION['userid'];
/*
$filename =  date("YmdHis").".jpg";
move_uploaded_file($_FILES['imageform']['tmp_name'], $filename);
*/

$title=$_POST['title'];
$price=$_POST['price'];
$dbLat = $_POST['dbLat'];
$dbLng = $_POST['dbLng'];


echo $id."<br>\n";
echo $title."<br>\n";
echo $price."<br>\n";
echo $dbLat."<br>\n";
echo $dbLng;
?>