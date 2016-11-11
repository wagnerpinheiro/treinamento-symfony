<?php 
foreach ($funcionarios as $func) { 
/* @var func Funcionarios */
?>
<?=$func->getNome() ?> - <?=$func->getDepartamentos() ?> <br />
<?php } ?>