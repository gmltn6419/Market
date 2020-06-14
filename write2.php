<?php
    header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html>
<head>
    <title>쿠폰 등록 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<form enctype="multipart/form-data" name="form" method="post" action="upload2.php">
<div align="center">
    쿠폰번호 : <input type="text" name="cno" placeholder="사용처를 입력하세요!" style="width:300px">
    <br>
    사용처 : <input type="text" name="cname" placeholder="사용처를 입력하세요!" style="width:300px">
    <br>
    위치 : <input type="text" name="location" placeholder="위치를 입력하세요!" style="width:300px">
    <br>
    <input type="submit" value="등록" />
</div>
</form>
</body>
</html>