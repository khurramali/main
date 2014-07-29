<?php

Carbon_Container::factory('custom_fields', 'Page Settings')
	->show_on_post_type('page')
	->show_on_template(array(
		'default',
		'template-clients.php',
		'template-contact.php',
		'template-services.php',
		'template-team.php',
		'template-blog.php',
		'template-subscribe.php'
	))
	->add_fields(array(
                Carbon_Field::factory('text', 'page_link_title', 'Link Title'),
                Carbon_Field::factory('file', 'page_link', 'Link'),
		Carbon_Field::factory('textarea', 'page_custom_title', 'Custom Title')
			->help_text('If specified will replace the default page title above the page content.<br />Multiple lines are accepted.'),
		Carbon_Field::factory('choose_sidebar', 'page_custom_sidebar', 'Sidebar')
			->set_sidebar_options(tdc_sidebar_options()),
	));

Carbon_Container::factory('custom_fields', 'Client Settings')
	->show_on_post_type('client')
	->add_fields(array(
		Carbon_Field::factory('checkbox', 'client_featured', 'Featured?'),
		Carbon_Field::factory('image', 'client_logo', 'Logo')
			->set_required(true),
		Carbon_Field::factory('text', 'client_link', 'Link')
	));

Carbon_Container::factory('custom_fields', 'Services Page Settings')
	->show_on_post_type('page')
	->show_on_template(array(
		'template-services.php',
	))
	->add_fields(array(
		Carbon_Field::factory('complex', 'services')
			->setup_labels(
				array(
				    'plural_name'=>'Services',
				    'singular_name'=>'Service',
				)
			)
			->set_layout(Carbon_Field_Complex::LAYOUT_TABLE)
			->add_fields(array(
			    Carbon_Field::factory('text', 'title')
			    	->set_required(true),
			    Carbon_Field::factory('rich_text', 'content'),
			))
	));

Carbon_Container::factory('custom_fields', 'Team Page Settings')
	->show_on_post_type('page')
	->show_on_template(array(
		'template-team.php',
	))
	->add_fields(array(
		Carbon_Field::factory('complex', 'team')
			->setup_labels(
				array(
				    'plural_name'=>'Members',
				    'singular_name'=>'Member',
				)
			)
			->set_layout(Carbon_Field_Complex::LAYOUT_TABLE)
			->add_fields(array(
			    Carbon_Field::factory('textarea', 'name')
					->set_height(65)
			    	->set_required(true),
			    Carbon_Field::factory('rich_text', 'description'),
			    Carbon_Field::factory('image', 'image')
			    	->help_text('Size: 194px * 158px. Larger images will be automatically resized.'),
			    Carbon_Field::factory('text', 'email'),
			    Carbon_Field::factory('file', 'bio_for_download'),
			    Carbon_Field::factory('file', 'photo_for_download'),
			))
	));