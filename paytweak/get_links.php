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
$tab = array("month" => "02", "year" => "2024");
/* Make the request */
$wrapper -> api_get_method("links",$tab);
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
<img src="img/logo_computop.svg" alt="Computop logo" width="300" height="200">
<h1>Get links - response from Paytweak</h1>

<?php
echo "<table style='border: 1px solid; padding: 10px;'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Link URL</th>";
echo "<th>Active</th>";
echo "<th>Paid</th>";
echo "</tr>";

foreach (json_decode($response, true) as $x => $y) {
	echo "<tr>";
	echo "<td>$x</td>";
	echo "<td><a style='color: #a5f729' href='$y[link_url]'>Pay</a></td>";
	echo "<td>$y[active]</td>";
	echo "<td>$y[paid]</td>";
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
