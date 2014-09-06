<?php global $meta_attach; ?>
<?php $img = 0; ?>
<table class="tb_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Awards</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <?php for($award=1; $award<=5; $award++) { ?>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Award Image <?php echo $award; ?></label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('aw_img_'.$award); ?>	
                <?php $meta_attach->setGroupName('aw-img-'.$award)->setInsertButtonLabel('Select Award Image'); ?>
                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Our Cisco Partnership</h1></label>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Introduction Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('intro_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <?php for($spec=1; $spec<=2; $spec++) { ?>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Introduction Spec <?php echo $spec; ?></label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('intro_spec_'.$spec); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Our Awards</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
                <?php $metabox->the_field('our_awards'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Award List 1</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('our_awards_list1'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Award List 2</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('our_awards_list2'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Eco-Systems Partners</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
                <?php $metabox->the_field('eco_partners'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Partners List</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('partner', array('length' => 1, 'limit' => 10))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Partner Link</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('link'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Partner Logo</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('logo'); ?>	
                                <?php $meta_attach->setGroupName('logo-'.$img)->setInsertButtonLabel('Select Logo'); ?>
                                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Partner</a></p></td>
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
                <a href="#" class="docopy-partner button">Add Partner</a>
            </p>
            </td>
        </tr>
    </tbody>
</table>