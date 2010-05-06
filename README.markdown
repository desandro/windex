Mindexes - Minimalist Styled Directory Listings
===============================================

**v1.0**

Mindexes uses PHP and Apache to style default directory listing pages. It works directly with Apache's built-in directory mechanism. 

Authors
-------

* [Scott Evans](http://antisleep.com)
* [David DeSandro](http://desandro.com)


Features
--------

* Clean, minimally styled directory listings
* iPhone-optimized view
* Nice default icons
* README file contents parsed and appended to pages

Installation
------------

1. Copy this entire directory into your site's directory tree. For instance, if your site's files are in /www/mysite.com, place this directory in /www/mysite.com/mindexes.

2. Edit mindexes/config.php and change any configuration options.

3. Copy and paste the contents of main.htaccess into a file named .htaccess in your site's root directory. DO NOT overwrite the contents of the previous .htaccess, as this code is essential to any CMS you may be running. Instead, add the code from main.htaccess after the previous code. NOTE: it helps to know what you're doing before doing this.  The supplied htaccess file may end up overriding some of your site's configuration and causing weird behavior. So understand what you're doing here, and merge your existing directory config with the contents of main.htaccess.

4. Try it out!  Browse to a directory that does not contain an index file.

License
-------

This software is free to use and modify.  You may not charge for or sell this software, nor any derivation of it. (if you do modify it, please drop me a line and let me know.)

Changelog
---------

* **v1.0** Original release

Mindexes is a mod of [Indices](http://antisleep.com/software/indices), originally developed by Scott Evans.