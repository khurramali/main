<?php global $meta_attach; ?>
<table class="cbi_width100" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td class="cbi_width15 cbi_texttop">
                <label>Introduction</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('excerpt'); ?>
                <textarea name="<?php $metabox->the_name('excerpt'); ?>" id="excerpt" maxlength="<?php echo EXCERPT_COUNT; ?>" class="cbi_width100 cbi_field"/><?php $metabox->the_value('excerpt'); ?></textarea>
                <div id="charNum" data-counter="<?php echo EXCERPT_COUNT; ?>" >(<?php echo EXCERPT_COUNT; ?> chars remaining)</div>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="cbi_width15 cbi_texttop">
                <label>Hero Image</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('hero'); ?>	
                <?php $meta_attach->setGroupName('hero-img')->setInsertButtonLabel('Select Hero Image'); ?>
                <?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value(), 'class' => 'cbi_width75 cbi_field')); ?>
                <?php echo $meta_attach->getButton(array('label' => 'Select Image', 'class' => 'cbi_width20 cbi_field')); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="cbi_width20 cas_texttop">
                <label>Building number and street name</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('line1'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="cbi_width100 cbi_field"/>
            </td>
        </tr>
        <tr>
            <td class="cbi_width20 cas_texttop">
                <label>Suburb</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('suburb'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="cbi_width100 cbi_field"/>
            </td>
        </tr>
        <tr>
            <td class="cbi_width20 cas_texttop">
                <label>Town</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('town'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="cbi_width100 cbi_field"/>
            </td>
        </tr>
        <tr>
            <td class="cbi_width15 cbi_texttop">
                <label>County</label>
            </td>
            <td class="cbi_texttop">
                <?php $selected = ' selected="selected"'; ?>
                <select name="<?php $metabox->the_name('county'); ?>" class="cbi_width100 cbi_field cbi_select">
                <?php
                echo '<option value="">Select County</option>';
                $county_group = array('England', 'Scotland', 'Wales', 'Northern Ireland');
                $counties[0] = array('Bedfordshire', 'Berkshire', 'Bristol', 'Buckinghamshire', 'Cambridgeshire',
                    'Cheshire', 'City of London', 'Cornwall', 'Cumbria', 'Derbyshire', 'Devon', 'Dorset', 'Durham',
                    'East Riding of Yorkshire', 'East Sussex', 'Essex', 'Gloucestershire', 'Greater London', 'Greater Manchester',
                    'Hampshire', 'Herefordshire', 'Hertfordshire', 'Isle of Wight', 'Kent', 'Lancashire',
                    'Leicestershire', 'Lincolnshire', 'Merseyside', 'Norfolk', 'North Yorkshire', 'Northamptonshire',
                    'Northumberland', 'Nottinghamshire', 'Oxfordshire', 'Rutland', 'Shropshire', 'Somerset',
                    'South Yorkshire', 'Staffordshire', 'Suffolk', 'Surrey', 'Tyne and Wear', 'Warwickshire', 'West Midlands',
                    'West Sussex', 'West Yorkshire', 'Wiltshire', 'Worcestershire');
                $counties[1] = array('Aberdeenshire', 'Angus', 'Argyllshire', 'Ayrshire', 'Banffshire', 'Berwickshire',
                    'Buteshire', 'Cromartyshire', 'Caithness', 'Clackmannanshire', 'Dumfriesshire', 'Dunbartonshire', 
                    'East Lothian', 'Fife', 'Inverness-shire', 'Kincardineshire', 'Kinross', 'Kirkcudbrightshire', 'Lanarkshire',
                    'Midlothian', 'Morayshire', 'Nairnshire', 'Orkney', 'Peeblesshire', 'Perthshire', 'Renfrewshire', 'Renfrewshire',
                    'Roxburghshire', 'Selkirkshire', 'Shetland', 'Stirlingshire', 'Sutherland', 'West Lothian', 'Wigtownshire');
                $counties[2] = array('Anglesey', 'Brecknockshire', 'Caernarfonshire', 'Carmarthenshire', 'Cardiganshire', 'Denbighshire',
                    'Flintshire', 'Glamorgan', 'Merioneth', 'Monmouthshire', 'Montgomeryshire', 'Pembrokeshire', 'Radnorshire');
                $counties[3] = array('Antrim', 'Armagh', 'Down', 'Fermanagh', 'Londonderry', 'Tyrone');
                for($index=0; $index < 4; $index++) {
                    echo '<optgroup label="'. $county_group[$index] .'">';
                    foreach ($counties[$index]  as $county ) {
                        echo '<option value="'. $county .'"'; $thevalue = $county; if ($metabox->get_the_value('county') == "$thevalue") echo $selected; ?> 
                        <?php echo '>' . $county . '</option>';
                    }
                    echo '</optgroup>';
                }
                ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td class="cbi_width20 cas_texttop">
                <label>Postcode</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('postcode'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="cbi_width100 cbi_field"/>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr class="hr"></td>
        </tr>
        <tr>
            <td class="cbi_width20 cas_texttop">
                <label>Source</label>
            </td>
            <td class="cbi_texttop">
                <?php $metabox->the_field('src'); ?>
                <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" class="cbi_width100 cbi_field"/>
                <div class="cbi-label">Who originally supplied the content</div>
            </td>
        </tr>
    </tbody>
</table>

