<?php
require_once("Controllers/darbuotojas_controller.php");
?>
<h3 class="header">Darbuotojų peržiūra</h3>
    <?php if ( isset($_SESSION['success']) ) {
        echo('<p class="header" style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
    } ?>
    <div class="container">
        <?php if (count($darbuotojai) > 0): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Vardas</th><th scope="col">Pavardė</th><th scope="col">Priskirtas blokas</th>
                    <th scope="col">Asmens kodas</th><th scope="col">Atlyginimas</th><th scope="col">Atostogų būsena</th>
                    <th scope="col">Nuobaudų skaičius</th><th scope="col">Naudotojo id</th>
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
                    echo $ad->priskirtas_blokas;
                    echo "</td><td>";
                    echo $ad->asmens_kodas;
                    echo "</td><td>";
                    echo $ad->atlyginimas;
                    echo "</td><td>";
                    echo $ad->atostogu_busena;
                    echo "</td><td>";
                    echo $ad->nuobaudu_skaicius;
                    echo "</td><td>";
                    echo $ad->naudotojo_id;
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Nėra įrašų</p>
        <?php endif; ?>
    </div>