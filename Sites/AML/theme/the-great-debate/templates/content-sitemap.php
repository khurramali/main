<div class="row article">
    <div class="col-sm-3 col-sm-offset-1 beta delta">
        <h3>MAIN MENU</h3>
        <?php wp_nav_menu(array('theme_location' => 'primary_navigation'
                                , 'items_wrap' => '<ul id="main-sitemap" class="%2$s">%3$s</ul>'
                                , 'depth' => 1)); ?>
    </div>
    <div class="col-sm-3 beta delta">
        <h3>QUICK LINKS</h3>
        <?php wp_nav_menu( array('menu' => 'Quick Links', 'items_wrap' => '<ul id="ql-sitemap" class="%2$s">%3$s</ul>')); ?>
    </div>
    <div class="col-sm-3 beta delta">
        <h3>FOOTER</h3>
        <?php wp_nav_menu( array('menu' => 'Footer', 'items_wrap' => '<ul id="foo-sitemap" class="%2$s">%3$s</ul>')); ?>
    </div>
</div>