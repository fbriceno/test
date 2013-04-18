<?php
   $app_id = '163207260491691';
   $app_secret = '0d45ef52a848c029298c462209ee212c';
   $app_url = 'YOUR_APP_URL';

  // The Achievement URL
  $achievement = 'YOUR_ACHIEVEMENT_URL';
  $achievement_display_order = 1;

  // The Score
  $score = 'YOUR_SCORE';

  // Authenticate the user
  session_start();
  if(isset($_REQUEST["code"])) {
     $code = $_REQUEST["code"];
  }

  if(empty($code) && !isset($_REQUEST['error'])) {
    $_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
    $dialog_url = 'https://www.facebook.com/dialog/oauth?' 
      . 'client_id=' . $app_id
      . '&redirect_uri=' . urlencode($app_url)
      . '&state=' . $_SESSION['state']
      . '&scope=publish_actions';

    print('');
    exit;
  } else if(isset($_REQUEST['error'])) { // The user did not authorize the app
    print($_REQUEST['error_description']);
    exit;
  };

  // Get the User ID
  $signed_request = parse_signed_request($_POST['signed_request'], $app_secret);
  $uid = $signed_request['user_id'];

  // Get an App Access Token
  $token_url = 'https://graph.facebook.com/oauth/access_token?'
    . 'client_id=' . $app_id
    . '&client_secret=' . $app_secret
    . '&grant_type=client_credentials';

  $token_response = file_get_contents($token_url);
  $params = null;
  parse_str($token_response, $params);
  $app_access_token = $params['access_token'];
  
  // Register an Achievement for the app
  print('Register Achievement:

');
  $achievement_registration_URL = 'https://graph.facebook.com/' . $app_id 
      . '/achievements';
  $display_order = '1';
  $achievement_registration_result = https_post($achievement_registration_URL,
    'achievement=' . $achievement
      . '&display_order=' . $achievement_display_order
      . '&access_token=' . $app_access_token
  );
  print('



');

  // POST a user achievement
  print('Publish a User Achievement

');
  $achievement_URL = 'https://graph.facebook.com/' . $uid . '/achievements';
  $achievement_result = https_post($achievement_URL,
    'achievement=' . $achievement
    . '&access_token=' . $app_access_token
  );
  print('



');

  // POST a user score
  print('Publish a User Score

');
  $score_URL = 'https://graph.facebook.com/' . $uid . '/scores';
  $score_result = https_post($score_URL,
    'score=' . $score
    . '&access_token=' . $app_access_token
  );
  print('



');

  function https_post($uri, $postdata) {
    $ch = curl_init($uri);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }

  function parse_signed_request($signed_request, $secret) {
    list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

    // decode the data
    $sig = base64_url_decode($encoded_sig);
    $data = json_decode(base64_url_decode($payload), true);

    if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
      error_log('Unknown algorithm. Expected HMAC-SHA256');
      return null;
    }

    // check sig
    $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
    if ($sig !== $expected_sig) {
      error_log('Bad Signed JSON signature!');
      return null;
    }

    return $data;
  }

  function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_', '+/'));
  }

?>