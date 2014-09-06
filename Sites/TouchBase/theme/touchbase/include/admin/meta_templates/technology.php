<?php global $meta_attach; ?>
<?php $img = 0; ?>
<table class="tb_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Sectors</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('sector', array('length' => 1, 'limit' => 10))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Sector Head</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('head'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Sector Content</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('content'); ?>
                                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Sector Image</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('img'); ?>	
                                <?php $meta_attach->setGroupName('img-'.$img)->setInsertButtonLabel('Select Sector Image'); ?>
                                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Sector</a></p></td>    
                        </tr>
                        <tr>
                            <td colspan="2"><hr class="hr"></td>
                        </tr>
                    </tbody>
                </table>
                <?php $mb->the_group_close(); ?>
                <?php $img++; ?>
            <?php endwhile; ?>
            <p style="text-align:right;">
                <a href="#" class="docopy-sector button">Add Sector</a>
            </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Approach Section</h1></label>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('app_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Design Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('design'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Transition Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('transition'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Manage Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('manage'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Quote</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('app_quote'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>By</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('app_by'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
            </td>
        </tr>
    </tbody>
</table>