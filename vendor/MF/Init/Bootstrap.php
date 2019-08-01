<?php



namespace MF\Init;


/*
    Uma Classe Abstrata é aquela que não pode ser instanciada, apenas herdada por outras classes. 
*/

    abstract class Bootstrap{


//Irá receber um array com os actions (endereços)
    	private $routes;

    	abstract protected function initRoutes();

   /*
    O método construct vai chamar o automaticamente o initRoute, e isso vai dar um valor para $routes, que será um array com vários actions (direcionamentos)
	*/
    public function __construct() {
    	$this->initRoutes();
    	$this->run($this->getUrl());
    }

    public function getRoutes() {
    	return $this->routes;
    }

    public function setRoutes(array $routes) {
    	$this->routes = $routes;
    }
    public function run($url) {
    	foreach ($this->getRoutes() as $key => $route) {
    		if($url == $route['route']) {
    			$class = "App\\Controllers\\".ucfirst($route['controller']);

              // Instanciando a Classe que foi gerada dinamicamente, repare acima.
    			$controller = new $class;
			  //A variável action vai receber o valor do índice Action do array	
    			$action = $route['action'];
              //Acessando o método
    			$controller->$action();
    		}
    	}
    }
    public function getUrl() {
		// Feito um parse para retornar de onde o usuário está vindo (qual página do site)
    	return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }



}


?>