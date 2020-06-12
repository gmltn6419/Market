<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:market01.database.windows.net,1433; Database = Market", "heesu", "dlvlwk12@");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

$connectionInfo = array("UID" => "heesu", "pwd" => "dlvlwk12@", "Database" => "Market", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:market01.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

$tsql= "SELECT filename FROM image";
$getResults= sqlsrv_query($conn, $tsql);

echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    echo ($row['filename'] . PHP_EOL);
    $filename = $row['filename'];
}
sqlsrv_free_stmt($getResults);

$connectionInfo = array("UID" => "heesu", "pwd" => "dlvlwk12@", "Database" => "Market", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:market01.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

$tsql2= "SELECT Lat, Lng FROM product";
$getResults2= sqlsrv_query($conn, $tsql2);

echo ("Reading data from table" . PHP_EOL);
if ($getResults2 == FALSE)
    echo (sqlsrv_errors());
while ($row2 = sqlsrv_fetch_array($getResults2, SQLSRV_FETCH_ASSOC)) {
    echo ($row2['filename'] . PHP_EOL);
    //$path = $row2['path'];
    $Lat = $row2['Lat'];
    $Lng = $row2['Lng'];
}
sqlsrv_free_stmt($getResults2);
?>
?>
<html>
<head>
    <title> 직거래 </title>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=6ae877255e92416f6f5b8b16227ee8c5"></script>
</head>
<body>
<form>
<div align='center' id="map" style="width:50%;height:350px;"></div>
<script>
var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = { 
        center: new kakao.maps.LatLng(35.16825697799745, 128.99625354800833), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };

var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

var imageSrc = '<?=$filename;?>', // 마커이미지의 주소입니다    
    imageSize = new kakao.maps.Size(64, 69), // 마커이미지의 크기입니다
    imageOption = {offset: new kakao.maps.Point(27, 69)}; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.
      
// 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption),
    markerPosition = new kakao.maps.LatLng(<?=$Lat?>, <?=$Lng?>); // 마커가 표시될 위치입니다

// 마커를 생성합니다
var marker = new kakao.maps.Marker({
    position: markerPosition, 
    image: markerImage // 마커이미지 설정 
});

// 마커가 지도 위에 표시되도록 설정합니다
marker.setMap(map);  
</script>
<button align='center' style="height:100px;width:100px; font-size: 25px;" onclick="location.href='write.php'"> 글 작성 </button>
</form>    
</body>
</html>