<?php
    session_start();
?>
<html>
<head>
    <title>글 쓰기 </title>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=6ae877255e92416f6f5b8b16227ee8c5"></script>
</head>
<body>
<form method="post" action="./upload.php">
제목 : <input type="text" name="title" style="width:300px">
    <br>
    가격 : <input type="text" name="price" style="width:300px">
    <br>
    <input type="submit" value="submit"/>
</form>
<!--
<form enctype="multipart/form-data" method="post" action="./upload.php">
     <input type="hidden" name="dbLat" id="dbLat" /> 
    사진 : <input type="file" name="image" /> 
    <br>
    c
    <p><em>지도를 클릭해주세요!</em></p> 
    <div id="map" style="width:50%;height:350px;"></div>
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

    // 지도에 클릭 이벤트를 등록합니다
    // 지도를 클릭하면 마지막 파라미터로 넘어온 함수를 호출합니다
    kakao.maps.event.addListener(map, 'click', function(mouseEvent) {        
    
        // 클릭한 위도, 경도 정보를 가져옵니다 
        var latlng = mouseEvent.latLng; 
        
        // 마커 위치를 클릭한 위치로 옮깁니다
        marker.setPosition(latlng);
        
        //db저장
        var dbLat = latlng.getLat();
        var dbLng = latlng.getLng();
        /*
        document.getElementById("dbLat").value = dbLat;
        alert(document.getElementById("dbLat").value);
        */

        var message = '위도 : ' + dbLat + ' ';
        message += '경도 : ' + dbLng;
        
        var resultDiv = document.getElementById('clickLatlng'); 
        resultDiv.innerHTML = message;  
    });
    </script>
    <br>
    <input type="submit" value="submit"/>
</form>
-->
</body>
</html>