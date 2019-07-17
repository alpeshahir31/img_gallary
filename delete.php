<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli( "localhost:3308", "root", "", "testing" );
// Check connection
	if ( $mysqli === false ) {
	die( "ERROR: Could not connect. " . $mysqli->connect_error );
}

if(isset($_GET['del'])){
	$id = $_GET['del'];
	$sql1 = "DELETE FROM product WHERE product_id='$id'";
	$res = $mysqli->query($sql1) or die ("Failed");
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}	

?>

