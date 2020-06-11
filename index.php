<?php
session_start();
$id = $_SESSION['userid'];
if(!isset($_SESSION['userid'])) // 세션 존재 X
{
    header ('Location: ./login.html');
}

echo "로그인 성공!";
echo "<a href=logout.php> Log Out </a>";
?>

<html>
<head>
<title> SILLA MARKET </title>
</head>
<body>
접속자 ID : <label for="id"> <?=$id?> </label>
</body>
</html>