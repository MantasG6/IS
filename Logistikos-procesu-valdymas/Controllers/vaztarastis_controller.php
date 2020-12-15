<?php
session_start();
require_once("../../connection.php");
require_once("../Models/vaztarastis_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from vaztarastis");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$vaztarasciai = [];

foreach($rows as $row)
{
    $vaztarastis = new vaztarastis();
    $vaztarastis->siuntejas = $row["siuntejas"];
    $vaztarastis->gavejas = $row["gavejas"];
    $vaztarastis->produkto_kiekis = $row["produkto_kiekis"];
    $vaztarastis->produkto_pavadinimas = $row["produkto_pavadinimas"];
    $vaztarastis->sudarymo_data = $row["sudarymo_data"];
    $vaztarastis->naudotojo_id = $row["fk_Naudotojasid_Naudotojas"];
    $vaztarastis->id = $row["id_Vaztarastis"];
    array_push($vaztarasciai, $vaztarastis);
}

