<?php 

$page_title = 'Insert Term Page';
include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require_once ('../mysqli_connect.php');
		
	$errors = array();

	if (empty($_POST['term_name'])) {
		$errors[] = 'You forgot to enter your term name.';
	} else {
		$tn = mysqli_real_escape_string($dbc, trim($_POST['term_name']));
	}
	

	if (empty($_POST['description'])) {
		$errors[] = 'You forgot to enter your definition.';
	} else {
		$d = mysqli_real_escape_string($dbc, trim($_POST['description']));
	}
	
	if (empty($errors)) {
		$q = "INSERT INTO terms (term,description) VALUES ('$tn', '$d')";		
		$r = @mysqli_query ($dbc, $q);
		if ($r) {
			echo '<h1>Thank you!</h1>
		<p>Your term was added to the database!</p><p><br /></p>';	
		} else {
			echo '<h1>System Error</h1>
			<p class="error">Your term was not added due to an error.</p>'; 

			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} 
		
		mysqli_close($dbc);

		include ('includes/footer.html'); 
		exit();
		
	} else {
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) {
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	}
	
	mysqli_close($dbc);

}
?>
<h1>Create a new Term:</h1>
<p><a href="view_terms.php">Go Back to Terms Page</a></p>
<form action="insert_term.php" method="post">
	<p>Term: <input type="text" name="term_name" size="15" maxlength="30" value="<?php if (isset($_POST['term_name'])) echo $_POST['term_name']; ?>" /></p>
	<p>Definition: <textarea name="description" rows="6" cols="40" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"> </textarea></p>
	<p><input type="submit" name="submit" value="Submit Term" /></p>
</form>
<?php include ('includes/footer.html'); ?>