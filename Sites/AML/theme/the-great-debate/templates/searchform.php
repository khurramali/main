<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url('/'); ?>">
    <a href="#" id="show-search"><span class="icon icon-search"></span> Search</a>
    <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-field form-control" style="display: none;">
    <label class="hide"><?php _e('Search:', 'roots'); ?></label>
    <button type="submit" style="display: none;" class="search-submit btn btn-default"><span class="icon icon-search"></span></button>
</form>
