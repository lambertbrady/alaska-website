<?php

//NAMING CONVENTIONS//

//functions are named in all lowercase
//functions are named using "_" to separate words
//functions beginning with "get" are used to include files
//functions beginning with "add" are used to echo html
//constants are named in all caps
//constants are named using "_" to separate words

//END NAMING CONVENTIONS

//VARIABLES//

$page_paths = ['about','activities','destination','planning','gallery','contact'];
//$page_paths = ['hey','contact'];
//paths available in URL for users to access
//NOTE: order of values in array determines order of items listed in header and footer navigation; error pages not included

//END VARIABLES//

//CONSTANTS//

function set_page_constants() {
    global $page_paths; //any reference to the listed variables inside the current function will refer to the global version of the variable defined outside the current function
    parse_str($_SERVER['QUERY_STRING'], $output); //automatically creates variable from url query string, and adds each value to an array. For example, if the url is "index.php?key=value" then an element with a value of "value" will be added to an array, and can be referenced using "key"
    $path = $output['path']; //'path' is the name of the query string variable, set in .htaccess
    $folder_root = 'resources/';
    $folder_content = 'content/';
    $file = $folder_root . $folder_content . $path . '.html';
    if ($path == '/') {
        $path = 'home'; //'home' is the name of the file used for the homepage
        $title = 'Lambert Wilderness';
        $file = $folder_root . $folder_content . $path . '.html';
    } else if (file_exists($file) && in_array($path, $page_paths)) { //true if file exists and path entered by user found in list of available paths
        $title = ucfirst($path) . ' | Lambert Wilderness';
    }
    else {
        $path = '404';
        $title = '404 - Page Not Found';
        $file = $folder_root . '404.php';
    }
    define(PAGE_PATH, $path);
    define(PAGE_TITLE, $title);
    define(PAGE_FILE, $file);
}

set_page_constants(); //sets PAGE_PATH, PAGE_TITLE, PAGE_FILE

//CONSTANTS//

//TITLE//

function add_title() {
    echo PAGE_TITLE;
}

//END TITLE//


//NAVIGATION//

$nav_list = '';

function add_nav_list() {
    global $page_paths, $nav_list;
    if ($nav_list == '') { //makes sure nav_list string is only put together once for each page load - this way the footer navigation can use the same variable as the header navigation
        foreach($page_paths as $path) {
            $nav_link = '/' . $path;
            $nav_text = ucfirst($path);
            $nav_list = $nav_list . '<li> <a href="'. $nav_link . '">' . $nav_text .  '</a> </li>';
        }
    }
    echo $nav_list;
}

//END NAVIGATION//

//HEADER//

function get_header() {
    include 'resources/header.php';
}

function add_hero_text() {
    switch(PAGE_PATH) {
        case "home":
            echo 'Welcome to the Wilderness';
            break;
        case "404":
            echo PAGE_TITLE;
            break;
        default:
            echo ucfirst(PAGE_PATH);
    }
}

function add_call_button() {
    switch (PAGE_PATH) {
        case "home":
            echo '<a href="#explore" class="btn-scroll btn-large btn"> Explore </a>';
            break;
        case "404":
            echo '<a href="/" class="btn-large btn"> Home </a>';
            break;
        default:
            break;
    }
}

//END HEADER//

//CONTENT//

function get_content() {
    include PAGE_FILE;
}

//END CONTENT//

//FOOTER//

function get_footer() {
    include 'resources/footer.php';
}

//END FOOTER//

?>
