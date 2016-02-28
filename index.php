<!DOCTYPE html>
<html lang="<?php echo $Site->language() ?>">

<head>
    <?php include(PATH_THEME_PHP.'head.php') ?>
</head>

<body>
    <!-- Plugins Site Body Begin -->
    <?php Theme::plugins('siteBodyBegin') ?>   


    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header" style="background: lightgrey;">                 <!-- Layout --> 
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">                                     <!-- Title -->
                    <a href="<?php echo $Site->url() ?>" style="color: white; text-decoration: none;">
                        <?php echo $Site->title() ?>
                    </a>
                </span>
                <div class="mdl-layout-spacer">
                </div>
                <!--nav class="mdl-navigation" -->                                     <!-- Menu in der Leiste -->
                    <!-- a class="mdl-navigation__link" href="">Kontakt</a -->
                <!-- /nav -->
            </div>
        </header>
        <div class="mdl-layout__drawer">                                            <!-- Sidemenu -->
            <span class="mdl-layout-title">
                MENU
            </span>
            <nav class="mdl-navigation">
                        <a class="mdl-navigation__link" href="<?php echo $Site->url() ?>blog">Neuigkeiten</a>
                        <?php
                            //  pages
                            $parents = $pagesParents[NO_PARENT_CHAR];
                            foreach($parents as $Parent) {
                                echo '<a class="mdl-navigation__link" href="'.$Parent->permalink().'">'.$Parent->title().'</a>';
                            }
                        ?>
                        <li class="mdl-navigation__link" href="<?php echo $Site->url() ?>blog">Neuigkeiten</li>
            </nav>
        </div>





        <main class="mdl-layout__content">                                          <!-- Content -->
            <div class="mdl-grid">
                
                <!-- erste Zeile -->

                <div class="mdl-cell mdl-cell--2-col"></div>
                <div class="mdl-cell mdl-cell--8-col">                              <!-- Logo -->
                    <div class="seht-card mdl-card mdl-shadow--4dp">
                        <div class="mdl-card__media">
                            <img src="<?php echo HTML_PATH_THEME_IMG ?>header.jpg" style="width: 100%; height: auto;" alt="Logo SeHT Münster e.V.">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <?php echo $Site->description(); ?>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--2-col"></div>

                <!-- zweite Zeile -->

                    <?php
                        if( ($Url->whereAmI()=='home') || ($Url->whereAmI()=='tag') || ($Url->whereAmI()=='blog') ) {
                            include(PATH_THEME_PHP.'home.php');
                        } elseif($Url->whereAmI()=='post') {
                            include(PATH_THEME_PHP.'post.php');
                        } elseif($Url->whereAmI()=='page') {
                            include(PATH_THEME_PHP.'page.php');
                        }
                    ?>
            </div>  <!-- grid -->
        </main>
    </div>

<!-- Plugins Site Body End -->
<?php Theme::plugins('siteBodyEnd') ?>

</body>
</html>
