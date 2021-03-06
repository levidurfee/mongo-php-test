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
<?php
$mp = new teklife\MongoUsers;
$posts = new teklife\MongoPosts;
?>
<h1>Testing MongoDB with PHP</h1>

<h2>Users</h2>
<?php
$mp->username = 'levi' . mt_rand(0, 999999);
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
<h3><?php echo $mp->getNumUsers(); ?> total users</h3>
<hr>

<h2>Posts</h2>
<?php
$posts->title = "Test title";
$posts->createPost($document["_id"]);

$posts->getAllPosts()->orderPostsDesc()->limitPosts();
$i = 1;
echo "<pre>";
foreach ($posts->cursor as $document) {
    echo $i . "\t" . $document["_id"] . "\t" . $document["title"] . "\t" . $document["entry"] . "\t"
        . $document["created"] . "\t" . $mp->getUsername($document["uid"]) . "\r\n";
    $i++;
}
echo "</pre>";
?>
<h3><?php echo $posts->getTotalPosts(); ?> total posts</h3>

<h2>Code</h2>
<p>View the code for this site on <a href="https://github.com/levidurfee/mongo-php-test" target="_BLANK">GitHub</a>.</p>
</body>
</html>
