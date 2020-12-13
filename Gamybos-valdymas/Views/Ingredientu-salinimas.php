<?php
require_once("../Controllers/ingredientas_controller.php");

if ( isset($_POST['cancel'] ) ) {
    header("Location: Ingredientu-salinimas-pasirinkimas.php");
    return;
}


if (!isset($_GET['numeris']))
{
    $_SESSION['error'] = "Nenurodytas ingrediento numeris!";
    header("Location: Ingredientu-salinimas-pasirinkimas.php");
    return;
}

foreach($ingredientai as $ingredientas)
{
    if ($ingredientas->numeris == $_GET['numeris'])
    {
        $ringredientas = $ingredientas;
        break;
    }
}

if(empty($ringredientas))
{
    $_SESSION['error'] = 'Nurodytas netinkamas ingrediento numeris!';
    header( 'Location: Ingredientu-salinimas-pasirinkimas.php' ) ;
    return;
}

if ( isset($_POST['delete']) ) {
    salinti($ringredientas->numeris);
    return;
}

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
    <h3 class="header">Ingredientų šalinimas</h3>
    <div class="container">
        <p>Ar tikrai norite pašalinti ingredientą, kurio numeris <?= htmlentities($ringredientas->numeris) ?>?</p>
    </div>
    <div class="container">
        <form method="post">
        <input class="btn btn-warning" type="submit" value="Šalinti" name="delete">  
        <button type="submit" class="btn btn-warning" name="cancel">Atšaukti</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>