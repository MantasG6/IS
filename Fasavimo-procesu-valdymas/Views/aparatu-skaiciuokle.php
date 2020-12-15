<?php
require_once("../Controllers/aparatas_controller.php");

if ( isset($_POST['cancel'] ) ) {
    header("Location: Aparatų efektyvumo skaiciavimas.php");
    return;
}

if (!isset($_GET['id_Aparatas']))
{
    $_SESSION['error'] = "Nenurodytas aparato id!";
    header("Location: Aparatų efektyvumo skaiciavimas.php");
    return;
}

foreach($aparatai as $ad)
{
    if ($ad->id_Aparatas == $_GET['id_Aparatas'])
    {
        $rad = $ad;
        break;
    }
}

if(empty($rad))
{
    $_SESSION['error'] = 'Nurodytas netinkamas aparato id!';
    header( 'Location: Aparatų redegavimas.php' ) ;
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aparatu skaiciuokle</title>
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
    <h3 class="header">Aparatu efektyvumo skaiciavimas</h3>
    <?php
    if(isset($_SESSION['error']))
    {
        echo "<p class='header' style='color:red;'>".htmlentities($_SESSION['error'])."<p>\n";
        unset($_SESSION['error']);
    }
    ?>
    <div class="container">
        <form method="post">
        <label>nasumas</label>
        <input type="text" size="40" name="nasumas" value="<?= $rad->nasumas ?>"><br/>
        <label>Iveskite darbuotoju skaiciu</label>
        <input type="text" size="40" name="skaicius" value=""><br/>
        <button type="submit" class="btn btn-warning" name="Edit">Skaiciuoti</button>
        <button type="submit" class="btn btn-warning" name="cancel">Atsaukti</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST["nasumas"]) && isset($_POST["skaicius"]))
{

    skaiciuoti($_POST["nasumas"],$rad->id_Aparatas,$_POST["skaicius"]);
}