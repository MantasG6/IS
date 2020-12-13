<h2 class="header">Atostogų priskyrimas</h2>

<?php
require_once("Controllers/darbuotojas_controller.php");
if($_GET['msg'] == "smthWrong") echo '<script>alert("Ivyko klaida");window.location.href="?psl=atostoguPaskyrimas";</script>'; 
if($_GET['msg'] == "badDate") echo '<script>alert("Neuzpildete visu lauku");window.location.href="?psl=atostoguPaskyrimas";</script>'; 
if($_GET['msg'] == "recordExist") echo '<script>alert("Darbuotojas jau turi atostogas");window.location.href="?psl=atostoguPaskyrimas";</script>'; 
if($_GET['msg'] == "success") echo '<script>alert("Atostogos darbuotojui sekmingai pridetos");window.location.href="?psl=atostoguPaskyrimas";</script>'; 

?>
 
    <h3 class="header">Priskirti atostogas</h3>
    <div class="container">
        <form method="post">
        
		<label>Pradzios data</label>
        <input type="date" size="40" name="prD"><br/>
		<label>Pabaigos data</label>
        <input type="date" size="40" name="pbD"><br/>
		<label>Adresatas</label>
        <input type="text" size="40" name="adresatas"><br/>
		<label>Tipas</label>
        <input type="text" size="40" name="tipas"><br/>
		
        <label>Asmens kodas</label>
        <input type="text" size="40" name="asmens_kodas"><br/>
        <label>Naudotojo id</label>
        <input type="text" size="40" name="naudotojo_id" ><br/>
        
        <button type="submit" class="btn btn-warning" name="Add">Priskirti</button>
        <button type="submit" class="btn btn-warning" name="cancel">Atšaukti</button>
        </form>
    </div>


    

<?php //function pridetiPrieda($adresatas, $uz_ka, $dydis, $numeris, $asmens_kodas, $naudotojo_id)


if($_POST["prD"]!= "" && $_POST["pbD"] !="" && isset($_POST["tipas"]) && isset($_POST["adresatas"]) && isset($_POST["asmens_kodas"]) && isset($_POST["naudotojo_id"]))
{
$date1=new DateTime($_POST["prD"]);
$date2=new DateTime($_POST["pbD"]);
$diff=date_diff($date1,$date2);	
//echo $diff->format("%R%a");
if ($diff->format("%R%a") <0) 
	echo '<script>alert("pradzios data negali buti velesne nei pabaigos");</script>'; 
else 
    priskirtiAtostogas($diff->format("%a"),$_POST["prD"], $_POST["pbD"],$_POST["tipas"],$_POST["adresatas"],$_POST["asmens_kodas"],$_POST["naudotojo_id"]);
}