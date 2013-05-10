<?php

require_once dirname(__FILE__).'/../lib/usersGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/usersGeneratorHelper.class.php';

/**
 * users actions.
 *
 * @package    facebook
 * @subpackage users
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class usersActions extends autoUsersActions
{
  public function executeViewFriends($request) { 
    $this->getUser()->setAttribute( 'friend.filters',   
    array('use_id2' => $request->getParameter('use_id2')), 'admin_module' ); 
    $this->redirect($this->generateUrl('friends')); 
  }
  public function executeViewGroups($request) { 
    $this->getUser()->setAttribute( 'group.filters',   
    array('use_id' => $request->getParameter('use_id')), 'admin_module' ); 
    $this->redirect($this->generateUrl('groups')); 
  }
  public function executeViewLikes($request) { 
    $this->getUser()->setAttribute( 'like.filters',   
    array('use_id' => $request->getParameter('use_id')), 'admin_module' ); 
    $this->redirect($this->generateUrl('likes')); 
  }
  public function executeViewCheckins($request) { 
    $this->getUser()->setAttribute( 'checkin.filters',   
    array('use_id' => $request->getParameter('use_id')), 'admin_module' ); 
    $this->redirect($this->generateUrl('checkins')); 
  }
  public function executeViewInterests($request) { 
    $this->getUser()->setAttribute( 'interest.filters',   
    array('use_id' => $request->getParameter('use_id')), 'admin_module' ); 
    $this->redirect($this->generateUrl('interest')); 
  }
  public function executeViewPages($request) { 
    $this->getUser()->setAttribute( 'page.filters',   
    array('use_id' => $request->getParameter('use_id')), 'admin_module' ); 
    $this->redirect($this->generateUrl('pages')); 
  }
  public function executeViewStatuses($request) { 
    $this->getUser()->setAttribute( 'status.filters',   
    array('use_id2' => $request->getParameter('use_id2')), 'admin_module' ); 
    $this->redirect($this->generateUrl('statuses')); 
  }
  
  public function executeSetMaxPerPage(sfWebRequest $request)
  {
  //$this->getUser()->setAttribute('maxPage',$request->getParameter('maxPage'));
  //$this->redirect($request->getReferer());
    $this->getUser()->setAttribute('users.max_per_page', $max = $request->getParameter('max'));
    $this->getUser()->setFlash('notice', 'El maximo de registros por pagina es de : '.$max);
    $this->redirect('@users');
  } 
  public function executeBuscar(sfWebRequest $request)
  {
    $this->configuration = new usersGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new usersGeneratorHelper();

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
            $this->getUser()->setFlash('notice', 'El users fue eliminado Correctamente.');
        }catch (Exception $e){
            $this->getUser()->setFlash('error', 'No se pudo eliminar el users, asegurese que el users no posee imagenes.');
        }
 
    $this->redirect('@users');
  }
 public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@users');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@users');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }
}
