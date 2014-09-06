<?php global $meta_attach; ?>
<?php $img = 0; ?>
<table class="tb_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Founding Principles</h1></label>
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
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>People</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('people'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Clients</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('clients'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Proposition</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('proposition'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Fiscal</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('fiscal'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Operational Excellence</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('o_excellence'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Leadership Team</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('member', array('length' => 1, 'limit' => 12))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Team Member Name</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('name'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Team Member Job Title</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('title'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>About Team Member</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('about'); ?>
                                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Team Member Image</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('img'); ?>	
                                <?php $meta_attach->setGroupName('img-'.$img)->setInsertButtonLabel('Select Sector Image'); ?>
                                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Member</a></p></td>    
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
                <a href="#" class="docopy-member button">Add Member</a>
            </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Our Investors</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('inv_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Image</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('inv_img'); ?>	
                <?php $meta_attach->setGroupName('inv-img')->setInsertButtonLabel('Select Investor Image'); ?>
                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
            </td>
        </tr>        
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Opportunities</h1></label>
            </td>
        </tr>        
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('opp_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Link</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('opp_link'); ?>
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
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Social Responsibility</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('sr_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Image</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('sr_img'); ?>	
                <?php $meta_attach->setGroupName('sr-img')->setInsertButtonLabel('Select Social Image'); ?>
                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'tb_width75 tb_field')); ?>
                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'tb_width20 tb_field')); ?>
            </td>
        </tr>
    </tbody>
</table>