<?php


include "functions.php";
if (!isset($_SESSION["hash"])) {
    header("Location: ./login.php");
    exit;
}
if ($rPermissions["is_admin"]) {
    $db->query("INSERT INTO `login_users`(`owner`, `type`, `login_ip`, `date`) VALUES(" . intval($rUserInfo["id"]) . ", '<b>[UserPanel]</b> -> Admin Logged Out', '" . ESC(getIP()) . "', " . intval(time()) . ");");
} else {
    $db->query("INSERT INTO `login_users`(`owner`, `type`, `login_ip`, `date`) VALUES(" . intval($rUserInfo["id"]) . ", '<b>[UserPanel]</b> -> Logged Out', '" . ESC(getIP()) . "', " . intval(time()) . ");");
}
session_destroy();
header("Location: ./login.php");

?>