<?php
include_once "header.php";
include_once "sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/datepicker3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background: #11045a">
<body>
<br>
<br>
	<div >

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background: white;"> <hr>
		<div class="panel panel-container">
		<div>
		<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="active" style="color:green;"><i class="fa fa-bed " style="font-size:xx-large;"></i>
							<div class="large">
								
							<?php include 'counters/room-count.php'?></div>
							<div style="color: black;"><h4>Nombre De Chambres Totales</h4></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding" style="color: blue;"><i class="fa fa-bookmark "style="font-size:xx-large;"></i>
							<div class="large"><?php include 'counters/reserve-count.php'?></div>
							<div class="text-muted"><h4 style="color: black;">Toutes Les Réservation</h4></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding" style="color: yellow;"><i class="fa fa-users" style="font-size: xx-large;"></i>
							<div class="large"><?php include 'counters/staff-count.php'?></div>
							<div class="text-muted"><h4 style="color: black;">équipe ('Personnel') </h4></div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding" style="color:lime;"><i class="fa fa-calendar" style="font-size: xx-large;"></i>
							<div class="large"><?php include 'counters/bookedroom-count.php'?></div>
							<div class="text-muted"><h4 style="color: black;">Les Chambres Réservés</h4></div>
						</div>
					</div>
			</div><!--/.row-->
		</div>
		<br>
			<div>
			<div class="row">
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding" style="color:chartreuse;"><i class="fa fa-check-circle" style="font-size: xx-large;"></i>
							<div class="large"><?php include 'counters/avrooms-count.php'?></div>
							<div class="text-muted"><h4 style="color: black;">les Chambres Disponibles</h4></div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"style="color:red;"><i class="fa fa-download" style="font-size: xx-large;"></i>
							<div class="large"><?php include 'counters/checkedin-count.php'?></div>
							<div ><h4 style="color: black;">Réservations incompletes($)</h4></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding" style="color: indigo;"><i class="fa fa-spinner" style="font-size: xx-large;"></i>
							<div class="large"><?php include 'counters/pendingpay-count.php'?></div>
							<div class="text-muted"><h4 style="color: black;">Paiements En Attente</h4></div>
						</div>
					</div>
				</div>
				
			</div><!--/.row-->
			</div>
			
			
			<div>
			<div >
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-red panel-widget border-right">
						<div class="row no-padding" style="font-size: xx-large;"><i class="fa fa-cc-visa" style="color:blue;"></i>
						<i class="fa fa-cc-mastercard" style="color:orangered;"></i>
							<div style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php include 'counters/income-count.php'?>
							DZD</div>
							<div><h3 style="color:black">Payé</h3></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-orange panel-widget ">
						<div class="row no-padding" style="font-size: xx-large;"><i class="fa fa-credit-card-alt" style="color: orange;"></i>
						<i class="fa fa-paypal" style="color:blue"></i>
							<div  style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php include 'counters/pendingpayment.php'?>DZD</div>
							<div class="text-muted" style="color: black;"><h3>En Attent De Payement...</h3>
						</div>
						</div>
					</div>
					<br>
					<div>
		<ul style="color: blue;">
			<h4 style="font-family: 'Courier New', Courier, monospace;"><b>TOUS DROITS EST RÉSERVÉS <i class="fa fa-copyright"></i></b></h4>
		</ul>
	</div>
				</div>
			
		
			</div>
			</div>
	</div>
		
		
	









	
		
</body>
</html>
