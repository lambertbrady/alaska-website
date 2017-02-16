<html>

<head>
    <!--    MAKE DYNAMIC "*page-title* - Lambert Wilderness" -->
    <!--    <title> Lambert Wilderness </title>-->
    <link rel="stylesheet" href="/main.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="/main.js" async></script>
</head>

<body>
    <div id="header">
        <?php include 'header.php';?>
    </div>
    <div id="content">
        <?php
//        use "get_content()"
            $folder = 'content/';
            $page_arr = ['home','about','activities','destination','planning','gallery','contact'];
            $page_ext = '.html';
            echo $_SERVER['QUERY_STRING'] . ' | ';
            parse_str($_SERVER['QUERY_STRING'], $output); //automatically creates variable from url query string, and adds each value to an array. For example, if the url is "index.php?path=example" then a variable "$path" will be created and set equal to "example" within an array.
            $path = $output['path']; //'path' is the name of the query string variable, set in .htaccess
//            echo 'hey: ' . count($path);
            if ($path == NULL) {
                include $folder . 'home'. $page_ext;
            } else if (in_array($path,$page_arr)) {
                include $folder . $path . $page_ext;
            } else {
                include '404.php';
            }
        ?>
    </div>
    <div id="footer">
        <?php include 'footer.php';?>
    </div>
</body>

</html>
