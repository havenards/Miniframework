<?php


 namespace App\Controllers;

 /*
   Criando o controlador e executando as actions (redirecionamento) de acordo com o PATH recebido pelo roteador.php

    Algumas observações importantes:

    1- A Classe deverá receber o mesmo nome do arquivo por conta do Composer.

    2- Os métodos (function) são criados de acordo com cada function action (página) existente. 

    3- Os namespace deverá ser o diretório onde se encontra o script. 



  */

    use MF\Controller\Action;

 class IndexController extends Action{

 	
 	function index()
 	{
 		$this->render('Index', 'layout1');
 	}
 	function sobreNos()
 	{
 		$this->render('sobreNos', 'layout1');
 	}
 }




?>