<?php

session_start();

require_once "../src/facebook.php";

 

$config = array(

    "appId" => 163207260491691,

    "secret" => 0d45ef52a848c029298c462209ee212c);

 

$fb = new Facebook($config);

 

$user = $fb->getUser();

?>

<html>

 <head>

  <title>Hello Facebook</title>

 </head>

 <body>

<?php

if (!$user) {
    $params = array(
        "scope" => "read_stream,publish_stream,user_photos",
        "redirect_uri" => REDIRECT_URI);
    echo '<a href="' . $fb->getLoginUrl($params) . '">Login</a>';
}
else {
?>
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
   <textarea name="message" id="message" rows="2" cols="40"></textarea><br>
   <input type="file" name="image" id="image"><br>
   <input type="submit" value="Update">
  </form>

<?php
    // process form submission

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["message"])) {
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES["image"]["tmp_name"]);
            $allowed = array("image/gif", "image/jpg", "image/jpeg", "image/png");
            // upload image
            if (in_array($mime, $allowed)) {
                $data = array(
                    "name" => $_POST["message"],
                    "image" => "@" . realpath($_FILES["image"]["tmp_name"]));
                $fb->setFileUploadSupport(true);
                $status = $fb->api("/me/photos", "POST", $data);   
            }
        }
        else {
            // update status message

            $data = array("message" => $_POST["message"]);

            $status = $fb->api("/me/feed", "POST", $data);
        }
    }
    if (isset($status)) {
        echo "<pre>" . print_r($status, true) . "</pre>";
    }
}
?>
 </body>
</html>
