<!DOCTYPE html>

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
    //   How to format the <title> and <h1> text.  %DIR is replaced with the directory path.
    // for instance:
    //   $titleformat = "Now Viewing: %DIR";
    $titleformat = "Index of %DIR";
    
    // indices path
    $indicesPath = '/mindexes';

    //=======================================================================
    // (end of config)
    //=======================================================================

    $uri = urldecode($_SERVER['REQUEST_URI']);
    $uri = preg_replace("/\?.*$/", "", $uri);
    $uri = preg_replace("/\/ *$/", "", $uri);
    

    $titletext = str_replace("%DIR", $uri, $titleformat). '/';

    // generate title path, with links to each parent folder
    $folders = explode('/',$uri);
    $folderCount = count($folders);
    $pathMarkup = '';
    foreach ($folders as $i => $folder) {
        $link = '';
        $backCount = $folderCount - $i -1;
        for ($j=0; $j < $backCount; $j++) { 
            $link .= '../';
        }
        $pathMarkup .= '<strong><a href="'.$link.'">'.$folder.'/</a></strong>';
    }    
    
    $h1text = str_replace("%DIR", $pathMarkup, $titleformat);

    // this is hacky, but in almost every situation there's no real harm.
    // it just might fail if you're doing something funky with directory mappings.
    $readmetext = "";
    $pathtext = "";
    $readmefile = $_SERVER["DOCUMENT_ROOT"] . $uri . "/README.textile";
    if ($show_readme && file_exists($readmefile)) {
        $readmetext = "<div class='readme'>" . file_get_contents($readmefile) . "</div>";
    }


?>
<html>
<head>
    <!--
         Minimal directory listings generated with Mindexes
         
         A mod of Indices:
         http://antisleep.com/software/indices
    -->
    
    <title><?=$titletext?></title>

    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content=" initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
    

    <link rel="stylesheet" media="screen and (max-device-width: 480px)" href="/mindexes/iphone.css" />
    <link rel="stylesheet" media="screen and (min-device-width: 481px)" href="/mindexes/screen.css">


</head>

<body>
    <div id="pagecontainer">
        
        <?php
            // Textile
            // require_once( $_SERVER["DOCUMENT_ROOT"]. $indicesPath . '/textile.php');
            // $readmeFiles = glob('README.*');
            // $readmeRaw = file_get_contents($readmeFiles[0]);
            // $readmeFormatted = str_replace("\n", '<br />', $readmeRaw);
            //         
            // $textile = new Textile();
            
            require_once( $_SERVER["DOCUMENT_ROOT"]. $indicesPath . '/markdown.php');
            $readmeFiles = glob($_SERVER["DOCUMENT_ROOT"]. $uri .'/README.*');
            $readmeRaw = file_get_contents($readmeFiles[0]);
            
        ?>


        <div class="header">
            <h1><?= $h1text ?></h1>
            <?php echo Markdown($readmeRaw); ?>

        </div>
