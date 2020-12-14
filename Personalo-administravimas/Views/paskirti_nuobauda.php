<?php
require_once("Controllers/nuobauda_controller.php");
if($_GET['msg'] == "emptyFields") echo '<script>alert("Neuzpildete visu lauku");</script>'; 
if($_GET['msg'] == "success") echo '<script>alert("Nuobauda vartotojui sekmingai prideta");window.location.href="?psl=nuobauduPaskyrimas";</script>'; 

?>
 
    <h3 class="header">Paskirti nuobaudą</h3>
    <div class="container">
        <form method="post">
        <label>Adresatas</label>
        <input type="text" size="40" name="adresatas"><br/>
        <label>Tipas</label>
        <input type="text" size="40" name="tipas"><br/>
        <label>Dydis</label>
        <input type="text" size="40" name="dydis"><br/>
        <label>Trukme</label>
        <input type="text" size="40" name="trukme"><br/>
		<label>Numeris</label>
        <input type="text" size="40" name="numeris"><br/>
        <label>Asmens kodas</label>
        <input type="text" size="40" name="asmens_kodas"><br/>
        <label>Naudotojo id</label>
        <input type="text" size="40" name="naudotojo_id" ><br/>
        
        <button type="submit" class="btn btn-warning" name="Add">Priskirti</button>
        <button type="submit" class="btn btn-warning" name="cancel">Atšaukti</button>
        </form>
    </div>


    

<?php //function pridetiPrieda($adresatas, $uz_ka, $dydis, $numeris, $asmens_kodas, $naudotojo_id)
if(isset($_POST["adresatas"]) && isset($_POST["trukme"]) && isset($_POST["tipas"]) && isset($_POST["dydis"]) && isset($_POST["asmens_kodas"]) && isset($_POST["naudotojo_id"]))
{
    paskirtiNuobauda($_POST["adresatas"], $_POST["trukme"], $_POST["tipas"], $_POST["dydis"], 
    $_POST["asmens_kodas"], $_POST["naudotojo_id"]);
}