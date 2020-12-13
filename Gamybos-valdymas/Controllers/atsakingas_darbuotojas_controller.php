<?php
session_start();
require_once("../../connection.php");
require_once("../Models/atsakingas_darbuotojas_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from atsakingas_darbuotojas");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$atsakingi_darbuotojai = [];

foreach($rows as $row)
{
    $atsakingas_darbuotojas = new AtsakingasDarbuotojas();
    $atsakingas_darbuotojas->vardas = htmlentities($row["vardas"]);
    $atsakingas_darbuotojas->pavarde = htmlentities($row["pavarde"]);
    $atsakingas_darbuotojas->priskirtas_blokas = htmlentities($row["priskirtas_blokas"]);
    $atsakingas_darbuotojas->asmens_kodas = htmlentities($row["asmens_kodas"]);
    $atsakingas_darbuotojas->atlyginimas = htmlentities($row["atlyginimas"]);
    $atsakingas_darbuotojas->atostogu_busena = htmlentities($row["atostogu_busena"]);
    $atsakingas_darbuotojas->nuobaudu_skaicius = htmlentities($row["nuobaudu_skaicius"]);
    $atsakingas_darbuotojas->naudotojo_id = htmlentities($row["fk_Naudotojasid_Naudotojas"]);
    array_push($atsakingi_darbuotojai, $atsakingas_darbuotojas);
}

function priskirti($vardas, $pavarde, $priskirtas_blokas, $asmens_kodas, 
$atlyginimas, $atostogu_busena, $nuobaudu_skaicius, $naudotojo_id)
{
    global $mypdo;

    if(empty($vardas) || empty($pavarde) || empty($priskirtas_blokas) || empty($asmens_kodas) ||
    empty($atlyginimas) || !isset($atostogu_busena) || !isset($nuobaudu_skaicius) || empty($naudotojo_id))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/Atsakingu-darbuotoju-priskyrimas.php");
        return;
    }
    else
    {
        $sql = "INSERT INTO atsakingas_darbuotojas (vardas, pavarde, priskirtas_blokas, asmens_kodas,
         atlyginimas, atostogu_busena, nuobaudu_skaicius, fk_Naudotojasid_Naudotojas)
                    VALUES (:vardas, :pavarde, :priskirtas_blokas, :asmens_kodas, 
                    :atlyginimas, :atostogu_busena, :nuobaudu_skaicius, :naudotojo_id)";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':vardas' => $vardas,
            ':pavarde' => $pavarde,
            ':priskirtas_blokas' => $priskirtas_blokas,
            ':asmens_kodas' => $asmens_kodas,
            ':atlyginimas' => $atlyginimas,
            ':atostogu_busena' => $atostogu_busena,
            ':nuobaudu_skaicius' => $nuobaudu_skaicius,
            ':naudotojo_id' => $naudotojo_id));
        $_SESSION['success'] = "Priskirta!";
        header("Location: ../Views/Atsakingu-darbuotoju-perziura.php");
        return;
    }
}

function redaguoti($vardas, $pavarde, $priskirtas_blokas, $asmens_kodas, 
$atlyginimas, $atostogu_busena, $nuobaudu_skaicius, $naudotojo_id)
{
    global $mypdo;

    if(empty($vardas) || empty($pavarde) || empty($priskirtas_blokas) ||
    empty($atlyginimas) || !isset($atostogu_busena) || !isset($nuobaudu_skaicius) || empty($naudotojo_id))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/Atsakingu-darbuotoju-redagavimas.php?asmens_kodas=$asmens_kodas");
        return;
    }
    else
    {
        $sql = "UPDATE atsakingas_darbuotojas 
                    SET vardas = :vardas, pavarde = :pavarde, priskirtas_blokas = :priskirtas_blokas, 
                    atlyginimas = :atlyginimas, atostogu_busena = :atostogu_busena, 
                    nuobaudu_skaicius = :nuobaudu_skaicius, fk_Naudotojasid_Naudotojas = :naudotojo_id
                    WHERE asmens_kodas = :asmens_kodas";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':vardas' => $vardas,
            ':pavarde' => $pavarde,
            ':priskirtas_blokas' => $priskirtas_blokas,
            ':asmens_kodas' => $asmens_kodas,
            ':atlyginimas' => $atlyginimas,
            ':atostogu_busena' => $atostogu_busena,
            ':nuobaudu_skaicius' => $nuobaudu_skaicius,
            ':naudotojo_id' => $naudotojo_id));
        $_SESSION['success'] = "Redaguota!";
        header("Location: ../Views/Atsakingu-darbuotoju-perziura.php");
        return;
    }
}

function istrinti($asmens_kodas)
{
    global $mypdo;

    $sql = "DELETE FROM atsakingas_darbuotojas WHERE asmens_kodas = :asmens_kodas";
    $stmt = $mypdo->prepare($sql);
    $stmt->execute(array(':asmens_kodas' => $asmens_kodas));
    $_SESSION['success'] = 'Ištrinta!';
    header( 'Location: ../Views/Atsakingu-darbuotoju-perziura.php' ) ;
    return;
}