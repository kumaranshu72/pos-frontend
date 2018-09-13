<!DOCTYPE html>
<html lang="en">
<head>

<title>POS</title>

<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="HandheldFriendly" content="True">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- Style Sheets -->
<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/trunk.css" />
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/form-basic.css">

<!-- Scripts -->
<script type="text/javascript">
	if (typeof jQuery == 'undefined')
		document.write(unescape("%3Cscript src='js/jquery-1.9.js'" +
															"type='text/javascript'%3E%3C/script%3E"))
</script>
<script type="text/javascript" language="javascript" src="js/trunk.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<![endif]-->


</head>

<body>

<div class="container">

<?php
   require('header.php');
	 require_once('./config.php');
	 echo $header;
?>

	<div class="content slide">     <!--	Add "slideRight" class to items that move right when viewing Nav Drawer  -->
		<ul class="responsive">
			<!--
			<li class="header-section">
				<p class="placefiller">HEADER</p>
			</li>-->
			<li class="body-section">
				<?php
				  require('search_item.php');
				?>
			</li>
			<!--
			<li class="footer-section">
				<p class="placefiller">FOOTER</p>
			</li>
		-->
		</ul>
	</div>

</div>


</body>
</html>
