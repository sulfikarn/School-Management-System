<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Modish Login Form Responsive Widget Template :: w3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Modish Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/loginstyle.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<!-- title -->
	<h1>
		<span>M</span>odish
		<span>L</span>ogin
		<span>F</span>orm
	</h1>
	<!-- //title -->

	<!-- content -->
	<div class="sub-main-w3">
		<form class="login" action="<?php echo base_url(); ?>index.php/home/login" method="post">
			<p class="legend">Login Here<span class="fa fa-hand-o-down"></span></p>
			<div class="input">
				<input type="email" placeholder="Email" name="email" required />
				<span class="fa fa-envelope"></span>
			</div>
			<div class="input">
				<input type="password" placeholder="Password" name="password" required />
				<span class="fa fa-unlock"></span>
			</div>
			<button type="submit" class="submit" name="submit" value="send">
				<span class="fa fa-sign-in"></span>
			</button>
		</form>
	</div>
	<!-- //content -->

	<!-- copyright -->
	<div class="footer">
		<h2>&copy; 2018 Modish Login Form. All rights reserved | Design by
			<a href="http://w3layouts.com">W3layouts</a>
		</h2>
	</div>
	<!-- //copyright -->

</body>

</html>