<?php
session_start();
require_once("../connection.php");
require_once("Models/priedas_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from priedas");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$priedai = [];

foreach($rows as $row)
{
    $priedas = new Priedas();
    $priedas->adresatas = htmlentities($row["adresatas"]);
    $priedas->uz_ka = htmlentities($row["uz_ka"]);
    $priedas->dydis = htmlentities($row["dydis"]);
    $priedas->numeris = htmlentities($row["numeris"]);
    $priedas->asmens_kodas = htmlentities($row["fk_Atsakingas_darbuotojasasmens_kodas"]);
    $priedas->naudotojo_id = htmlentities($row["fk_Naudotojasid_Naudotojas"]);
    array_push($priedai, $priedas);
}

function pridetiPrieda($adresatas, $uz_ka, $dydis, 
$asmens_kodas, $naudotojo_id)
{
    global $mypdo;

    if(empty($adresatas) || empty($uz_ka) || empty($dydis) ||
    empty($asmens_kodas) || !isset($naudotojo_id))
    {
        header('Location: '.$_SERVER['REQUEST_URI'].'&msg=emptyFields');
        return;
    }
    else
    {
		$lastId = $mypdo->lastInsertId();
        $sql = "INSERT INTO priedas (adresatas, uz_ka, dydis, numeris, fk_Atsakingas_darbuotojasasmens_kodas, fk_Naudotojasid_Naudotojas)
                    VALUES (:adresatas, :uz_ka, :dydis, :numeris, 
                    :asmens_kodas, :naudotojo_id)";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':adresatas' => $adresatas,
            ':uz_ka' => $uz_ka,
            ':dydis' => $dydis,
            ':numeris' => $lastId,
            ':asmens_kodas' => $asmens_kodas,
            ':naudotojo_id' => $naudotojo_id));
        header('Location: '.$_SERVER['REQUEST_URI'].'&msg=success');
        return;
    }
}
function atimtiPrieda($numeris)
{
    global $mypdo;

    $sql = "DELETE FROM priedas WHERE numeris = :numeris";
    $stmt = $mypdo->prepare($sql);
    $stmt->execute(array(':numeris' => $numeris));
    header('Location: '.$_SERVER['REQUEST_URI'].'&msg=success') ;
    return;
}
function prieduSuma($asmens_kodas) {
	global $priedai;
	$suma=0;
	for ($x = 0; $x <= count($priedai); $x++) {
  if($priedai[$x]->asmens_kodas == $asmens_kodas) $suma+=$priedai[$x]->dydis;
}
return $suma;
}

 