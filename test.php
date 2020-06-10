<?
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
$path = "./";
$filename =  date("YmdHis").".jpg";
move_uploaded_file($_FILES['imageform']['tmp_name'], $filename);

$tsql= "INSERT INTO image (path, filename) VALUES ( '$path', '$filename')";

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
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>게시물 작성 예제 폼</title>
</head>
<body>
<table>
<tr>
    <td>전송이미지</td>

<td><img src="<?=$path.$filename;?>" /></td>
</tr>
</table>
<p><b>전송완료</b></p>
<p><a href='index.php'>목록가기</a></p>
</body>
</html>