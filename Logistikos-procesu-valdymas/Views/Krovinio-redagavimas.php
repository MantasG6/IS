<?php
require_once("../Controllers/krovinys_controller.php");
require_once("../../connection.php");


Global $mypdo;
$mypdo = $pdo;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krovinio patikra</title>
    <style>
        html,
        body {
            height: 100%;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header {
            text-align: center;
        }
        .funkcijos{
            margin: 5px;
            width: 250px;
        }
    </style>
</head>
<body>
    <a href="../Kroviniu_stebejimas.php" class="btn btn-warning">Grįžti</a>

    <h3 class="header">Krovinio redagavimas</h3>
    <?php if ( isset($_SESSION['success']) ) {
        echo('<p class="header" style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
    } 
	error_reporting(0);
	
	
	
	
	if($_GET["uid"] !=""){ 
		$id = $_GET["uid"];
		if($_GET["veikmas"] =="redaguoti"){
		
		
		
		$vardas = $_POST["produktas"];
		$kiekis = $_POST["kiekis"];
		$svoris = $_POST["svoris"];
		
	
		
		$sql = "UPDATE krovinys SET pavadinimas=:pavadinimas, produkto_kiekis =:kiekis, svoris =:svoris WHERE id=$id";
		
	
		// Prepare statement
		$stmt = $mypdo->prepare($sql);
	
		// execute the query
		$stmt->execute(array(':pavadinimas' => $vardas, 
							 ':kiekis' => $kiekis, 
							 ':svoris' => $svoris));
	
		echo '<script> alert("Pakeista"); window.location.href="?uid="; </script>';
		
		
		}
	
	
		foreach($kroviniai as $krovinys){
			 
			if($krovinys->id == $id){
				?>
				<div class="container">
				<form method="post" action = "?uid=<?=$id;?>&veikmas=redaguoti">
				<label>Produktas</label>
				<input type="text" size="40" name="produktas" value="<?= $krovinys->pavadinimas ?>"><br/>
				<label>Kiekis</label>
				<input type="text" size="40" name="kiekis" value="<?= $krovinys->produkto_kiekis ?>"><br/>
				<label>Svoris</label>
				<input type="text" size="40" name="svoris" value="<?= $krovinys->svoris ?>"><br/>	
				<button type="submit" class="btn btn-warning" name="Edit">Redaguoti</button>
				</form>
				</div>
				
				<?php
			}
			
			 
		}
	
	
	?>
		
		
		
		
		
		
		
		
		
		<?php
		
		
		
	}
	
	else{
	
	?>
    <div class="container">
        <?php if (count($kroviniai) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
					<th scope="col">Produktas</th>
					<th scope="col">Kiekis</th>
                    <th scope="col">Svoris</th>
                    <th scope="col">Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($kroviniai as $krovinys)
                {
					if($krovinys->patvirtinimas !="Patikrintas"){	
						$krovinys->patvirtinimas = "Nepatikrintas";
					}
					
					if($krovinys->busena == 2){										
						echo "<tr><td>";
						echo $krovinys->pavadinimas;
						echo "</td><td>";
						echo $krovinys->produkto_kiekis;
						echo "</td><td>";
						echo $krovinys->svoris;  
						echo "</td><td>";
						echo "<input type='button' name='Release' onclick='redagavimas($krovinys->id);' value='Redaguoti'>";									
					}					
                }
                ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Nėra įrašų</p>
	<?php endif; }?>
	</div>
	
    <script type="application/javascript">
	function redagavimas(tekstas)
	{
		var skaicius = "?uid="+tekstas;
		window.location.href=skaicius;	
	}
	</script>
	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>