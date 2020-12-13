<?php
require_once("../Controllers/postas_controller.php");

if ( isset($_POST['cancel'] ) ) {
    header("Location: postas-redagavimas-pasirinkimas.php");
    return;
}

if (!isset($_GET['id']))
{
    $_SESSION['error'] = "Nenurodytas id!";
    header("Location: postas-redagavimas-pasirinkimas.php");
    return;
}

foreach($postai as $postas)
{
    if ($postas->id == $_GET['id'])
    {
        $rpostas = $postas;
        break;
    }
}

if(empty($rpostas))
{
    $_SESSION['error'] = 'Nurodytas netinkamas id!';
    header( 'Location: postas-redagavimas-pasirinkimas.php' ) ;
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posto redagavimas</title>
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
    <h3 class="header">posto redagavimas</h3>
    <?php
    if(isset($_SESSION['error']))
    {
        echo "<p class='header' style='color:red;'>".htmlentities($_SESSION['error'])."<p>\n";
        unset($_SESSION['error']);
    }
    ?>
    <div class="container">
        <form method="post">
         <label>autorius</label>
        <input type="text" size="40" name="autorius"><br/>
        <label>komentaru_skaicius</label>
        <input type="text" size="40" name="komentaru_skaicius"><br/>
        <label>id</label>
        <input type="text" size="40" name="id"><br/>
        <label>pavadinimas</label>
        <input type="text" size="40" name="pavadinimas"><br/>
        <label>busena</label>
        <input type="text" size="40" name="busena"><br/>
        <label>naudotojas_id</label>
        <input type="text" size="40" name="naudotojas_id" ><br/>
        <label>ataskaita_id</label>
        <input type="text" size="40" name="ataskaita_id"><br/>
        <button type="submit" class="btn btn-warning" name="Edit">Redaguoti</button>
        <button type="submit" class="btn btn-warning" name="cancel">Atsaukti</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST["autorius"]) && isset($_POST["komentaru_skaicius"]) && isset($_POST["id"]) && isset($_POST["pavadinimas"]) &&
isset($_POST["busena"]) && isset($_POST["naudotojas_id"]) && isset($_POST["ataskaita_id"]))
{
    redaguoti($_POST["autorius"], $_POST["komentaru_skaicius"], $_POST["id"], $_POST["pavadinimas"], 
    $_POST["busena"], $_POST["naudotojas_id"], $_POST["ataskaita_id"]);
}