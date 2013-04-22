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
  public function executeIndex(sfWebRequest $request)
  {
    require '/home/ubuntu/test/web/src/facebook.php';
	$this->userss = UsersPeer::doSelect(new Criteria());
	// global $log;
//$logPath = sfConfig::get('sf_log_dir').'/llamar.log';
//$log = new sfFileLogger(new sfEventDispatcher(), array('level' => sfFileLogger::DEBUG,'file' => $logPath,'type' => 'llamar'));
  ini_set('display_errors',1);
  $facebook = new Facebook(array(
  'appId'  => '163207260491691',
  'secret' => '0d45ef52a848c029298c462209ee212c',
));

// Get User ID
$userf = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($userf) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
    $myFriends = $facebook->api('/me/friends');
    
  } catch (FacebookApiException $e) {
    error_log($e);
    $userf = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($userf) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  //$loginUrl = $facebook->getLoginUrl();
 $params = array(
    //"redirect_uri" => REDIRECT_URI,
    "scope" => "email,read_stream,publish_stream,user_photos,user_videos");
    //echo '<a href="' . $fb->getLoginUrl($params) . '">Login</a>';
	echo '<a href="' . $loginUrl = $facebook->getLoginUrl($params) . '">Login</a>';

}
$signed_request = $facebook->getSignedRequest();
$page_id = $signed_request["page"]
["id"];
$page_admin = $signed_request["page"]
["admin"];
$like_status = $signed_request["page"]
["liked"];
$country = $signed_request["user"]
["country"];
$locale = $signed_request["user"]
["locale"];


// This call will always work since we are fetching public data.
$naitik = $facebook->api('/fbricenop');
/*require_once("/home/ubuntu/test/web/src/facebook.php");
  //Config FB
  $config = array();
  $config['appId'] = '163207260491691';
  
  //$config['appId'] = '439345492779960';
  //$config['secret'] = 'e2b140f015c6a68a4de9b5d0b4a5262c';
   $config['secret'] = '0d45ef52a848c029298c462209ee212c'; 

  //FB
  $facebook = new Facebook($config); 
  $params = array(
      'scope' => 'email,publish_stream',
      //'redirect_uri' => 'http://sprite.mccann.cl.mzzo.mobi/llamar',
      'display' => 'touch'
   );
  $usuarioLogueado = false;
  */
   
  //Obtener usuario
  $userf = $facebook->getUser();
  if($userf){
//	$this->redirect('llamar/alert');
if ($userf): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($userf): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $userf; ?>/picture">

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php echo '<p>Y estas las de mis amigos...</p>';
    echo "<ul id='lista-de-amigos'>";
	print_r($myFriends);
    foreach ($myFriends['data'] as $friend) 
    {
	  echo '<img src="https://graph.facebook.com/'.$friend['id']. '/picture">';
      echo '<li style="display:inline;"><fb:profile-pic uid="'.$friend['id'].'" width="32" height="32" linked="true" /></li>';
    }
    echo "</ul><br/><br/>";
    else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>
<pre><?php print_r($signed_request); ?></pre>
    <h3>Public profile of Francisco</h3>
    <img src="https://graph.facebook.com/fbricenop/picture">
    <?php echo $naitik['name']; ?>
	
	<div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <p>
      <input type="button"
        onclick="sendRequestToRecipients(); return false;"
        value="Send Request to Users Directly"
      />
      <input type="text" value="User ID" name="user_ids" />
      </p>
    <p>
    <input type="button"
      onclick="sendRequestViaMultiFriendSelector(); return false;"
      value="Send Request to Many Users with MFS"
    />
    </p>
      <?php
//  }else {
      try{
      $usuarioLogueado = true;
	  $this->usuarioLogueado=true;
      $u = $facebook->api('/me');
      $this->u = $u;
	  //$this->loginUrl = $facebook->getLoginUrl($params);
      $c1= new Criteria();
      $c1->add(UsersPeer::USE_ID,$u['id']);
      $user = UsersPeer::doSelectOne($c1);
	  $c2= new Criteria();
		//$c2->addJoin ( CallbackWsPeer::UUID, CallHistoryPeer::UUID,Criteria::LEFT_JOIN);
              //$c2->addJoin ( RequestWsPeer::UUID,  CallHistoryPeer::UUID,Criteria::LEFT_JOIN);
        //$c2->addJoin ( CallHistoryPeer::ID,  UserPeer::ID,Criteria::LEFT_JOIN);
		
		$c2->add(UsersPeer::USE_ID,$u['id']);
        //$c2->add(CallbackWsPeer::HANGUP_CAUSE,'NORMAL_CLEARING');
        //$c2->addGroupByColumn(CallbackWsPeer::UUID);
		//$c2->addAscendingOrderByColumn(CallbackWsPeer::DATE);
        //$callbacks =CallbackWsPeer::doSelect($c2);
		//$countcb = count($callbacks);
		//echo $countcb;
	  } catch (Exception $e) {
       $log->debug('error:'.$e);
	     //$this->redirect('llamar/alert');
	   echo $e;
      }
	  if ($user == null){
	  try{
	  $user=new Users();
      $user->setConId(1);
      $user->setUseId($u['id']);
      $user->setUseName($u['name']);
      $user->setUseFirstName($u['first_name']);
      $user->setUseMiddleName($u['middle_name']);
	  $user->setUseLastName($u['last_name']);
	  $user->setUseGender($u['gender']);
	  $user->setUseLocale($u['locale']);
	  $user->setUseLink($u['link']);
	  $user->setUseBirthday($u['birthday']);
	  $user->setUseEmail($u['email']);
	  $user->setUseLocation($u['location']);
	  $user->setUseWebsite($_COOKIE['username']);
      $status=$user->save();
	  //echo "nuevo";
	  
	  //$log->debug('id:'.$u['id'].' | name:'.$u['name'].' | first_name:'.$u['first_name'].' | middle_name:'.$u['middle_name'].' | last_name:'.$u['last_name'].' | gender:'.$u['gender'].' | locale:'.$u['locale'].' | link:'.$u['link'].' | birthday:'.$u['birthday'].' | email:'.$u['email'].' | location:'.$u['location'].' | website:'.$u['website']);
	  } catch (Exception $e) {
       //$log->debug('error:'.$e);
	   echo $e;
      }
      }
	  else{
      try{
      $ret_obj = $facebook->api('/'.$u['id'].'/feed', 'POST',
            array(
                'picture' => 'http://sprite.mccann.cl.mzzo.mobi/html/img/200x200.jpg',
                'link' => 'http://www.sprite.cl',
                'message' => $u['first_name']." nunca tiene saldo en su celular! \n\r Por eso usó la Antena Sprite para comunicarse.\n\r Sprite, la verdad refresca."
       ));
      if (!$ret_obj) {
      throw new Exception('Post unsuccessful!');
     }
     } catch (Exception $e) {
      //$log->debug('error post:'.$e);
     }
	 
	 
     }}

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
