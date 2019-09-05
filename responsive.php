<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		/*  SECTIONS  */
		.rsection {
			clear: both;
			padding: 0px;
			margin: 0px;
		}

		/*  COLUMN SETUP  */
		.rcol {
			border: 1px solid red;
			display: block;
			float:left;
			margin: 1% 0 1% 1.6%;
		}
		.rcol:first-child { margin-left: 0; }

		/*  GROUPING  */
		.rgroup:before,
		.rgroup:after { content:""; display:table; }
		.rgroup:after { clear:both;}
		.rgroup { zoom:1; /* For IE 6/7 */ }
	</style>
</head>
<body>
	<div class="rsection rgroup">
		<div class="rcol" style="width: 30%; height: 100%">
			<?php include('./components/weather.php') ?>
		</div>
		<div class="rcol">
		1 of 4
		</div>
		<div class="rcol">
		1 of 4
		</div>
		<div class="rcol">
		1 of 4
		</div>
	</div>
</body>
</html>