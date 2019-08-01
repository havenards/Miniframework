<?php

namespace MF\Controller;


abstract class Action{

    //Criando um atributo vazio, mas que ficará acessível para qualquer método da Classe.

	protected $view;


    protected function __construct(){
      //A Classe StdClass permite criar objetos vazios. Os quais podemos ir dando valor no decorrer do código.	 
       $this->view = new \stdClass();
     

    }
	protected function render($view, $layout){

      //Lembre-se que eu posso criar métodos e atributos (fakes) porque eu instanciei a classe stdClass
		$this->view->page = $view;
		require_once('../App/Views/' . $layout . 'phtml');
		

	}
	protected function content(){
		//Aqui eu vou atribuir como valor, o local e nome exato da Classe (App\Controllers\IndexController...)
		$classe_atual = get_class($this);
		//Agora vou limpar o valor que atribuí acima. De maneira que sobre apenas "INDEX"

		$classe_atual = str_replace('App\\Controllers\\', '', $classe_atual);
		$classe_atual = strtolower(str_replace('Controllers','',$classe_atual));

		require_once('../App/Views/' . $classe_atual . '/' . $this->view->page .'.phtml');
		
	}
}
 


?>