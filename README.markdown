Windex - Minimalist Styled Directory Listings
===============================================

**v1.0**

Windex uses PHP and Apache to style default directory listing pages. It works directly with Apache's built-in directory mechanism. 

Authors
-------

* [Scott Evans](http://antisleep.com)
* [David DeSandro](http://desandro.com)


Features
--------

* __Clean, minimally styled directory listings.__ Windex comes with two lovely themes, screen-castro.css mimics Firefox's local index view, screen-waldemar.css mimics Opera's. Add your own theme by creating another css file and linking to in header.php.
* __iPhone-optimized view.__
* __Nice default icons.__
* __README file contents parsed and appended to pages.__ Windex looks for README files and adds them to index pages. It will parse documents marked up with Textile (README.textile) or Markdown (README.markdown, README.md). This option can be disabled in config.php.

Installation
------------

1. Copy this entire directory into your site's directory tree. For instance, if your site's files are in /www/mysite.com, place this directory in /www/mysite.com/windex.

2. Edit windex/config.php and change any configuration options.

3. Copy and paste the contents of main.htaccess into a file named .htaccess in your site's root directory. DO NOT overwrite the contents of the previous .htaccess, as this code is essential to any CMS you may be running. Instead, add the code from main.htaccess after the previous code. NOTE: it helps to know what you're doing before doing this.  The supplied htaccess file may end up overriding some of your site's configuration and causing weird behavior. So understand what you're doing here, and merge your existing directory config with the contents of main.htaccess.

4. Try it out!  Browse to a directory that does not contain an index file.

License
-------

This software is free to use and modify.  You may not charge for or sell this software, nor any derivation of it. If you do modify it, we would love to hear about it. Give us a holler and let us know.

Changelog
---------

* **v1.0** Original release

Windex is a mod of [Indices](http://antisleep.com/indices/), originally developed by Scott Evans.