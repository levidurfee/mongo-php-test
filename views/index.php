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
$posts = new teklife\MongoPosts;
$posts->title = "Test title";
$posts->createPost();

$posts->getAllPosts()->orderPostsDesc()->limitPosts();
$i = 1;
echo "<pre>";
foreach ($posts->cursor as $document) {
    echo $i . "\t" . $document["_id"] . "\t" . $document["title"] . "\t" . $document["entry"] . "\t"
        . $document["created"] . "\r\n";
    $i++;
}
echo "</pre>";

?>
</body>
</html>
