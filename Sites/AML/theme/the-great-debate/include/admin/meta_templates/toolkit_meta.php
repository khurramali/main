<?php global $meta_attach; ?>
<table class="cbi_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td class="cbi_width15 cbi_texttop">
                <label>Introduction</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('excerpt'); ?>
                <textarea name="<?php $metabox->the_name('excerpt'); ?>" id="excerpt" maxlength="<?php echo EXCERPT_COUNT; ?>" class="cbi_width100 cbi_field"><?php $metabox->the_value('excerpt'); ?></textarea>
                <div id="charNum" data-counter="<?php echo EXCERPT_COUNT; ?>" >(<?php echo EXCERPT_COUNT; ?> chars remaining)</div>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="cbi_width15 cbi_texttop">
                <label>File</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('tk_file'); ?>    
                <?php $meta_attach->setGroupName('tk-file')->setInsertButtonLabel('Select File'); ?>
                <?php $meta_attach->setTab('type'); ?>
                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'cbi_width75 cbi_field')); ?>
                <?php echo $meta_attach->getButton(array('label' => 'Select File', 'class' => 'cbi_width20 cbi_field')); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="cbi_width15 cbi_texttop">
                <label>Factsheet?</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('tk_factsheet');
                        $fs_value=$metabox->get_the_value('tk_factsheet');
                ?>
                Yes <input type="radio" name ="<?php $metabox->the_name('tk_factsheet'); ?>" id="tk_factsheet_yes" value="1" <?php echo ( $fs_value == 1 ? "checked" : "") ?>/>
                No <input type="radio" name="<?php $metabox->the_name('tk_factsheet'); ?>" id="tk_factsheet_no" value="0" <?php echo ( $fs_value == 0 ? "checked" : "") ?>/>
                
            </td>
        </tr>
    </tbody>
</table>

