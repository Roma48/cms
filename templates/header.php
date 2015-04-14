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

        <header>
            <a href="/" style="text-decoration: none; width: 245px; display: table-cell; text-align: center" ><h2 style="color: #fff">Online Testing</h2></a>
        </header>

        <div class="main-content">
            <aside>
                <h2>Articles</h2>
                <ul>
                    <li><a href="?action=add_article">Add article</a></li>
                    <li><a href="?action=list_article">List article</a></li>

                </ul>
            </aside>
            <div class="content">
                <h2><?php print $title; ?></h2>

