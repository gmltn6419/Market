<?php
/*
$filename =  date("YmdHis").".jpg";
move_uploaded_file($_FILES['imageform']['tmp_name'], $filename);
*/

$title=$_GET['title'];
$price=$_GET['price'];
//$dbLat = $_POST['dbLat'];

echo $title "<br>";
echo $price "<br>";
//echo $dbLat "<br>";
?>