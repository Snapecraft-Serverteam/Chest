<?php
/**
 * User: tallerik
 * Date: 2019-02-05
 * Time: 22:10
 */


/**
 * Returns all data
 * @param $uuid
 * @return array
 */
function getData($uuid) {
    //include 'uuid.php';
    $out = array();
    $out["bw"] = getBWStats(format_uuid($uuid));
    $out["ban"] = getBans(format_uuid($uuid));
    //$out["execBans"] = getExecBans(format_uuid($uuid));
    $out["pt"] = getPlaytime(format_uuid($uuid));
    $out["online"] = getOnline(uuid_to_username($uuid));
    //print_r($out);
    return $out;
}


/**
 * @param $uuid
 * @return mixed
 */
function getBWStats($uuid) {
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "bw";

    $s = "'";
    $sql = "SELECT * FROM bw4x2stats_players WHERE uuid=".$s.$uuid.$s.";";
    $mysqli = new mysqli($host, $user, $pw, $db);
    if ($mysqli->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }

    $statement = $mysqli->prepare($sql);
    //$statement->bind_param('i', $id);
    $statement->execute();

    return $statement->get_result()->fetch_array(MYSQLI_BOTH);
}

/**
 * @param $uuid
 * @return mixed
 */
function getBans($uuid) {
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "bans";

    $s = "'";
    $sql = "SELECT * FROM bannedplayers WHERE uuid=".$s.$uuid.$s.";";
    $mysqli = new mysqli($host, $user, $pw, $db);
    if ($mysqli->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }

    $statement = $mysqli->prepare($sql);
    //$statement->bind_param('i', $id);
    $statement->execute();

    return $statement->get_result()->fetch_array(MYSQLI_BOTH);

}

/**
 * @param $uuid
 * @return mixed
 */
function getExecBans($uuid) {
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "bans";

    $s = "'";
    $sql = "SELECT * FROM bannedplayers WHERE bannedBy=".$s.$uuid.$s.";";
    $mysqli = new mysqli($host, $user, $pw, $db);
    if ($mysqli->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }
    $statement = $mysqli->prepare($sql);
    //$statement->bind_param('i', $id);
    $statement->execute();

    return $statement->get_result()->fetch_array(MYSQLI_BOTH);

}

/**
 * @param $uuid
 * @return mixed
 */
function getPlaytime($uuid) {
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "playtimetracker";


    $servers = array();
    $out = array();

    $pdo = new PDO('mysql:host=localhost;dbname=playtimetracker', 'root', '');
    $sql = "SHOW TABLES";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $tables = $statement->fetchAll(PDO::FETCH_NUM);
    foreach($tables as $table){
        //Print the table name out onto the page.
        array_push($servers, $table[0]);
    }


    foreach ($servers as $server) {
        $s = "'";
        $sql = "SELECT * FROM ". $server ." WHERE player=".$s.$uuid.$s.";";
        $mysqli = new mysqli($host, $user, $pw, $db);
        if ($mysqli->connect_errno) {
            die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
        }
        $statement = $mysqli->prepare($sql);
        //$statement->bind_param('i', $id);
        $statement->execute();
        $out[$server] = $statement->get_result()->fetch_array(MYSQLI_BOTH);
        $out[$server]["name"] = $server;
    }
    return $out;


}

function getOnline($name) {
    $req = file_get_contents("http://localhost:8000/isplayeronline?player=$name");
    $data = json_decode($req, true);
    return $data;
}