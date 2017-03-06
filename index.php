<html>

<?php include 'resources/functions.php'; ?>

    <head>
        <meta charset="utf-8">
        <title>
            <?php add_title();?>
        </title>
        <meta name="description" content="Lambert Wilderness Alaskan adventures. Offering guided base camp hiking tours in the Alaska Range.">
        <meta property="og:title" content="Lambert Wilderness">
        <meta property="og:type" content="website">
        <meta property="og:image" content="http://www.lambertwilderness.com/images/landscape-glacier2-200w-200h.jpg">
        <meta property="og:image:width" content="200">
        <meta property="og:image:height" content="200">
        <meta property="og:url" content="http://www.lambertwilderness.com/">
        <meta property="og:site_name" content="Lambert Wilderness">
        <meta property="og:description" content="Lambert Wilderness Alaskan adventures. Offering guided base camp hiking tours in the Alaska Range.">
        <!--        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/vendors/reset.css">
        <link rel="stylesheet" href="/vendors/normalize.css">
        <link rel="stylesheet" href="/main.css">
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet" type="text/css" media="all">
        <script type="text/javascript" src="/main.js" async></script>
    </head>

    <body>
        <div id="header">
            <?php get_header();?>
        </div>
        <div id="content">
            <?php get_content();?>
        </div>
        <div id="footer">
            <?php get_footer();?>
        </div>
    </body>

</html>
