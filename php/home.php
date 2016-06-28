<script>
    function deleteIdContent(Id) {
        Id.innerHTML='';
    }
</script>


        <?php
            if ( ($Url->whereAmI() == 'home') || ($Url->whereAmI()=='blog') ) {
                $totalPublishedPosts = $dbPosts->numberPost(true);
                $posts = buildPostsForPage(0, $totalPublishedPosts, true, false);
                $searchString =  substr( $Url->uri(), (strlen($Site->url()) - strlen(DOMAIN) + 5) );
                if ( $searchString  ) {

                    foreach ($posts as $Post) {
                        if ( (stripos($Post->content(true), $searchString) !== false) || ( stripos($Post->title(), $searchString) !== false) ) {
                            $filteredList[] = $Post;
                        }
                    }

                    $parents = $pagesParents[NO_PARENT_CHAR];
                    foreach($parents as $Parent) {
                        if ( (stripos($Parent->content(true), $searchString) !== false) || ( stripos($Parent->title(), $searchString) !== false) ) {
                            $filteredList[] = $Parent;
                        }

                        
                        if ( isset( $pagesParents[$Parent->key()]  )  ) {
                            $children = $pagesParents[$Parent->key()];
                            foreach($children as $Child){
                                if ( (stripos($Child->content(true), $searchString) !== false) || ( stripos($Child->title(), $searchString) !== false) ) {
                                    $filteredList[] = $Child;
                                }
                            }
                        }



                    }

                    if ( isset($filteredList) ) {
                        $posts = $filteredList;
                    } else {
                        echo    '<div class="mdl-cell mdl-cell--12-col" id="notFound">
                                    <div class="seht-card mdl-card mdl-shadow--4dp">
                                        <div class="mdl-card__title">    
                                            <h2 class="mdl-card__title-text">
                                                nichts gefunden
                                            </h2>
                                        </div>
                                        <div class="mdl-card__supporting-text">
                                            Hier sind die Letztens Posts:
                                        </div>
                                        <div class="mdl-card__menu">
                                            <button onclick="deleteIdContent(notFound)" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                                <i class="material-icons">cancel</i>
                                            </button> 
                                        </div>
                                    </div>
                                </div>';
                    }
                }
            }
            foreach ($posts as $Post):
        ?>


            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                <div class="seht-card mdl-card mdl-shadow--4dp">

                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">
                            <?php echo $Post->title() ?>
                        </h2>
                    </div>

                    <div class="mdl-card__supporting-text" style="min-height: 200px">
                        <?php
                            echo $Post->date();
                            // Call the method with FALSE to get the first part of the post
                            echo $Post->content(false)
                        ?>
                    </div>

                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary mdl-js-ripple-effect"
                                                                                href="<?php echo $Post->permalink() ?>">
                            <?php $Language->printMe('Read more') ?>
                        </a>
                    </div>

                </div>
            </div>

        <?php
            endforeach; 
        ?>



