<!DOCTYPE html>

<!--
     Pleasant Apache directory listings courtesy of Indices:
     http://antisleep.com/software/indices
-->
<?php
    //=======================================================================
    // A few configuration values.  Change these as you see fit.
    //=======================================================================

    // show_readme
    //   If true, the contents of an (optional) readme.html file will appear before
    //   the directory listing.  This file should be an HTML snippet; no head/body/etc
    //   tags.  You can do paragraph tags or whatever.
    $show_readme = true;

    // titleformat
    //   How to format the <title> tag.  %DIR is replaced with the directory path.
    // for instance:
    //   $titleformat = "antisleep: %DIR";
    $titleformat = "Index of %DIR";

    //=======================================================================
    // (end of config)
    //=======================================================================

    $uri = urldecode($_SERVER['REQUEST_URI']);
    $uri = preg_replace("/\?.*$/", "", $uri);
    $uri = preg_replace("/\/ *$/", "", $uri);
    
    $titletext = str_replace("%DIR", $uri, $titleformat) . '/';

    // this is hacky, but in almost every situation there's no real harm.
    // it just might fail if you're doing something funky with directory mappings.
    $readmetext = "";
    $pathtext = "";
    $readmefile = $_SERVER["DOCUMENT_ROOT"] . $uri . "/readme.html";
    if ($show_readme && file_exists($readmefile)) {
        $readmetext = "<div class='readme'>" . file_get_contents($readmefile) . "</div>";
    } else {
        // If no readme, show URI.
	$pathtext = "<h1>Index of <strong>$uri</strong></h1>";
    }
    
    $folderCount = count($folders);
    $pathMarkup = '';
    foreach ($folders as $i => $folder) {
        $link = '';
        $backCount = $folderCount - $i -1;
        for ($j=0; $j < $backCount; $j++) { 
            $link .= '../';
        }
        $pathMarkup .= '<a href="'.$link.'">'.$folder.'/</a>';
    }    
?>
<html>
<head>
    <title><?=$titletext?></title>

    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content=" initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
    

    <link rel="stylesheet" media="screen and (max-device-width: 480px)" href="/indices/iphone.css" />
    <link rel="stylesheet" media="screen and (min-device-width: 481px)" href="/indices/screen.css">

    <!-- <link rel="stylesheet" href="/indices/screen.css" type="text/css" media="screen" /> -->
    <!-- <link rel="stylesheet" href="/indices/iphone.css" type="text/css" media="screen" /> -->


</head>

<body>
    <div id="pagecontainer">

        <div class="header">
            <h1>Index of <strong><?= $pathMarkup ?></strong></h1>
            <?=$readmetext?>
        </div>
