<html>
<head>
    <title>쿠폰</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div align="center">
<?php
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

$tsql= "SELECT * from coupon";

$getResults= sqlsrv_query($conn, $tsql);

echo "<table border="1" width="70%" height="200" align="center">";
echo "<th> 글 번호 </th>";
echo "<th> 쿠폰 번호 </th>";
echo "<th> 사용처 </th>";
echo "<th> 위치 </th>";

while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {    
    echo "<tr>";
    echo "<td>".$row['bbsno']."</td>";
    echo "<td>".$row['cno']."</td>";
    echo "<td>".$row['cname']."</td>";
    echo "<td>".$row['location']."</td>";
    echo "</tr>";
}
echo "</table>";

sqlsrv_free_stmt($getResults);
?>
<br>
<button style="height:100px; width:100px; font-size: 20px;" onclick="location.href='./write2.php'"> 쿠폰등록 </button>
<button style="height:100px; width:100px; font-size: 20px;" onclick="location.href='./index.php'"> 메인화면 </button>
</div>
</body>
</html>