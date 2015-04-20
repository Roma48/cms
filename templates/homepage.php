<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php print $title; ?></title>
    <link rel="stylesheet" type="text/css" href="/templates/style.css"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body>

<header style="">
    <a href="/" style="float: left; text-decoration: none; width: 245px; display: table-cell; text-align: center" ><h2 style="color: #fff">Online Testing</h2></a>
    <a class="login" href="?action=login" style="float: right; margin-right: 50px; color: #ffffff; margin-top: 20px">Login</a>
</header>

<div id="content">
    <?php foreach($content as $article): ?>

            <article style="border: 1px dotted black">
                <h2><?php print $article['title']; ?></h2>

            </article>

    <?php endforeach; ?>
</div>

</body>
</html>