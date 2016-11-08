<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Treinamento Symfony</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment-with-locales.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.pt-BR.min.js"></script>
</head>
<body>

<?php require_once('../../menu.php'); ?>
<?php require_once('../../config.php'); ?>

<?php

//função para efeito didatico
function saveFuncionario($pdo, $nome, $email, $departamento_id, $nascimento){

	//conversão do formato da data de nascimento
	if($nascimento){
		$date = DateTime::createFromFormat('d/m/Y', $nascimento);
		$nascimento = $date->format('Y-m-d');
	}else{
		$nascimento = null; //força null no db
	}

	$stmt = $pdo->prepare("INSERT INTO funcionarios (nome, email, departamento_id, nascimento) VALUES (:nome, :email, :departamento_id, :nascimento)");
	
	return $stmt->execute(
		array(
			':nome' => $nome, 
			':email' => $email, 
			':departamento_id' => $departamento_id, 
			':nascimento' => $nascimento
		)
	);
}

if($_POST['nome']){
	saveFuncionario($pdo, $_POST['nome'], $_POST['email'], $_POST['departamento_id'], $_POST['nascimento']);
} 
?>
  
<h1>Demo 1: Backend Procedural</h1>

<p>Cadastro de funcionários com o backend procedural [<a targe="_blank" href="<?=$menu['Sources']['1. Procedural']?>">source</a>]</p>

<div class="container">
	<h2>Cadastro de Funcionário</h2>
	<form action="index.php" method="post">
	  <div class="form-group">
	  	<label for="nome">Nome:</label>
	    <input type="text" class="form-control" id="nome" name="nome">
	  </div>
	  <div class="form-group">  
	    <label for="email">Email:</label>
	    <input type="email" class="form-control" id="email" name="email">
	  </div>
	  <div class="form-group">
	    <label for="departamento">Departamento:</label>
	    <select class="form-control" id="departamento" name="departamento_id">
	    	<option value=""></option>
	    	<?php	    	
	    	$sql = "SELECT * FROM departamentos order by departamento asc";	    	
	    	$departamentos = $pdo->query($sql);
	    	foreach ($departamentos as $dpto){
	    		echo('<option value="' . $dpto['id'] . '">' . $dpto['departamento'] . '</option>');
	    	}
	    	?>
		  </select>
	  </div>
	  <div class="form-group">
	    <label for="nascimento">Nascimento:</label>
	    <div class='input-group date' id='nascimento'>	    	
            <input type='text' class="form-control" id="nascimento2" name="nascimento" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>            
        </div>
        <script type="text/javascript">
            $(function () {
                $('#nascimento').datepicker({
                	format: 'dd/mm/yyyy',
			    	language: 'pt-BR',
			    	weekStart: 0,
			    	startDate:'0d',
			    	todayHighlight: true             	
                });
            });
        </script>
	  </div>
	  <button type="submit" class="btn btn-default">Salvar</button>
	</form>

	
</div>

<hr />

<div class="container">
  <h2>Lista de Funcionários</h2>
  <table class="table table-striped table-hover">
    <thead>    	
      <tr>
        <th>Nome</th>
        <th>Departamento</th>
        <th>Nascimento</th>
      </tr>
    </thead>
    <tbody>
   		<?php 
    		$sql = "SELECT F.nome, D.departamento, F.nascimento FROM funcionarios F left join departamentos D on (D.id=F.departamento_id) order by nome asc";	    	
	    	$funcionarios = $pdo->query($sql);
	    	foreach ($funcionarios as $func){
	   	?>
		   	<tr>
		   		<td><?=$func['nome']?></td>
		   		<td><?=$func['departamento']?></td>
		   		<td><?=$func['nascimento']?date('d/m/Y', strtotime($func['nascimento'])):''?></td>
		   	</tr>
	   	<?php	    	
	    	}
	   	?>
      </tr>      
    </tbody>
  </table>
</div>

<hr />

</body>
</html>

