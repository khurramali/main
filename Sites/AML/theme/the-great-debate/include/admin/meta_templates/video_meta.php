<?php global $meta_attach; ?>
<table class="cbi_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td class="cbi_width15 cbi_texttop">
                <label>Introduction</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('excerpt'); ?>
                <textarea name="<?php $metabox->the_name('excerpt'); ?>" id="excerpt" maxlength="<?php echo EXCERPT_COUNT; ?>" class="cbi_width100 cbi_field"/><?php $metabox->the_value('excerpt'); ?></textarea>
                <div id="charNum" data-counter="<?php echo EXCERPT_COUNT; ?>" >(<?php echo EXCERPT_COUNT; ?> chars remaining)</div>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="cbi_width20 cas_texttop">
                <label>URL</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('url'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="cbi_width100 cbi_field"/>
            </td>
        </tr>
    </tbody>
</table>

