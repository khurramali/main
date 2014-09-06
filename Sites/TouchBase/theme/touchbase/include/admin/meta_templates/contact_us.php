<table class="tb_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Connect With Us</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h2>Call Section</h2></label>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('call_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h2>Video Section</h2></label>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('video_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h2>Chat Section</h2></label>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('chat_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h2>Email Section</h2></label>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Content</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('email_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Find Us</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <?php $metabox->the_field('findus_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Addresses</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_texttop">
            <?php while ($mb->have_fields_and_multi('address', array('length' => 1, 'limit' => 3))): ?>
                <?php $mb->the_group_open(); ?>
                <table class="tb_width100" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Title</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('title'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Full Address</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('full_add'); ?>
                                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Telephone</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('tel'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="tb_width20 tb_texttop">
                                <label>Website</label>
                            </td>
                            <td class="tb_texttop">
                                <?php $metabox->the_field('web'); ?>
                                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width100 tb_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><a href="#" style="margin-top:10px;display:inline-block;" class="dodelete button">Remove Address</a></p></td>
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
                <a href="#" class="docopy-address button">Add Address</a>
            </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Google Maps Coordinates</h1></label>
            </td>
        </tr><!--
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <?php //$metabox->the_field('map'); ?>
                <textarea name="<?php // $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php // $metabox->the_value(); ?></textarea>
            </td>
        </tr>-->
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Longitude</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('map_log'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width50 tb_field"/>
            </td>
        </tr>
        <tr>
            <td class="tb_width20 tb_texttop">
                <label>Latitude</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('map_lat'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="tb_width50 tb_field"/>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <label><h1>Follow Us</h1></label>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tb_width100 tb_texttop">
                <?php $metabox->the_field('followus_content'); ?>
                <textarea name="<?php $metabox->the_name(); ?>" class="tb_width100 tb_field"/><?php $metabox->the_value(); ?></textarea>
            </td>
        </tr>
    </tbody>
</table>