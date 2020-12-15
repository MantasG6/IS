<?php
session_start();
require_once("../../connection.php");
require_once("../Models/fasavimo_kelias_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from fasavimo_kelias");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$fasavimo_keliai = [];

foreach($rows as $row)
{
    $fasavimo_kelias = new FasavimoKelias();
    $fasavimo_kelias->numeris = htmlentities($row["numeris"]);
    $fasavimo_kelias->marsrutas = htmlentities($row["marsrutas"]);
    $fasavimo_kelias->marsruto_ilgis = htmlentities($row["marsruto_ilgis"]);
    $fasavimo_kelias->trukme = htmlentities($row["trukme"]);
    $fasavimo_kelias->efektyvumas = htmlentities($row["efektyvumas"]);
    $fasavimo_kelias->naudotojo_id = htmlentities($row["fk_Naudotojasid_Naudotojas"]);
    array_push($fasavimo_keliai, $fasavimo_kelias);
}

function priskirti($numeris, $marsrutas, $marsruto_ilgis, $trukme, 
$efektyvumas, $naudotojo_id)
{
    global $mypdo;

    if(empty($numeris) || empty($marsrutas) || empty($marsruto_ilgis) || empty($trukme) ||
    empty($efektyvumas) || empty($naudotojo_id))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/Atsakingu-darbuotoju-priskyrimas.php");
        return;
    }
    else
    {
        $sql = "INSERT INTO fasavimo_kelias (numeris, marsrutas, marsruto_ilgis, trukme,
         efektyvumas, fk_Naudotojasid_Naudotojas)
                    VALUES (:numeris, :marsrutas, :marsruto_ilgis, :trukme, 
                    :efektyvumas, :naudotojo_id)";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':numeris' => $numeris,
            ':marsrutas' => $marsrutas,
            ':marsruto_ilgis' => $marsruto_ilgis,
            ':trukme' => $trukme,
            ':efektyvumas' => $efektyvumas,
            ':naudotojo_id' => $naudotojo_id));
        $_SESSION['success'] = "Priskirta!";
        header("Location: ../Views/Atsakingu-darbuotoju-perziura.php");
        return;
    }
}

function redaguoti($numeris, $marsrutas, $marsruto_ilgis, $trukme, 
$efektyvumas, $naudotojo_id)
{
    global $mypdo;

    if(empty($numeris) || empty($marsrutas) || empty($marsruto_ilgis) ||
    empty($efektyvumas) || empty($naudotojo_id))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/Atsakingu-darbuotoju-redagavimas.php?trukme=$trukme");
        return;
    }
    else
    {
        $sql = "UPDATE fasavimo_kelias 
                    SET numeris = :numeris, marsrutas = :marsrutas, marsruto_ilgis = :marsruto_ilgis, 
                    efektyvumas = :efektyvumas,
                    fk_Naudotojasid_Naudotojas = :naudotojo_id
                    WHERE trukme = :trukme";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':numeris' => $numeris,
            ':marsrutas' => $marsrutas,
            ':marsruto_ilgis' => $marsruto_ilgis,
            ':trukme' => $trukme,
            ':efektyvumas' => $efektyvumas,
            ':naudotojo_id' => $naudotojo_id));
        $_SESSION['success'] = "Redaguota!";
        header("Location: ../Views/Atsakingu-darbuotoju-perziura.php");
        return;
    }
}

function istrinti($trukme)
{
    global $mypdo;

    $sql = "DELETE FROM fasavimo_kelias WHERE trukme = :trukme";
    $stmt = $mypdo->prepare($sql);
    $stmt->execute(array(':trukme' => $trukme));
    $_SESSION['success'] = 'Ištrinta!';
    header( 'Location: ../Views/Atsakingu-darbuotoju-perziura.php' ) ;
    return;
}