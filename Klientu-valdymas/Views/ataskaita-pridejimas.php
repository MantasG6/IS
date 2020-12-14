<?php
require_once("../Controllers/ataskaita_controller.php");

if ( isset($_POST['cancel'] ) ) {
    header("Location: ataskaita-perziura.php");
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ataskaitos sukurimas</title>
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
    <h3 class="header">ataskaitos sukurimas</h3>
    <?php
    if(isset($_SESSION['error']))
    {
        echo "<p class='header' style='color:red;'>".htmlentities($_SESSION['error'])."<p>\n";
        unset($_SESSION['error']);
    }
    ?>
	
	
	
	
    <div class="container">
        <form method="post">
        <label>postu_skaicius</label>
        <input type="text" size="40" name="postu_skaicius"><br/>
        <label>postu_autorius</label>
        <input type="text" size="40" name="postu_autorius"><br/>
        <label>patvirtintu_skaicius</label>
        <input type="text" size="40" name="patvirtintu_skaicius"><br/>
        <label>nepatvirtintu_skaicius</label>
        <input type="text" size="40" name="nepatvirtintu_skaicius"><br/>
        <label>laukianciuju_skaicius</label>
        <input type="text" size="40" name="laukianciuju_skaicius"><br/>
        <label>id_Ataskaita</label>
        <input type="text" size="40" name="id_Ataskaita" ><br/>
        <label>id_naudotojas</label>
        <input type="text" size="40" name="id_naudotojas"><br/>
        <button type="submit" class="btn btn-warning" name="Add">Pridėti</button>
        <button type="submit" class="btn btn-warning" name="cancel">Atšaukti</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

<?php




if(isset($_POST["postu_skaicius"]) && isset($_POST["postu_autorius"]) && isset($_POST["patvirtintu_skaicius"]) && isset($_POST["nepatvirtintu_skaicius"]) &&
isset($_POST["laukianciuju_skaicius"]) && isset($_POST["id_Ataskaita"]) && isset($_POST["id_naudotojas"]))
{
    prideti2($_POST["postu_skaicius"], $_POST["postu_autorius"], $_POST["patvirtintu_skaicius"], $_POST["nepatvirtintu_skaicius"], 
    $_POST["laukianciuju_skaicius"], $_POST["id_Ataskaita"], $_POST["id_naudotojas"]);
}