<?php $post_type = get_post_type(); ?>
<div class="row">
    <div class="col-xs-2 post-side-date">
    <?php
        echo "<div class='side-day'>" . get_the_date('dS') . "</div>";
        echo "<div class='side-m-y'>" . get_the_date('M Y') . "</div>";
    ?>
    </div>
    <div class="col-xs-10 post-data">
        <h5>
            <?php 
            if($post_type == 'post') { ?>
                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
            <?php } else {
                the_title();
            }
            ?>
        </h5>
        <div class="full-date"><?php 
            if($post_type == 'post') { 
                echo "Posted: " . get_the_date('dS M Y') . " by " . get_the_author();
            } else {
                echo get_the_date('l dS M Y');
            } ?></div>
        <?php 
            if($post_type == 'post') { 
                the_excerpt();
            } else {
                the_content();
            }
            if($post_type == 'post') { ?>
                <a href="<?php the_permalink() ?>" class="btn post-link">Read More</a>
            <?php } else { ?>
                <a href="#" class="btn post-link">Register</a>
            <?php
            }
            if($post_type == 'post') { 
                $tags = wp_get_post_tags(get_the_ID(), array( 'fields' => 'names' ) ); 
                if($tags) { ?>
                <div class="post-tags">Tags: 
                    <?php foreach($tags as $tag) {
                        echo $tag;
                        echo (end($tags) == $tag) ? "" : ", ";
                    } ?>
                </div>
            <?php } } ?>
    </div>
</div>