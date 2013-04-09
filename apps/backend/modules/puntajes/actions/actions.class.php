<?php

require_once dirname(__FILE__).'/../lib/puntajesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/puntajesGeneratorHelper.class.php';

/**
 * puntajes actions.
 *
 * @package    facebook
 * @subpackage puntajes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class puntajesActions extends autoPuntajesActions
{
  public function executeSetMaxPerPage(sfWebRequest $request)
  {
  //$this->getUser()->setAttribute('maxPage',$request->getParameter('maxPage'));
  //$this->redirect($request->getReferer());
    $this->getUser()->setAttribute('puntajes.max_per_page', $max = $request->getParameter('max'));
    $this->getUser()->setFlash('notice', 'El maximo de registros por pagina es de : '.$max);
    $this->redirect('@puntajes');
  } 
  public function executeBuscar(sfWebRequest $request)
  {
    $this->configuration = new puntajesGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new puntajesGeneratorHelper();

    parent::preExecute();
	$this->filters = $this->configuration->getFilterForm($this->getFilters());
	$this->setLayout(false);
	/*return sfView::NONE;*/
  }  
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
   
    try {
            $this->getRoute()->getObject()->delete();
            $this->getUser()->setFlash('notice', 'El puntajes fue eliminado Correctamente.');
        }catch (Exception $e){
            $this->getUser()->setFlash('error', 'No se pudo eliminar el puntajes, asegurese que el puntajes no posee imagenes.');
        }
 
    $this->redirect('@puntajes');
  }
 public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@puntajes');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@puntajes');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }
}
