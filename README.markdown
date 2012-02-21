Windex - For a bright, shiny index
==================================

Windex uses PHP and Apache to style default directory listing index pages. It works directly with Apache's built-in directory mechanism.

Check it out! [desandro.com/demo/of-windex/](http://desandro.com/demo/of-windex/)

Authors
-------

* [Scott Evans](http://antisleep.com)
* [David DeSandro](http://desandro.com)


Features
--------

* **Styled directory listings.** Windex comes with three lovely themes. Add your own theme by creating another CSS file and linking to in _header.php_.
* **Mobile-optimized view.** Shrink any browser to less than 480 pixels wide and you'll have a theme tailored specifically for mobile devices, perfect for the iPhone.
* **Nice default icons.**
* **README file contents parsed and appended to pages.** Windex looks for README files and adds them to index pages. It will parse documents marked up with Textile (_README.textile_) or Markdown (_README.markdown_, _README.md_, _README.mdown_). This option can be disabled in config.php.

Windex themes make liberal use of CSS3. Viewing experiences in legacy browsers may differ.

HEADS UP
--------

**Enabling directory indexes on a live site can be a serious security risk. Be sure to to install Windex only where you want the child files and folders to be viewable.**

Installation
------------

1. Copy the entire windex folder into your site's directory tree. For instance, if your site's files are in _/www/mysite.com_, upload this folder to be _/www/mysite.com/windex_.

2. Edit windex/config.php and change any configuration options. 

3. If your server runs PHP5, you'll need to change to line 4 of _windex/.htaccess_ to `AddHandler application/x-httpd-php5 .php`.

4. Copy and paste the contents of _windex.htaccess_ into a file named _.htaccess_ in the directory where you want to enable Windex. See more on .htaccess below.

5. Try it out!  Browse to a directory that does not contain an index file.

So, to enable Windex on _mysite.com/files_, your site structure would look like:

    mysite.com/
      |
      |-files/
      | |
      | |-.htaccess (has contents of windex.htaccess)
      |
      |-windex/

.htaccess
---------

If you wish to enable Windex in _/www/mysite.com/windex/files_, you would add the contents _windex.htaccess_ to be in _/www/mysite.com/windex/files/.htaccess_.  If there already is an _.htaccess_ file, DO NOT overwrite the contents, as this code is essential to any CMS you may be running. Instead, add the code from _windex.htaccess_ after the previous code. _.htaccess_ is a hidden configuration file. If this file does not exist you can upload _windex.htaccess_ and then rename it as _.htaccess_.

If you'd rather not have the windex folder sitting at the top of your site, you'll need to change the filepaths in _config.php_, all image URLs in the CSS files, and any _.htaccess_ file derived from _windex.htaccess_

If you wish disable an index page for any child folder, you'll need to upload a _.htaccess_ file in that folder with the following code:

    Options -Indexes

No PHP
------

The [no-php branch](https://github.com/desandro/windex/tree/no-php) that does not require PHP. Use this one if your environment does not support PHP, or certain htaccess features. **Recommended for Media Temple users.**

License
-------

This software is free to use and modify.  You may not charge for or sell this software, nor any derivation of it. If you do modify it, we would love to hear about it. Give us a holler and let us know.

Windex is a mod of [Indices by Scott Evans](http://antisleep.com/indices/).