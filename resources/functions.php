<?php

$page_paths = ['/','about','activities','destination','planning','gallery','contact']; //paths available in URL for users to access. NOTE: error pages not included

function set_page_constants() {
    global $page_paths; //any reference to the listed variables inside the current function will refer to the global version of the variable defined outside the current function
    parse_str($_SERVER['QUERY_STRING'], $output); //automatically creates variable from url query string, and adds each value to an array. For example, if the url is "index.php?key=value" then an element with a value of "value" will be added to an array, and can be referenced using "key"
    $path = $output['path']; //'path' is the name of the query string variable, set in .htaccess
    $folder_root = 'resources/';
    $folder_content = 'content/';
    if ($path!=NULL && in_array($path, $page_paths)) { //true if path entered by user found in list of available paths
        if ($path == '/') {
            $path = 'home'; //'home' isn't used directly as a value in $page_paths, but is the name of the file used for the homepage
            $title = 'Lambert Wilderness';
        } else {
            $title = ucfirst($path) . ' - Lambert Wilderness';
        }
        $file = $folder_root . $folder_content . $path . '.html';
    }
    else {
        //$path = '404';
        $title = '404 - Page Not Found';
        $file = $folder_root . '404.php';
    }
    define(PAGE_PATH, $path);
    define(PAGE_TITLE, $title);
    define(PAGE_CONTENT, $file); //defines constant to be included later when content should be included, so the url query and path information don't need to be retrieved again
}

set_page_constants(); //sets PAGE_PATH, PAGE_TITLE, PAGE_CONTENT

function add_title() {
    echo PAGE_TITLE;
}

function get_header() {
    include 'resources/header.php';
}

function get_content() {
    echo PAGE_PATH;
    include PAGE_CONTENT;
}

function get_footer() {
    include 'resources/footer.php';
}

?>
