<?php
require_once("../Controllers/atsakingas_darbuotojas_controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atsakingų darbuotojų peržiūra</title>
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
    <a href="../index.php" class="btn btn-warning">Grįžti</a>

    <h3 class="header">Atsakingų darbuotojų peržiūra</h3>
    <?php if ( isset($_SESSION['success']) ) {
        echo('<p class="header" style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
    } ?>
    <div class="container">
        <?php if (count($atsakingi_darbuotojai) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Vardas</th><th scope="col">Pavardė</th><th scope="col">Priskirtas blokas</th>
                    <th scope="col">Asmens kodas</th><th scope="col">Atlyginimas</th><th scope="col">Atostogų būsena</th>
                    <th scope="col">Nuobaudų skaičius</th><th scope="col">Naudotojo id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($atsakingi_darbuotojai as $ad)
                {
                    echo "<tr><td>";
                    echo $ad->vardas;
                    echo "</td><td>";
                    echo $ad->pavarde;
                    echo "</td><td>";
                    echo $ad->priskirtas_blokas;
                    echo "</td><td>";
                    echo $ad->asmens_kodas;
                    echo "</td><td>";
                    echo $ad->atlyginimas;
                    echo "</td><td>";
                    echo $ad->atostogu_busena;
                    echo "</td><td>";
                    echo $ad->nuobaudu_skaicius;
                    echo "</td><td>";
                    echo $ad->naudotojo_id;
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Nėra įrašų</p>
        <?php endif; ?>
    </div>
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="Atsakingu-darbuotoju-priskyrimas.php" class="btn btn-warning funkcijos">Atsakingų darbuotojų priskyrimas</a></li>
            <li><a href="Atsakingu-darbuotoju-redagavimas-pasirinkimas.php" class="btn btn-warning funkcijos">Atsakingų darbuotojų redagavimas</a></li>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>