<?php
require_once("../Controllers/postas_controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posto šalinimas</title>
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
    <a href="postas-perziura.php" class="btn btn-warning">Grįžti</a>

    <h3 class="header">posto šalinimas</h3>
    <?php if ( isset($_SESSION['error']) ) {
        echo('<p class="header" style="color: green;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    } ?>
    <div class="container">
    <?php if (count($postai) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">autorius</th><th scope="col">komentaru_skaicius</th><th scope="col">id</th>
                    <th scope="col">pavadinimas</th><th scope="col">busena</th><th scope="col">naudotojas_id</th>
                    <th scope="col">ataskaita_id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($postai as $postas)
                {
					
		
			
                    echo "<tr><td>";
                    echo $postas->autorius;
                    echo "</td><td>";
                    echo $postas->komentaru_skaicius;
                    echo "</td><td>";
                    echo $postas->id;
                    echo "</td><td>";
                    echo $postas->pavadinimas;
                    echo "</td><td>";
                    echo $postas->busena;
                    echo "</td><td>";
                    echo $postas->naudotojas_id;
                    echo "</td><td>";
                    echo $postas->ataskaita_id;
                    echo "</td><td>";
                    echo ("<a href=\"postas-salinimas.php?id=".$postas->id."\">Šalinti</a>");
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Nėra įrašų</p>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>