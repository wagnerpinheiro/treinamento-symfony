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
  }
  
  public function executeSave(sfWebRequest $request)
  {
    
  }
  
}