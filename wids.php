<?php
add_action( 'widgets_init', function(){
	register_sidebar( array(
		'name'          => "سایدبار",
		'id'            => 'right-sidebar',
		'description'   => "سایدبار مربوط به ادامه مطلب",
		'before_widget' => '<div class="hidden md:block pt-8 pb-3 md:px-2 xl:px-5 mb-6 bg-white rounded-2xl border border-strokeGray shadow-blue1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="text-title1 text-lg font-extra text-center mb-8">',
		'after_title'   => '</h3>',
	) );
});
//Widget For Read in this post
class Readin_post extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'reading-post',  // Base ID
			'آنچه در این مطلب میخوانید'   // Name
		);
		$this->id_base         = "reading-post";
		$this->name            = 'آنچه در این مطلب میخوانید';
	}
public function display_callback( $args, $widget_args = 1 ) {
	global $post;
			echo $args['before_widget'];
			echo '<p class="text-center p-3"> آنچه در این مطلب خواهید خواند </p>';
			foreach(get_all_titles(get_the_content()) as $t){  ?>
								<div class="w-full flex items-center cursor-pointer mb-5 content_pointer">
									<i class="icon-sort w-6 h-6 pl-2 ml-2 border-l border-strokeGray"></i>
									<span class="text-text6 text-xs font-semibold">
										<?=strip_tags($t); ?>
									</span>
	</div>
	<?php }
		echo $args['after_widget'];
}
	

	public function form( $instance ) {
		echo 'بدون تنظیمات';
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}
//Share It Widget
class share_it extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'share-it',  // Base ID
			'بلاک اشتراک گذاری مطلب'   // Name
		);
		$this->id_base         = "share-it";
		$this->name            = 'بلاک اشتراک گذاری مطلب';
	}
	public function display_callback( $args, $widget_args = 1 ) {
		echo $args['before_widget'];
		echo $args['before_title'].' اشتراک گذاری مطلب '.$args['after_title'];
		echo '<div class="mb-5"><ul class="w-full flex items-center justify-between ">
									 <li class="mx-2">
										<a href="#">
											<i class="icon-ti flex w-6 h-6 image-red-hover"></i>
										</a>
									</li>
									<li class="mx-2">
										<a href="#">
											<i class="icon-facebook flex w-6 h-6 image-red-hover"></i>
										</a>
									</li>
									<li class="mx-2">
										<a href="#">
											<i class="icon-linkedin-2 flex w-6 h-6 image-red-hover"></i>
										</a>
									</li>
									<li class="mx-2">
										<a href="#">
											<i class="icon-telegram-2 flex w-6 h-6 image-red-hover"></i>
										</a>
									</li>
									<li class="mx-2">
										<a href="#">
											<i class="icon-instagram-2 flex w-6 h-6 image-red-hover"></i>
										</a>
									</li>
								</ul></div>';
		echo $args['after_widget'];
	}
	

	public function form( $instance ) {
		echo 'بدون تنظیمات';
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}

add_action( 'widgets_init',function(){
	register_widget( 'Readin_post' );
	register_widget( 'share_it' );
});

?>