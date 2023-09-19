<?php get_header(); ?>

    <!-- single  -->
    <section id="single">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5">

            <div id="breadcrumb" class="w-full mb-5 flex flex-wrap items-center">
<?php
the_post();
if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '','' );
} else { 
    $cats = get_the_category();
?>
                <a href="<?php bloginfo("url"); ?>" class="text-text2 text-xs md:text-base font-semibold leading-27">صفحه اصلی</a>
                <i class="icon-chevron-left-3 w-3 h-3 mx-1"></i>
                <span class="text-text7 text-xs md:text-base font-semibold leading-27">
                    <?php the_title(); ?>
                </span>
<?php } 
$titles = get_all_titles(get_the_content());
?>
            </div>

            <div class="w-full flex flex-wrap mt-3">

                <div class="w-full">
                    <main id="single-content" class="py-7 xl:py-16 px-7 md:p-7 xl:px-20 mb-5 md:mb-0 bg-white rounded-2xl border border-strokeGray shadow-blue1">

                        

                        <div id="main" class="w-full">
                            <?php the_content(); ?>
<?php if(have_rows("faq")){  ?>
                            <div id="faq" class="w-full p-5 md:p-10 bg-gray1 rounded-2xl my-10 border border-strokeGray">
                                <h3 class="text-base md:text-2xl text-center md:text-right font-extra text-title1 leading-27 mb-4">
                                    سوالات متداول
                                </h3>
                                <ul class="list-none">
<?php while(have_rows("faq")){ the_row(); ?>
                                    <li class=" bg-white rounded-2xl border border-strokeGray mb-4 p-5 md:py-8 md:px-10">

                                        <div class="title flex items-center justify-between cursor-pointer">
                                            <span class="text-title1 text-sm md:text-base font-extra"><?php the_sub_field("title"); ?></span>
											<i class="icon-chevron-bottom w-5 h-5 chevron duration-300"></i>
											
                                        </div>
                                        <p class="content hidden w-full pt-5 mt-5 border-t border-strokeGray text-justify text-sm md:text-base font-semibold text-text6 leading-40">
                                            <?=get_sub_field("desc"); ?>
                                        </p>
                                    </li>
<?php } ?>

                                </ul>
                            </div>
<?php } ?>
                            

                        </div>

                    </main>
                </div>


            </div>

        </div>
    </section>
    <!-- single  -->

    <!-- related-posts -->
    <section id="related-posts" class="my-14 mb-3 md:mb-14">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5 relative p-0">
            <div class="w-full flex flex-wrap overflow-hidden">

                <div class="w-full flex flex-col md:flex-row items-center justify-between">
                    <h2 class="text-title1 text-2xl font-extra leading-27">مقالات مرتبط</h2>
                    <a href="<?=get_category_link($cats[0]); ?>" class="flex items-center text-red text-base leading-27 font-semibold mt-4 md:mt-0">
                        مشاهده همه
						<i class="icon-arrow-left-2 mr-2 w-5 h-5"></i>
                    </a>
                </div>

                <div
                    class="min-w-full flex flex-wrap px-3 md:px-0 md:-mx-3 pt-6">
<?php $posts = get_posts(array("showposts"=>"3","cat"=>$cats[0]->term_id));
foreach($posts as $p){ ?>
                    <div class="w-full md:w-1/3 p-3">
                        <div class="post-item p-5 bg-white rounded-2xl border border-strokeGray">
							
							<div class="relative w-full pt-[75%] rounded-10 overflow-hidden">
                            	<?=get_the_post_thumbnail($p,"medium_large",array("class"=>"min-w-full min-h-full absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4","alt"=>get_the_title())); ?>
							</div>
							
                            <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                                <h3 class="text-title1 text-sm font-extra leading-27 mt-5 duration-150 text-red-hover min-h-60 whitespace-normal">
                                    <?=get_the_title($p); ?>
                                </h3>
                            </a>
                            <div class="flex justify-between items-center mt-4">
                                <div class="flex items-center more-info">
									<i class="icon-calendar w-5 h-5 ml-1"></i>
                                    <span class="text-text2 text-xs font-semibold border-l border-strokeGray ml-3 pl-3"><?=human_time_diff(get_the_time("U",$p),current_time("U")); ?></span>
									<i class="icon-comment w-5 h-5 ml-1"></i>
                                    <span class="text-text2 text-xs font-semibold"><?=get_comments_number($p); ?></span>
                                </div>
                                <a href="<?=get_permalink($p); ?>" class="flex items-center text-red font-bold text-xs" title="<?=get_the_title($p); ?>">
                                    ادامه مطلب
									<i class="icon-chevron-left-4 w-2 h-2 mr-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
<?php } ?>

                </div>

            </div>
        </div>
    </section>
    <!-- related posts  -->
<?php comments_template(); ?>
<?php get_footer(); ?>