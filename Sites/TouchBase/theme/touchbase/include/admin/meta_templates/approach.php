<?php global $meta_attach; ?>
<table class="tb_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Design</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Design Header</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('d_header'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Design Image</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('d_img'); ?>	
                <?php $meta_attach->setGroupName('d-img')->setInsertButtonLabel('Select Design Image'); ?>
                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('d_process', array('length' => 1, 'limit' => 4))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Design Process Title</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('title'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Design Process Content</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('content'); ?>
                                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Process</a></p></td>    
                        </tr>
                        <tr>
                            <td colspan="2"><hr class="hr"></td>
                        </tr>
                    </tbody>
                </table>
                <?php $mb->the_group_close(); ?>
            <?php endwhile; ?>
            <p style="text-align:right;">
                <a href="#" class="docopy-d_process button">Add Process</a>
            </p>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Transition</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Transition Header</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('t_header'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Transition Image</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('t_img'); ?>	
                <?php $meta_attach->setGroupName('t-img')->setInsertButtonLabel('Select Transition Image'); ?>
                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('t_process', array('length' => 1, 'limit' => 4))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Transition Process Title</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('title'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Transition Process Content</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('content'); ?>
                                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Process</a></p></td>    
                        </tr>
                        <tr>
                            <td colspan="2"><hr class="hr"></td>
                        </tr>
                    </tbody>
                </table>
                <?php $mb->the_group_close(); ?>
            <?php endwhile; ?>
            <p style="text-align:right;">
                <a href="#" class="docopy-t_process button">Add Process</a>
            </p>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Manage</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Manage Header</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('m_header'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Manage Image</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('m_img'); ?>	
                <?php $meta_attach->setGroupName('m-img')->setInsertButtonLabel('Select Sector Image'); ?>
                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('m_process', array('length' => 1, 'limit' => 4))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Manage Process Title</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('title'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Manage Process Content</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('content'); ?>
                                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Process</a></p></td>    
                        </tr>
                        <tr>
                            <td colspan="2"><hr class="hr"></td>
                        </tr>
                    </tbody>
                </table>
                <?php $mb->the_group_close(); ?>
            <?php endwhile; ?>
            <p style="text-align:right;">
                <a href="#" class="docopy-m_process button">Add Process</a>
            </p>
            </td>
        </tr>
    </tbody>
</table>