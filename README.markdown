Windex - Style your directory listing index pages
===============================================

**v1.0 beta**

Windex uses PHP and Apache to style default directory listing index pages. It works directly with Apache's built-in directory mechanism. 

Authors
-------

* [Scott Evans](http://antisleep.com)
* [David DeSandro](http://desandro.com)


Features
--------

* __Styled directory listings.__ Windex comes with three lovely themes: screen-castro.css mimics Firefox's local index view, screen-waldemar.css mimics Opera's. Add your own theme by creating another CSS file and linking to in header.php.
* __iPhone-optimized view.__
* __Nice default icons.__
* __README file contents parsed and appended to pages.__ Windex looks for README files and adds them to index pages. It will parse documents marked up with Textile (_README.textile_) or Markdown (_README.markdown_, _README.md_). This option can be disabled in config.php.

Windex themes make liberal use of CSS3. Viewing experiences with legacy browsers may differ.

HEADS UP
--------

**Installing Windex on a live site publicly exposes the contents of your site. This can be a serious security risk. Be sure to to install Windex only where you want the child files and folders to be viewable.**


Installation
------------

1. Copy the entire windex folder into your site's directory tree. For instance, if your site's files are in _/www/mysite.com/files_, place this folder to be _/www/mysite.com/files/windex_.

2. Edit windex/config.php and change any configuration options. `$windexPath` is the absolute path of where the windex folder can be found. If your placed the folder to be _/www/mysite.com/files/windex_, you would change this line to be `$windexPath = '/files/windex';`

3. Copy and paste the contents of _main.htaccess_ into a file named _.htaccess_ in your site's files directory. _.htaccess_ is a hidden configuration file. If this file does not exist you can rename _main.htaccess_ as _.htaccess_ and upload it. DO NOT overwrite the contents of the previous _.htaccess_, as this code is essential to any CMS you may be running. Instead, add the code from _main.htaccess_ after the previous code. **NOTE:** it helps to know what you're doing before jumping in.  The supplied _.htaccess_ file may end up overriding some of your site's configuration and causing weird behavior. So understand what you're doing here, and merge your existing directory config with the contents of _main.htaccess_.

4. Try it out!  Browse to a directory that does not contain an index file.

License
-------

This software is free to use and modify.  You may not charge for or sell this software, nor any derivation of it. If you do modify it, we would love to hear about it. Give us a holler and let us know.

Changelog
---------

* **v1.0** Original release

Windex is a mod of [Indices by Scott Evans](http://antisleep.com/indices/).