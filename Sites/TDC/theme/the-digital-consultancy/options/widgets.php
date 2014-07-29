<?php
/*
* Register the new widget classes here so that they show up in the widget list
*/
function load_widgets() {
	register_widget('LatestTweets');
	register_widget('ThemeWidgetCustomBlock');
	register_widget('ThemeWidgetFeaturedClients');
}
add_action('widgets_init', 'load_widgets');


/*
* Displays a block with latest tweets from particular user
*/

class LatestTweets extends Carbon_Widget {
	protected $form_options = array(
		'width' => 300
	);

	function LatestTweets() {
		$this->setup('Latest Tweets', 'Displays a block with your latest tweets', array(
			Carbon_Field::factory('text', 'title', 'Title'),
			Carbon_Field::factory('text', 'username', 'Username'),
			Carbon_Field::factory('text', 'count', 'Number of Tweets to show')->set_default_value('5')
		));
	}

	/*
	* Called when rendering the widget in the front-end
	*/
	function front_end($args, $instance) {
		extract($args);
		$tweets = TwitterHelper::get_tweets($instance['username'], $instance['count']);
		if (!empty($tweets)) {
			if ($instance['title'])
				echo $before_title . $instance['title'] . $after_title;
		}
		?>
		<ul>
			<?php foreach ($tweets as $tweet): ?>
				<li><?php echo $tweet->tweet_text ?> - <span><?php echo $tweet->time_distance ?> ago</span></li>
			<?php endforeach ?>
		</ul>
		<?php
	}
}

class ThemeWidgetCustomBlock extends Carbon_Widget {
	protected $form_options = array(
		'width' => 300
	);

	function ThemeWidgetCustomBlock() {

		$pretty_menus = tdc_get_menus_dropdown();

		$this->setup('Custom Block', 'Displays a customizable block with title and either text or menu.', array(
			Carbon_Field::factory('textarea', 'title', 'Title')
				->set_default_value('')
				->set_height(65),
			Carbon_Field::factory('select', 'color', 'Color')
				->add_options(array(
					'red' => 'Red',
					'black' => 'Black'
				)),
			Carbon_Field::factory('select', 'menu', 'Menu')
				->add_options($pretty_menus),
			Carbon_Field::factory('textarea', 'text', 'Text'),
			Carbon_Field::factory('text', 'link', 'Link')
		));
		$this->print_wrappers = false;
	}

	function front_end($args, $instance) {
		extract($instance);
		?>
		<div class="widget widget-<?php echo $color; ?>">
                        <?php if (!empty($link)): ?>
                            <a href="<?php echo $link; ?>" class="full-box"></a>
                        <?php endif ?> 
			<?php if (!empty($title)): ?>
				<h2><?php echo nl2br($title); ?></h2>
			<?php endif ?>

			<?php
			if (!empty($menu)) {
				wp_nav_menu('menu=' . $menu);
			}

			echo wpautop($text);
			?>
			<?php if (!empty($link)): ?>
				<a href="<?php echo $link; ?>" class="arr"></a>
			<?php else: ?>
				<span class="arr"></span>
			<?php endif ?>
		</div>
		<?php
	}
}

class ThemeWidgetFeaturedClients extends Carbon_Widget {
	protected $form_options = array(
		'width' => 300
	);

	function ThemeWidgetFeaturedClients() {

		$this->setup('Featured Clients', 'Displays a slideshow of the featured clients.', array(
			Carbon_Field::factory('textarea', 'title', 'Title')
				->set_default_value('')
				->set_height(65),
			Carbon_Field::factory('text', 'link', 'Link')
		));
		$this->print_wrappers = false;
	}

	function front_end($args, $instance) {
		extract($instance);
		?>
		<div class="widget widget-white">
			<?php if (!empty($title)): ?>
				<h6><?php echo nl2br($title); ?></h6>
			<?php endif ?>
			
			<?php 
			query_posts('post_type=client&posts_per_page=-1&orderby=menu_order&order=ASC&meta_key=_client_featured&meta_value=yes'); 
			if (have_posts()) {
				?>
				<div class="logos-slider flexslider">
					<ul class="slides">
						<?php while(have_posts()): 
							the_post(); 
							$img = carbon_get_post_meta(get_the_ID(), 'client_logo');
							$link = carbon_get_post_meta(get_the_ID(), 'client_link');
							?>
							<li>
								<?php if ($link): ?>
									<a href="<?php echo $link; ?>" target="_blank">
								<?php endif ?>
									<img src="<?php echo tdc_get_timthumb($img, 146, 179, 3); ?>" alt="" />
								<?php if ($link): ?>
									</a>
								<?php endif ?>
							</li>
							<?php
						endwhile; 
						?>
					</ul>
				</div>
				<?php
			}
			wp_reset_query();
			?>

			<?php if (!empty($link)): ?>
				<a href="<?php echo $link; ?>" class="arr"></a>
			<?php else: ?>
				<span class="arr"></span>
			<?php endif ?>
		</div>
		<?php
	}
}

?>