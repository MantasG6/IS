<?php
require_once("../Controllers/vaztarastis_controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Važtaraščių peržiūra</title>
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
    <a href="../Važtaraščiai.php" class="btn btn-warning">Grįžti</a>

    <h3 class="header">Važtaraščių peržiūra</h3>
    <?php if ( isset($_SESSION['success']) ) {
        echo('<p class="header" style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
    } ?>
    <div class="container">
        <?php if (count($vaztarasciai) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
					<th scope="col">Siuntejas</th>
					<th scope="col">Gavejas</th>
                    <th scope="col">Produktas</th>
                    <th scope="col">Kiekis</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($vaztarasciai as $vaztarastis)
                {
														
					echo "<tr><td>";
					echo $vaztarastis->siuntejas;
					echo "</td><td>";
					echo $vaztarastis->gavejas;
					echo "</td><td>";
					echo $vaztarastis->produkto_pavadinimas; 
					echo "</td><td>";
					echo $vaztarastis->produkto_kiekis;    
					echo "</td><td>";
					echo $vaztarastis->sudarymo_data;    					
									
                }
                ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Nėra įrašų</p>
        <?php endif; ?>
   
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>