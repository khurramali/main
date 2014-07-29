<?php

Carbon_Container::factory('theme_options', 'Theme Options')
	->add_fields(array(
		Carbon_Field::factory('separator', 'global_sep', 'Global'),
		Carbon_Field::factory('image', 'global_background_image', 'Background Image')
			->set_default_value(get_bloginfo('stylesheet_directory') . '/images/background.jpg'),

		Carbon_Field::factory('separator', 'footer_sep', 'Footer'),
		/*Carbon_Field::factory('text', 'mobile_phone')
			->set_default_value('+44 (0) 7951 943206'),*/
                Carbon_Field::factory('text', 'mail_user')
			->set_default_value('andrew@thedigital-consultancy.com'),
		Carbon_Field::factory('text', 'stationary_phone')
			->set_default_value('+44 (0) 20 7902 0670'),
		Carbon_Field::factory('text', 'twitter_username')
			->set_default_value('dconsultancy'),
		Carbon_Field::factory('text', 'general_website', 'Website')
			->set_default_value('www.thedigital-consultancy.com'),
		Carbon_Field::factory('text', 'general_address', 'Address')
			->set_default_value('31 Wootton Street, London, SE1 8TG'),
                Carbon_Field::factory('text', 'download_file_title', 'Download Link Title'),
                Carbon_Field::factory('file', 'download_file', 'Download Link'),
                Carbon_Field::factory('text', 'homepage_head', 'Homepage Heading'),
		Carbon_Field::factory('map_with_address', 'general_map', 'Map')
			->set_default_value(''),

		Carbon_Field::factory('separator', 'misc_sep', 'Misc'),
	    Carbon_Field::factory('header_scripts', 'header_script'),
	    Carbon_Field::factory('footer_scripts', 'footer_script'),
	));

