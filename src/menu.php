<?php
$a = 1;
$b = '1';
$v = '1.4';


$menu = array(
  'Demos' => array(
    'Procedural'=>'/demo_mvc/procedural',
    'OOP'=>'/demo_mvc/oop',
    //'Funcional'=>'./demo_mvc/funcional',
    'MVC'=>'/demo_mvc/mvc',	
    'Symfony'=>'/symfony_app'    
  ),
  'Sources' => array(
    'Procedural'=>'https://github.com/wagnerpinheiro/treinamento-symfony/tree/feature/02-init-env/src/demo_mvc/procedural',
    'OOP'=>'https://github.com/wagnerpinheiro/treinamento-symfony/tree/feature/02-init-env/src/demo_mvc/oop',    
    //'Funcional'=>'./demo_mvc/funcional',
    'MVC'=>'https://github.com/wagnerpinheiro/treinamento-symfony/tree/feature/02-init-env/src/demo_mvc/mvc',
    'Symfony' => 'https://github.com/wagnerpinheiro/treinamento-symfony'
  )
);

if(!$menu){
	die('Menu não definido');
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

        <?php foreach($menu as $dropdown=>$items){ ?>     
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$dropdown?> <span class="caret"></span></a>
          <ul class="dropdown-menu">

    			<?php
    			foreach($items as $item=>$url){
            $blank = '';
            if(substr($url, 0, 4) === 'http'){
                $blank = 'target="_blank"';
            }
    				echo("<li><a $blank href='$url'>$item</a></li>");
    			}
    			?>

          </ul>
        </li>

        <?php } ?>     
        <li><a href="#">Exercícios</a></li>
      </ul>      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<a href="https://github.com/wagnerpinheiro/treinamento-symfony"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/e7bbb0521b397edbd5fe43e7f760759336b5e05f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677265656e5f3030373230302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png"></a>