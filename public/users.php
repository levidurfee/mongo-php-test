<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

date_default_timezone_set("America/New_York");

define("DS", DIRECTORY_SEPARATOR);
require_once('..' . DS . 'vendor' . DS . 'autoload.php');

require_once('..' . DS . 'views' . DS . 'users.php');