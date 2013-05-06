<?php
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

// Login or logout url will be needed depending on current user state.
if ($userf) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  //$loginUrl = $facebook->getLoginUrl();
  //***FULL ACCESS 
  //$loginUrl = $facebook->getLoginUrl(
//array( 
//'scope' => 'user_about_me,user_activities,user_birthday,user_checkins,user_education_history,user_events,user_groups,user_hometown,user_interests,user_likes,user_location,user_notes,user_online_presence,user_photo_video_tags,user_photos,user_relationships,user_relationship_details,user_religion_politics,user_status,user_videos,user_website,user_work_history,email,read_friendlists,read_insights,read_mailbox,read_requests,read_stream,xmpp_login,ads_management,create_event,manage_friendlists,manage_notifications,offline_access,publish_checkins,publish_stream,rsvp_event,sms,publish_actions,manage_pages'
//));
 $params = array(
    //"redirect_uri" => REDIRECT_URI,
    "scope" => "email,read_stream,publish_stream,user_photos,user_videos,user_birthday,user_checkins,user_groups,user_status,friends_birthday");
    //echo '<a href="' . $fb->getLoginUrl($params) . '">Login</a>';
	?><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=163207260491691";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 

<div class="fb-login-button" scope="email,read_stream,publish_stream,user_photos,user_videos,user_birthday,user_checkins,user_groups,user_status,friends_birthday" data-show-faces="true" data-width="200" data-max-rows="1"></div>
<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"> <?
    echo '<a href="' . $loginUrl = $facebook->getLoginUrl($params) . '">Login</a>';
	
 ?> </div>
 
	<?
	$fb_login = '<a href="' . $facebook->getLoginUrl() . '" class="fb-login-button"><img src="img/fb-login-button.png" border="0" /></a>';
    echo $fb_login;
	}
	
// echo '<div>'
if ($userf) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
    //echo "<h3> amigos</h3>";
	//$myFriends = $facebook->api('/me/friends');
	$myFriends = $facebook->api('/me/friends?fields=name,gender,birthday');
    //print_r($myFriends['data']);
	
	
	//echo "<h3> grupos</h3>";
	$myGroups = $facebook->api('/me/groups');
    //print_r($myGroups['data']);
	
	//echo "<h3> checkins</h3>";
	$myCheckins = $facebook->api('/me/checkins');
	//print_r($myCheckins['data']);
	
	//echo "<h3> likes</h3>";
	$myLikes = $facebook->api('/me/likes');
	//print_r($myLikes['data']);
	
	//echo "<h3> interest</h3>";
	$myInterests = $facebook->api('/me/interests');
	//print_r($myInterests['data']);
	
	//echo "<h3> pages</h3>";
	//$myPages = $facebook->api('/me/pages');
	
	$myPages = $facebook->api(array(  
    'method' => 'fql.query',  
    'query' => 'SELECT page_id,app_id,pic,name,page_url,website,fan_count,new_like_count,checkins,founded,products FROM page WHERE page_id IN (SELECT page_id FROM page_fan WHERE uid=me());'  
));  
	//print_r($myPages);
	
	
	
	//echo "<h3> status</h3>";
	$myStatuses = $facebook->api('/me/statuses');
    //print_r($myStatuses['data']);
	
  } catch (FacebookApiException $e) {
    //error_log($e);
    echo $e;
	$userf = null;
  }
}
// echo ' <div>'




