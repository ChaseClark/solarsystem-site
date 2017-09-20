<?php 
# Script 9.2 mysqli_connect.php Chase Clark

DEFINE ('DB_USER', 'solaruser');
DEFINE ('DB_PASSWORD', 'solar111');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'solarsystem');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
 OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

mysqli_set_charset($dbc, 'utf8');
?>