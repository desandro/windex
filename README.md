# Windex

Make your localhost look nice with stylized directory index pages. No more 1996 jank.

Features include:

+ SVG icons, sized pixel-perfect for 24x24 & multiples thereof
+ View HTML files without extensions: `project/page.html` at `project/page`
+ Nice mobile view with big tap targets

[View Windex demo on CodePen](https://codepen.io/desandro/full/OvwROP)

![Windex screenshot](https://i.imgur.com/j9Tsazt.png)

## Install

Windex uses Apache.

Let's say your root folder used for `localhost` is `~/projects`.

1. [Download](https://github.com/desandro/windex/archive/master.zip) or clone this project to the root folder: `~/projects/windex`
2. Move `.htaccess` to the root folder: `~/projects/.htaccess`

`.htaccess` is a hidden file. You can copy it to its location in Terminal via the command line:

``` sh
cd ~/projects
cp windex/.htaccess .
```

## Setting up a practical localhost on macOS

I like to use `localhost` so I can view my projects in `~/projects`. This allows me to create static sites that I can easily view in the browser, without having to start up a server. For example, going to `localhost/masonry/sandbox` allows me to see `~/projects/masonry/sandbox`.

Below are instructions to set that up on macOS. _Sorry Windows users, you're on your own here._ This will make a single user's folder viewable for all users. [For separate users folders like `localhost/~username`, view these instructions.](https://discussions.apple.com/docs/DOC-3083)

---

Open `/etc/apache2/httpd.conf` in your text editor. Making changes to this file will require administrator access. Change the following lines (line numbers may vary in your file):

**Line 169:** Enable `mod_rewrite`. This enables `.htaccess` files to rewrite URLs.

``` apache
LoadModule rewrite_module libexec/apache2/mod_rewrite.so
```

**Lines 238-239:** Change `DocumentRoot` and subsequent `Directory` to your desired directory. This sets `localhost` to point to the directory.

``` apache
DocumentRoot "/Users/username/projects"
<Directory "/Users/username/projects">
```

**Line 252:** Within this `<Directory>` block, add `Indexes` to `Options`. This enables file index view.

``` apache
    Options FollowSymLinks Multiviews Indexes
```

**Line 260:** Change `AllowOverride` value to `All`. This enables `.htaccess` files.

``` apache
    AllowOverride All
```

That block should look like:

``` apache
DocumentRoot "/Users/username/projects"
<Directory "/Users/username/projects">
    # Possible values for the Options directive...
    Options FollowSymLinks Multiviews Indexes
    MultiviewsMatch Any

    # AllowOverride controls what directives...
    AllowOverride All

    # Controls who can get stuff from this server.
    Require all granted
</Directory>
```

In Terminal, start or restart `apachectl`.

``` sh
sudo apachectl restart
```

View [http://localhost](http://localhost) in a browser. You'll should see the index page for `~/projects`. Without Windex, it's ugly, but it works. With Windex, it's pretty.

If you messed up `httpd.conf`, you can replace it with its original at `/etc/apache2/original/httpd.conf`.

## Viewing on other devices on macOS

You can view this `localhost` on another device like a phone.

1. Open **System Preferences**. Select **Sharing**.
2. Change **Computer name** to something rad, like **thunderclaw**, if you haven't already.
3. Enable **File sharing**.

Now, you can view `http://thunderclaw.local` on another device if you are on the same Wi-Fi.

## Alternatives

+ [jessfraz/directory-theme](https://github.com/jessfraz/directory-theme), which was based off of
+ [Apaxy](https://github.com/oupala/apaxy), which owes its existence to
+ [h5ai](https://larsjung.de/h5ai/)
+ [Indices](http://antisleep.com/indices/), which Windex was originally based off of

## License

Windex is released under the [MIT license](https://desandro.mit-license.org). Have at it.

---

Made by David DeSandro
