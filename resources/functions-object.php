<?php

class Page {
    private $page_paths = ['/','about','activities','destination','planning','gallery','contact'];
    //paths available in URL for users to access. NOTE: error pages not included
    public $path;
    public $title;
    public $content;
    function __construct() {
        parse_str($_SERVER['QUERY_STRING'], $output);
        //automatically creates variable from url query string, and adds each value to an array. For example, if the url is "index.php?key=value" then an element with a value of "value" will be added to an array, and can be referenced using "key"
        $path = $output['path'];
        //'path' is the name of the query string variable, set in .htaccess
        $folder_root = 'resources/';
        $folder_content = 'content/';
        if ($path!=NULL && in_array($path, $this->page_paths)) {
            //true if path entered by user found in list of available paths
            if ($path == '/') {
                $path = 'home';
                //'home' isn't used directly as a value in $page_paths, but is the name of the file used for the homepage
                $title = 'Lambert Wilderness';
            } else {
                $title = ucfirst($path) . ' - Lambert Wilderness';
            }
            $file = $folder_root . $folder_content . $path . '.html';
        }
        else {
            $path = '404';
            $title = '404 - Page Not Found';
            $file = $folder_root . '404.php';
        }
        $this->path = $path;
        $this->title = $title;
        $this->content = $file;
    }
}

$page = new Page();


function add_title() {
    global $page;
    echo $page->title;
}


function add_navigation() {
    //
}

//HEADER//

function get_header() {
    include 'resources/header.php';
}

function add_hero_text() {
    global $page;
    switch($page->path) {
        case "home":
            echo 'Welcome to the Wilderness';
            break;
        case "404":
            echo $page->title;
            break;
        default:
            echo ucfirst($page->path);
    }
}

function add_call_button() {
    global $page;
    switch ($page->path) {
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
    global $page;
    include $page->content;
}

//END CONTENT//

//FOOTER//

function get_footer() {
    include 'resources/footer.php';
}

//END FOOTER//

?>
