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
  
<h1>Demo: Form Procedural</h1>

<div class="container">
	<h2>Cadastro Funcionário</h2>
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
	    <select class="form-control" id="departamento" name="departamento">
	    	<option value=""></option>
		    <option value="1">TI</option>
		    <option value="2">Financeiro</option>
		    <option value="3">Comercial</option>		    
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
      <tr>
        <td>John</td>
        <td>TI</td>
        <td>xxxx</td>
      </tr>      
    </tbody>
  </table>
</div>

<hr />

</body>
</html>

