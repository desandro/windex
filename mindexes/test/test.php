<?php

    $uri = urldecode($_SERVER['REQUEST_URI']);
    $uri = preg_replace("/\?.*$/", "", $uri);
    $uri = preg_replace("/\/ *$/", "", $uri);

    $absPath = $_SERVER["DOCUMENT_ROOT"] . $uri;
    
?>


<?php

    echo getcwd();

?>

<dl>
    <?php foreach (glob($absPath . '*') as $key => $value): ?>
        <dt><?= $key ?></dt>
        <dd><?= $value ?></dd>
        <dd><?php 
            if( preg_match('/^README(\.[A-z0-9]+)?$/i', $value) ) { 
                echo '<strong>match</strong>'; 
            } else { 
                echo '---';
            }  
        ?></dd>
        <dd><?php
            $fileInfo = pathinfo($value);
            echo $fileInfo['extension'];
        ?></dd>
        <dd><?= $fileInfo['filename'] ?></dd>
    <?php endforeach; ?>    
</dl>

<dl>
    <?php foreach($_SERVER as $key => $value): ?>
        <dt><?= $key ?></dt>
        <dd><?= $value ?></dd>
    <?php endforeach; ?>
    
</dl>

