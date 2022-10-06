
<?php 
ob_start(); 
?> 

<div class="d-flex justify-content-center mb-3">
    <?= $msg ?> 
</div>




<?php 
$content = ob_get_clean();
$titre = "Erreur"; 
require "template.php"; 
?>