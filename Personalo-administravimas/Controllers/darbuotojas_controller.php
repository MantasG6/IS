<?php
session_start();
require_once("../connection.php");
require_once("Models/darbuotojas_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from atsakingas_darbuotojas");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$darbuotojai = [];

foreach($rows as $row)
{
    $darbuotojas = new Darbuotojas();
    $darbuotojas->vardas = htmlentities($row["vardas"]);
    $darbuotojas->pavarde = htmlentities($row["pavarde"]);
    $darbuotojas->priskirtas_blokas = htmlentities($row["priskirtas_blokas"]);
    $darbuotojas->asmens_kodas = htmlentities($row["asmens_kodas"]);
    $darbuotojas->atlyginimas = htmlentities($row["atlyginimas"]);
    $darbuotojas->atostogu_busena = htmlentities($row["atostogu_busena"]);
    $darbuotojas->nuobaudu_skaicius = htmlentities($row["nuobaudu_skaicius"]);
    $darbuotojas->naudotojo_id = htmlentities($row["fk_Naudotojasid_Naudotojas"]);
    array_push($darbuotojai, $darbuotojas);
}



function gautiDarbuotoja($asmens_kodas) {
$darbuotojas="";
global $darbuotojai;

for ($x = 0; $x <= count($darbuotojai); $x++) {
  if($darbuotojai[$x]->asmens_kodas == $asmens_kodas) {
	  $darbuotojas=$darbuotojai[$x];
  }
}
//echo ($darbuotojai[0]->asmens_kodas);

return $darbuotojas;
}
function skaiciuotiAtlyginima($asmens_kodas,$nuobaudu_suma,$priedu_suma) {
	$atlyginimas=0;
	$MMA=607;
	$atlyginimas= $MMA+$priedu_suma-$nuobaudu_suma;
	global $mypdo;
	$sql=$mypdo->prepare("update atsakingas_darbuotojas set atlyginimas=:atlyginimas where asmens_kodas=:asmens_kodas");
$sql->bindParam(':asmens_kodas',$asmens_kodas,PDO::PARAM_INT, 25);
$sql->bindParam(':atlyginimas',$atlyginimas,PDO::PARAM_INT, 25);

if($sql->execute()){
return $atlyginimas;
}// End of if profile is ok 
	return 0;
}
function atliktiDarbuotojoStebesena($asmens_kodas, $tekstas, $naudotojo_id) {
	global $mypdo;
	$lastId = $mypdo->lastInsertId();
	$sql="insert into stebesenos (tekstas, numeris,	fk_Atsakingas_darbuotojasasmens_kodas, 	fk_Naudotojasid_Naudotojas) values (:tekstas, :numeris, :asmens_kodas, :naudotojo_id)";
$stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':tekstas' => $tekstas,
            ':numeris' => $lastId,
            ':asmens_kodas' => $asmens_kodas,
            ':naudotojo_id' => $naudotojo_id));


header('Location: '.$_SERVER['REQUEST_URI'].'&msg=success');
// End of if profile is ok 
}
//if(isset($_POST["trukme"]) && isset($_POST["prD"]) && isset($_POST["pbD"]) && isset($_POST["tipas"]) && isset($_POST["adresatas"]) && isset($_POST["asmens_kodas"]) && isset($_POST["naudotojo_id"]))

function priskirtiAtostogas($trukme,$prD,$pbD,$tipas,$adresatas,$asmens_kodas,$naudotojo_id) {
	global $mypdo;
	//priskirtiAtostogas($_POST["trukme"], $_POST["prD"], $_POST["pbD"],$_POST["tipas"],$_POST["adresatas"],$_POST["asmens_kodas"],$_POST["naudotojo_id"]);
	//$trukme =0; //apskaiciuot
	$lastId = $mypdo->lastInsertId();
	$sql="insert into atostogos (trukme, pradzios_data, pabaigos_data, adresatas,tipas,id_Atostogos,fk_Naudotojasid_Naudotojas,fk_Atsakingas_darbuotojasasmens_kodas) values (:trukme, :prD, :pbD, :adresatas, :tipas, :numeris,:naudotojo_id,:asmens_kodas)";

try {
    $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':trukme' => $trukme,
            ':numeris' => $lastId,
            ':asmens_kodas' => $asmens_kodas,
            ':prD' => $prD,
            ':pbD' => $pbD,
            ':adresatas' => $adresatas,
            ':tipas' => $tipas,
            ':naudotojo_id' => $naudotojo_id));
} catch (PDOException $e) {
    if ($e->getCode() == 1062) {
		header('Location: '.$_SERVER['REQUEST_URI'].'&msg=smthWrong&err='.$e->getCode().'');
    }
elseif ($e->getCode() == 22007) {
		header('Location: '.$_SERVER['REQUEST_URI'].'&msg=badDate&err='.$e->getCode().'');
        
    }
elseif ($e->getCode() == 23000) {
		header('Location: '.$_SERVER['REQUEST_URI'].'&msg=recordExist&err='.$e->getCode().'');
        
    }	else {
		echo $e->getCode();
        header('Location: '.$_SERVER['REQUEST_URI'].'&msg=success');	
    }
}
header('Location: '.$_SERVER['REQUEST_URI'].'&msg=success');

}
