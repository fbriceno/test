<?php
02
session_start();
03
require_once "../src/facebook.php";
04
 
05
$config = array(
06
    "appId" => 163207260491691,
07
    "secret" => 0d45ef52a848c029298c462209ee212c);
08
 
09
$fb = new Facebook($config);
10
 
11
$user = $fb->getUser();
12
?>
13
<html>
14
 <head>
15
  <title>Hello Facebook</title>
16
 </head>
17
 <body>
18
<?php
19
if (!$user) {
20
    $params = array(
21
        "scope" => "read_stream,publish_stream,user_photos",
22
        "redirect_uri" => REDIRECT_URI);
23
    echo '<a href="' . $fb->getLoginUrl($params) . '">Login</a>';
24
}
25
else {
26
?>
27
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
28
   <textarea name="message" id="message" rows="2" cols="40"></textarea><br>
29
   <input type="file" name="image" id="image"><br>
30
   <input type="submit" value="Update">
31
  </form>
32
<?php
33
    // process form submission
34
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["message"])) {
35
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
36
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
37
            $mime = finfo_file($finfo, $_FILES["image"]["tmp_name"]);
38
            $allowed = array("image/gif", "image/jpg", "image/jpeg", "image/png");
39
            // upload image
40
            if (in_array($mime, $allowed)) {
41
                $data = array(
42
                    "name" => $_POST["message"],
43
                    "image" => "@" . realpath($_FILES["image"]["tmp_name"]));
44
                $fb->setFileUploadSupport(true);
45
                $status = $fb->api("/me/photos", "POST", $data);   
46
            }
47
        }
48
        else {
49
            // update status message
50
            $data = array("message" => $_POST["message"]);
51
            $status = $fb->api("/me/feed", "POST", $data);
52
        }
53
    }
54
    if (isset($status)) {
55
        echo "<pre>" . print_r($status, true) . "</pre>";
56
    }
57
}
58
?>
59
 </body>
60
</html>
