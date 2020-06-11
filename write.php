<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=6ae877255e92416f6f5b8b16227ee8c5"></script>
<?php
session_start();
?>
<html>
<head>
    <title>글 쓰기 </title>
    <style>
     div {
        width: 100%;
        height: 300px;
        
        border: 1px solid #000;
    }
    div.left {
        width: 50%;
        float: left;
    }
    div.right {
        width: 50%;
        float: right;
    }
    </style>
</head>
<body>
<form enctype="multipart/form-data" name="form" method="post" action="write2.php">
<div>
    <div class="left">
        사진 : <input type="file" name="image" />
        <br>
        제목 : <input type="text" name="title" placeholder="제목을 입력하세요!" style="width:300px">
        <br>
        가격 : <input type="text" name="price" placeholder="가격을 입력하세요!" style="width:300px">
    </div>
    <div class="right">
        <form>
        <div id="map" style="width:100%;height:350px;"></div>
        <p><em>지도를 클릭해주세요!</em></p> 
        <div id="clickLatlng"></div>
        <script>
        var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        mapOption = { 
            center: new kakao.maps.LatLng(35.16825697799745, 128.99625354800833), // 지도의 중심좌표(신라대)
            level: 3 // 지도의 확대 레벨
        };

        var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

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
        var dbLat = latlng.getLat(); //위도
        var dbLng = latlng.getLng(); //경도
        
        dbLat = <?=$_SESSION['dbLat']?>;
        dbLng = <?=$_SESSION['dbLng']?>;

        var message = '위도 : ' + dbLat + ' ';
        message += '경도 : ' + dbLng;

        var resultDiv = document.getElementById('clickLatlng'); 
        resultDiv.innerHTML = message;

        });
        </script>
        </div>
        </form>
</div>
<br>
<input type="submit" value="전송" />
</form>
</body>
</html>