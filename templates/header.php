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
            <a href="/" style="float: left; text-decoration: none; width: 245px; display: table-cell; text-align: center" ><h2 style="color: #fff">Online Testing</h2></a>
            <a class="logout" href="?action=logout" style="float: right; margin-right: 50px; color: #ffffff; margin-top: 20px">Logout</a>
        </header>

        <div class="main-content">
            <aside>
                <h2>Tests</h2>
                <ul>
                    <li><a href="?action=add_article">Add test</a></li>
                    <li><a href="?action=list_article">List tests</a></li>

                </ul>
            </aside>
            <div class="content">
                <h2><?php print $title; ?></h2>

