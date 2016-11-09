<?php
namespace TreinamentoSf\Controllers;
use TreinamentoSf\Database as Database;
use TreinamentoSf\Models\Departamentos as Departamentos;
use TreinamentoSf\Models\Funcionarios as Funcionarios;

/**
 * Description of Main
 *
 * @author Wagner Pinheiro <wagner at wagnerpinheiro.com.br>
 */
class Main {    
    
    public function index(){
        $this->departamentos = Database::getInstance()->fetchCollection(Departamentos::TABLENAME, null, 'departamento');
        $this->funcionarios = Database::getInstance()->fetchCollection(Funcionarios::TABLENAME, null, 'nome');
        return $this;
    }
    
    public function saveFuncionario(){
        
        if($_POST['nome']){
            $funcionario = new Funcionarios();
            $funcionario->setNome($_POST['nome']);
            $funcionario->setEmail($_POST['email']); 
            $funcionario->setDepartamento_id($_POST['departamento_id']);
            $funcionario->setNascimento($_POST['nascimento'], 'd/m/Y');
            $funcionario->save();
        } 
        
        /**
         * @todo inclluir suporte a redirects
         */
        $this->departamentos = Database::getInstance()->fetchCollection(Departamentos::TABLENAME, null, 'departamento');
        $this->funcionarios = Database::getInstance()->fetchCollection(Funcionarios::TABLENAME, null, 'nome');
        return $this;
    }
}
