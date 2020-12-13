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

if ( isset($_POST['delete']) ) {
    istrinti($rad->asmens_kodas);
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
    <div class="container">
        <p>Ar tikrai norite ištrinti darbuotoją, kurio asmens kodas <?= htmlentities($rad->asmens_kodas) ?>?</p>
    </div>
    <div class="container">
        <form method="post">
        <input class="btn btn-warning" type="submit" value="Ištrinti" name="delete">  
        <button type="submit" class="btn btn-warning" name="cancel">Atšaukti</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>