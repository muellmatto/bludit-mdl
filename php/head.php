    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $Site->title() ?></title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="<?php echo HTML_PATH_THEME_IMG ?>seht-192.png">
    <meta name="theme-color" content="#03A9F4">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#03A9F4">
    <meta name="apple-mobile-web-app-title" content="SeHT Münster">
    <link rel="apple-touch-icon-precomposed" href="<?php echo HTML_PATH_THEME_IMG ?>seht-128.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="<?php echo HTML_PATH_THEME_IMG ?>seht-144.png">
    <meta name="msapplication-TileColor" content="#03A9F4">
    <meta name="msapplication-navbutton-color" content="#03A9F4">

    <link href='//fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=de' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
                                                                    <!-- teal-red indigo-red light_blue -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.light_blue-red.min.css" />
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


<script src="http://code.responsivevoice.org/responsivevoice.js"></script>

<script type="text/javascript">

        function startSpeech() {
            var text = [];
            text = document.getElementsByTagName("inhalt");
            lies = text[0].textContent;
            // alert(lies);
            /* var hallo = new SpeechSynthesisUtterance(lies);
            hallo.lang = "de-DE";
            window.speechSynthesis.speak(hallo); */
            responsiveVoice.speak(lies, "Deutsch Female");
        }
    
        function stopSpeech() {
            // window.speechSynthesis.cancel();
            responsiveVoice.cancel();
        }
        
        function toggleSpeech() {
            // STARTICON = "play_arrow"
            // STOPICON = "stop"

            // STARTICON = "mic"
            // STOPICON = "mic_off"
            
            STARTICON = "hearing"
            // STARTICON = "volume_up"
            STOPICON = "volume_off"

            if ( document.getElementById('SpeechToggleId').innerHTML == STARTICON ) {
                document.getElementById('SpeechToggleId').innerHTML = STOPICON;
                startSpeech();
            } else {
                document.getElementById('SpeechToggleId').innerHTML = STARTICON;
                stopSpeech();
            }
        }


        function toggleFont() {
            var LISTE = document.getElementsByTagName("inhalt")[0].getElementsByTagName("*");
            if ( document.getElementById('FontToggleId').innerHTML == "format_size" ) {
                document.getElementById('FontToggleId').innerHTML = "text_fields";
                for (var i = 0; i < LISTE.length; i++) {
                    LISTE[i].className = "mdl-typography--display-1";
                }
                document.getElementsByTagName("inhalt")[0].className = "mdl-typography--display-4";
            } else {
                document.getElementById('FontToggleId').innerHTML = "format_size";
                for (var i = 0; i < LISTE.length; i++) {
                    LISTE[i].className = "";
                }
            }
        }

</script>


    <!-- Plugins Site Head -->
    <?php Theme::plugins('siteHead') ?>
