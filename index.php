<?php
session_start();
require_once "./iccc/config.php";
//Check Mobile
$mAgent = array("iPhone","iPod","Android","Blackberry","Opera Mini", "Windows ce", "Nokia", "sony" );
$isMobile = false;
for($i=0; $i<sizeof($mAgent); $i++){
	if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
		$isMobile = true;
		break;
	}
}
	
if ($isMobile) {
	$title = $site_name_abbr;
}
else {
	$title = $site_name_full;
}

if (!isset($_GET['page'])) {
	$content_url = $base_folder."/"."about.php";
}
else {
	if ($_GET['page'] == "bbslist" ) $content_url = "./bbs/".$_GET['page'].".php";
	else $content_url = $base_folder."/".$_GET['page'].".php";
	$active_str = "class='active'";
	switch($_GET['page']) {
		case 'about': $about_class_str = $active_str; break;
		case 'certificate': $certificate_class_str = $active_str; break;
		case 'education': $education_class_str = $active_str; break;
		case 'partner': $partner_class_str = $active_str; break;
		case 'contact': $contact_class_str = $active_str; break;
		case 'bbslist': $bbslist_class_str = $active_str; break;
		case 'login': $login_class_str = $active_str; break;
	}
}
?>
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title><?=$site_name_abbr?></title>
</head>

<body>
    <div class="container-fluid ">
    
    <h2 style="text-align:center;"><?=$title?></h2>
    
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a href="./index.php" target="_self"><img src='<?=$base_folder?>/image/iccc_logo.png' style='width:50px; vertical-align:bottom; float:left; padding-top:10px;'></a>
    <!--<a class="navbar-brand" href="./index.php"><?=$licence_name_abbr?></a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    
    <ul class="nav navbar-nav">
    <li <?=$about_class_str?>><a href="index.php?page=about">About <?=$licence_name_abbr?></a></li>
    <li <?=$certificate_class_str?>><a href="index.php?page=certificate">CERTIFICATE</a></li>
    <li <?=$education_class_str?>><a href="index.php?page=education">EDUCATION</a></li>
    <li <?=$partner_class_str?>><a href="index.php?page=partner">PARTNER</a></li>
    <li <?=$contact_class_str?>><a href="index.php?page=contact">CONTACT</a></li>
    <li <?=$bbslist_class_str?>><a href="index.php?page=bbslist">BOARD</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<?php
	if ($_SESSION['ss_login_status'] == '') {
?>
    <li><a href="index.php?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
<?php
	}
	else if ($_SESSION['ss_login_status'] == 'logged_in') {
?>
    <li><a href="index.php?page=login&act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
<?php
	}
?>
    </ul>
    </div>
    </div>
    </nav>

    <div >
<?php
	require_once $content_url ;
?>
    </div>
<?php
	require_once $base_folder ."/" ."footer.php" ;
?>
    </div>
</body>
</html>
<script>
	window .setTimeout (function () {
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
		$(this).remove();});
		}, 4000);
	
	function confirmAction() {
		if (confirm("Are you sure to continue?")) return true;
		else return false;
	
	}
</script>