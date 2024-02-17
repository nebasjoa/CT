<?php
//header('Location: response.php');
/* Include the wrapper.php */
include("wrapper.php");     
//include("response.php"); 
 
/* Wrapper object creation */
$wrapper = new Wrapper("#686bcb5013c34462453c0f23a2e1989c4a9e3c7af5ef8ca5a35b2778b5973633#","bd6458096d3df2c8");


$wrapper->api_connect();
 
/* Parameters for disable link */
/* Make the request */
$wrapper -> api_put_method("links/disable","N3q3X");
/* Recover the response */
$response = $wrapper->get_message();
//print_r(json_decode($response, true));
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/main.css">
<title>Paytweak Sandbox</title>
</head>
<body>

<h1>Disable a link</h1>

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
