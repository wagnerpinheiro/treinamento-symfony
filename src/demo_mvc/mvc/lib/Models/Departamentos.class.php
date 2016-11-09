<?php
namespace TreinamentoSf\Models;
use TreinamentoSf\Database;

/**
 * Description of Departamentos
 *
 * @author Wagner Pinheiro <wagner at wagnerpinheiro.com.br>
 */
class Departamentos {
    
    const TABLENAME = 'departamentos';
    
    protected $id;
    protected $departamento;
    
    public function __construct($row = null) {
        if($row){
            $this->id = $row['id'];
            $this->departamento = $row['departamento'];
        }            
    }
    
    public function getId() {
        return $this->id;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
        return $this;
    }



}
