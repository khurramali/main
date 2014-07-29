<div class="row article">
    <div class="col-sm-10 col-sm-offset-1 beta delta">
        <article <?php post_class(); ?>>
            <div class="row">
                <?php 
                $pType = get_post_type();
                if($pType == "video") {
                    $attributes = "class='content_anch tgbd-popup-video' ";
                    $attributes .= "href='".get_post_meta(get_the_ID(), '_'. $pType . '_url', true)."'";
                } else if ( $pType == "audio" ) {
                    $attributes = "class='content_anch tgbd-popup-audio' ";
                    $attributes .= "href='#audio-pod".get_the_ID()."'";
                    $pod_div = "<div id='audio-pod".get_the_ID()."' style='display: none;'>".
                            get_post_meta(get_the_ID(), '_'. $pType . '_embed', true)."</div>";
                } else {
                    $attributes = "class='content_anch' ";
                    $attributes .= "href='".  get_the_permalink()."'";
                } ?>
                <a <?php echo $attributes; ?> data-ptype="<?php echo $pType; ?>">
                    <div class="hover-container">
                        <div class="news-item">
                            <?php $feature_img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' ); ?>
                            <div class="cat-logo cat-<?php echo $pType; ?>" style="background: url('<?php echo $feature_img[0]; ?>') no-repeat center center;"><span class="icon icon-philtrum_rev philtrum"></span></div>

                            <div class="col-sm-10 col-xs-9 cat-meta">
                                <?php get_template_part('templates/entry-meta-home'); ?>
                                <h2 class="entry-title-home"><?php the_title(); ?></h2>
                                <?php
                                    $post_excerpt = get_post_meta(get_the_ID(), '_'. $pType . '_excerpt', true);
                                    $post_excerpt = ($post_excerpt != '') ? $post_excerpt : get_the_excerpt();
                                ?>
                                <br/><?php echo neat_trim($post_excerpt, get_permalink(), EXCERPT_COUNT); ?>
                                <span class="icon icon-<?php echo get_post_type(); ?> mini-<?php echo get_post_type(); ?>"></span>
                            </div>
                        </div>
                        <div class="<?php echo $pType; ?>"></div>
                    </div>
                </a>
                <?php 
                    echo ($pType == "audio") ? $pod_div : "";
                ?>
            </div>  
        </article>
    </div>
</div>