<?php

/**
 * users actions.
 *
 * @package    facebook
 * @subpackage users
 * @author     Your name here
 */
class usersActions extends sfActions
{
public function executeWsinvited(sfWebRequest $request)
  {
	$this->setLayout(false);
    //echo "hola";
	if( isset($_POST['request_ids']) && isset($_POST['uid']) ) {
		 
		$uid = $_POST['uid'];
		//echo $uid;
		$request_ids = $_POST['request_ids'];
		//echo $request_ids;
		$requests = explode(',',$_POST['request_ids']);
		
		foreach($requests as $request_id) {
		    //echo "entre";
			$request =explode('_',$request_id);
			//echo $request[1];
			 $c1= new Criteria();
             $c1->add(FriendsPeer::USE_ID,$uid);
			 $c1->add(FriendsPeer::FRI_ID,$request[1]);
            $friend = FriendsPeer::doSelectOne($c1);
			//echo $friend->getFriName();
			$friend->setFriInvite(1);
			$status=$friend->save();
			//mysql_query("INSERT INTO fb_requests (fb_user_id, request_id) VALUES ('$uid', '$request_id')") or die("MySQL Error: " . mysql_error());
		}
	}
  }
  public function executeIndex(sfWebRequest $request)
  {
	//$this->setLayout(false);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->users = UsersPeer::retrieveByPk($request->getParameter('use_id2'));
    $this->forward404Unless($this->users);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new usersForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new usersForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($users = UsersPeer::retrieveByPk($request->getParameter('use_id2')), sprintf('Object users does not exist (%s).', $request->getParameter('use_id2')));
    $this->form = new usersForm($users);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($users = UsersPeer::retrieveByPk($request->getParameter('use_id2')), sprintf('Object users does not exist (%s).', $request->getParameter('use_id2')));
    $this->form = new usersForm($users);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($users = UsersPeer::retrieveByPk($request->getParameter('use_id2')), sprintf('Object users does not exist (%s).', $request->getParameter('use_id2')));
    $users->delete();

    $this->redirect('users/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $users = $form->save();

      $this->redirect('users/edit?use_id2='.$users->getUseId2());
    }
  }
}
