<?php
namespace TreinamentoSf;

/**
 * Description of Bootstrap
 *
 * @author Wagner Pinheiro <wagner at wagnerpinheiro.com.br>
 */
class Bootstrap {
    
    /**
     * @var Singleton The reference to *Singleton* instance of this class
     */
    private static $instance; 
    private $route;
    private $view;

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
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct() {
        
        spl_autoload_register(array($this, 'autoload'));
    }
    
    private function autoload($className){
        $filename = str_replace('TreinamentoSf', '', $className);        
        $filename = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $filename) . '.class.php';        
        require_once $filename;
    }
    
    public function init(){
        return $this;
    }  
    
    public function route($rota = null){
        if(!$rota){
            $rota = "Main/index";
        }
        $this->route = $rota;
        
        try {            
            $rota = explode('/', $rota);
            $class = '\\TreinamentoSf\\Controllers\\' . $rota[0];
            $method = $rota[1];
            $controller = new $class();
            $this->view = $controller->$method();
        } catch (\Exception $exc) {            
            error_get_last($exc->getMessage());
            $main  = new \TreinamentoSf\Controllers\Main(); //usa o padrão
            $this->view = $main->index();
        }
        
        $this->importTempate('template');
    }
    
    public function getView(){
        return $this->view;
    }
    
    public function importTempate($template = 'template'){
        
        include(__DIR__ . '/../resources/views/' . $template . '.php');
    }
    
    public function importView($view = null){
        if(!$view){
            $view = $this->route;            
        }
        include(__DIR__ . '/../resources/views/' . $view . '.php');
    }
    
    public function dbFactory($table, $data = null){
        
        $class = 'TreinamentoSf' . '\\' . 'Models' . '\\' . ucfirst($table);
        return new $class($data);        
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
