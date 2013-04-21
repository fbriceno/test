<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:fb="https://www.facebook.com/2008/fbml">
  <head>
    <title>Request Example</title>
  </head>

  <body>
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

if ($like_status) {
      echo("nofan.php");

}

else {
      echo("fan.php");

}
	
	?>
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
          filters:['app_non_users']
        }, requestCallback);
      }
      
      function requestCallback(response) {
        // Handle callback here
        if (response && response.request_ids) {
        // response.request_ids is what you need
           alert(response.request_ids)
        } else {
           alert('canceled');
        }
      }
    </script>
  </body>
</html>