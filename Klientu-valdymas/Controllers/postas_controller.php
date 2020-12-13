<?php
session_start();
require_once("../../connection.php");
require_once("../Models/postas_model.php");

Global $mypdo;
$mypdo = $pdo;

$stmt = $pdo->query("SELECT * from postas");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$postai = [];

foreach($rows as $row)
{
	
	 
	
	
    $postas = new Postas();
    $postas->autorius = $row["autorius"];
    $postas->komentaru_skaicius = $row["komentaru_skaicius"];
    $postas->id = $row["ID"];
    $postas->pavadinimas = $row["pavadinimas"];
    $postas->busena = $row["busena"];
    $postas->naudotojas_id = $row["fk_Naudotojasid_Naudotojas"];
    $postas->ataskaita_id = $row["fk_Ataskaitaid_Ataskaita"];
    array_push($postai, $postas);
}





function prideti($autorius, $komentaru_skaicius, $id, $pavadinimas, 
$busena, $naudotojas_id, $ataskaita_id)
{
    global $mypdo;

    if(empty($autorius) || empty($komentaru_skaicius) || empty($id) || empty($pavadinimas) ||
    empty($busena) || !isset($naudotojas_id) || !isset($ataskaita_id))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/postas-pridejimas.php");
        return;
    }
    else
    {
        $sql = "INSERT INTO postas (autorius,komentaru_skaicius, ID, pavadinimas,
         busena, fk_Naudotojasid_Naudotojas, fk_Ataskaitaid_Ataskaita)
                    VALUES (:autorius, :komentaru_skaicius, :id, :pavadinimas, 
                    :busena, :naudotojas_id, :ataskaita_id)";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':autorius' => $autorius,
            ':komentaru_skaicius' => $komentaru_skaicius,
            ':id' => $id,
            ':pavadinimas' => $pavadinimas,
            ':busena' => $busena,
            ':naudotojas_id' => $naudotojas_id,
            ':ataskaita_id' => $ataskaita_id));
        $_SESSION['success'] = "Prideta!";
        header("Location: ../Views/postas-perziura.php");
        return;
    }
}
function redaguoti($autorius, $komentaru_skaicius, $id, $pavadinimas, 
$busena, $naudotojas_id, $ataskaita_id)
{
    global $mypdo;

    if(empty($autorius) || empty($komentaru_skaicius) || empty($id) || empty($pavadinimas) ||
    empty($busena) || !isset($naudotojas_id) || !isset($ataskaita_id))
    {
        $_SESSION['error'] = "Visi laukai privalomi!";
        header("Location: ../Views/postas-redagavimas.php?id=$id");
        return;
    }
    else
    {
        $sql = "UPDATE postas 
                    SET autorius = :autorius, komentaru_skaicius = :komentaru_skaicius, id = :id, 
                    pavadinimas = :pavadinimas, busena = :busena, 
                    fk_Naudotojasid_Naudotojas = :naudotojas_id, fk_Ataskaitaid_Ataskaita = :ataskaita_id
                    WHERE id = :id";
        $stmt = $mypdo->prepare($sql);
        $stmt->execute(array(
            ':autorius' => $autorius,
            ':komentaru_skaicius' => $komentaru_skaicius,
            ':id' => $id,
            ':pavadinimas' => $pavadinimas,
            ':busena' => $busena,
            ':naudotojas_id' => $naudotojas_id,
            ':ataskaita_id' => $ataskaita_id));
        $_SESSION['success'] = "Redaguota!";
        header("Location: ../Views/postas-perziura.php");
        return;
    }
}


function salinti($id)
{
    global $mypdo;

    $sql = "DELETE FROM postas WHERE id = :id";
    $stmt = $mypdo->prepare($sql);
    $stmt->execute(array(':id' => $id));
    $_SESSION['success'] = 'Ištrinta!';
    header( 'Location: ../Views/postas-perziura.php' ) ;
    return;
}