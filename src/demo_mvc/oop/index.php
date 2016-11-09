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

<?php require_once('Database.class.php'); ?>
<?php require_once('Departamentos.class.php'); ?>
<?php require_once('Funcionarios.class.php'); ?>
<?php require_once('../../menu.php'); ?>

<?php
if($_POST['nome']){
    $funcionario = new Funcionarios();
    $funcionario->setNome($_POST['nome']);
    $funcionario->setEmail($_POST['email']); 
    $funcionario->setDepartamento_id($_POST['departamento_id']);
    $funcionario->setNascimento($_POST['nascimento'], 'd/m/Y');
    $funcionario->save();
} 
?>
  
<h1>Demo 2: Backend Orientado a Objeto (OOP)</h1>

<p>Cadastro de funcionários com o backend OOP, contendo classe de manipulação do 
    banco de dados (Database.class) que mapeia os registros com classe de objetos 
    (Funcionarios, Departamentos...) [<a targe="_blank" href="<?=$menu['Sources']['2. OOP']?>">source</a>]</p>

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
        $departamentos = Database::getInstance()->fetchCollection(Departamentos::TABLENAME, null , 'departamento');
        foreach ($departamentos as $dpto){
          /*@var $dpto Departamentos */
          echo('<option value="' . $dpto->getId() . '">' . $dpto->getDepartamento() . '</option>');
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
        $funcionarios = Database::getInstance()->fetchCollection(Funcionarios::TABLENAME, null, 'nome');
        foreach ($funcionarios as $func){
        /* @var $func Funcionarios */
      ?>
        <tr>
            <td><?=$func->getNome()?></td>
            <td><?=$func->getDepartamentos()?$func->getDepartamentos()->getDepartamento():''?></td>
            <td><?=$func->getNascimento('d/m/Y')?></td>
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