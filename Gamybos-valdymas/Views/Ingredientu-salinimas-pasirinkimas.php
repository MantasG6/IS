<?php
require_once("../Controllers/ingredientas_controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientų šalinimas</title>
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
    <a href="Atsakingu-darbuotoju-perziura.php" class="btn btn-warning">Grįžti</a>

    <h3 class="header">Ingredientų šalinimas</h3>
    <?php if ( isset($_SESSION['error']) ) {
        echo('<p class="header" style="color: green;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    } ?>
    <div class="container">
    <?php if (count($ingredientai) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Pavadinimas</th><th scope="col">Numeris</th><th scope="col">Svoris</th>
                    <th scope="col">Gamintojas</th><th scope="col">Kilmės šalis</th><th scope="col">Galiojimo data</th>
                    <th scope="col">Aparato id</th><th scope="col">Naudotojo id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($ingredientai as $ingredientas)
                {
                    echo "<tr><td>";
                    echo $ingredientas->pavadinimas;
                    echo "</td><td>";
                    echo $ingredientas->numeris;
                    echo "</td><td>";
                    echo $ingredientas->svoris;
                    echo "</td><td>";
                    echo $ingredientas->gamintojas;
                    echo "</td><td>";
                    echo $ingredientas->kilmes_salis;
                    echo "</td><td>";
                    echo $ingredientas->galiojimo_data;
                    echo "</td><td>";
                    echo $ingredientas->aparato_id;
                    echo "</td><td>";
                    echo $ingredientas->naudotojo_id;
                    echo "</td><td>";
                    echo ("<a href=\"Ingredientu-salinimas.php?numeris=".$ingredientas->numeris."\">Šalinti</a>");
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