<?php error_reporting(0); 
$page= $_GET['psl'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalo administravimas</title>
    <style>
        html,
        body {
            height: 100%;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header {
            text-align: center;
        }
        .funkcijos{
            margin: 5px;
            width: 250px;
        }
    </style>
</head>
<body>
    <a href="javascript:history.back()" class="btn btn-warning">Grįžti</a>
<?php if($page == "") { ?>
    <h2 class="header">Personalo administravimas</h2>
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="?psl=prieduSkaiciavimas" class="btn btn-warning funkcijos">Darbuotojų priedų skaičiavimas</a></li>
            <li><a href="?psl=darbuotojuDuomenys" class="btn btn-warning funkcijos">Darbuotojų duomenys</a></li>
            <li><a href="?psl=atlyginimoSkaiciavimas" class="btn btn-warning funkcijos">Atlyginimo skaičiavimas</a></li>
            <li><a href="?psl=stebesenuAtlikimas" class="btn btn-warning funkcijos">Stebėsenų atlikimas</a></li>
            <li><a href="?psl=atostoguPaskyrimas" class="btn btn-warning funkcijos">Atostogų paskyrimas</a></li>
            <li><a href="?psl=nuobauduPaskyrimas" class="btn btn-warning funkcijos">Nuobaudų paskyrimas</a></li>
        </ul>
    </div>
<?php } else  { ?>
<?php
if($page == "prieduSkaiciavimas") { 
 
$page= $_GET['act'];
	if($page == "") {?>
	<h2 class="header">Priedų skaičiavimas</h2>
    <div class="container">
       <ul class="list-unstyled">
            <li><a href="?psl=prieduSkaiciavimas&act=pridetiPrieda" class="btn btn-warning funkcijos">Pridėti priedą</a></li>
            <li><a href="?psl=prieduSkaiciavimas&act=atimtiPrieda" class="btn btn-warning funkcijos">Atimti priedą</a></li>
                      
        </ul> 
    </div>
	<?php } 
	if($page=="pridetiPrieda") { 
	?>
	<h2 class="header">Pridėti priedą</h2>
	<?php } if($page=="atimtiPrieda") { ?>
<h2 class="header">Atimti priedą</h2>
	<?php } ?>
<?php } ?>
<?php
if($page == "darbuotojuDuomenys") { ?>
<h2 class="header">Darbuotojų duomenys</h2>
<?php } ?>

<?php
if($page == "atlyginimoSkaiciavimas") { ?>
<h2 class="header">Atlyginimo skaičiavimas</h2>
<?php } ?>

<?php
if($page == "stebesenuAtlikimas") { ?>
<h2 class="header">Stebėsenų atlikimas</h2>
<?php } ?>

<?php
if($page == "atostoguPaskyrimas") { 
$page= $_GET['act'];
	if($page == "") {?>
	<h2 class="header">Atostogų paskyrimas</h2>
    <div class="container">
       <ul class="list-unstyled">
            <li><a href="?psl=atostoguPaskyrimas&act=paskirtiAtostogas" class="btn btn-warning funkcijos">Paskirti atostogas</a></li>
            <li><a href="?psl=atostoguPaskyrimas&act=atimtiAtostogas" class="btn btn-warning funkcijos">Atimti atostogas</a></li>            
        </ul> 
    </div>
	<?php } 
	if($page=="paskirtiAtostogas") { 
	?>
	<h2 class="header">Paskirti atostogas</h2>
	<?php } 
	if($page=="atimtiAtostogas") {
		?>
		<h2 class="header">Atimti atostogas</h2>
	<?php } ?>
<?php } ?>

<?php
if($page == "nuobauduPaskyrimas") { ?>
 <?php
$page= $_GET['act'];
	if($page == "") {?>
	<h2 class="header">Nuobaudų paskyrimas</h2>
    <div class="container">
       <ul class="list-unstyled">
            <li><a href="?psl=nuobauduPaskyrimas&act=paskirtiNuobauda" class="btn btn-warning funkcijos">Paskirti nuobaudą</a></li>
                      
        </ul> 
    </div>
	<?php } 
	if($page=="paskirtiNuobauda") { 
	?>
	<h2 class="header">Paskirti nuobaudą</h2>
	<?php } ?>
<?php } ?>

<?php } ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>