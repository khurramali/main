<?php
/*
  Template Name: Template - Contact Us
 */
?>
<?php get_header(); ?>
<?php wp_enqueue_script('tb-contact'); ?>
<?php $page_meta = get_post_meta(get_the_ID()); //print_r($page_meta); ?>
<?php $current_options = (get_option('tb_options')) ? json_decode(get_option('tb_options')) : null; ?>
<?php $address = get_post_meta(get_the_ID(), '_contact_address', true); ?>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>Connect With Us</h1>
            <div class="row contact-wrapper">
                <div class="col-sm-6 col-xs-12 section">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Call.png" class="responsive-img">
                    <h1>Call</h1>
                    <p><?php echo $page_meta['_contact_call_content'][0]; ?></p>
                    <?php if($current_options->call != null) { ?>
                    <a class="connect" href="<?php echo $current_options->call; ?>">CALL</a>
                    <?php } ?>
                </div>
                <div class="col-sm-6 col-xs-12 section">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Video.png" class="responsive-img">
                    <h1>Video</h1>
                    <p><?php echo $page_meta['_contact_video_content'][0]; ?></p>
                    <?php if($current_options->video != null) { ?>
                    <a class="connect" href="<?php echo $current_options->video; ?>">CONNECT</a>
                    <?php } ?>
                </div>
                <div class="col-sm-6 col-xs-12 section">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Chat.png" class="responsive-img">
                    <h1>Chat</h1>
                    <p><?php echo $page_meta['_contact_chat_content'][0]; ?></p>
                    <?php if($current_options->chat != null) { ?>
                    <a class="connect" href<?php echo $current_options->chat; ?>">CHAT</a>
                    <?php } ?>
                </div>
                <div class="col-sm-6 col-xs-12 section">
                    <img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/images/FooterIcon_Email.png" class="responsive-img">
                    <h1>Email</h1>
                    <p><?php echo $page_meta['_contact_email_content'][0]; ?></p>
                    <?php if($current_options->mail != null) { ?>
                    <a class="connect" href="mailto: <?php echo $current_options->mail; ?>">EMAIL</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="expanded-bg250"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row contact-wrapper">
                <div class="col-xs-6">
                    <h1>Find Us</h1>
                    <p><?php echo $page_meta['_contact_findus_content'][0];  ?></p>
                </div>
                <div class="col-xs-6">
                    <h1><?php echo $address[0]['title']; ?></h1>
                    <p>
                        <?php echo $address[0]['full_add']; ?><br /><br />
                        <abbr title="Telephone">T:</abbr> <?php echo $address[0]['tel']; ?><br />
                        <abbr title="Website">W:</abbr> <a href="http://<?php echo $address[0]['web']; ?>" target="_blank"><?php echo $address[0]['web']; ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fluid-map"><?php //echo $page_meta['_contact_map'][0];  ?></div>
<div id="map" style="height: 350px;" data-log="<?php echo $page_meta['_contact_map_log'][0];  ?>"
      data-lat="<?php echo $page_meta['_contact_map_lat'][0];  ?>"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row contact-wrapper">
                <div class="col-xs-6">
                    <h1><?php echo $address[1]['title']; ?></h1>
                    <p>
                        <?php echo $address[1]['full_add']; ?><br /><br />
                        <abbr title="Telephone">T:</abbr> <?php echo $address[1]['tel']; ?><br />
                        <abbr title="Website">W:</abbr> <a href="http://<?php echo $address[1]['web']; ?>" target="_blank"><?php echo $address[1]['web']; ?></a>
                    </p>
                </div>
                <div class="col-xs-6">
                    <h1><?php echo $address[2]['title']; ?></h1>
                    <p>
                        <?php echo $address[2]['full_add']; ?><br /><br />
                        <abbr title="Telephone">T:</abbr> <?php echo $address[2]['tel']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="expanded-bg520"></div>
<div class="container">
    <div class="row content-wrapper">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row contact-wrapper">
                <div class="col-sm-6 col-xs-12">
                    <h1>Follow us</h1>
                    <?php echo $page_meta['_contact_followus_content'][0]; ?>
                    <div class="row">
                        <div class="col-xs-12 social-share">
                        <a class="linkedin" href="<?php echo $current_options->linkedin; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" class="responsive-img" /></a>
                        <a href="<?php echo $current_options->twitter; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" class="responsive-img" /></a>
                        <a href="<?php echo $current_options->google; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/googleplus.png" class="responsive-img" /></a>
                        <a href="<?php echo $current_options->facebook; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" class="responsive-img" /></a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="join-us">
                        <h1>Join Our Communication Programme</h1>
                        <p class="message"></p>
                        <form action="" id="tb_join_us" method="post" role="form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" required id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" required id="company" name="company">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" required id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Telephone</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script type="text/javascript">
    var Latlng = document.getElementById("map").attributes;
    var myLatlng = new google.maps.LatLng(Latlng[2].value, Latlng[3].value);
    var styles = [
        {
            stylers: [
                { "saturation": -100 },
                { "gamma": 1 },
                { saturation: -20 }
            ]
        }
    ];
    var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});
    var mapOptions = {
        zoom: 16,
        center: myLatlng,
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
        }
    };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title:"9A Devonshire Square"
    });
    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');
    
</script>
<?php get_footer(); ?>