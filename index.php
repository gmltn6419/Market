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
/*
$serverName = "tcp:market01.database.windows.net,1433"; // update me
$connectionOptions = array(
    "Database" => "Market", // update me
    "Uid" => "heesu", // update me
    "PWD" => "dlvlwk12@" // update me
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
*/
$tsql= "SELECT id, pw
        FROM member
        WHERE id = 'gmltn6419'";

    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['id'] . " " . $row['pw'] . PHP_EOL);
     $id = $row['id'];
     $pw = $row['pw'];
    }
    sqlsrv_free_stmt($getResults);
?>

<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
</head>
<body>
<form>
    <div align="center" style="width:500px; height:400px; float:center; border:1px; background-color:green">
        <p align="center">
            <strong>아이디</strong>
            <input type="text" name="id" value="<?=$id?>">
        </p>
        
        <p align="center">
            <strong>비밀번호</strong>
            <input type="password" name="pw" value="<?=$pw?>">
        </p>
        
        <p align="center">
            <strong>이름</strong>
            <input type="text" name="name" value="이름 입력">
        </p>
        <p align="center">
        <button type="button" onClick="location.href='test.php'">test</button>
    </div>
</form>
</body>
</html>