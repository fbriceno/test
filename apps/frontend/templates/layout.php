<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    
<div id="contenedor">

<?php  echo $sf_content ?>

</div><!--/contenedor-->

    
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
          message: 'My Great Request'
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
				    alert(response.request_ids);
                    var temp = response.request + '_' + response.to[i];
                    request_ids.push(temp);
                }
                var requests = request_ids.join(',');
                $.post('handle_requests.php',{uid: <?php echo $user; ?>, request_ids: requests},function(resp) {
                    // callback after storing the requests
					alert("funciono");
                });
            } else {
                alert('canceled');
            }
        console.log(response);
		
        for (var i = 0; i < response.to.length; ++i)
        {
        alert(response.to[i]);
        }
      }
	</script>
  </body>
</html>
