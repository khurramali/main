<table class="tb_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td class="tb_width50 tb_texttop">
                <label>Check to activate:</label>
            </td>
            <td class="tb_texttop">
                <?php $metabox->the_field('status'); ?>
                <input type="checkbox" name="<?php $metabox->the_name(); ?>" value="1"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/>
            </td>
        </tr>
    </tbody>
</table>