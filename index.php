<html>

<head>
    <!--    MAKE DYNAMIC "*page-title* - Lambert Wilderness" -->
    <!--    <title> Lambert Wilderness </title>-->
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="main.js" async></script>
</head>

<body>
    <div id="header">
        <?php include 'header.php';?>
    </div>
    <div id="content">
        <?php
            $folder = 'content/';
//            $path = $_SERVER['REQUEST_URI'];
        parse_str($_SERVER['QUERY_STRING'], $output);
        //automatically creates variable from url query string, and adds each value to an array. For example, if the url is "index.php?path=example" then a variable "$path" will be created and set equal to "example" within an array.
        $path = $output['path']; //'path' is the name of the wuery string variable, set in .htaccess
        echo 'path = ' . $path;
        $test = $output['test'];
        echo '////';
        echo 'test = ' . $test;
// if ($path == '' | $path == '/' | $path == 'home') { // $content = $folder . 'home.html'; // } elseif (file_exists($folder . $path)) { // $content = $folder . $path; // } else{ // http_response_code (404); // $content = '404.php'; // } // include $content;
        ?>
    </div>
    <div id="footer">
        <?php include 'footer.php';?>
    </div>
</body>

</html>
