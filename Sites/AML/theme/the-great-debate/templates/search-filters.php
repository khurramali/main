<?php
wp_enqueue_script('cbi-search');
$post_types = array('case_study', 'opinion', 'event', 
            'news_item', 'video', 'audio', 'text_fact', 
            'graphic_fact', 'data_fact', 'factsheet_fact');
$pcategories = get_categories( array('hide_empty' => 0, 'parent' => 0) );
$loc_status = ($_POST['p_type'] == 'case_study' || $_POST['p_type'] == 'event') ? "" : "disabled ";    
$tgbd_menu_status = (get_option('_cbi_subnav')) ? get_option('_cbi_subnav') : "off";
$selected = ' selected="selected"';
?>
<div class="row article">
    <div class="col-sm-12 col-sm-offset-1 beta delta">

<a href="#" id="show-hide" class="col-sm-3 col-xs-12 omega alpha" data-state="show" >Advanced Search</a>
<div class="clearfix"></div>
<form action="" class="search-filters" method="POST" style="display: none;">
    <div class="row">
        <div class="col-sm-2 omega beta">
            <select name="p_type" class="form-control" id="p_type">
                <option value="">Select Post Type</option>
                <?php foreach($post_types as $post_type) { ?>
                <option value="<?php echo $post_type; ?>" <?php $thevalue = $post_type; if ($_POST['p_type'] == "$thevalue") echo $selected; ?>>
                    <?php echo ucfirst(str_replace("_", " ", $post_type)); ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-2 omega beta">
            <select name="c_type" class="form-control">
                <option value="">Select Category</option>
                <?php foreach($pcategories as $pcategory) { 
                    if ($pcategory->slug != 'uncategorized') { ?>
                        <option value="<?php echo $pcategory->cat_ID; ?>" <?php $thevalue = $pcategory->cat_ID; if ($_POST['c_type'] == "$thevalue") echo $selected; ?> >
                            <b><?php echo $pcategory->name; ?></b>
                        </option>
                        <?php 
                        if($tgbd_menu_status != "off") {
                            $categories = get_categories( array('hide_empty' => 0, 'child_of' => $pcategory->cat_ID) );
                            foreach($categories as $category) {
                                ?>
                                <option value="<?php echo $category->cat_ID; ?>" <?php $thevalue = $category->cat_ID; if ($_POST['c_type'] == "$thevalue") echo $selected; ?> >
                                    <?php echo "- " . $category->name; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                <?php } 
                } ?>
            </select>
        </div>
        <div class="col-sm-2 omega beta">
            <select name="loc" class="form-control" <?php echo $loc_status; ?>id="loc">
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
                    echo '<option value="'. $county .'"'; $thevalue = $county; if ($_POST['loc'] == "$thevalue") echo $selected; ?> 
                    <?php echo '>' . $county . '</option>';
                }
                echo '</optgroup>';
            }
            ?> 
            </select>
        </div>
        
        <div class="col-sm-2 omega beta">
            <select name="order_by" class="pull-right form-control">
                <option value="ASC" <?php if ($_POST['order_by'] == "ASC") echo $selected; ?>>Ascending</option>
                <option value="DESC"<?php if ($_POST['order_by'] == "DESC") echo $selected; ?>>Descending</option>
            </select>
        </div>
        
        <div class="col-sm-2 beta delta">
            <input type="submit" class="btn btn-primary pull-right" value="GO" />
        </div>
    </div>
   
</form>
    </div>
</div>