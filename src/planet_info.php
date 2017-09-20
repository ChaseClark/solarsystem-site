<?php
$page_title = 'Planet Information';
include_once('includes/header.html');
require_once('../mysqli_connect.php');

$q = "SELECT * FROM planets WHERE planets.planetID =  " . $_GET['PID']."";
$r = @mysqli_query($dbc,$q);
$row = @mysqli_fetch_array($r,MYSQLI_ASSOC);
?>
<hr>
<h2><?=$row['name']?></h2>
<h4><em><?=$row['adjective']?></em></h4>
<h4><?=$row['type']?></h4>
<hr>
<h1>Statistics</h1>
<p style="font-size: 16px;">Distance: <?=$row['distance']?><br><br>
Number of Moons: <?=$row['satellites']?><br><br>
Diameter: <?=$row['diameter']?><br><br>
Mass: <?=$row['mass']?> times that of Earth.<br><br>
Rotation: <?=$row['rotation']?> hours<br><br>
Orbit: <?=$row['orbit']?> years<br><br>
Aphelion: <?=$row['aphelion']?> miles from the sun.<br><br>
Perihelion: <?=$row['perihelion']?> miles from the sun.
</p>
<hr>

<?= $row['description'] ?>
