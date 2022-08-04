<?php 

ob_start(); ?> 


<?php 
$content = ob_get_clean();
$titre = "Biblio"; 
require "template.php"; 
?>