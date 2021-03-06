<?php
require_once("../Controllers/aparatas_controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aparatu redagavimas</title>
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
    <a href="Aparatai.php" class="btn btn-warning">Grįžti</a>

    <h3 class="header">Aparatu redagavimas</h3>
    <?php if ( isset($_SESSION['error']) ) {
        echo('<p class="header" style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    } ?>
    <div class="container">
        <?php if (count($aparatai) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Pavadinimas</th><th scope="col">Tipas</th><th scope="col">Paskirtis</th>
                    <th scope="col">Operatorius</th><th scope="col">Nasumas</th><th scope="col">Aparato id</th><th scope="col">Naudotojo id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($aparatai as $ad)
                {
                    echo "<tr><td>";
                    echo $ad->pavadinimas;
                    echo "</td><td>";
                    echo $ad->tipas;
                    echo "</td><td>";
                    echo $ad->paskirtis;
                    echo "</td><td>";
                    echo $ad->operatorius;
                    echo "</td><td>";
                    echo $ad->nasumas;
                    echo "</td><td>";
                    echo $ad->id_Aparatas;
                    echo "</td><td>";
                    echo $ad->naudotojo_id;
                    echo "</td><td>";
                    echo ("<a href=\"aparatu-redagavimas.php?id_Aparatas=".$ad->id_Aparatas."\">Redaguoti</a> ");
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