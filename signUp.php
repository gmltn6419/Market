<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");

$id=$_POST['id'];
$pw=$_POST['pw'];
$pwc=$_POST['pwc'];
$name=$_POST['name'];

if($pw!=$pwc)
{
    echo "비밀번호와 비밀번호 확인이 서로 다릅니다.";
    echo "<a href=signUp.html>back page</a>";
    exit();
}

if($id==NULL || $pw==NULL || $name==NULL)
{
    echo "빈칸을 모두 채워주세요.";
    echo "<a href=signUp.html>back page</a>";
    exit();
}

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

    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
        if($getResults->num_rows==1)
        {
            echo "중복된 id입니다.";
            echo "<a href=signUp.html>back page</a>";
            exit();
        }
    }
    sqlsrv_free_stmt($getResults);

$connectionInfo = array("UID" => "heesu", "pwd" => "dlvlwk12@", "Database" => "Market1", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:market01.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
$tsql2= "INSERT INTO member VALUES('$id','$pw', '$name')";

$getResults2= sqlsrv_query($conn, $tsql2);

if($tsql2){
    echo "회원가입이 완료되었습니다!!!";
    echo "<a href=index.php>로그인 하기</a>";
}
sqlsrv_free_stmt($getResults2);
?>