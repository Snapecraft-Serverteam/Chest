<?php
error_reporting(E_PARSE);
//$pdo = new PDO('mysql:host=localhost;dbname=bw', 'root', '');

function getBWStats($name) {


   
$s = "'";

$sql = "SELECT * FROM stats_players WHERE name=".$s.$name.$s."";
//echo $sql;


$mysqli = new mysqli("localhost", "root", "", "bw");
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}
$id = 100;
$statement = $mysqli->prepare($sql);
$statement->bind_param('i', $id);
$statement->execute();
 
   return $statement->get_result();
}

 /*
echo '<link rel="stylesheet" type="text/css" href="css/table.css">';
echo '<table class="container"><thead></d><tr><th>Name</th><th>Kills</th><th>Tode</th><th>Siege</th><th>Niederlagen</th><th>Betten abgebaut</th><th>Score</th></thead></tr>';

echo '<tbody>';
while($row = $result->fetch_assoc()) {
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

echo '</tbody></table>';



//echo '<table><tr><th>Name</th><th>Kills</th><th>Tode</th><th>Siege</th><th>Niederlagen</th><th>Betten abgebaut</th><th>Score</th></tr>';
//print_r($pdo->query($sql));

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
}*/
//echo '</table>';

?>
