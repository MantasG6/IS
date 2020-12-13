<?php
session_start();
require_once("../../connection.php");
require_once("../Models/ataskaita_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from ataskaita");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$ataskaitos = [];

foreach($rows as $row)
{
	
	 
	
	
    $ataskaita = new Ataskaita();
    $ataskaita->postu_skaicius = $row["postu_skaicius"];
    $ataskaita->postu_autorius = $row["postu_autorius"];
    $ataskaita->patvirtintu_skaicius = $row["patvirtintu_skaicius"];
    $ataskaita->nepatvirtintu_skaicius = $row["nepatvirtintu_skaicius"];
    $ataskaita->laukianciuju_skaicius = $row["laukianciuju_skaicius"];
    $ataskaita->id_Ataskaita = $row["id_Ataskaita"];
    $ataskaita->id_naudotojas = $row["fk_Naudotojasid_Naudotojas"];
    array_push($ataskaitos, $ataskaita);
}



function prideti2($postu_skaicius, $postu_autorius, $patvirtintu_skaicius, $nepatvirtintu_skaicius, 
$laukianciuju_skaicius, $id_Ataskaita, $id_naudotojas)
{
    global $mypdo;

    if(empty($postu_skaicius) || empty($postu_autorius) || empty($patvirtintu_skaicius) || empty($nepatvirtintu_skaicius) ||
    empty($laukianciuju_skaicius) || !isset($id_Ataskaita) || !isset($id_naudotojas))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/ataskaita-pridejimas.php");
        return;
    }
    else
    {
       $sql = "INSERT INTO ataskaita (postu_skaicius,postu_autorius, patvirtintu_skaicius, nepatvirtintu_skaicius,
         laukianciuju_skaicius, id_Ataskaita, fk_Naudotojasid_Naudotojas)
                    VALUES (:postu_skaicius, :postu_autorius, :patvirtintu_skaicius, :nepatvirtintu_skaicius, 
                    :laukianciuju_skaicius, :id_Ataskaita, :id_naudotojas)";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
           ':postu_skaicius' => $postu_skaicius,
            ':postu_autorius' => $postu_autorius,
            ':patvirtintu_skaicius' => $patvirtintu_skaicius,
            ':nepatvirtintu_skaicius' => $nepatvirtintu_skaicius,
            ':laukianciuju_skaicius' => $laukianciuju_skaicius,
            ':id_Ataskaita' => $id_Ataskaita,
            ':id_naudotojas' => $id_naudotojas));
        $_SESSION['success'] = "pavyko!";
        header("Location: ../Views/ataskaita-perziura.php");
        return;
    }
}





