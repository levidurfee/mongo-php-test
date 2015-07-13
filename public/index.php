<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

date_default_timezone_set("America/New_York");

define("DS", DIRECTORY_SEPARATOR);
require_once('..' . DS . 'vendor' . DS . 'autoload.php');

$mp = new teklife\MongoUsers;
$mp->username = 'levi';
$mp->password = 'notmyrealpasswordORisit?';
$mp->createUser();

$mp->getAllUsers()->orderUsersDesc();
$i = 1;
echo "<pre>";
foreach ($mp->cursor as $document) {
    echo $i . "\t" . $document["_id"] . "\t" . $document["username"] . "\t" . $document["password"] . "\t"
        . $document["randId"] . "\t" . $document["created"] . "\r\n";
    $i++;
}
echo "</pre>";
