<?php global $meta_attach; ?>
<table class="tb_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Section Title</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('section_title'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Section Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('section_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Section Image</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('section_img'); ?>	
                <?php $meta_attach->setGroupName('sec-img')->setInsertButtonLabel('Select Section Image'); ?>
                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Section Link</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('section_link'); ?>
                <?php $selected = ' selected="selected"'; ?>
                <select name="<?php $metabox->the_name(); ?>"  class="tb_width100 tb_field" >
                <?php 
                $args=array( 'post_type'       => 'page',
                             'post_status'     => 'publish',
                             'posts_per_page' => -1
                            );
                $pages = get_posts($args);								
                foreach ($pages  as $page ) {
                echo '<option value="'. $page->ID .'"'; $thevalue = $page->ID; if ($metabox->get_the_value() == "$thevalue") echo $selected; ?> 
                <?php echo '>' . $page->post_title .'</option>';
                }
                ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Client's Page</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('client'); ?>
                <?php $selected = ' selected="selected"'; ?>
                <select name="<?php $metabox->the_name(); ?>"  class="tb_width100 tb_field" >
                <?php 
                $args=array( 'post_type'       => 'page',
                             'post_status'     => 'publish',
                             'posts_per_page' => -1
                            );
                $pages = get_posts($args);								
                foreach ($pages  as $page ) {
                echo '<option value="'. $page->ID .'"'; $thevalue = $page->ID; if ($metabox->get_the_value() == "$thevalue") echo $selected; ?> 
                <?php echo '>' . $page->post_title .'</option>';
                }
                ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Quotes</label>
            </td>
            <td class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('highlight', array('length' => 1, 'limit' => 3))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Quote Head</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('type'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Quote Content</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('content'); ?>
                                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Quote By</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('by'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Quote</a></p></td>    
                        </tr>
                        <tr>
                            <td colspan="2"><hr class="hr"></td>
                        </tr>
                    </tbody>
                </table>
                <?php $mb->the_group_close(); ?>
            <?php endwhile; ?>
            <p style="text-align:right;">
                <a href="#" class="docopy-highlight button">Add Quote</a>
            </p>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Supporting Title</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('supporting_title'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Supporting Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('supporting_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
    </tbody>
</table>