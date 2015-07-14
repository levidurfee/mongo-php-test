<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>6c657669 test site</title>
    <meta name="description" content="6c657669 test site">
    <meta name="author" content="Levi Durfee">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<?php
$mp = new teklife\MongoUsers;
$mp->username = 'levi';
$mp->password = 'notmyrealpasswordORisit?';
$mp->createUser();

$mp->getAllUsers()->orderUsersDesc()->limitUsers();
$i = 1;
echo "<pre>";
foreach ($mp->cursor as $document) {
    echo $i . "\t" . $document["_id"] . "\t" . $document["username"] . "\t" . $document["password"] . "\t"
        . $document["randId"] . "\t" . $document["created"] . "\r\n";
    $i++;
}
echo "</pre>";

?>
</body>
</html>