$signed_request = $facebook->getSignedRequest();
$page_id = $signed_request["page"]["id"];
$page_admin = $signed_request["page"]["admin"];
$like_status = $signed_request["page"]["liked"];
$country = $signed_request["user"]["country"];
$locale = $signed_request["user"]["locale"];
echo "variables";
echo $page_id;
echo $page_admin;
echo $like_status;
echo $country;
echo $locale;



  if($userf){
	

      try{
      $usuarioLogueado = true;
	  $this->usuarioLogueado=true;
      $u = $facebook->api('/me');
      $this->u = $u;
	  //$this->loginUrl = $facebook->getLoginUrl($params);
      $c1= new Criteria();
      $c1->add(UsersPeer::USE_ID,$u['id']);
      $user = UsersPeer::doSelectOne($c1);
	  //$c2= new Criteria();
		//$c2->addJoin ( CallbackWsPeer::UUID, CallHistoryPeer::UUID,Criteria::LEFT_JOIN);
              //$c2->addJoin ( RequestWsPeer::UUID,  CallHistoryPeer::UUID,Criteria::LEFT_JOIN);
        //$c2->addJoin ( CallHistoryPeer::ID,  UserPeer::ID,Criteria::LEFT_JOIN);
		
		//$c2->add(UsersPeer::USE_ID,$u['id']);
        //$c2->add(CallbackWsPeer::HANGUP_CAUSE,'NORMAL_CLEARING');
        //$c2->addGroupByColumn(CallbackWsPeer::UUID);
		//$c2->addAscendingOrderByColumn(CallbackWsPeer::DATE);
        //$callbacks =CallbackWsPeer::doSelect($c2);
		//$countcb = count($callbacks);
		//echo $countcb;
		
	  $ci= new Criteria();
	  $ci->add(FriendsPeer::USE_ID,$u['id']);
      $ci->add(FriendsPeer::FRI_INVITE,'1');
      $myInvites = FriendsPeer::doSelect($ci);
	  foreach ($myInvites as $if){
	   $myif[]=array("id"=>$if->getFriId(),"name"=>$if->getFriName());
	  }
	  
	  } catch (Exception $e) {
          //$log->debug('error:'.$e);
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
	  //print_r($myFriends['data']);
	  foreach ($myFriends['data'] as $f) 
    {
	  //echo '<img src="https://graph.facebook.com/'.$friend['id']. '/picture">';
      //echo '<li style="display:inline;"><fb:profile-pic uid="'.$friend['id'].'" width="32" height="32" linked="true" /></li>';
	  $friend=new Friends();
      $friend->setConId(1);
	  $friend->setUseId2($user->getUseId2());
      $friend->setUseId($u['id']);
	  $friend->setFriId($f['id']);
      $friend->setFriName($f['name']);
      $friend->setFriFirstName($f['first_name']);
      $friend->setFriMiddleName($f['middle_name']);
	  $friend->setFriLastName($f['last_name']);
	  $friend->setFriGender($f['gender']);
	  $friend->setFriLocale($f['locale']);
	  $friend->setFriLink($f['link']);
	  $friend->setFriBirthday($f['birthday']);
	  $friend->setFriEmail($f['email']);
	  $friend->setFriLocation($f['location']);
	  $friend->setFriWebsite($_COOKIE['username']);
      $status=$friend->save();
    }
	//print_r($myGroups['data']);
	foreach ($myGroups['data'] as $g) 
    {
	  $group=new Groups();
	  $group->setUseId2($user->getUseId2());
      $group->setUseId($u['id']);
	  $group->setConId(1);
	  $group->setGroId2($g['id']);
	  $group->setGroVersion($g['version']);
	  $group->setGroName($g['name']);
	  $group->setGroAdministrator($g['administrator']);
	  $status=$group->save();
	  
	}
	foreach ($myCheckins['data'] as $c) 
    {
	  $checkin=new Checkins();
	  $checkin->setUseId2($user->getUseId2());
      $checkin->setUseId($u['id']);
	  $checkin->setConId(1);
	  $checkin->setCheId2($c['id']);
	  $checkin->setCheVersion($c['place']);
	  $checkin->setCheName($c['name']);
	  $checkin->setCheMessage($c['message']);
	  $checkin->setCheMessage($c['latitude']);
	  $checkin->setCheMessage($c['longitude']);
	  $checkin->setCheMessage($c['application']);
	  $status=$checkin->save(); 
	}
	
	foreach ($myLikes['data'] as $l) 
    {
	  $like=new Likes();
	  $like->setUseId2($user->getUseId2());
      $like->setUseId($u['id']);
	  $like->setConId(1);
	  $like->setPagId($l['id']);
	  $like->setCheName($l['name']);
	  $like->setCheCategory($l['category']);
	  $like->setCheCreatedTime($l['created_time']);
	  $status=$like->save(); 
	}
	
	foreach ($myInterests['data'] as $i) 
    {
	  $interest=new Interests();
	  $interest->setUseId2($user->getUseId2());
      $interest->setUseId($u['id']);
	  $interest->setConId(1);
	  $interest->setIntName($i['name']);
	  $interest->setIntCategory($i['category']);
	  $interest->setIntCreatedTime($i['created_time']);
	  $status=$interest->save(); 
	}

	foreach ($myPages['data'] as $p) 
    {
	  $page=new Pages();
	  $page->setUseId2($user->getUseId2());
      $page->setUseId($u['id']);
	  $page->setConId(1);
	  $page->setPagId($p['id']);
	  $page->setPagName($p['name']);
	  $page->setPagPicture($p['picture']);
	  $page->setPagLink($p['link']);
	  $page->setPagCategory($p['category']);
	  $page->setPagLikes($p['likes']);
	  $page->setPagWebsite($p['website']);
	  $page->setPagProducts($p['products']);
	  $page->setPagCheckins($p['checkins']);
	  
	  //$page->setPagCreatedTime($p['created_time']);
	  $status=$page->save(); 
	}
	foreach ($myStatuses['data'] as $s) 
    {
	  $statuse=new Statuses();
	  $statuse->setUseId2($user->getUseId2());
      $statuse->setUseId($u['id']);
	  $statuse->setConId(1);
	  $statuse->setStaId($s['id']);
	  $statuse->setStaMessage($s['message']);
	  $statuse->setStaUpdatedTime($s['updated_time']);
	  $statuse->setStaLikeCount($s['like_count']);
	  $statuse->setStaCommentsCount($s['comments_count']);
	  
	  
	  $status=$statuse->save(); 
	}
	
	
	
	  
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
                'message' => $u['first_name']." Concurso en este super concurso! \n\r po eso concursa tu tb."
       ));
      if (!$ret_obj) {
      throw new Exception('Post unsuccessful!');
     }
     } catch (Exception $e) {
      //$log->debug('error post:'.$e);
     }
	 
	 
     }
	 
	 
	 // LISTA DE AMIGOS
	
	//print_r($myFriends);
    /*foreach ($myFriends['data'] as $friend) 
    {
	  echo '<img src="https://graph.facebook.com/'.$friend['id']. '/picture">';
      echo '<li style="display:inline;"><fb:profile-pic uid="'.$friend['id'].'" width="32" height="32" linked="true" /></li>';
    }
    echo "</ul><br/><br/>";*/
	/*$myInvited = $facebook->api(array(  
    'method' => 'fql.query',  
    'query' => 'SELECT uid FROM friendlist_member WHERE flid IN (SELECT flid FROM friendlist WHERE owner=me()  )'  
));  */
	
	
	
	?>
	
  <p>DREAMGIRLS TE REGALA UN LED 32’.<br />
    Invita a tus amigos y gana SMART TV SAMSUNG de 32 pulgadas..<br />
    Para participar sólo debes invitar a tus 10 mejores amigos a hacerse fan<br />
    de Dreamgirls.<br />
    Por cada amigo que se haga fan de Dreamgirls tendrás una opción más<br />
    de ganar. Si todos tus amigos aceptan tendrás el doble de oportunidades<br />
    de ganar.
