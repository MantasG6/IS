<h2 class="header">Stebėsenų atlikimas</h2>

<?php
require_once("Controllers/darbuotojas_controller.php");
if($_GET['msg'] == "emptyFields") echo '<script>alert("Neuzpildete visu lauku");</script>'; 
if($_GET['msg'] == "success") echo '<script>alert("Stebėsena darbuotojui sekmingai prideta");window.location.href="?psl=stebesenuAtlikimas";</script>'; 

?>
 
    <h3 class="header">Atlikti stebėseną</h3>
    <div class="container">
        <form method="post">
        <label>Tekstas</label>
        <input type="text" size="40" name="tekstas"><br/>
        <label>Asmens kodas</label>
        <input type="text" size="40" name="asmens_kodas"><br/>
        <label>Naudotojo id</label>
        <input type="text" size="40" name="naudotojo_id" ><br/>
        
        <button type="submit" class="btn btn-warning" name="Add">Priskirti</button>
        <button type="submit" class="btn btn-warning" name="cancel">Atšaukti</button>
        </form>
    </div>


    

<?php //function pridetiPrieda($adresatas, $uz_ka, $dydis, $numeris, $asmens_kodas, $naudotojo_id)
if(isset($_POST["tekstas"]) && isset($_POST["asmens_kodas"]) && isset($_POST["naudotojo_id"]))
{
    atliktiDarbuotojoStebesena($_POST["asmens_kodas"], 
    $_POST["tekstas"], $_POST["naudotojo_id"]);
}