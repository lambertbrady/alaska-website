# Summary

This repository contains the code used for the website of Lambert Woodriver Camp LLC (LWC), [lambertwilderness.com](http://www.lambertwilderness.com/), which offers wilderness tours in the Alaska Range. Everything is custom designed and built by Brady Lambert [(me)](https://github.com/lambertbrady) using CSS, HTML, JavaScript, and PHP. I'm also writing all of the content, and I've taken almost all of the photographs used on the site.

# Front End

The main goal of the site is to direct visitors to the Contact page, where they can comfortably and easily submit a form that gets them in touch with LWC. Once pricing, lodging, and other factors are set more firmly, I may add a schedule and cart allowing users to directly book tours on the site, as well.

### CSS

All styles are custom, with the exception of [reset.css](http://meyerweb.com/eric/tools/css/reset/) and [normalize.css](github.com/necolas/normalize.css). These files are included to get rid of browser inconsistencies, and can be found in the [vendors folder](../master/vendors/).

Everything else can be found in [main.css](../master/main.css), which is entirely custom. Vendor prefixes should be included where necessary, but I have not yet included media queries to make the site responsive. I will add these once higher-priority phases of the project are complete.

I have done my best to use best practices and new technologies that can make styles more easily maintainable, while still functional in slightly older browsers. For example, I avoid the *float* property, which can have unintended and nonintuitive consequences if not cleared properly.

#### Flexbox

I've also used *Flexbox* in places where more traditional layout options are not well-suited. The best example of this can be found in the *.gallery* preview section on the Home page, where I stack two flex rows on top of each other. Images are then placed inside each row as flex items. The main advantage of this is that the width of each image can be easily calculated relative to one another. Instead of calculating percentages, I add a *flex-grow* value to each element. This strategy also lends itself to responsive design - I can easily change the *flex-flow* from row to column, and update the amount of space each element takes up, depending on screen resolution.

*Flexbox* is a valuable tool for centering items, as well, especially vertically. Rather than the standard hack of moving elements up and then adding the *transform* property, I have added a *.flex-spacer* class to easily center items. This strategy is used in the *#header* section, for example, to vertically center the *.hero-text* element. This works especially well because it allows for other elements, such as *.call-button*, to be included dynamically for certain pages, without having to overwrite styles. See the [Home page](http://www.lambertwilderness.com/) and [404 page](http://www.lambertwilderness.com/404) for examples.

### JavaScript

All JavaScript can be found in [main.js](../master/main.js).

#### Smooth Scroll Button

Currently, the Smooth Scroll Button is used only on the [Home page](http://www.lambertwilderness.com/) for the "Explore" call to action button, but it can be added to any desired page by including the *.btn-scroll* class. An element with this class must also have an anchor tag associated with the id for the desired target element. For example, a scroll button would have markup with the format *\<a href="#target-id" class="btn-scroll">Button Text\</a>*, where *#target-id* refers to the id of the element that should be scrolled to.

Normally, clicking this anchor would jump the page down to the target element. However, this default behavior is prevented, so that when a click event is registered on the button the *animateScroll()* function is called. This function takes as an argument the current distance of the target element from the top of the viewport, in order to determine the *scrollDirection* (whether the page should be scrolled up, down, or not at all) and the *scrollDistance* (in pixels).

# Back End

### Hosting

The website is currently hosted on [000webhost](https://www.000webhost.com/), but I will be moving it to [BlueHost](https://www.bluehost.com/) as soon as possible, due to some file transfer protocol (FTP) difficulties. Once hosting is updated, I will set up a PHP contact form and integrate it with MySQL to securely gather user-submitted information. Eventually, the goal is to set up email notifications, as well.

### .htaccess

The .htaccess configuration files (Apache) are used to handle all URL requests by using [Rewrite Rules and Conditions](http://httpd.apache.org/docs/2.0/mod/mod_rewrite.html#rewriterule) to send everything through [index.php](../master/index.php) in the root directory. In general, the files clean up a requested URL (e.g., removing trailing slashes), and serve it to index.php, adding the initial path entered by the user to a query string. The user will not see the URL change, but the URL will be served internally to */index.php?path=path_entered*. This way, index.php can use the query string to decide what content should be loaded. There are a few exceptions.

For example, if a user directly enters */index.php* as a path, they will be automatically served to the file. However, since there isn't any query string, logic set up in index.php will load content for the 404 page. If a user enters a path with the form */index.php?query_entered*, then they will be permanently redirected using a 301 to index.php with the query string removed. As a result, index.php will again load 404 content.

In other words, the goal is to handle all URLs so they go through index.php, while making sure direct requests to internal files or directories - including index.php itself - give a 404. This is the idea behind MVC, where the logic that determines allowed URL paths is kept separate from the logic used to define paths of internal files and directories. Rather than building an entire MVC implementation of my own, however (this project is small enough where it doesn't make sense to do so), I decided to handle it all with .htaccess and index.php.

The main barrier to making this work was the fact that every new URL gets [checked against the rewrite conditions](http://httpd.apache.org/docs/2.2/rewrite/tech.html) and there is no way to tell whether the URL is from the value typed into a browser's URL bar by the user, or if it has been rewritten by the .htaccess file itself. The root directory .htaccess file handles most cases (notes describing each rule can be found in [the file's comments](../master/.htaccess)).

However, there is one [additional .htaccess file](../master/resources/.htaccess) that can be found in the [*resources*](../master/resources) folder, where I have placed PHP files that don't need to be in the root directory. All content lives here, along with PHP functions, and the header and footer. The .htaccess file rules are applied to everything in their own directory, including all subdirectories, so this file affects everything in *resources*. It simply denys access (403) if a request is made to any of these files (for example, */resources/header.php*). Since *resources* is a subdirectory of the root directory, the root directory .htaccess rules then come into play, where I have included a rule to handle 403 errors with */index.php?path=403*. Thus, logic in index.php can handle the new internal request based on the rewritten query string.

### index.php

