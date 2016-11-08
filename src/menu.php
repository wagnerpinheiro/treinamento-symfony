<?php
$a = 1;
$b = '1';
$v = '1.4';


$sections = array(
  'Procedural'=>'/demo_mvc/procedural',
	'OOP'=>'/demo_mvc/oop',
	//'Funcional'=>'./demo_mvc/funcional',
	'MVC'=>'/demo_mvc/mvc',	
	'Exercicios'=>'/demo_mvc/exercicios'
);

if(!$sections){
	die('Seções não definidas');
}
?>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Treinamento Symfony <?=$v?></a>      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a target="_blank" href="/README.html">Apresentação</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Demos <span class="caret"></span></a>
          <ul class="dropdown-menu">

			<?php
			foreach($sections as $section=>$url){
				echo("<li><a href='$url'>$section</a></li>");
			}
			?>

          </ul>
        </li>
      </ul>      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>