<?php

    // indices path
    $mindexesPath = '/mindexes';


    $uri = urldecode($_SERVER['REQUEST_URI']);
    $uri = preg_replace("/\?.*$/", "", $uri);
    $uri = preg_replace("/\/ *$/", "", $uri);
    

    $readmeMarkup = '';
    $currentDir = $_SERVER["DOCUMENT_ROOT"] . $uri . '/';
    if (is_dir($currentDir)) {
        if ($dh = opendir($currentDir)) {
            while (($file = readdir($dh)) !== false) {
                // go thru files, find the first README.*
                if( preg_match('/^README(\.[A-z0-9]+)?$/i', $file) && !is_dir($currentDir.$file) ) {
                    // echo $file . '<br />';
                    $readmeFile = $file;
                    break;
                }
            }
            closedir($dh);
        }
        
        if (isset($readmeFile)) {
            $fileInfo = pathinfo($readmeFile);
            $ext = $fileInfo['extension'];
            // echo $readmeFile.'<br />';
            // echo $ext.'<br />';
        
            $readmeRaw = file_get_contents($currentDir.$readmeFile);
        
            // echo 'readmeRaw::::: '.$readmeRaw.'<br />';
        
            if ($ext == 'textile') {
                require_once( $_SERVER["DOCUMENT_ROOT"]. $mindexesPath . '/textile.php');
                $textile = new Textile();
                $readmeContent = $textile->TextileThis($readmeRaw);
            } else if ($ext == 'markdown' || $ext == 'md') {
                require_once( $_SERVER["DOCUMENT_ROOT"]. $mindexesPath . '/markdown.php');
                $readmeContent = Markdown($readmeRaw);
            } else if($ext == 'html' || $ext == 'htm') {
                $readmeContent = $readmeRaw;
            } else {
                $readmeContent = '<pre>'."\n".$readmeRaw."\n".'</pre>';
            }
        
            $readmeMarkup = '<div id="readme">'."\n".'<h2 class="readme-title"><a href="'.$readmeFile.'">'.$readmeFile.'</a></h2>'."\n".$readmeContent."\n".'</div> <!-- #readme -->';
            
        }
    }
    


?>

    
    <?= $readmeMarkup ?>

</div> <!-- #page-container -->



</body>
</html>
