<?php
require_once("../Controllers/atsakingas_darbuotojas_controller.php");

if ( isset($_POST['cancel'] ) ) {
    header("Location: Atsakingu-darbuotoju-redagavimas-pasirinkimas.php");
    return;
}

if (!isset($_GET['asmens_kodas']))
{
    $_SESSION['error'] = "Nenurodytas asmens kodas!";
    header("Location: Atsakingu-darbuotoju-redagavimas-pasirinkimas.php");
    return;
}

foreach($atsakingi_darbuotojai as $ad)
{
    if ($ad->asmens_kodas == $_GET['asmens_kodas'])
    {
        $rad = $ad;
        break;
    }
}

if(empty($rad))
{
    $_SESSION['error'] = 'Nurodytas netinkamas asmens kodas!';
    header( 'Location: Atsakingu-darbuotoju-redagavimas-pasirinkimas.php' ) ;
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atsakingų darbuotojų redagavimas</title>
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
    <h3 class="header">Atsakingų darbuotojų redagavimas</h3>
    <?php
    if(isset($_SESSION['error']))
    {
        echo "<p class='header' style='color:red;'>".htmlentities($_SESSION['error'])."<p>\n";
        unset($_SESSION['error']);
    }
    ?>
    <div class="container">
        <form method="post">
        <label>Vardas</label>
        <input type="text" size="40" name="vardas" value="<?= $rad->vardas ?>"><br/>
        <label>Pavarde</label>
        <input type="text" size="40" name="pavarde" value="<?= $rad->pavarde ?>"><br/>
        <label>Priskirtas blokas</label>
        <input type="text" size="40" name="priskirtas_blokas" value="<?= $rad->priskirtas_blokas ?>"><br/>
        <label>Atlyginimas</label>
        <input type="text" size="40" name="atlyginimas" value="<?= $rad->atlyginimas ?>"><br/>
        <label>Atostogu busena</label>
        <input type="text" size="40" name="atostogu_busena" value="<?= $rad->atostogu_busena ?>"><br/>
        <label>Nuobaudu skaicius</label>
        <input type="text" size="40" name="nuobaudu_skaicius" value="<?= $rad->nuobaudu_skaicius ?>"><br/>
        <label>Naudotojo id</label>
        <input type="text" size="40" name="naudotojo_id" value="<?= $rad->naudotojo_id ?>"><br/>
        <button type="submit" class="btn btn-warning" name="Edit">Redaguoti</button>
        <button type="submit" class="btn btn-warning" name="cancel">Atsaukti</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST["vardas"]) && isset($_POST["pavarde"]) && isset($_POST["priskirtas_blokas"]) &&
isset($_POST["atlyginimas"]) && isset($_POST["atostogu_busena"]) && isset($_POST["nuobaudu_skaicius"]) && isset($_POST["naudotojo_id"]))
{
    redaguoti($_POST["vardas"], $_POST["pavarde"], $_POST["priskirtas_blokas"], $rad->asmens_kodas, 
    $_POST["atlyginimas"], $_POST["atostogu_busena"], $_POST["nuobaudu_skaicius"], $_POST["naudotojo_id"]);
}