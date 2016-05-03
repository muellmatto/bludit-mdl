<!DOCTYPE html>
<html lang="<?php echo $Site->language() ?>">

<head>
    <?php include(PATH_THEME_PHP.'head.php') ?>
</head>

<body>
    <!-- Plugins Site Body Begin -->
    <?php Theme::plugins('siteBodyBegin') ?>   


                                                <!-- mdl-color: teal blue-grey deep-purple" -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header" style="background-color: white;">                 <!-- Layout --> 
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout__title">                                     <!-- Title -->
                    <a href="<?php echo $Site->url() ?>" style="color: rgb(0,68,148); text-decoration: none;">
                        <img src="<?php echo HTML_PATH_THEME_IMG ?>seht_icon.svg" style="width: auto; height: 42px;" alt="Logo SeHT Münster e.V.">
                        <!-- i class="material-icons">home</i -->
                        <?php echo $Site->title() ?>
                    </a>
                </span>
                <div class="mdl-layout-spacer">
                </div>
                <nav class="mdl-navigation mdl-layout--large-screen-only">                                     <!-- Menu in der Leiste -->
                    <a class="mdl-navigation__link" href="<?php echo $Site->url() ?>kontakt">
                        <i class="material-icons">contact_phone</i>
                        Kontakt
                    </a>
                </nav>

            </div>
        </header>
        <div class="mdl-layout__drawer">                                            <!-- Sidemenu -->
            <span class="mdl-layout__title">
                <img src="<?php echo HTML_PATH_THEME_IMG ?>seht_icon.svg" style="width: 30%; height: auto;" alt="Logo SeHT Münster e.V.">
                MENU
            </span>
            <nav class="mdl-navigation">
                        <a class="mdl-navigation__link" href="<?php echo $Site->url() ?>blog"><i class="material-icons">date_range</i> Neuigkeiten</a>
                        <?php
                            //  pages
                            $parents = $pagesParents[NO_PARENT_CHAR];
                            foreach($parents as $Parent) {
                                if($Parent->title()=='SeHT Münster e.V.') {
                                    $icon='home';
                                } elseif($Parent->title()=='Team') {
                                    $icon='face';
                                } elseif($Parent->title()=='Angebote') {
                                    $icon='group';
                                } elseif($Parent->title()=='Downloads') {
                                    $icon='get_app';
                                } elseif($Parent->title()=='Kontakt') {
                                    // $icon='account_circle';
                                    $icon='contact_phone';
                                } else {
                                    $icon='info';
                                }
                                    echo '<a class="mdl-navigation__link" href="'.$Parent->permalink().'">'.'<i class="material-icons">'.$icon.'</i> '.$Parent->title().'</a>';
                            }
                        ?>
                        <a class="mdl-navigation__link" href="<?php echo $Site->url() ?>admin"><i class="material-icons">vpn_key</i>Login</a>
            </nav>
        </div>





        <main class="mdl-layout__content">                                          <!-- Content -->
            <div class="mdl-grid">
                
                <!-- erste Zeile -->


                <!-- zweite Zeile -->

                    <?php
                        if( ($Url->whereAmI()=='home') ||  ($Url->whereAmI()=='blog') || ($Url->whereAmI()=='tag') ) {
                            include(PATH_THEME_PHP.'home.php');
                        } elseif($Url->whereAmI()=='post') {
                            include(PATH_THEME_PHP.'post.php');
                        } elseif($Url->whereAmI()=='page') {
                            include(PATH_THEME_PHP.'page.php');
                        }
                    ?>
            </div>  <!-- grid -->

            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">Tags:</div>
                    <ul class="mdl-mini-footer__link-list">
                        <?php
                            $tagListe = $dbTags->getAll();
                            foreach ($tagListe as $tag):
                            if ( $dbTags->countPostsByTag($tag) > 0 ) {
                                echo '<li><a href="'.$Site->url().'tag/'.$tag.'">'.$tag.' ('.$dbTags->countPostsByTag($tag).')</a></li>';
                            }
                            endforeach;
                        ?>
                    </ul>
                </div>
                <div class="mdl-mini-footer__right-section">
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href="#">Privacy & Terms</a></li>
                    </ul>
                </div>
            </footer>


        </main>
    </div>


<!-- Plugins Site Body End -->
<?php Theme::plugins('siteBodyEnd') ?>

</body>
</html>
