# Summary

This repository contains the code used for the website of Lambert Woodriver Camp LLC (LWC), http://www.lambertwilderness.com/, which offers wilderness tours in the Alaska Range. Everything is custom designed and built by Brady Lambert [(me)](https://github.com/lambertbrady) using CSS, HTML, JavaScript, and PHP. I'm also writing all of the content, and I've taken almost all of the photographs used on the site.

#Front End

The main goal of the site is to direct visitors to the Contact page, where they can comfortably and easily submit a form that gets them in touch with LWC. Once pricing, lodging, and other factors are set more firmly, I may add a schedule and cart allowing users to directly book tours on the site, as well.

### CSS

All styles are custom, with the exception of [reset.css](http://meyerweb.com/eric/tools/css/reset/) and [normalize.css](github.com/necolas/normalize.css). These files are included to get rid of browser inconsistencies, and can be found in the [vendors folder](../master/vendors/).

Everything else can be found in [main.css](../master/main.css), which is entirely custom.

Vendor prefixes should be included where necessary, but I have not yet included media queries to make the site responsive. I will add these once higher-priority phases of the project are complete.

I have done my best to use best practices and new technologies that can make styles more easily maintainable, while still functional in slightly older browsers. For example, I avoid the *float* property, which can have unintended and nonintuitive consequences if not cleared properly. I've also used *Flexbox* in places where more traditional layout options are not well-suited. The best example of this can be found in the *.gallery* preview section on the Home page, where I use stack two flex rows on top of each other. Images are then placed inside each row as flex items. The main advantage of this is that the width of each image can be easily calculated relative to one another. Instead of calculating percentages, I add a *flex-grow* value to each element. This strategy also lends itself to responsive design - I can easily change the *flex-flow* from row to column, and update the amount of space each element takes up, depending on screen resolution. *Flexbox* is a valuable tool for centering items, as well, especially vertically. Rather than the standard hack of moving elements up and then adding the *transform* property, I have added a *.flex-spacer* class to easily center items. This strategy is used in the *#header* section, for example, to vertically center the *.hero-text* element.

### JavaScript

All JavaScript can be found in [main.js](../master/main.js).

Currently, the only JavaScript being used is for a custom smooth-scroll button, which is used on the [Home page](http://www.lambertwilderness.com/) for the "Explore" call to action button. 

#Back End

### Hosting

The website is currently hosted on [000webhost](https://www.000webhost.com/), but I will be moving it to [BlueHost](https://www.bluehost.com/) as soon as possible, due to some file transfer protocol (FTP) difficulties. Once hosting is updated, I will set up a PHP contact form and integrate it with MySQL to securely gather user-submitted information. Eventually, the goal is to set up email notifications, as well.

### .htaccess

