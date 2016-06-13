<!-- Plugins Page Begin -->
<?php Theme::plugins('pageBegin') ?>



    <?php
        if($Page->coverImage()) {

                echo '<div class="mdl-cell mdl-cell--2-col"></div>
                <div class="mdl-cell mdl-cell--8-col">                              <!-- Logo -->
                    <div class="seht-card mdl-card mdl-shadow--4dp">
                        <div class="mdl-card__media" style="max-height: 300px; background-color: white;">
                            <img src="'.$Page->coverImage().'" alt="Cover Image" style="width: 100%; max-height: 300px; object-fit: contain;">
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--2-col"></div>';

        }
    ?>


<style>
    img {
        max-width: 100%
    }
</style>

<div class="mdl-cell mdl-cell--2-col"></div>

<div class="mdl-cell mdl-cell--8-col">
    <div class="seht-card mdl-card mdl-shadow--4dp">

        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">
                <?php echo $Page->title() ?>
            </h2>
        </div>

        <div class="mdl-card__supporting-text">

        <?php
            if ( $Page->title() == 'JIPA' || in_array( $Page, $pagesParents['jipa']) ) {


                echo '
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-layout--large-screen-only" ' 
                    . ' style="margin-bottom: 5px;"'
                    . ' href="'
                    . $Site->url()
                    .'jipa">
                        JIPA Münster
                    </a>
                    ';
                $children = $pagesParents['jipa'];
                foreach($children as $Child) {
                    echo '
                        <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-layout--large-screen-only" '
                        . ' style="margin-bottom: 5px;"'
                        . ' href="'
                        . $Child->Permalink()
                        . '">'
                        . $Child->title()
                        . '</a>';
                }


            } 
        ?>






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

            <?php
                if ( $Page->title() == 'JIPA' || in_array( $Page, $pagesParents['jipa']) ) {
                    echo '
                        <button id="jipa-small-menu" 
                                    class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary 
                                            mdl-js-ripple-effect mdl-layout--small-screen-only">
                            <i class="material-icons">touch_app</i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="jipa-small-menu">
                            <li class="mdl-menu__item">
                                JIPA Münster
                            </li>
                    ';


                    $children = $pagesParents['jipa'];

                    foreach($children as $Child) {
                        echo '
                            <li class="mdl-menu__item">'
                            . $Child->title()
                            . '</li>
                        ';
                    }
                    echo '</ul>';

                }
            ?>
        </div>
    </div>
</div>

<div class="mdl-cell mdl-cell--2-col"></div>

<?php Theme::plugins('pageEnd') ?>
