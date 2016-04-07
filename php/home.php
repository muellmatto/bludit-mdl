
<div class="mdl-cell mdl-cell--2-col"></div>

<div class="mdl-cell mdl-cell--8-col">
    <div class="mdl-grid">                  <!-- nested grid -->

        <?php
            $totalPublishedPosts = $dbPosts->numberPost(true);
            $posts = buildPostsForPage(0, $totalPublishedPosts, true, false);
            foreach ($posts as $Post): 
        ?>


            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                <div class="seht-card mdl-card mdl-shadow--4dp">

                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">
                            <?php echo $Post->title() ?>
                        </h2>
                    </div>

                    <div class="mdl-card__supporting-text">
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
    </div>                                  <!-- nested grid end -->
</div>


<div class="mdl-cell mdl-cell--2-col"></div>



