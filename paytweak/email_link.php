<?php
//header('Location: response.php');
/* Include the wrapper.php */
include("wrapper.php");     
//include("response.php"); 
 
/* Wrapper object creation */
$wrapper = new Wrapper("#686bcb5013c34462453c0f23a2e1989c4a9e3c7af5ef8ca5a35b2778b5973633#","bd6458096d3df2c8");


$wrapper->api_connect();
 
/* Request Post Links */
/* Parameters for send email */
$post = array (
  "gender" => "Mr",
  "lastname" => "Pesic",
  "firstname" => "Nebojsa",
  "email" => "nebasjoa@gmail.com",
  "template" => "CFRMORD_EN",
  "order_id" => rand(1000000,9000000),
  "amount" => rand(10,200),
  "scenario" => "default",
  "lng" => "EN",
  "cur" => "EUR"
);
/* Make the request */
$wrapper->api_post_method("emails" , $post);
/* Recover the response */
$response = $wrapper->get_message();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/main.css">
<title>Paytweak Sandbox</title>
</head>
<body>

<h1>Create a link and send it via email</h1>

<?php
foreach (json_decode($response) as $x => $y) {
	echo "[$x] -> $y <br>";
};
?>

</body>
</html>

<?php
$wrapper->api_disconnect();
?>
