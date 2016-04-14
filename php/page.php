<!-- Plugins Page Begin -->
<?php Theme::plugins('pageBegin') ?>



    <?php
        if($Page->coverImage()) {

                echo '<div class="mdl-cell mdl-cell--2-col"></div>
                <div class="mdl-cell mdl-cell--8-col">                              <!-- Logo -->
                    <div class="seht-card mdl-card mdl-shadow--4dp">
                        <div class="mdl-card__media">
                            <img src="'.$Page->coverImage().'" alt="Cover Image" style="width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--2-col"></div>';

            // echo '<a href="'.$Page->permalink().'" class="image featured"><img src="'.$Page->coverImage().'" alt="Cover Image"></a>';

        }
    ?>























<div class="mdl-cell mdl-cell--2-col"></div>

<div class="mdl-cell mdl-cell--8-col">
    <div class="seht-card mdl-card mdl-shadow--4dp">

        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">
                <?php echo $Page->title() ?>
            </h2>
        </div>

        <div class="mdl-card__supporting-text">
            <inhalt>
                <?php echo $Page->content() ?>
            </inhalt>
        </div>

        <div class="mdl-card__menu">
            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--primary mdl-js-ripple-effect" onclick="toggleFont()">
                <i class="material-icons" id="FontToggleId">format_size</i>
            </button>
            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--primary mdl-js-ripple-effect" onclick="toggleSpeech()">
                <i class="material-icons" id="SpeechToggleId">hearing</i>
            </button>
        </div>
    </div>
</div>

<div class="mdl-cell mdl-cell--2-col"></div>

<?php Theme::plugins('pageEnd') ?>
