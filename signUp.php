<?php
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

<?php
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

$tsql= "SELECT *
        FROM member
        WHERE id = '$id'";

    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" . PHP_EOL);
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
?>

$tsql= "INSERT INTO member VALUES('$id','$pw', '$name')");

$getResults= sqlsrv_query($conn, $tsql);

if($tsql){
    echo "회원가입이 완료되었습니다!!!";
}

echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    //echo ($row['id'] . " " . $row['pw'] . PHP_EOL);
    //$id = $row['id'];
    //$pw = $row['pw'];
}
sqlsrv_free_stmt($getResults);
?>