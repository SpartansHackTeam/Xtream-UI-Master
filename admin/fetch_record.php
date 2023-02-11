<?php


include "session.php";
include "functions.php";
$id = $_POST["rowid"];
$infos = getStreamProvider($id);
while ($row = mysqli_fetch_assoc($infos)) {
    $dns = $row["provider_dns"];
    $user = $row["username"];
    $pass = $row["password"];
}
$url = $dns . "/player_api.php?username=" . $user . "&password=" . $pass . "&type=m3u&output=mpegts";
$json = file_get_contents($url);
$array = json_decode($json);
foreach ($array as $key => $value) {
    echo "Status: " . $value->status . " </br> Max connections are : " . $value->max_connections . " </br> Using : " . $value->active_cons;
}

?>