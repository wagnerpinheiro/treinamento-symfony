<?php

/**
 * Description of Funcionarios
 *
 * @author Wagner Pinheiro <wagner at wagnerpinheiro.com.br>
 */
class Funcionarios {
    
    const TABLENAME = 'funcionarios';
    
    protected $id;
    protected $nome;
    protected $email;
    protected $departamentos;
    protected $departamento_id;
    protected $nascimento;


    public function __construct($row = null) {
        if($row){
            $this->id = $row['id'];
            $this->nome = $row['nome'];
            $this->email = $row['email'];
            $this->departamento_id = $row['departamento_id'];
            $this->nascimento = $row['nascimento'];
        }
    }
    
    public function save() {       
        $pdo = Database::getInstance()->getPdo();

        $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, email, departamento_id, nascimento) VALUES (:nome, :email, :departamento_id, :nascimento)");

        $ok = $stmt->execute(array(
                ':nome' => $this->getNome(),
                ':email' => $this->getEmail(),
                ':departamento_id' => $this->getDepartamento_id(),
                ':nascimento' => $this->getNascimento('Y-m-d')
            )
        );
        
        if($ok && $pdo->lastInsertId()){
            $this->id = $pdo->lastInsertId();       
        }
        
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    /**
     * Lazy-loading Departamento
     * 
     * @return Departamento
     */
    public function getDepartamentos() {
        if(!$this->departamentos && $this->departamento_id){            
            $this->departamentos = Database::getInstance()->fetchObject('departamentos', 'id = ' . $this->departamento_id);
        }
        return $this->departamentos;
    }

    public function getDepartamento_id() {
        return $this->departamento_id;
    }

    public function getNascimento($format = null) {
        if($this->nascimento && $format){
            return date($format, strtotime($this->nascimento));
        }
        return $this->nascimento;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setEmail($email) {
        if($email){
            $this->email = $email;
        }
        return $this;
    }

    /**
     * 
     * @param Departamentos $departamento
     * @return \Funcionarios
     */
    public function setDepartamentos($departamento) {
        $this->departamentos = $departamento;
        return $this;
    }

    public function setDepartamento_id($departamento_id) {
        if($departamento_id){
            $this->departamento_id = $departamento_id;
        }
        return $this;
    }

    public function setNascimento($nascimento, $format = 'Y-m-d') {
        if($nascimento){
            $date = DateTime::createFromFormat($format, $nascimento);
            $nascimento = $date->format('Y-m-d');
            $this->nascimento = $nascimento;
        }        
        return $this;
    }


    
}
