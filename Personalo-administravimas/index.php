<?php 
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
 require_once "Views/priedu_skaiciavimas.php";
	} ?>
<?php
if($page == "darbuotojuDuomenys") { 
require_once "Views/darbuotoju_duomenys.php";
} 


if($page == "atlyginimoSkaiciavimas") { 
require_once "Views/atlyginimo_skaiciavimas.php";
 } ?>

<?php
if($page == "stebesenuAtlikimas") {
require_once "Views/stebesenu_atlikimas.php";
} ?>

<?php
if($page == "atostoguPaskyrimas") { 
require_once "Views/atostogu_paskyrimas.php";
 } ?>

<?php
if($page == "nuobauduPaskyrimas") {
require_once "Views/nuobaudu_paskyrimas.php";
	} ?>

<?php } ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>