<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=6ae877255e92416f6f5b8b16227ee8c5"></script>
<?php
session_start();
?>
<html>
<head>
    <title>글 쓰기 </title>
</head>
<body>
<form enctype="multipart/form-data" name="form" method="post" action="write2.php" align:"center">
    사진 : <input type="file" name="image" />
    <br>
    제목 : <input type="text" name="title" placeholder="제목을 입력하세요!" style="width:300px">
    <br>
    가격 : <input type="text" name="price" placeholder="가격을 입력하세요!" style="width:300px">
    <br>
    <div id="map" style="width:50%;height:350px;"></div>
    <p><em>지도를 클릭해주세요!</em></p> 
    <div id="clickLatlng"></div>
    <script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        mapOption = { 
            center: new kakao.maps.LatLng(35.16825697799745, 128.99625354800833), // 지도의 중심좌표(신라대)
            level: 3 // 지도의 확대 레벨
        };

    // 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
    var map = new kakao.maps.Map(mapContainer, mapOption);
    // 지도를 클릭한 위치에 표출할 마커입니다
    var marker = new kakao.maps.Marker({ 
    // 지도 중심좌표에 마커를 생성합니다 
    position: map.getCenter() 
    }); 
// 지도에 마커를 표시합니다
marker.setMap(map);

    </script>
    <br>
    <input type="submit" value="전송" />
</form>
</body>
</html>