<?php

require_once dirname(__FILE__).'/../lib/likesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/likesGeneratorHelper.class.php';

/**
 * likes actions.
 *
 * @package    facebook
 * @subpackage likes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class likesActions extends autoLikesActions
{
  public function executeSetMaxPerPage(sfWebRequest $request)
  {
  //$this->getUser()->setAttribute('maxPage',$request->getParameter('maxPage'));
  //$this->redirect($request->getReferer());
    $this->getUser()->setAttribute('likes.max_per_page', $max = $request->getParameter('max'));
    $this->getUser()->setFlash('notice', 'El maximo de registros por pagina es de : '.$max);
    $this->redirect('@likes');
  } 
  public function executeBuscar(sfWebRequest $request)
  {
    $this->configuration = new likesGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new likesGeneratorHelper();

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
            $this->getUser()->setFlash('notice', 'El likes fue eliminado Correctamente.');
        }catch (Exception $e){
            $this->getUser()->setFlash('error', 'No se pudo eliminar el likes, asegurese que el likes no posee imagenes.');
        }
 
    $this->redirect('@likes');
  }
 public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@likes');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@likes');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }
}
