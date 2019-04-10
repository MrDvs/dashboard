<?php require './DB.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head style="background-color: green !important">
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</head>
<body onload="startTime()">
	<div class="container-fluid">

		<div class="row">
			<div id="currentTime"></div>
			<script src="./components/currentTime.js"></script>
		</div>

		<div class="row">
			<div class="col-md-4 dashboard-component">
				<?php include('./components/weather.php') ?>
			</div>
			<div class="col-md-5 dashboard-component">
				<?php include('./components/todo.php') ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3 dashboard-component" >		
				<?php include('./components/cryptoPrice.php') ?>
			</div>
			<div class="col-md-7 dashboard-component">
				<?php include('./components/googleCalendar.php') ?>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-5 dashboard-component">
				<?php include('./components/bookmarks.php') ?>
			</div>
		</div>

	</div>
</body>
</html>