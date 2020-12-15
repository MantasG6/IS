<?php
session_start();
require_once("../../connection.php");
require_once("../Models/aparatas_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from aparatas");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$aparatai = [];

foreach($rows as $row)
{
    $aparatas = new Aparatas();
    $aparatas->pavadinimas = $row["pavadinimas"];
    $aparatas->tipas = $row["tipas"];
    $aparatas->paskirtis = $row["paskirtis"];
    $aparatas->operatorius = $row["operatorius"];
    $aparatas->nasumas = $row["nasumas"];
    $aparatas->id_Aparatas = $row["id_Aparatas"];
    $aparatas->naudotojo_id = $row["fk_Naudotojasid_Naudotojas"];
    array_push($aparatai, $aparatas);
}

function prideti($pavadinimas, $tipas, $paskirtis, $operatorius, 
$nasumas, $id_Aparatas, $naudotojo_id)
{
    global $mypdo;

    if(empty($pavadinimas) || empty($tipas) || empty($paskirtis) || empty($operatorius) ||
    empty($nasumas) || !isset($id_Aparatas) || empty($naudotojo_id))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/Naujų aparatų įdėjimas.php");
        return;
    }
    else
    {
        $sql = "INSERT INTO aparatas (pavadinimas, tipas, paskirtis, operatorius,
         nasumas, id_Aparatas, fk_Naudotojasid_Naudotojas)
                    VALUES (:pavadinimas, :tipas, :paskirtis, :operatorius, 
                    :nasumas, :id_Aparatas, :naudotojo_id)";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':pavadinimas' => $pavadinimas,
            ':tipas' => $tipas,
            ':paskirtis' => $paskirtis,
            ':operatorius' => $operatorius,
            ':nasumas' => $nasumas,
            ':id_Aparatas' => $id_Aparatas,
            ':naudotojo_id' => $naudotojo_id));
        $_SESSION['success'] = "Prideta!";
        header("Location: ../Views/Naujų aparatų įdėjimas.php");
        return;
    }
}

function salinti($tipas)
{
    global $mypdo;

    $sql = "DELETE FROM aparatas WHERE tipas = :tipas";
    $stmt = $mypdo->prepare($sql);
    $stmt->execute(array(':tipas' => $tipas));
    $_SESSION['success'] = 'Ištrinta!';
    header( 'Location: ../Views/Aparatų peržiūra.php' ) ;
    return;
}
function redaguoti($pavadinimas, $tipas, $paskirtis, $operatorius, 
$nasumas, $id_Aparatas, $naudotojo_id)
{
    global $mypdo;

    if(empty($pavadinimas) || empty($tipas) || empty($paskirtis) ||
    empty($nasumas) || empty($operatorius) || empty($naudotojo_id))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/aparatu-redagavimas.php?id_Aparatas=$id_Aparatas");
        return;
    }
    else
    {
        $sql = "UPDATE aparatas 
                    SET pavadinimas = :pavadinimas, tipas = :tipas, paskirtis = :paskirtis, 
                    nasumas = :nasumas,
                    fk_Naudotojasid_Naudotojas = :naudotojo_id,
                    operatorius = :operatorius
                    WHERE id_Aparatas = :id_Aparatas";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':pavadinimas' => $pavadinimas,
            ':tipas' => $tipas,
            ':paskirtis' => $paskirtis,
            ':id_Aparatas' => $id_Aparatas,
            ':operatorius' => $operatorius,
            ':nasumas' => $nasumas,
            ':naudotojo_id' => $naudotojo_id));
        $_SESSION['success'] = "Redaguota!";
        header("Location: ../Views/Aparatų peržiūra.php");
        return;
    }
}
function skaiciuoti($nasumas, $id_Aparatas, $skaicius)
{
    global $mypdo;

    if(empty($nasumas))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/Aparatų efektyvumo skaiciavimas.php?id_Aparatas=$id_Aparatas");
        return;
    }
    else
    {
        $atsakymas= $nasumas * $skaicius;
        echo "Gautas efektyvumas: ";
        echo "<h3 style='color:red;'>" .$atsakymas. "</h3>";
        $_SESSION['success'] = "Apskaiciuota!";
        //header("Location: ../Views/Aparatų peržiūra.php");
        return;
    }
}
