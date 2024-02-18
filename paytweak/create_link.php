<?php
//header('Location: response.php');
/* Include the wrapper.php */
include("wrapper.php");     
//include("response.php"); 
 
/* Wrapper object creation */
$wrapper = new Wrapper("#686bcb5013c34462453c0f23a2e1989c4a9e3c7af5ef8ca5a35b2778b5973633#","bd6458096d3df2c8");


$wrapper->api_connect();
 
/* Request Post Links */
/* Parameters for get links */
$tab = array(
 	"order_id" => rand(1000000,9000000) ,
 	"amount" => rand(100,1000),
	"email" => "nebojsa.pesic@computop.com"
);
/* Make the request */
$wrapper->api_post_method("links" , $tab);
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
<img src="img/logo_computop.svg" alt="Computop logo" width="300" height="200">
<h1>Create a link - response from Paytweak</h1>

<?php
echo "<table style='border-collapse: collapse; padding: 1px; margin-top: 10px;'>";
echo "<tr>";
echo "<th style='padding: 5px; text-align: left; border: 1px solid;'>Name</th>";
echo "<th style='padding: 5px; text-align: left; border: 1px solid;'>Description</th>";
echo "</tr>";
foreach (json_decode($response) as $x => $y) {
	echo "<tr>";
	echo "<td style='padding: 5px; text-align: left; border: 1px solid;'>$x</td>";
	echo "<td style='padding: 5px; text-align: left; border: 1px solid;'>$y</td>";
	echo "</tr>";
};
echo "</table>";
?>

</body>
</html>

<?php
// as per Paytweak API documentation, this needs to be ran after every request
$wrapper->api_disconnect();
?>
