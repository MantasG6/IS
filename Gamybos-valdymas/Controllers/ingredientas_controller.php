<?php
session_start();
require_once("../../connection.php");
require_once("../Models/ingredientas_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from ingredientas");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$ingredientai = [];

foreach($rows as $row)
{
    $ingredientas = new Ingredientas();
    $ingredientas->pavadinimas = $row["pavadinimas"];
    $ingredientas->numeris = $row["numeris"];
    $ingredientas->svoris = $row["svoris"];
    $ingredientas->gamintojas = $row["gamintojas"];
    $ingredientas->kilmes_salis = $row["kilmes_salis"];
    $ingredientas->galiojimo_data = $row["galiojimo_data"];
    $ingredientas->aparato_id = $row["fk_Aparatasid_Aparatas"];
    $ingredientas->naudotojo_id = $row["fk_Naudotojasid_Naudotojas"];
    array_push($ingredientai, $ingredientas);
}

function prideti($pavadinimas, $numeris, $svoris, $gamintojas, 
$kilmes_salis, $galiojimo_data, $aparato_id, $naudotojo_id)
{
    global $mypdo;

    if(empty($pavadinimas) || empty($numeris) || empty($svoris) || empty($gamintojas) ||
    empty($kilmes_salis) || !isset($galiojimo_data) || !isset($aparato_id) || empty($naudotojo_id))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/Ingredientu-pridejimas.php");
        return;
    }
    else
    {
        $sql = "INSERT INTO ingredientas (pavadinimas, numeris, svoris, gamintojas,
         kilmes_salis, galiojimo_data, fk_Aparatasid_Aparatas, fk_Naudotojasid_Naudotojas)
                    VALUES (:pavadinimas, :numeris, :svoris, :gamintojas, 
                    :kilmes_salis, :galiojimo_data, :aparato_id, :naudotojo_id)";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':pavadinimas' => $pavadinimas,
            ':numeris' => $numeris,
            ':svoris' => $svoris,
            ':gamintojas' => $gamintojas,
            ':kilmes_salis' => $kilmes_salis,
            ':galiojimo_data' => $galiojimo_data,
            ':aparato_id' => $aparato_id,
            ':naudotojo_id' => $naudotojo_id));
        $_SESSION['success'] = "Prideta!";
        header("Location: ../Views/Ingredientu-perziura.php");
        return;
    }
}

function salinti($numeris)
{
    global $mypdo;

    $sql = "DELETE FROM ingredientas WHERE numeris = :numeris";
    $stmt = $mypdo->prepare($sql);
    $stmt->execute(array(':numeris' => $numeris));
    $_SESSION['success'] = 'Ištrinta!';
    header( 'Location: ../Views/Ingredientu-perziura.php' ) ;
    return;
}