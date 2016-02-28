<!-- Plugins Page Begin -->
<?php Theme::plugins('postBegin') ?>

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
			// var LISTE = document.getElementById("PageContentId").getElementsByTagName("P");
			var LISTE = document.getElementById("PostContentId").getElementsByTagName("*");
            if ( document.getElementById('FontToggleId').innerHTML == "format_size" ) {
                document.getElementById('FontToggleId').innerHTML = "text_fields";
				for (var i = 0; i < LISTE.length; i++) {
                	LISTE[i].style.fontSize = "4rem";
				}
            } else {
                document.getElementById('FontToggleId').innerHTML = "format_size";
				for (var i = 0; i < LISTE.length; i++) {
                	LISTE[i].style.fontSize = "2rem";
				}
            }
        }

</script>



<div class="mdl-cell mdl-cell--2-col"></div>

<div class="mdl-cell mdl-cell--8-col">


    <div class="seht-card mdl-card mdl-shadow--4dp">

        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">
                <?php echo $Post->title() ?>
            </h2>
        </div>

        <div class="mdl-card__supporting-text" id="PostContentId">
            <inhalt>
                <?php echo $Post->content() ?>
            </inhalt>
        </div>


        <div class="mdl-card__menu">
            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick="toggleFont()">
                <i class="material-icons" id="FontToggleId">format_size</i>
            </button>
            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick="toggleSpeech()">
                <i class="material-icons" id="SpeechToggleId">hearing</i>
            </button>
        </div>

        <div class="mdl-card__actions mdl-card--border">
                <?php echo $Post->date() ?>
        </div>

    </div>


</div>

<div class="mdl-cell mdl-cell--2-col"></div>


<?php Theme::plugins('postEnd') ?>

