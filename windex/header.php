<?php require('config.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <!--
         This index has been cleaned with Windex
         http://github.com/desandro/windex
         
         A mod of Indices:
         http://antisleep.com/software/indices
    -->
    
    <title><?php echo $titletext; ?></title>

    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content=" initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>

    <link rel="stylesheet" media="screen and (max-width: 480px)" href="<?php echo $windexPath; ?>/css/iphone.css" />
    <link rel="stylesheet" media="screen and (min-width: 481px)" href="<?php echo $windexPath; ?>/css/screen-foxy.css" />
    <!--[if IE]>
        <link rel="stylesheet" media="screen" href="<?php echo $windexPath; ?>/css/screen-foxy.css" />
    <![endif]-->    

    <script src="<?php echo $windexPath; ?>/js/jquery-1.4.4.js"></script>
    <script type="text/javascript">
        $(function() {
            $("tr td:nth-child(1)").css(
                {"text-align": "center", "width": "24px", "padding": "1px 10px 1px 0"})
            
            $("tr td:nth-child(2), tr th:nth-child(2)").css(
                {"width": "460px", "text-align": "left"})
            
            $("tr td:nth-child(3), tr td:nth-child(4)").css(
                {"padding-left": "10px", "text-align": "right", "font-size": "11px"})
            
            $("tr td:nth-child(5)").css({"display": "none"});
        });
    </script>

</head>

<body>
    
<div id="wrap">    
    
    <div id="dirlist">
        
        <h1 id="page-title"><?php echo $h1text; ?></h1>

