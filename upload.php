<?php
session_start();

$id=$_SESSION['userid'];

$filename =  date("YmdHis").".jpg";
move_uploaded_file($_FILES['imageform']['tmp_name'], $filename);

$title=$_POST['title'];
$price=$_POST['price'];
$dbLat = $_POST['dbLat'];
$dbLng = $_POST['dbLng'];

// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:market01.database.windows.net,1433; Database = Market", "heesu", "dlvlwk12@");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "heesu", "pwd" => "dlvlwk12@", "Database" => "Market", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:market01.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

//$path = $_SERVER['DOCUMENT_ROOT'].'/testBBS/';
//$path = "./";

$tsql= "INSERT INTO image (filename) VALUES ('$filename')";

$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    //echo ($row['id'] . " " . $row['pw'] . PHP_EOL);
    //$id = $row['id'];
    //$pw = $row['pw'];
}
sqlsrv_free_stmt($getResults);

$connectionInfo = array("UID" => "heesu", "pwd" => "dlvlwk12@", "Database" => "Market", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:market01.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

//$path = $_SERVER['DOCUMENT_ROOT'].'/testBBS/';
//$path = "./";

$tsql2= "INSERT INTO product VALUES ('$title','$price','$dbLat','$dbLng','$id')";

$getResults2= sqlsrv_query($conn, $tsql2);
echo ("Reading data from table" . PHP_EOL);
if ($getResults2 == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults2, SQLSRV_FETCH_ASSOC)) {
    alert("글 작성 완료!");
    echo "<a href=./index.php>back page</a>";
}
sqlsrv_free_stmt($getResults2);
?>