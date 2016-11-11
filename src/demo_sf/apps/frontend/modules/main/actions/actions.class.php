<?php

/**
 * main actions.
 *
 * @package    demo_sf
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      //$this->forward('default', 'module');     
      $this->hello = 'Hello World!';
      $c = new Criteria();
      $c->addAscendingOrderByColumn(DepartamentosPeer::DEPARTAMENTO);
      $this->departamentos = DepartamentosPeer::doSelect($c);
      $this->funcionarios = FuncionariosPeer::doListFuncionarios();
      return sfView::SUCCESS;
  }
  
  public function executeSaveFuncionario(sfWebRequest $request)
  {
    //exemplo funcional
    $this->forwardUnless($request->getParameter('nome'), 'main', 'index');
    $funcionario = new Funcionarios();
    $funcionario->setNome($request->getParameter('nome'));
    $funcionario->setEmail($request->getParameter('email'));
    $funcionario->setDepartamentoId($request->getParameter('departamento_id'));
    
    $nascimento = $request->getParameter('nascimento');
    if($nascimento){
        $date = DateTime::createFromFormat('d/m/Y', $nascimento);
        $nascimento = $date->format('Y-m-d');
        $funcionario->setNascimento($nascimento);
    }   
    
    $funcionario->save();    
    
    $this->forward('main', 'index');
  }
  
}
