<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();

$id=$_SESSION['userid'];

$cno=$_POST['cno'];
$cname = $_POST['cname'];
$location = $_POST['location'];

// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:market01.database.windows.net,1433; Database = Market1", "heesu", "dlvlwk12@");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "heesu", "pwd" => "dlvlwk12@", "Database" => "Market1", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:market01.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

//$path = $_SERVER['DOCUMENT_ROOT'].'/testBBS/';
//$path = "./";

$tsql= "INSERT INTO coupon VALUES ('$cno','$cname','$location')";

$getResults= sqlsrv_query($conn, $tsql);

sqlsrv_free_stmt($getResults);

if($tsql){
    echo "쿠폰 등록 완료! <br>\n";
    echo "<a href=./coupon.php>back page</a>";
}
?>