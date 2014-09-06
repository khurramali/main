<table class="tb_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>People Reviews</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('review', array('length' => 1, 'limit' => 6))): ?>
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
                <label><h1>Opportunities</h1></label>
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
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('job', array('length' => 1, 'limit' => 10))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Job Title</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('title'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Job Details</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('detail'); ?>
                                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Job</a></p></td>    
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
                <a href="#" class="docopy-job button">Add Job</a>
            </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Want to join?</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
                <?php $metabox->the_field('join_us'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
    </tbody>
</table>