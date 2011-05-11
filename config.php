<?php

    //=======================================================================
    // A few configuration values.  Change these as you see fit.
    //=======================================================================

    // Windex path
    $windexPath = '/windex';

    // titleFormat
    //   How to format the <title> and <h1> text.  %DIR is replaced with the directory path.
    // for instance:
    //   $titleFormat = "Now Viewing: %DIR";
    $titleFormat = "Index of %DIR";

    // showReadme
    //   If true, the contents of a README file will appear after
    //   the directory listing.  
    $showReadme = true;

    //=======================================================================
    // End of config
    //=======================================================================    
    
    // URI of current directory-
    $uri = urldecode($_SERVER['REQUEST_URI']);
    $uri = preg_replace("/\?.*$/", "", $uri);
    $uri = preg_replace("/\/ *$/", "", $uri);
    

    //=======================================================================
    // Header
    //=======================================================================
    
    
    $titletext = str_replace("%DIR", $uri, $titleFormat). '/';

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
        $pathMarkup .= '<a href="'.$link.'">'.$folder.'/</a>';
    }    
    
    $pathMarkup = '<strong>'.$pathMarkup.'</strong>';
    
    $h1text = str_replace("%DIR", $pathMarkup, $titleFormat);
    
    //=======================================================================
    // Footer
    //=======================================================================
    
    
    $readmeMarkup = '';
    $currentDir = $_SERVER["DOCUMENT_ROOT"] . $uri . '/';
    if (is_dir($currentDir)) {
        if ($dh = opendir($currentDir)) {
            while (($file = readdir($dh)) !== false) {
                // go thru files, find the first README.*
                if( preg_match('/^README(\.[A-z0-9]+)?$/i', $file) && !is_dir($currentDir.$file) ) {
                    $readmeFile = $file;
                    break;
                }
            }
            closedir($dh);
        }
        
        if (isset($readmeFile)) {
            $fileInfo = pathinfo($readmeFile);
            $ext = isset($fileInfo['extension']) ? $fileInfo['extension'] : '';
            $readmeRaw = file_get_contents($currentDir.$readmeFile);
        
            if ($ext == 'textile') {
                require_once( $_SERVER["DOCUMENT_ROOT"]. $windexPath . '/textile.php');
                $textile = new Textile();
                $readmeContent = $textile->TextileThis($readmeRaw);
            } else if ($ext == 'markdown' || $ext == 'md' || $ext == 'mdown') {
                require_once( $_SERVER["DOCUMENT_ROOT"]. $windexPath . '/markdown.php');
                $readmeContent = Markdown($readmeRaw);
            } else if($ext == 'html' || $ext == 'htm') {
                $readmeContent = $readmeRaw;
            } else {
                $readmeContent = '<pre>'."\n".$readmeRaw."\n".'</pre>';
            }
        
            $readmeMarkup = '<div id="readme">'."\n"
                .'<h2 class="readme-title"><a href="'.$readmeFile.'">'.$readmeFile.'</a></h2>'
                ."\n".$readmeContent."\n".'</div> <!-- #readme -->'
            ;
            
        }
    }

?>