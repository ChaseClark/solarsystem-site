<?php 
$page_title = 'View the Asteroid Types';
include ('includes/header.html');

require_once ('../mysqli_connect.php');



$q = "SELECT * FROM asteroid_type ORDER BY typeID";		
$r = @mysqli_query ($dbc, $q);
$num = mysqli_num_rows($r);

echo '<h1>Types in Database</h1>';
if ($num > 0) {

	echo "<p>There are currently $num types of asteroids in the database.</p>\n";

	echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	<tr><td align="left"><b>Name of Type</b></td></tr>
';
	
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['type_name'] . '</td></tr>
		';
	}

    echo '</table>';

 } else {

	echo '<p class="error">No results or database error.</p>';

}

mysqli_close($dbc);

include ('includes/footer.html');
?>