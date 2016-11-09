<?php
namespace TreinamentoSf;

/**
 * Description of Database
 *
 * @author Wagner Pinheiro <wagner at wagnerpinheiro.com.br>
 */
class Database {
    
    /**
     * @var Singleton The reference to *Singleton* instance of this class
     */
    private static $instance;
    private static $username = 'root';
    private static $password = '';
    private static $database = 'symfony';
    private static $hostname = 'mysql';
    private $pdo;

    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Database The *Singleton* instance.
     */
    public static function getInstance() {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }
    
    /**
     * 
     * @return PDO
     */
    public function getPdo(){
        return $this->pdo;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct() {
        
        try {
            $this->pdo = new \PDO("mysql:host=" . static::$hostname .  ';dbname=' . static::$database,static::$username,static::$password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $e){
                //nunca faça um try catch silencioso
                //salve os erros em um log, não faça saida para o usuário, pode haver informações sensiveis a segurança do app
            error_log($e->getMessage());
        }
        
    }
    
    /**
     * @todo SQLInjection protection
     * @param string $tablename
     * @param string $criteria
     * @return array
     */
    public function fetchCollection($tablename, $where = null, $order = null, $limit = null){
        
        $sql = 'select * from ' . $tablename;
        if($where){
            $sql .= ' where ' . $where;
        }
        
        if($order){
            $sql .= ' order by ' . $order;
        }
        
        if($limit){
            $sql .= ' limit ' . $limit;
        }
        
        //print_r($sql);
        
        try {
            $rows = $this->pdo->query($sql);    
        } catch (\Exception $exc) {
            error_log($exc->getMessage());
        }        
        
        $collection = array();
        foreach ($rows as $row) {
            $obj = Bootstrap::getInstance()->dbFactory($tablename, $row);
            $collection[] = $obj;
        }
        
        return $collection;
    }
    
    /**
     * 
     * @param string $tablename
     * @param string $criteria
     * @return Object|null
     */
    public function fetchObject($tablename, $where = null, $order = null){
        $collection = $this->fetchCollection($tablename, $where, $order, 1);
        if(count($collection)){
           return $collection[0];
        }
        
        return null;        
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone() {
        
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup() {
        
    }

}
