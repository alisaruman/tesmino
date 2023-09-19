<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','kubrick'); ?></p>

			<?php
			return;
		}
	}
?>
<!-- comments -->
    <section id="comments" class="mb-5 md:mb-0">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5">

            <div class="w-full flex flex-wrap-reverse md:flex-wrap mt-3">

                <div class="w-full md:w-9/12 md:pl-6">
                    <div id="comment-list" class="p-6 xl:p-16 bg-white rounded-2xl border border-strokeGray shadow-blue1">

                        <h3 class="text-lg md:text-3xl text-center md:text-right font-extra text-title1 leading-27 mb-8">
                            دیدگاه ها
                        </h3>
<?php if ($comments) { wp_list_comments( 'type=comment&callback=tesmino_comments' ); } ?>
                        

                        <div id="comments-pagination" class="w-full flex flex-wrap items-center justify-center mt-8">
                            <?php 
                            
$links = paginate_comments_links( array(
	'prev_text'  => 'قبلی',
	'next_text' => 'بعدی',
    'type'=>'array',
));
if(is_array($links)){
    foreach($links as $l){
        echo preg_replace("#class=\"(.*)\"#U",'class="inline-flex items-center justify-center bg-gray1 p-4 text-text2 text-xs font-semibold rounded-10 mx-1 duration-200 hover:shadow-blue3'.(str_starts_with($l,'<span') ? " active" : "").'"',$l);
    }
}
?>
                        </div>

                    </div>
                </div>

                <div class="w-full md:w-3/12">

                    <aside id="comment-form" class="py-8 px-5 mb-5 md:mb-0 bg-white rounded-2xl border border-strokeGray shadow-blue1 sticky top-5">
<?php if ('open' == $post->comment_status) { ?>
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) { ?>
<p>برای ارسال نظر باید وارد شوید<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in','kubrick'); ?></a></p>
<?php } else {
$commenter = wp_get_current_commenter();    
?>
                    <h5 class="block text-center text-title1 text-lg font-extra mb-5">دیدگاهتان را بنویسید</h5>
                    <label class="block text-text9 text-sm leading-5 mb-4 cm_replay_text"></label>
                        <form action="<?php echo home_url(); ?>/wp-comments-post.php" method="post" id="commentform" name="commform">
<?php if(!is_user_logged_in()){ ?>
                            <label for="email" class="block text-text9 text-sm leading-5 mb-4">ایمیل شما:</label>
                            <input type="email" name="email" value="<?=(isset($commenter['comment_author_email']) ? $commenter['comment_author_email'] : ""); ?>" id="email" placeholder="ایمیل" class="w-full p-5 mb-4 rounded-2xl border border-strokeGray text-xs text-text2 placeholder-text5" required />
                            <label for="author" class="block text-text9 text-sm leading-5 mb-4">نام شما: </label>
                            <input type="text" name="author" value="<?=(isset($commenter['comment_author']) ? $commenter['comment_author'] : ""); ?>" id="author" placeholder="نام" class="w-full p-5 mb-4 rounded-2xl border border-strokeGray text-xs text-text2 placeholder-text5" required />
<?php } ?>
                            <label for="comment" class="block text-text9 text-sm leading-5 mb-4">پیام شما: </label>
                            <textarea name="comment" id="comment" placeholder="متن پیام" class="w-full p-5 mb-4 rounded-2xl border border-strokeGray text-xs text-text2 placeholder-text5 h-40 resize-none" required></textarea>
                        <?php if(!is_user_logged_in()){ ?>
                            <div id="save" class="mt-6 mb-4 flex items-center">
                                <input name="wp-comment-cookies-consent" type="checkbox" value="1" id="wp-comment-cookies-consent" />
                                <label class="text-text2 text-xs font-semibold leading-5 pr-3" for="wp-comment-cookies-consent">  ذخیره نام، ایمیل و وبسایت من در مرورگر برای زمانی که دوباره دیدگاهی می‌نویسم. </label>
                            </div>
							<?php } ?>
                            <button type="submit" class="w-full bg-text1 py-4 text-center rounded-10 text-white text-sm font-bold duration-200 hover:shadow-blue3">
                                ارسال دیدگاه
                            </button>                       
                            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                            <input type="hidden" name="comment_parent" id="cm_parent" value="0" />
                            <?php do_action('comment_form', $post->ID); ?>
                        </form>
<?php 
} } ?>
                    </aside>

                </div>

            </div>

        </div>
    </section>
    <!-- comments -->