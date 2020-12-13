<?php
require_once("Controllers/priedas_controller.php");
if($_GET['msg'] == "success") echo '<script>alert("Priedas atimtas sekmingai");window.location.href="?psl=prieduSkaiciavimas";</script>'; 
if($_GET['numeris'] != "" && $_GET['msg'] == "") {	
atimtiPrieda($_GET['numeris']);
}
?>