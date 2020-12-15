<?php
session_start();
require_once("../../connection.php");
require_once("../Models/krovinys_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from krovinys");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$kroviniai = [];

foreach($rows as $row)
{
    $krovinys = new krovinys();
    $krovinys->pavadinimas = $row["pavadinimas"];
    $krovinys->id = $row["ID"];
    $krovinys->produkto_kiekis = $row["produkto_kiekis"];
    $krovinys->svoris = $row["svoris"];
    $krovinys->busena = $row["busena"];
    $krovinys->naudotojo_id = $row["fk_Naudotojasid_Naudotojas"];
    $krovinys->patvirtinimas = $row["Patvirtinimas"];
    array_push($kroviniai, $krovinys);
}

// function redaguoti($vardas, $pavarde, $priskirtas_blokas, $asmens_kodas, 
// $atlyginimas, $atostogu_busena, $nuobaudu_skaicius, $naudotojo_id)
// {
    // global $mypdo;

    // if(empty($vardas) || empty($pavarde) || empty($priskirtas_blokas) ||
    // empty($atlyginimas) || !isset($atostogu_busena) || !isset($nuobaudu_skaicius) || empty($naudotojo_id))
    // {
        // $_SESSION['error'] = "Visi laukai privalomi!";
        // header("Location: ../Views/Atsakingu-darbuotoju-redagavimas.php?asmens_kodas=$asmens_kodas");
        // return;
    // }
    // else
    // {
        // $sql = "UPDATE atsakingas_darbuotojas 
                    // SET vardas = :vardas, pavarde = :pavarde, priskirtas_blokas = :priskirtas_blokas, 
                    // atlyginimas = :atlyginimas, atostogu_busena = :atostogu_busena, 
                    // nuobaudu_skaicius = :nuobaudu_skaicius, fk_Naudotojasid_Naudotojas = :naudotojo_id
                    // WHERE asmens_kodas = :asmens_kodas";
        // $stmt = $mypdo->prepare($sql);
        // $stmt->execute(array(
            // ':vardas' => $vardas,
            // ':pavarde' => $pavarde,
            // ':priskirtas_blokas' => $priskirtas_blokas,
            // ':asmens_kodas' => $asmens_kodas,
            // ':atlyginimas' => $atlyginimas,
            // ':atostogu_busena' => $atostogu_busena,
            // ':nuobaudu_skaicius' => $nuobaudu_skaicius,
            // ':naudotojo_id' => $naudotojo_id));
        // $_SESSION['success'] = "Redaguota!";
        // header("Location: ../Views/Atsakingu-darbuotoju-perziura.php");
        // return;
    // }
// }

// function prideti($pavadinimas, $numeris, $svoris, $gamintojas, 
// $kilmes_salis, $galiojimo_data, $aparato_id, $naudotojo_id)
// {
    // global $mypdo;

    // if(empty($pavadinimas) || empty($numeris) || empty($svoris) || empty($gamintojas) ||
    // empty($kilmes_salis) || !isset($galiojimo_data) || !isset($aparato_id) || empty($naudotojo_id))
    // {
        // $_session['error'] = "visi laukai privalomi!";
        // header("location: ../views/ingredientu-pridejimas.php");
        // return;
    // }
    // else
    // {
        // $sql = "insert into ingredientas (pavadinimas, numeris, svoris, gamintojas,
         // kilmes_salis, galiojimo_data, fk_aparatasid_aparatas, fk_naudotojasid_naudotojas)
                    // values (:pavadinimas, :numeris, :svoris, :gamintojas, 
                    // :kilmes_salis, :galiojimo_data, :aparato_id, :naudotojo_id)";
        // $stmt = $mypdo->prepare($sql);
        // $stmt->execute(array(
            // ':pavadinimas' => $pavadinimas,
            // ':numeris' => $numeris,
            // ':svoris' => $svoris,
            // ':gamintojas' => $gamintojas,
            // ':kilmes_salis' => $kilmes_salis,
            // ':galiojimo_data' => $galiojimo_data,
            // ':aparato_id' => $aparato_id,
            // ':naudotojo_id' => $naudotojo_id));
        // $_session['success'] = "prideta!";
        // header("location: ../views/ingredientu-perziura.php");
        // return;
    // }
// }

// function salinti($numeris)
// {
    // global $mypdo;

    // $sql = "delete from ingredientas where numeris = :numeris";
    // $stmt = $mypdo->prepare($sql);
    // $stmt->execute(array(':numeris' => $numeris));
    // $_session['success'] = 'ištrinta!';
    // header( 'location: ../views/ingredientu-perziura.php' ) ;
    // return;
// }