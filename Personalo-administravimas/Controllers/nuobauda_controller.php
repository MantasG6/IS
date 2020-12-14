<?php
session_start();
require_once("../connection.php");
require_once("Models/nuobauda_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from nuobauda");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$nuobaudos = [];

foreach($rows as $row)
{
    $nuobauda = new Nuobauda();
    $nuobauda->adresatas = htmlentities($row["adresatas"]);
    $nuobauda->tipas = htmlentities($row["tipas"]);
    $nuobauda->trukme = htmlentities($row["trukme"]);
    $nuobauda->dydis = htmlentities($row["dydis"]);
    $nuobauda->numeris = htmlentities($row["numeris"]);
    $nuobauda->asmens_kodas = htmlentities($row["fk_Atsakingas_darbuotojasasmens_kodas"]);
    $nuobauda->naudotojo_id = htmlentities($row["fk_Naudotojasid_Naudotojas"]);
    array_push($nuobaudos, $nuobauda);
}
// paskirtiNuobauda($_POST["adresatas"], $_POST["trukme"], $_POST["tipas"], $_POST["dydis"], 
  // $_POST["asmens_kodas"], $_POST["naudotojo_id"]);
function paskirtiNuobauda($adresatas, $trukme, $tipas,$dydis, 
$asmens_kodas, $naudotojo_id)
{
    global $mypdo;

    if(empty($adresatas) || empty($trukme) || empty($dydis) || empty($tipas) ||
    empty($asmens_kodas) || !isset($naudotojo_id))
    {
        header('Location: '.$_SERVER['REQUEST_URI'].'&msg=emptyFields');
        return;
    }
    else
    {
		$lastId = $mypdo->lastInsertId();
      $sql = "INSERT INTO nuobauda (adresatas, tipas, dydis, trukme, numeris, fk_Atsakingas_darbuotojasasmens_kodas, fk_Naudotojasid_Naudotojas)
                    VALUES (:adresatas, :tipas, :dydis, :trukme, :numeris, 
                    :asmens_kodas, :naudotojo_id)";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':adresatas' => $adresatas,
            ':tipas' => $tipas,
            ':dydis' => $dydis,
            ':trukme' => $trukme,
            ':numeris' => $lastId,
            ':asmens_kodas' => $asmens_kodas,
            ':naudotojo_id' => $naudotojo_id));

$sql=$mypdo->prepare("update atsakingas_darbuotojas set nuobaudu_skaicius=nuobaudu_skaicius+1 where asmens_kodas=:asmens_kodas");
$sql->bindParam(':asmens_kodas',$asmens_kodas,PDO::PARAM_INT, 25);

if($sql->execute()){
header('Location: '.$_SERVER['REQUEST_URI'].'&msg=success');
}// End of if profile is ok 

		
       // header('Location: '.$_SERVER['REQUEST_URI'].'&msg=success');
        return;
    }
}
function nuobauduSuma($asmens_kodas) {
	global $nuobaudos;
	$suma=0;
	for ($x = 0; $x <= count($nuobaudos); $x++) {
  if($nuobaudos[$x]->asmens_kodas == $asmens_kodas) $suma+=$nuobaudos[$x]->dydis;
}
return $suma;
}
 

 