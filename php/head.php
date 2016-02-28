    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $Site->title() ?></title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="<?php echo HTML_PATH_THEME_IMG ?>seht-192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="<?php echo HTML_PATH_THEME_IMG ?>seht-128.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="<?php echo HTML_PATH_THEME_IMG ?>seht-144.png">
    <meta name="msapplication-TileColor" content="#8EA5C2">


    <link href='//fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=de' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
                                                                    <!-- teal-red indigo-red -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.teal-red.min.css" />
    <?php
	    // CSS from theme/css/
	    Theme::css(array(
            'styles.css'
	    ));

	    // Javascript from theme/js/
	    Theme::javascript('material.js');

	    // Favicon from theme/img/
	    Theme::favicon('favicon.png');

	    // Where Am I
        if( $Url->whereAmI()=='post' ) {
		    Theme::keywords( $Post->tags() );
		    Theme::description( $Post->description() );
	    }
	    elseif( $Url->whereAmI()=='page' ) {
		    Theme::keywords( $Page->tags() );
		    Theme::description( $Page->description() );
	    }
	    else {
		    Theme::description( $Site->description() );
	    }
    ?>

    <!-- Plugins Site Head -->
    <?php Theme::plugins('siteHead') ?>
