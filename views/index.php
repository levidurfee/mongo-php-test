<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>6c657669 test site</title>
    <meta name="description" content="6c657669 test site">
    <meta name="author" content="Levi Durfee">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<h1>Testing MongoDB with PHP</h1>

<h2>Users</h2>
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

<h2>Posts</h2>
<?php
$posts = new teklife\MongoPosts;
$posts->title = "Test title";
$posts->createPost($document["_id"]);

$posts->getAllPosts()->orderPostsDesc()->limitPosts();
$i = 1;
echo "<pre>";
foreach ($posts->cursor as $document) {
    echo $i . "\t" . $document["_id"] . "\t" . $document["title"] . "\t" . $document["entry"] . "\t"
        . $document["created"] . "\t" . $document["uid"] . "\r\n";
    $i++;
}
echo "</pre>";
?>
</body>
</html>
