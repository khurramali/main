<?php

function cbi_sub_category_options() {
    $args = array('hide_empty' => 0, 'parent' => 0);
    $pcategories = get_categories( $args );
    
    if(isset($_POST['cbi_sub_catpage'])) {
        update_option('_cbi_sub_catpage', json_encode($_POST['cbi_sub_catpage']));
        $catpage_options = json_decode(get_option('_cbi_sub_catpage'));
    } else {
        $catpage_options = (get_option('_cbi_sub_catpage')) ? json_decode(get_option('_cbi_sub_catpage')) : null;
    }
    ?>
    <form method="post" id="cbi_category_form" enctype="multipart/form-data" action="">
    <table class="cbi_width100" id="cbi_category_table" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="3"><h3>Sub-category page Carousel</h3></td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
            <?php  $count = 0;
                foreach ( $pcategories as $pcategory ) { 
                    if ($pcategory->slug != 'uncategorized') { 
                        $args = array('hide_empty' => 0, 'child_of' => $pcategory->cat_ID);
                        $categories = get_categories( $args ); ?>
                <tr>
                    <td class="cbi_width15 cbi_texttop">
                        <h3><?php echo $pcategory->name; ?></h3>
                    </td>
                    <td class="cbi_width15 cbi_texttop"></td>
                    <td class="cbi_width70 cbi_texttop"></td>
                </tr>
                <tr>
                    <td colspan="3"><hr class="hr"></td>
                </tr>
            <?php
                        foreach($categories as $category) {
                        $cat_slug = $category->slug;
                        $cat_items = ($catpage_options->$cat_slug != null) ? $catpage_options->$cat_slug : array('0'); ?>
            <tr>
                <td class="cbi_width10 cbi_texttop"><?php echo $category->name; ?></td>
                <td class="cbi_width80 cbi_texttop">
                    <?php $total_item = 1;
                        foreach($cat_items as $item) { ?>
                    <table class="cbi_width100" id="<?php echo $cat_slug; ?>" cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2" class="cbi_width50 cbi_texttop">
                                <?php $selected = ' selected="selected"'; ?>
                                <select class="cbi_width95 cbi_field cbi_select" id="cbi_category" name="cbi_sub_catpage[<?php echo $category->slug; ?>][]" >
                                <option value="">Choose from <?php echo $category->name; ?></option>
                                <?php
                                $post_types = get_cbi_posts_by_category($category->slug);								
                                foreach ($post_types  as $post_type ) {
                                    echo '<option value="'. $post_type->ID .'"'; $thevalue = $post_type->ID; if ($item == "$thevalue") echo $selected;  ?> 
                                    <?php echo '>' . substr($post_type->post_title, 0, 35) .' ....</option>';
                                }
                                ?> 
                                </select>
                            </td>
                            <td class="cbi_width50 cbi_texttop">
                                <?php if($total_item++ > 1) { ?>
                                    <a href='#' class='rem_table'>X</a>
                                <?php } ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                    </table>
                    <?php } ?>
                    <input type="button" class="button-primary add-more-cat" data-cat="<?php echo $cat_slug; ?>"
                        data-type="cbi_sub_catpage" value="<?php _e('Add More') ?>" />
                </td>
                <td class="cbi_width10 cbi_texttop"></td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
                <?php $count++; } } } ?>
            <tr>
                <td class="cbi_width15 cbi_texttop">
                    <p class="submit">  
                        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
                    </p>
                </td>
                <td class="cbi_width15 cbi_texttop"></td>
                <td class="cbi_width70 cbi_texttop"></td>
            </tr>
        </tbody>
    </table>
    </form>
<?php
}

?>
