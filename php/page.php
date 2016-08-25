<!-- Plugins Page Begin -->
<?php Theme::plugins('pageBegin') ?>



    <?php
        if($Page->coverImage()) {

            echo '
                <div class="mdl-cell mdl-cell--12-col">                              <!-- Logo -->
                    <div class="seht-card mdl-card mdl-shadow--4dp">
                        <div class="mdl-card__media" style="max-height: 300px; background-color: white;">
                            <img src="'.$Page->coverImage().'" alt="Cover Image" style="width: 100%; max-height: 300px; object-fit: contain;">
                        </div>
                    </div>
                </div>
                ';

        }
    ?>


<style>
    img {
        max-width: 100%
    }
</style>


<div class="mdl-cell mdl-cell--12-col">
    <div class="seht-card mdl-card mdl-shadow--4dp">

        <div class="mdl-card__title" style="background-color: rgb(0,68,148); height: 120px;">
            <h2 class="mdl-card__title-text" style="font-size: 32px; color: white;">
                <?php echo $Page->title() ?>
            </h2>
        </div>

        <div class="mdl-card__supporting-text">
        <?php
            // echo "Page-Object: " . "<br>";
            // echo print_r($Page). "<br>";
            // echo "Page-parentkey: " . "<br>";
            // echo $Page->parentKey() . "<br>";
            // echo "Page-key: " . "<br>";
            // echo $Page->key() . "<br>";
            // echo "pagesParents: " . "<br>";
            // array with keys from parents:
            // echo print_r(array_keys($pagesParents)) . "<br>";
            // if ( array_key_exists( $Page->key(),  $pagesParents ) ) {
            //     echo "current page childs: <br>";
            //     echo print_r(array_keys($pagesParents[$Page->key()])) . "<br>";
            // } else {
            //     echo "Page has no childs!";
            // }
        ?>
        <?php
            // check if page has childs or is child
            if ( array_key_exists( $Page->key() , $pagesParents ) || $Page->parentKey() ) {
                // get children if Parent or siblings if child
                if ($Page->parentKey()) {
                    $ParentKey = $Page->parentKey();
                    $children = $pagesParents[$Page->parentKey()];
                } else {
                    $ParentKey = $Page->key();
                    $children = $pagesParents[$Page->key()];
                }

                echo '
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-layout--large-screen-only" ' 
                    . ' style="margin-bottom: 5px;"'
                    . ' href="'
                    . $Site->url()
                    . $ParentKey
                    .'">'
                    . $ParentKey
                    . '</a>
                    ';
                // $children = $pagesParents['jipa'];
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
        <?php
        if ( $Page->title() == 'JIPA' || in_array( $Page, $pagesParents['jipa']) ) {
                echo '
                    <button class="mdl-button mdl-js-button mdl-button--fab" onclick="alert(\'Das Copyright für die gezeichneten Bilder besitzt die Lebenshilfe für Menschen mit geistiger Behinderung Bremen e.V., Illustrator Stefan Albers, Atelier Fleetinsel, 2013\');">
                    <i class="material-icons">copyright</i>
                    </button>
                    ';
        }
        ?>
        </div>

        <div class="mdl-card__menu">
            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--primary mdl-js-ripple-effect" onclick="toggleFont()">
                <i class="material-icons" id="FontToggleId">format_size</i>
            </button>
            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--primary mdl-js-ripple-effect" onclick="toggleSpeech()">
                <i class="material-icons" id="SpeechToggleId">hearing</i>
            </button>

            <?php
            if ( array_key_exists( $Page->key() , $pagesParents ) || $Page->parentKey() ) {
                // get children if Parent or siblings if child
                if ($Page->parentKey()) {
                    $ParentKey = $Page->parentKey();
                    $children = $pagesParents[$Page->parentKey()];
                } else {
                    $ParentKey = $Page->key();
                    $children = $pagesParents[$Page->key()];
                }
                    echo '
                        <button id="jipa-small-menu" 
                                    class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary 
                                            mdl-js-ripple-effect mdl-layout--small-screen-only">
                            <i class="material-icons">touch_app</i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="jipa-small-menu">
                            <a class="mdl-menu__item" '
                            . ' href="'
                            . $Site->url()
                            . $ParentKey
                            .'">'
                            . $ParentKey
                            . '</a>
                            ';



                    foreach($children as $Child) {
                        echo '
                            <a class="mdl-menu__item" href="'
                            . $Child->Permalink()
                            . '">'
                            . $Child->title()
                            . '</a>
                        ';
                    }
                    echo '</ul>';

                }
            ?>
        </div>
    </div>
</div>


<?php Theme::plugins('pageEnd') ?>