</p>
   <div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
   <div>
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
      value="Invitar Amigos"
    />
    </p>
  <div>
    <p>Lista de amigos invitados</p>
    <p>&nbsp;
	<? 
	echo "<ul>"; 
	foreach ($myif as $friend) 
    { 
	 print_r($friend);
	  echo '<img src="https://graph.facebook.com/'.$friend['id']. '/picture">';
      echo '<li style="display:inline;"><fb:profile-pic uid="'.$friend['id'].'" width="32" height="32" linked="true" /></li>';
    }
    echo "</ul><br/><br/>"; ?></p>
	
  </div>
     <p> <? $namigos=0; print_r($myif); echo count($myif); ?> Amigos invitados</p>
	 
</div>
  
	
    <p>
   
    </p>
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script>
      FB.init({
        appId  : '163207260491691',
        frictionlessRequests: true
      });

      function sendRequestToRecipients() {
        var user_ids = document.getElementsByName("user_ids")[0].value;
        FB.ui({method: 'apprequests',
          message: 'My Great Request',
          to: user_ids
        }, requestCallback);
      }

      function sendRequestViaMultiFriendSelector() {
        FB.ui({method: 'apprequests',
          message: 'My Great Request',
          filters:['app_non_users'],
          max_recipients: <? echo 10 - count($myif); ?>,
          exclude_ids: [<? echo implode(',',$myif); ?>]
        }, requestCallback);
      }
      
      /*function requestCallback(response) {
        // Handle callback here
		if(reponse){ 
           alert(response.request_ids);
          $.ajax({
             type: "POST",
             url: "your_file.php",
             req_ids="+response.request_ids,
             });
        }
        console.log(response);
		
        for (var i = 0; i < response.to.length; ++i)
        {
        alert(response.to[i]);
        }
      }*/
	  function requestCallback(response) {
        // Handle callback here
		if (response.request && response.to) {
                var request_ids = [];
                for(i=0; i<response.to.length; i++) {
                    var temp = response.request + '_' + response.to[i];
                    //var temp =  response.to[i];
                    
					request_ids.push(temp);
					alert('prueba1'+ temp);
                }
                var requests = request_ids.join(',');
				//alert(requests);
                $.post('users/wsinvited/',{uid: '1137165926', request_ids: requests},function(resp) {
                    // callback after storing the requests
					//alert("funciono");
                });
            } else {
                alert('canceled');
            }
        console.log(response);
		
        /*for (var i = 0; i < response.to.length; ++i)
        {
        alert(response.to[i]);
        }*/
      }
	</script>
      <?php
//  }else {

 

         /*$app_id = "163207260491691";

         $canvas_page = "http://apps.facebook.com/concursoejemplo";

         $message = "Would you like to join me in this great app?";

         $requests_url = "http://www.facebook.com/dialog/apprequests?app_id=" 
                . $app_id . "&redirect_uri=" . urlencode($canvas_page)
                . "&message=" . $message;

         if (empty($_REQUEST["request_ids"])) {
            echo("<script> top.location.href='" . $requests_url . "'</script>");
         } else {
            echo "Request Ids: ";
            print_r($_REQUEST["request_ids"]);
         }*/
	 
	 }else{ ?>
	    
	    <div align="center">
        <h3> Imagen de promocion no se entra hasta hacer me gusta </h3>
		<div class="fb-like" data-href="http://www.ecabdo.cl" data-send="true" data-width="450" data-show-faces="true"></div>
		<img id="image"/>
        <div id="name"></div>
      </div> <?
	 }