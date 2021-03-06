<?php
session_destroy();
session_start();
header("Content-Type: text/html; charset=UTF-8");

$id=$_POST['id'];
$pw=$_POST['pw'];

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

$tsql= "SELECT *
        FROM member
        WHERE id = '$id'";

$getResults= sqlsrv_query($conn, $tsql);

echo ("Reading data from table" . PHP_EOL);

if ($getResults == FALSE){
    echo (sqlsrv_errors());
}

while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    if($row['pw']==$pw){
        $_SESSION['userid']=$id;
        if(isset($_SESSION['userid'])){
            header('Location: ./index.php'); // 로그인 성공 시 페이지 이동
        }
        else{
            echo "세션 저장 실패";
            exit();
        }
    }
    else{
        echo "wrong id or pw1";
        exit();
    }
}

sqlsrv_free_stmt($getResults);
?>