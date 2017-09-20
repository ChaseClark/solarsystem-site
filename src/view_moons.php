<?php 
$page_title = 'View the Moons';
include ('includes/header.html');

require_once ('../mysqli_connect.php');



$q = "SELECT * FROM moons ORDER BY moonID";		
$r = @mysqli_query ($dbc, $q);
$num = mysqli_num_rows($r);

echo '<h1>Moons in Database</h1>';
if ($num > 0) {

	echo "<p>There are currently $num moons in the database.</p>\n";

	echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	<tr><td align="left"><b>Moon Names</b></td></tr>
';
	
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['name'] . '</td></tr>
		';
	}

    echo '</table>';

 } else {

	echo '<p class="error">No results or database error.</p>';

}

mysqli_close($dbc);

include ('includes/footer.html');
?>