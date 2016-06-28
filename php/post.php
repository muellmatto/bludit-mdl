<!-- Plugins Page Begin -->
<?php Theme::plugins('postBegin') ?>


<div class="mdl-cell mdl-cell--12-col">
    <div class="seht-card mdl-card mdl-shadow--4dp">

        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">
                <?php echo $Post->title() ?>
            </h2>
        </div>

        <div class="mdl-card__supporting-text">
            <inhalt>
                <?php echo $Post->content() ?>
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

        <div class="mdl-card__actions mdl-card--border">
                <?php echo $Post->date() ?>
        </div>

    </div>
</div>


<?php Theme::plugins('postEnd') ?>
