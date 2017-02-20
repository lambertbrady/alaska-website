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
            $page_arr = ['/','about','activities','destination','planning','gallery','contact']; //paths available in URL for users to access
            $page_ext = '.html';
            parse_str($_SERVER['QUERY_STRING'], $output); //automatically creates variable from url query string, and adds each value to an array. For example, if the url is "index.php?key=value" then an element with a value of "value" will be added to an array, and can be referenced using "key"
            $path = $output['path']; //'path' is the name of the query string variable, set in .htaccess
            $error = $output['error']; //'error' is the name of the query string variable, set in .htaccess
            if ($error != NULL) {
                include '404.php';
            }
            else if (in_array($path, $page_arr)) { //path entered by user found in list of available paths
                if ($path == '/') {
                    $path = 'home'; //"home" isn't used directly as a value in $page_arr so
                }
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
