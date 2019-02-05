<?php
/**
 * User: tallerik
 * Date: 2019-02-05
 * Time: 22:10
 */


function getData($uuid) {
    //include 'uuid.php';
    $out = array();
    $out["bw"] = getBWStats(format_uuid($uuid));
    $out["ban"] = getBans(format_uuid($uuid));
    $out["execBans"] = getExecBans(format_uuid($uuid));
    //print_r($out);
    return $out;
}


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
    $id = 100;
    $statement = $mysqli->prepare($sql);
    //$statement->bind_param('i', $id);
    $statement->execute();

    return $statement->get_result()->fetch_array(MYSQLI_BOTH);
}

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
    $id = 100;
    $statement = $mysqli->prepare($sql);
    //$statement->bind_param('i', $id);
    $statement->execute();

    return $statement->get_result()->fetch_array(MYSQLI_BOTH);

}

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
    $id = 100;
    $statement = $mysqli->prepare($sql);
    //$statement->bind_param('i', $id);
    $statement->execute();

    return $statement->get_result()->fetch_array(MYSQLI_BOTH);

}