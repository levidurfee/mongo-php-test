<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

define("DS", DIRECTORY_SEPARATOR);
require_once('..' . DS . 'vendor' . DS . 'autoload.php');

$mp = new teklife\MongoUsers;
$mp->username = 'levi';
$mp->password = 'notmyrealpasswordORisit?';
$mp->createUser();

$mp->getAllUsers();
var_dump($mp->cursor);
foreach ($mp->cursor as $document) {
    echo '<p>' . $document['username'] . ' | ' . $document['password'] . ' | ' . $document['randId'] . '</p>';
}