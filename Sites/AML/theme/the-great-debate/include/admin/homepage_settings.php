<?php

function tgbd_homepage_options() {
    $args = array('hide_empty' => 0, 'parent' => 0);
    $categories = get_categories( $args );
    
    $all_articles = get_cbi_posts_by_category();
    
    if(isset($_POST['cbi_homepage'])) {
        update_option('_cbi_homepage', json_encode($_POST['cbi_homepage']));
        $homepage_options = json_decode(get_option('_cbi_homepage'));
    } else {
        $homepage_options = (get_option('_cbi_homepage')) ? json_decode(get_option('_cbi_homepage')) : null;
    }
    
    $homepage['feature'] = ($homepage_options->feature != null) ? $homepage_options->feature : "";
    $homepage['f_status'] = ($homepage_options->f_status != null) ? $homepage_options->f_status : "off";
    $cbi_homepage_f_status = ($homepage['f_status'] == 'on') ? "checked=checked" : "";
    
    $homepage['video_url'] = ($homepage_options->video_url != null) ? $homepage_options->video_url : "";
    $homepage['video_poster'] = ($homepage_options->video_poster != null) ? $homepage_options->video_poster : "";
    $homepage['v_status'] = ($homepage_options->v_status != null) ? $homepage_options->v_status : "off";
    $cbi_homepage_v_status = ($homepage['v_status'] == 'on') ? "checked=checked" : "";
    
    $homepage['feature_sticky'] = ($homepage_options->feature_sticky != null) ? $homepage_options->feature_sticky : "";
    $homepage['features'] = ($homepage_options->features != null) ? $homepage_options->features : "";
    
    $homepage['sticky_type'] = ($homepage_options->sticky_type != null) ? $homepage_options->sticky_type : "";
    $homepage['sticky_dropdown'] = ($homepage_options->sticky_dropdown != null) ? $homepage_options->sticky_dropdown : "";
    $homepage['sticky_html'] = ($homepage_options->sticky_html != null) ? stripslashes($homepage_options->sticky_html) : "";
    
    ?>
    <form method="post" id="cbi_homepage_form" enctype="multipart/form-data" action="">
    <table class="cbi_width100" id="cbi_homepage_table" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="3"><h3>Homepage Carousel</h3></td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
            <tr>
                <td class="cbi_width10 cbi_texttop">Featured Slide</td>
                <td class="cbi_width10 cbi_texttop">
                    <input type="checkbox" name="cbi_homepage[f_status]" id="cbi_homepage_f_status" class="showIt" data-tableId="cbi_feature_table" <?php echo $cbi_homepage_f_status; ?> />
                </td>
                <td class="cbi_width80 cbi_texttop">
                    <table class="cbi_width100" id="cbi_feature_table" <?php echo ($homepage['f_status'] == "off") ? "style='display: none;'" : ""; ?> cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2" class="cbi_width50 cbi_texttop">
                                <?php $selected = ' selected="selected"'; ?>
                                <select class="cbi_width100 cbi_field cbi_select" id="cbi_feature" name="cbi_homepage[feature]" >
                                <option value="">Choose a feature</option>
                                <?php 
                                $post_types = get_cbi_posts_by_category();								
                                foreach ($post_types  as $post_type ) {
                                    echo '<option value="'. $post_type->ID .'"'; $thevalue = $post_type->ID; if ($homepage['feature'] == "$thevalue") echo $selected;  ?> 
                                    <?php echo '>' . substr($post_type->post_title, 0, 35) .' ....</option>';
                                }
                                ?> 
                                </select>
                            </td>
                            <td class="cbi_width35 cbi_texttop"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
            <tr>
                <td class="cbi_width10 cbi_texttop">Video</td>
                <td class="cbi_width10 cbi_texttop">
                    <input type="checkbox" name="cbi_homepage[v_status]" id="cbi_homepage_v_status" class="showIt" data-tableId="cbi_video_table" <?php echo $cbi_homepage_v_status; ?> />
                </td>
                <td class="cbi_width80 cbi_texttop">
                    <table class="cbi_width100" id="cbi_video_table" <?php echo ($homepage['v_status'] == "off") ? "style='display: none;'" : ""; ?> cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="cbi_width15 cbi_texttop">Url</td>
                            <td class="cbi_width50 cbi_texttop">
                                <input type="text" name="cbi_homepage[video_url]" id="cbi_homepage[video_url]" class="cbi_width95 cbi_field" value="<?php echo $homepage['video_url']; ?>" />
                            </td>
                            <td class="cbi_width35 cbi_texttop"></td>
                        </tr>
                        <tr>
                            <td class="cbi_width15 cbi_texttop">Poster Image</td>
                            <td class="cbi_width50 cbi_texttop">
                                <input type="text" name="cbi_homepage[video_poster]" id="cbi_homepage[video_poster]" class="cbi_width95 cbi_field" value="<?php echo $homepage['video_poster']; ?>" />
                                <div class="cbi-label">Generate poster (replace VIDEO_ID with youtube video id): "http://img.youtube.com/vi/VIDEO_ID/0.jpg"</div>
                            </td>
                            <td class="cbi_width35 cbi_texttop"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
        </tbody>
    </table>
    <table class="cbi_width100" id="tgbd_feature_table" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="3"><h3>Featured Sticky Articles</h3></td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
            <tr>
                <td class="cbi_width10 cbi_texttop">Choose settings:</td>
                <td class="cbi_width10 cbi_texttop"></td>
                <td class="cbi_width80 cbi_texttop">
                    <input type="radio" name="cbi_homepage[feature_sticky]" class="cbi_field feature_sticky"
                           <?php echo ($homepage['feature_sticky'] == "0") ? "checked" : ""; ?>
                           value="0" />Hide All &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="cbi_homepage[feature_sticky]" class="cbi_field feature_sticky"
                           <?php echo ($homepage['feature_sticky'] == "2") ? "checked" : ""; ?>
                           value="2" />Show Two &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="cbi_homepage[feature_sticky]" class="cbi_field feature_sticky"
                           <?php echo ($homepage['feature_sticky'] == "4") ? "checked" : ""; ?>
                           value="4" />Show four
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
            <?php for($index=1; $index <=4; $index++) { ?>
                <table <?php
                if($index >= 1 && $index <= 2) { 
                    echo ($homepage['feature_sticky'] == "2" || $homepage['feature_sticky'] == "4") ? "" : "style='display: none;'"; 
                    echo " class='cbi_width100 show-two'";
                } else if($index >= 3 && $index <= 4) {
                    echo ($homepage['feature_sticky'] == "4") ? "" : "style='display: none;'"; 
                    echo " class='cbi_width100 show-four'";
                }
                ?>>
                    <tr>
                <td class="cbi_width10 cbi_texttop">Sticky Feature <?php echo $index; ?>:</td>
                <td class="cbi_width10 cbi_texttop"></td>
                <td class="cbi_width80 cbi_texttop">
                    <select class="cbi_width80 cbi_field sticky_input sticky_dropdown cbi_select"
                            id="sticky_dropdown" name="cbi_homepage[features][]" >
                    <option value="">Choose a sticky feature:</option>
                    <?php foreach($all_articles as $article) {
                            echo '<option value="'. $article->ID .'"'; $thevalue = $article->ID; if ($homepage['features'][$index-1] == "$thevalue") echo $selected;
                            echo '>' . substr($article->post_title, 0, 35) .' ....</option>';
                        }
                        ?> 
                    </select>
                </td></tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
                </table>
            <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
        </tbody>
    </table>
    <table class="cbi_width100" id="tgbd_sticky_table" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="3"><h3>Sticky Post</h3></td>
            </tr>
            <tr>
                <td class="cbi_width15 cbi_texttop">Choose an Article</td>
                <td class="cbi_width10 cbi_texttop">
                    <input type="radio" name="cbi_homepage[sticky_type]" class="cbi_field sticky_type"
                           <?php echo ($homepage['sticky_type'] == "dropdown") ? "checked" : ""; ?>
                           value="dropdown" />Items list <br />
                    <input type="radio" name="cbi_homepage[sticky_type]" class="cbi_field sticky_type"
                           <?php echo ($homepage['sticky_type'] == "html") ? "checked" : ""; ?>
                           value="html" />Html Area
                </td>
                <td class="cbi_width75 cbi_texttop">
                    <select class="cbi_width80 cbi_field sticky_input sticky_dropdown cbi_select"
                            <?php echo ($homepage['sticky_type'] == "dropdown") ? "" : "style='display: none;'"; ?>
                            id="sticky_dropdown" name="cbi_homepage[sticky_dropdown]" >
                    <option value="">Choose a sticky article:</option>
                    <?php foreach($all_articles as $article) {
                            echo '<option value="'. $article->ID .'"'; $thevalue = $article->ID; if ($homepage['sticky_dropdown'] == "$thevalue") echo $selected;
                            echo '>' . substr($article->post_title, 0, 35) .' ....</option>';
                        }
                        ?> 
                    </select>
                    <textarea name="cbi_homepage[sticky_html]"
                              <?php echo ($homepage['sticky_type'] == "html") ? "" : "style='display: none;'"; ?>
                              id="sticky_html" class="cbi_width80 cbi_field cbi-embed sticky_input sticky_html"><?php echo $homepage['sticky_html']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3"><hr class="hr"></td>
            </tr>
        </tbody>
    </table>
    <table class="cbi_width100" id="tgbd_category_table" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td class="cbi_width15 cbi_texttop">
                    <p class="submit">  
                        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
                    </p>
                </td>
                <td class="cbi_width85 cbi_texttop"></td>
            </tr>
        </tbody>
    </table>
    </form>
<?php
}