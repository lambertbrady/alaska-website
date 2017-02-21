<html>

<?php include 'functions.php';?>

    <head>
        <title>
            <?php get_title();?>
        </title>
        <link rel="stylesheet" href="/main.css">
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet" type="text/css" media="all">
        <script type="text/javascript" src="/main.js" async></script>
    </head>

    <body>
        <div id="header">
            <?php include 'header.php';?>
        </div>
        <div id="content">
            <?php get_content();?>
        </div>
        <div id="footer">
            <?php include 'footer.php';?>
        </div>
    </body>

</html>
