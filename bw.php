<?php

$pdo = new PDO('mysql:host=localhost;dbname=bw', 'bw', '');

$sql = "SELECT * FROM stats_players WHERE name=".$_GET['p'];
$stats = array();

echo '<table><tr><th>Name</th><th>Kills</th><th>Tode</th><th>Siege</th><th>Niederlagen</th><th>Betten abgebaut</th><th>Score</th></tr>';

foreach ($pdo->query($sql) as $row) {
   echo '<tr>';
   echo '<th>'.$row['name'].'</th>';
   echo '<th>'.$row['kills'].'</th>';
   echo '<th>'.$row['deaths'].'</th>';
   echo '<th>'.$row['wins'].'</th>';
   echo '<th>'.$row['loses'].'</th>';
   echo '<th>'.$row['destroyedBeds'].'</th>';
   echo '<th>'.$row['score'].'</th>';
   echo '</tr>';
}
echo '</table>';

?>