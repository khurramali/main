<?php $all_articles = get_cbi_posts_by_category(); ?>
<table class="cbi_width100" id="camp_ad_table" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td class="cbi_width40 cbi_texttop">
                <input type="radio" name="<?php $metabox->the_name('type'); ?>" class="cbi_field camp_ad"
                <?php echo ($metabox->get_the_value('type') == "default" || !$metabox->get_the_value('type')) ? "checked" : ""; ?>
                value="default" />Default
            </td>
            <td class="cbi_width30 cbi_texttop">
                <?php $metabox->the_field('type'); ?>
                <input type="radio" name="<?php $metabox->the_name('type'); ?>" class="cbi_field camp_ad"
                <?php echo ($metabox->get_the_value('type') == "dropdown") ? "checked" : ""; ?>
                value="dropdown" />Posts
            </td>
            <td class="cbi_width30 cbi_texttop">
                <input type="radio" name="<?php $metabox->the_name('type'); ?>" class="cbi_field camp_ad"
                <?php echo ($metabox->get_the_value('type') == "html") ? "checked" : ""; ?>
                value="html" />Html Area
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="camp_ad_input camp_ad_default" <?php echo (!$metabox->get_the_value('type') 
                || $metabox->get_the_value('type') == "default" ) ? "" : "style='display: none;'"; ?>>
            <td colspan="3" class="cbi_texttop">
                <?php $metabox->the_field('default_title'); ?>
                <input type="checkbox" class="cbi_field"
                       name="<?php $metabox->the_name('default_title'); ?>" value="1"<?php $metabox->the_checkbox_state('1'); ?>/>
                <label class="cbi-label">Overwrite title</label>
            </td>
        </tr>
        <tr class="camp_ad_input camp_ad_dropdown" <?php echo ($metabox->get_the_value('type') == "dropdown") ? "" : "style='display: none;'"; ?>>
            <td colspan="3" class="cbi_texttop">
                <?php $metabox->the_field('item'); ?>
                <?php $selected = ' selected="selected"'; ?>
                <select class="cbi_width80 cbi_field cbi_select" name="<?php $metabox->the_name('item'); ?>" >
                    <option value="">Choose an item:</option>
                    <?php foreach($all_articles as $article) {
                        echo '<option value="'. $article->ID .'"'; $thevalue = $article->ID; if ($metabox->get_the_value('item') == "$thevalue") echo $selected;
                        echo '>' . substr($article->post_title, 0, 35) .' ....</option>';
                    }
                    ?> 
                </select>
                <?php $metabox->the_field('dropdown_title'); ?>
                <input type="checkbox" class="cbi_field" name="<?php $metabox->the_name('dropdown_title'); ?>" value="1"<?php $metabox->the_checkbox_state('1'); ?>/>
                <label class="cbi-label">Overwrite title</label>
            </td>
        </tr>
        <tr class="camp_ad_input camp_ad_html" <?php echo ($metabox->get_the_value('type') == "html") ? "" : "style='display: none;'"; ?>>
            <td colspan="3" class="cbi_texttop">
                <?php $metabox->the_field('html'); ?>
                <textarea name="<?php $metabox->the_name('html'); ?>"
                    class="cbi_width100 cbi_field cbi-embed"/><?php $metabox->the_value('html'); ?></textarea>
            </td>
        </tr>
    </tbody>
</table>

