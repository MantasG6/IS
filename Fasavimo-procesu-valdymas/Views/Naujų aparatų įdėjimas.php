<?php
require_once("../Controllers/aparatas_controller.php");

if ( isset($_POST['cancel'] ) ) {
    header("Location: aparatai.php");
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aparato pridėjimas</title>
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
    <h3 class="header">Aparato pridėjimas</h3>
    <?php
    if(isset($_SESSION['error']))
    {
        echo "<p class='header' style='color:red;'>".htmlentities($_SESSION['error'])."<p>\n";
        unset($_SESSION['error']);
    }
    ?>
    <div class="container">
        <form method="post">
        <label>Pavadinimas</label>
        <input type="text" size="40" name="pavadinimas"><br/>
        <label>Tipas</label>
        <input type="text" size="40" name="tipas"><br/>
        <label>Paskirtis</label>
        <input type="text" size="40" name="paskirtis"><br/>
        <label>Operatorius</label>
        <input type="text" size="40" name="operatorius"><br/>
        <label>Nasumas</label>
        <input type="text" size="40" name="nasumas"><br/>
        <label>Aparato id</label>
        <input type="text" size="40" name="id_Aparatas"><br/>
        <label>Naudotojo id</label>
        <input type="text" size="40" name="naudotojo_id"><br/>
        <button type="submit" class="btn btn-warning" name="Add">Pridėti</button>
        <button type="submit" class="btn btn-warning" name="cancel">Atšaukti</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST["pavadinimas"]) && isset($_POST["tipas"]) && isset($_POST["paskirtis"]) && isset($_POST["operatorius"]) &&
isset($_POST["nasumas"]) && isset($_POST["id_Aparatas"]) && isset($_POST["naudotojo_id"]))
{
    prideti($_POST["pavadinimas"], $_POST["tipas"], $_POST["paskirtis"], $_POST["operatorius"], 
    $_POST["nasumas"], $_POST["id_Aparatas"], $_POST["naudotojo_id"]);
}