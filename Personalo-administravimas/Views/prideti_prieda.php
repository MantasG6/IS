<?php
require_once("Controllers/priedas_controller.php");
if($_GET['msg'] == "emptyFields") echo '<script>alert("Neuzpildete visu lauku");</script>'; 
if($_GET['msg'] == "success") echo '<script>alert("Priedas vartotojui sekmingai pridetas");</script>'; 

?>
 
    <h3 class="header">Pridėti priedą</h3>
    <div class="container">
        <form method="post">
        <label>Adresatas</label>
        <input type="text" size="40" name="adresatas"><br/>
        <label>Už ką</label>
        <input type="text" size="40" name="uz_ka"><br/>
        <label>Dydis</label>
        <input type="text" size="40" name="dydis"><br/>
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
if(isset($_POST["adresatas"]) && isset($_POST["uz_ka"]) && isset($_POST["dydis"]) && isset($_POST["asmens_kodas"]) && isset($_POST["naudotojo_id"]))
{
    pridetiPrieda($_POST["adresatas"], $_POST["uz_ka"], $_POST["dydis"], 
    $_POST["asmens_kodas"], $_POST["naudotojo_id"]);
}