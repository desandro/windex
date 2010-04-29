Indices -- Pleasant directory listings for Apache
-------------------------------------------------
v1.1, Sep 2009

AUTHOR
  Scott Evans <gse@antisleep.com>
  http://antisleep.com


LICENSE
  This software is free to use and modify.  You may not charge for or sell
  this software, nor any derivation of it.

  (if you do modify it, please drop me a line and let me know.)


WHAT THIS IS
  This little set of hacks turns Apache's ugly directory listing output
  into something quite nice:
    * Simple, clean-looking design (XHTML 1.0 Strict, styled with CSS)
    * Files listed in a table
    * Entire filenames visible
    * Directory names in bold, trailing slashes stripped from directory names
    * Nice file icons
    * Your logo and link at the top
    * Optional readme.html file inserted before file list

  It works directly with Apache's built-in directory mechanism.

  There are more comments about what's going on in the source files,
  and on this page:
    http://antisleep.com/software/indices


REQUIREMENTS
  I developed Indices for my web server, which runs Apache 2.0.x and
  PHP 5.1.x.  It'll probably require some tweaking to get it working
  with earlier versions of either, but it's doable.


INSTALLATION
  1. Copy this entire directory into your site's directory tree.
     For instance, if your site's files are in /www/mysite.com,
     place this directory in /www/mysite.com/indices.

  2. Edit indices/header.php and change any configuration options.

  3. Copy main-htaccess to your site's directory root, into a file
     named .htaccess.  NOTE: it helps to know what you're doing before
     doing this.  The supplied htaccess file may end up overriding
     some of your site's configuration and causing weird behavior.
     So understand what you're doing here, and merge your existing
     directory config with the contents of main-htaccess.

  4. Try it out!  Browse to a directory that does not contain an index
     file.


Enjoy!

-gse



REVISION HISTORY

v1.1 2009.09.01 
 * Use CSS to get cell-wide clicking instead of div hack.  (The div hack
   broke "Save link as" and "Copy link location" in most browsers.)
 * Update a few file/icon extensions in main-htaccess
 * Replace compressed file icon

v1.0 2007.10.07 
 * First version


