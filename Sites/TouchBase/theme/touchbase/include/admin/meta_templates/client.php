<?php global $meta_attach; ?>
<?php $img = 0; ?>
<table class="tb_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Commitments</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('commit', array('length' => 1, 'limit' => 10))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Commitment Content</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('content'); ?>
                                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Commit</a></p></td>    
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
                <a href="#" class="docopy-commit button">Add Commit</a>
            </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Working With Touchbase</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Header text</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('header'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Video Poster Image</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('poster'); ?>	
                <?php $meta_attach->setGroupName('sec-poster')->setInsertButtonLabel('Select Poster Image'); ?>
                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Video Link</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('link'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Our Clients</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('client', array('length' => 1, 'limit' => 18))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Client Link</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('link'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Client Logo</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('logo'); ?>	
                                <?php $meta_attach->setGroupName('logo-'.$img)->setInsertButtonLabel('Select Logo'); ?>
                                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Client</a></p></td>
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
                <a href="#" class="docopy-client button">Add Client</a>
            </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Clients Review</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('review', array('length' => 1, 'limit' => 7))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Review Content</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('content'); ?>
                                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Review By</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('by'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Review</a></p></td>    
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
                <a href="#" class="docopy-review button">Add Review</a>
            </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Client Videos</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('cl_video', array('length' => 1, 'limit' => 8))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Video Link</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('link'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Video By</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('by'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Video Image</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('logo'); ?>	
                                <?php $meta_attach->setGroupName('logo-'.$img)->setInsertButtonLabel('Select Image'); ?>
                                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Video</a></p></td>
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
                <a href="#" class="docopy-cl_video button">Add Video</a>
            </p>
            </td>
        </tr>
    </tbody>
</table>