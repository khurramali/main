
<?php wp_enqueue_script('cbi-survey'); ?>
<?php $survey_data = (get_option('_cbi_survey')) ? json_decode(get_option('_cbi_survey')) : null;
$survey_status = ($survey_data->status) ? true : false;

if($survey_data != null && $survey_status) { ?>
    <div class="col-sm-5 col-sm-offset-1 beta delta survey-bottone">
        <?php $pop_class = (isset($_GET['popup'])) ? "tgbn-auto-popup" : ""; ?>
        <a class="<?php echo $pop_class; ?>" id="inline" href="#survey_data">
            <div class="half-button"><span class="icon icon-participate"></span> Take our survey</div>
        </a>
    </div>
    <div class="col-sm-5 beta delta">   
        <a href="/wp/about/">
                <div class="half-button">About TGBD</div>
        </a>
    </div>
    <div style="display: none;">
        <div class="row article" id='survey_data'>
            <div class="beta delta news-pad">
                <?php if ( is_user_logged_in() ) { ?>
                    <form role="form" id="cbi_survey" style="margin: 0 auto;">
                        <div class="col-sm-9 col-xs-9 omega alpha"><h3>Join The Debate</h3></div>
               			<span class="icon icon-subscribe col-sm-3 col-xs-3 omega alpha text-right"></span>
                        <div class="clearfix"></div>
                        <?php if ( is_user_logged_in() ) { ?>
                                <?php
                                    $current_user = wp_get_current_user();
                                ?>
                                <input type="text" name="name" required="true" value="<?php echo $current_user->display_name; ?>" class="form-control">
                                <input type="email" name="email" required="true" value="<?php echo $current_user->user_email; ?>" class="form-control">
                                <input type="hidden" name="id" value="<?php echo $current_user->ID; ?>" class="form-control">
                        <?php } else { ?> 
                            <div class="required-field-block">
                                <input type="text" placeholder="Name*" name="name" required="true" class="form-control">
                            </div>

                            <div class="required-field-block">
                                <input type="email" placeholder="Email*" name="email" required="true" class="form-control">
                            </div>
                        <?php } ?>
                        <div class="required-field-block" style="margin-top: 15px;">
                            <p>Q: <?php echo $survey_data->quest; ?></p>
                        </div>
                        
                        <?php $x=1; foreach($survey_data->ans as $ans) { 
                                $answer = str_replace(" ", "-", $ans);
                        ?>
                            <div class="required-field-block survey-rfb radio<?php if($x==1) { echo " surv-first"; } ?>" style="padding-left: 20px;">
                            	<input type='radio' name='ans' required value='<?php echo $answer; ?>' />
                                <?php echo $ans; ?>
                            </div>
                        <?php $x++; } ?>
						
                        <button class="btn btn-primary" style="width:100%;">OK</button>
                    </form>
                    <div class="btn btn-success message" style="display: none;"></div>
                <?php } else { 
                    $login_url = get_option('itsec_hide_backend', true);
                    $login_url = ($login_url['enabled']) ? $login_url['slug'] : "wp-login.php";
                    $redirect = site_url() . '/'. $login_url .'?redirect_to=' . urlencode( $_SERVER['REQUEST_URI'] ) . '%3Fpopup=show';
                    ?>
                    <label>You should be <a href="<?php echo $redirect; ?>" >logged in</a> to join the debate.</label>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="col-sm-10 col-sm-offset-1 beta delta">   
        <a href="/wp/about/">
                <div class="half-button">About TGBD</div>
        </a>
    </div>
<?php } ?>

