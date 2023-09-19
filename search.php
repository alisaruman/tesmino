<?php get_header(); ?>
    <!-- category posts  -->
    <section id="category-posts">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5">
            <div class="flex justify-between flex-wrap -mx-3">
<?php while(have_posts()){ the_post(); ?>
                <div class="w-full md:w-1/3 p-3">
                    <article class="post-item p-5 bg-white rounded-2xl border border-strokeGray">
                        <?=get_the_post_thumbnail($post,"new_thumb_big",array("class"=>"rounded-10 w-full h-auto","alt"=>get_the_title())); ?>

                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <h3 class="text-title1 text-sm font-extra leading-27 mt-5 duration-150 text-red-hover">
                                <?php the_title(); ?>
                            </h3>
                        </a>
                        <div class="text-xs leading-7 text-text6 font-semibold line-clamp-2 overflow-hidden relative">
                            <?php the_excerpt(  ); ?>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center more-info">
								<i class="icon-calendar w-5 h-5 ml-1"></i>
                                <span class="text-text2 text-xs font-semibold border-l border-strokeGray ml-3 pl-3"><?=human_time_diff(get_the_time("U"),current_time("U")); ?></span>
								<i class="icon-comment w-5 h-5 ml-1"></i>
								<span class="text-text2 text-xs font-semibold"><?=get_comments_number(); ?></span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="flex items-center text-title1 font-bold text-xs" title="<?php the_title(); ?>">
                                ادامه مطلب
								<i class="icon-chevron-left mr-1 w-2 h-2"></i>
                            </a>
                        </div>
                    </article>
                </div>
<?php } ?>
                
            </div>

            <div class="block text-center">
<?php
echo get_next_posts_link("صفحه بعد");
echo get_previous_posts_link("صفحه قبل");
?>
            </div>

        </div>
    </section>
    <!-- category posts  -->
<?php get_footer(); ?>