<?php 
$page_title = 'View the Terms';
include ('includes/header.html');

require_once ('../mysqli_connect.php');



$q = "SELECT * FROM terms ORDER BY termID";		
$r = @mysqli_query ($dbc, $q);
$num = mysqli_num_rows($r);

echo '<h1>Terms in Database</h1>';
if ($num > 0) {

	echo "<p>There are currently $num terms in the database.</p>\n";

    echo '<a id="insert" href="insert_term.php">Insert a new Term</a>';

	echo '<table align="center" cellspacing="10" cellpadding="10" border="1">
	<tr><td align="left"><b>Term:</b></td><td align="left"><b>Definition:</b></td></tr>
';
	
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left" bgcolor="blue" style="color:white">' . $row['term'] . '</td><td align="left" id="desc">' . $row['description'] . '</td></tr>
		';
	}

    echo '</table>';

 } else {

	echo '<p class="error">No results or database error.</p>';

}

mysqli_close($dbc);

include ('includes/footer.html');
?>