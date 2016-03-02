<!DOCTYPE html>
<html lang="<?php echo $Site->language() ?>">

<head>
    <?php include(PATH_THEME_PHP.'head.php') ?>
</head>

<body>
    <!-- Plugins Site Body Begin -->
    <?php Theme::plugins('siteBodyBegin') ?>   


                                                <!-- mdl-color: teal blue-grey deep-purple" -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header" id="BackgroundId">                 <!-- Layout --> 
        <header class="mdl-layout__header" id="ForegroundId1">
            <div class="mdl-layout__header-row" id="ForegroundId2">
                <span class="mdl-layout-title">                                     <!-- Title -->
                    <a href="<?php echo $Site->url() ?>" style="color: white; text-decoration: none;">
                        <i class="material-icons">home</i>
                        <?php echo $Site->title() ?>
                    </a>
                </span>
                <div class="mdl-layout-spacer">
                </div>
                <!--nav class="mdl-navigation" -->                                     <!-- Menu in der Leiste -->
                    <!-- a class="mdl-navigation__link" href="">Kontakt</a -->
                <!-- /nav -->




<script>
    function changeForegroundColorTo(color) {
        document.getElementById('ForegroundId1').className = "mdl-layout__header mdl-color--" + color ; 
        document.getElementById('ForegroundId2').className = "mdl-layout__header-row mdl-color--" + color ; 
    }
    function changeBackgroundColorTo(color) {
        document.getElementById('BackgroundId').className = "mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--" + color ; 
    }


</script>



<!-- Right aligned menu below button -->
<button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right">
    <?php 

        $layers = array("Foreground",
                        "Background");

        $colors = array("indigo",
                        "blue",
                        "light-blue",
                        "cyan",
                        "teal",
                        "green",
                        "light-green",
                        "lime",
                        "yellow",
                        "amber",
                        "orange",
                        "brown",
                        "blue-grey",
                        "grey",
                        "deep-orange",
                        "red",
                        "pink",
                        "purple",
                        "deep-purple",
                        "white");
        foreach($layers as $layer) {

            foreach($colors as $color) {
                echo '<li class="mdl-menu__item mdl-color--'.$color.'" onclick="change'.$layer.'ColorTo('."'" .$color. "'".')">'.$color.'</li>';
            }

        }
    ?>

</ul>










            </div>
        </header>
        <div class="mdl-layout__drawer">                                            <!-- Sidemenu -->
            <span class="mdl-layout-title">
                <img src="<?php echo HTML_PATH_THEME_IMG ?>seht-128.png" style="width: 30%; height: auto;" alt="Logo SeHT Münster e.V.">
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
