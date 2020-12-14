<?php
require_once("Controllers/priedas_controller.php");
?>
 
    
    

<?php
$page= $_GET['act'];
	if($page == "") {?>
	<h3 class="header">Priedų sąrašas</h3>
    <?php if ( isset($_SESSION['error']) ) {
        echo('<p class="header" style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    } ?>
    <div class="container">
        <?php if (count($priedai) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Adresatas</th><th scope="col">Už ką</th><th scope="col">Dydis</th>
                    <th scope="col">Numeris</th><th scope="col">Naudotojo id</th><th scope="col">Asmens kodas</th>
					<th scope="col">Veiksmas</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($priedai as $ad)
                {
                    echo "<tr><td>";
                    echo $ad->adresatas;
                    echo "</td><td>";
                    echo $ad->uz_ka;
                    echo "</td><td>";
                    echo $ad->dydis;
                    echo "</td><td>";
                    echo $ad->numeris;
                    echo "</td><td>";
                    echo $ad->naudotojo_id;
                    echo "</td><td>";
                    echo $ad->asmens_kodas;
                   
                    echo "</td><td>";
                    echo ('<a href="?psl=prieduSkaiciavimas&act=pridetiPrieda" class=" ">Pridėti priedą</a> | ');
                    echo ('<a href="?psl=prieduSkaiciavimas&act=atimtiPrieda&numeris='.$ad->numeris.'" class=" ">Atimti priedą</a>');
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php else: ?>
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="?psl=prieduSkaiciavimas&act=pridetiPrieda" class="btn btn-warning funkcijos">Pridėti priedą</a></li>
        </ul>
    </div>
        <?php endif; ?>
    </div>
	<?php } 
	if($page=="pridetiPrieda") { 
	require_once "Views/prideti_prieda.php";
	} if($page=="atimtiPrieda") { 
	require_once "Views/atimti_prieda.php"; } 
	?>