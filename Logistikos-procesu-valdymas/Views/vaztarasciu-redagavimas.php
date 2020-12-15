<?php
require_once("../Controllers/vaztarastis_controller.php");
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
    <title>Vaztarascio redagavimas</title>
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
    <a href="../Važtaraščiai.php" class="btn btn-warning">Grįžti</a>

    <h3 class="header">Vaztarascio redagavimas</h3>
    <?php if ( isset($_SESSION['success']) ) {
        echo('<p class="header" style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
    } 
	error_reporting(0);
	
	
	
	
	if($_GET["uid"] !=""){ 
		$id = $_GET["uid"];
		if($_GET["veikmas"] =="redaguoti"){
		
		
		$siuntejas = $_POST["siuntejas"];
		$gavejas = $_POST["gavejas"];
		$produktas = $_POST["produktas"];
		$kiekis = $_POST["kiekis"];
		$data = $_POST["data"];
		
		

		
		$sql = "UPDATE vaztarastis SET siuntejas =:siuntejas, gavejas =:gavejas, produkto_pavadinimas =:produktas, produkto_kiekis =:kiekis, sudarymo_data =:data WHERE id_Vaztarastis=$id";
		
		
		// Prepare statement
		$stmt = $mypdo->prepare($sql);
		
		// execute the query
		$stmt->execute(array(':siuntejas' => $siuntejas, 
							 ':gavejas' => $gavejas, 
							 ':produktas' => $produktas,
							 ':kiekis' => $kiekis,
							 ':data' => $data));
		
		
		echo '<script> alert("Pakeista"); window.location.href="?uid="; </script>';
		
		
		}
	
	
		foreach($vaztarasciai as $vaztarastis){
			
			
			if($vaztarastis->id == $id){
				
				?>
				<div class="container">
				<form method="post" action = "?uid=<?=$id;?>&veikmas=redaguoti">
				<label>Siuntejas</label>
				<input type="text" size="40" name="siuntejas" value="<?= $vaztarastis->siuntejas ?>"><br/>
				<label>Gavejas</label>
				<input type="text" size="40" name="gavejas" value="<?= $vaztarastis->gavejas ?>"><br/>
				<label>Produktas</label>
				<input type="text" size="40" name="produktas" value="<?= $vaztarastis->produkto_pavadinimas ?>"><br/>
				<label>Kiekis</label>
				<input type="text" size="40" name="kiekis" value="<?= $vaztarastis->produkto_kiekis ?>"><br/>	
				<label>Data</label>
				<input type="text" size="40" name="data" value="<?= $vaztarastis->sudarymo_data ?>"><br/>				
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
        <?php if (count($vaztarasciai) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
					<th scope="col">Siuntejas</th>
					<th scope="col">Gavejas</th>
                    <th scope="col">Produktas</th>
                    <th scope="col">Kiekis</th>
                    <th scope="col">Data</th>
                    <th scope="col">Veiksmas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($vaztarasciai as $vaztarastis)
                {
														
					echo "<tr><td>";
					echo $vaztarastis->siuntejas;
					echo "</td><td>";
					echo $vaztarastis->gavejas;
					echo "</td><td>";
					echo $vaztarastis->produkto_pavadinimas; 
					echo "</td><td>";
					echo $vaztarastis->produkto_kiekis;    
					echo "</td><td>";
					echo $vaztarastis->sudarymo_data;
					echo "</td><td>";					
					echo "<input type='button' name='Release' onclick='redagavimas($vaztarastis->id);' value='Redaguoti'>";									
										
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