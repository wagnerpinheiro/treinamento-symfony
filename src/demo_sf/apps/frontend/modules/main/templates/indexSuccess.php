<h1>Demo 4: Backend Symfony</h1>
<p>Cadastro de funcionários com o backend utilizando o framework Symfony</p>


<div class="container">
  <h2>Cadastro de Funcionário</h2>
  <form action="<?=url_for('main/saveFuncionario')?>" method="post">
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
