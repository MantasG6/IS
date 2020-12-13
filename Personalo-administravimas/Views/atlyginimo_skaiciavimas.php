<?php
require_once("Controllers/darbuotojas_controller.php");
require_once("Controllers/nuobauda_controller.php");
require_once("Controllers/priedas_controller.php");
?>
<?php
$page= $_GET['act'];
	if($page == "") { ?>
<h3 class="header">Darbuotojų atlyginimai</h3>

    <div class="container">
        <?php if (count($darbuotojai) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Vardas</th><th scope="col">Pavardė</th><th scope="col">Atlyginimas</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
				
                foreach($darbuotojai as $ad)
                {
                    echo "<tr><td>";
                    echo $ad->vardas;
                    echo "</td><td>";
                    echo $ad->pavarde;
                    echo "</td><td>";
					if($ad->atlyginimas ==0) echo  '<i>Atlyginimas dar neapskaičiuotas</i> <a href="?psl=atlyginimoSkaiciavimas&act=skaiciuoti&asmens_kodas='.$ad->asmens_kodas.'">Apskaičiuoti</a>';
					else
                    echo $ad->atlyginimas.'€ <a href="?psl=atlyginimoSkaiciavimas&act=skaiciuoti&asmens_kodas='.$ad->asmens_kodas.'">Perskaičiuoti?</a>';
                 
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Nėra įrašų</p>
        <?php endif; ?>
    </div>
	<?php } else {
		if($page == "skaiciuoti" && $_GET['asmens_kodas']!= "") {			
			$atlyginimas=skaiciuotiAtlyginima($_GET['asmens_kodas'],nuobauduSuma($_GET['asmens_kodas']),prieduSuma($_GET['asmens_kodas']));
			if($atlyginimas==0) echo '<script>alert("atlyginimo apskaičiuoti nepavyko, susisiekite su sistemos administratoriumi</script>';
			else
			echo '<script>alert("Darbuotojui apskaičiuotas: '.$atlyginimas.'EUR atlyginimas");window.location.href="?psl=atlyginimoSkaiciavimas";</script>';
			
		}
	}
		?>