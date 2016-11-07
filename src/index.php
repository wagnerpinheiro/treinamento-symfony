<?php
$sections = array(
	'Procedural'=>'./demo_mvc/procedural',
	'OOP'=>'./demo_mvc/oop',
	//'Funcional'=>'./demo_mvc/funcional',
	'MVC'=>'./demo_mvc/mvc',	
	'Exercicios'=>'./demo_mvc/exercicios'
);

echo("<h1>Hello World: Treinamento Symfony</h1>");
if(!$sections){
	die('Seções não definidas');
}
?>

<h2>Demos</h2>
<ul>
<?php
foreach($sections as $section=>$url){
	echo("<li><a href='$url'>$section</a></li>");
}
?>
</ul>

<hr />

<h2>Anexo 1: PHP Info</h2>
<?php
phpinfo();
