<?php
// Require API by MineTheCube (https://github.com/MineTheCube/MojangAPI)
require 'mojang-api.class.php';


function isAv($player) {
if(MojangAPI::getUuid($user) == false) {
    return false;
} else {
    return true;
}
}
$user
