<?php
require_once("Controllers/nuobauda_controller.php");
?>
 
    
    

<?php
$page= $_GET['act'];
	if($page == "") {?>
	<h3 class="header">Nuobaudų sąrašas</h3>
 
    <div class="container">
        <?php if (count($nuobaudos) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Adresatas</th><th scope="col">Tipas</th><th scope="col">Dydis</th><th scope="col">Trukme</th>
                    <th scope="col">Numeris</th><th scope="col">Naudotojo id</th><th scope="col">Asmens kodas</th>
					 
                    
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($nuobaudos as $ad)
                {
                    echo "<tr><td>";
                    echo $ad->adresatas;
                    echo "</td><td>";
                    echo $ad->tipas;
                    echo "</td><td>";
                    echo $ad->dydis;
                    echo "</td><td>";
					 echo $ad->trukme;
                    echo "</td><td>";
                    echo $ad->numeris;
                    echo "</td><td>";
                    echo $ad->naudotojo_id;
                    echo "</td><td>";
                    echo $ad->asmens_kodas;
                   
                    echo "</td><td>";
                   
				   echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php else: ?>
    
        <?php endif; ?>
    </div><div class="container">
        <ul class="list-unstyled">
            <li><a href="?psl=nuobauduPaskyrimas&act=paskirtiNuobauda" class="btn btn-warning funkcijos">Paskirti nuobaudą</a></li>
        </ul>
    </div>
	<?php } 
	if($page=="paskirtiNuobauda") { 
	require_once "Views/paskirti_nuobauda.php";
	}  
	?>