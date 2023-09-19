<?php get_header(); ?>
    <!-- seo desc  -->
    <section id="seo-desc" class="mb-3 mt-20 md:mt-0">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5">
            <div class="relative w-full rounded-2xl border border-strokeGray p-5 md:py-11 md:px-14">

                <div class="w-full flex flex-col md:flex-row items-center justify-between">

                    <div id="breadcrumb" class="flex items-center -mt-20 md:mt-0 mb-20 md:mb-0">
                        <a href="<?php bloginfo("url"); ?>" class="text-text2 text-xs md:text-base font-semibold leading-27">
                            صفحه اصلی
                        </a>
						<i class="icon-chevron-left-3 w-3 h-3 mx-1"></i>
                        <span class="text-text7 text-xs md:text-base font-semibold leading-27">
                            <?php single_cat_title(); ?>
                        </span>
                    </div>

                    <h1 class="text-title1 font-extra text-2xl md:text-32 text-center md:text-left leading-30 md:leading-27 z-10">
                        <?php single_cat_title(); ?>
                    </h1>

                </div>

                <div id="seo-content" class="relative text-text8 text-xs md:text-base font-semibold leading-6 md:leading-40 overflow-hidden mt-8 max-h-32 duration-500">
                    <?php $catID = get_the_category(); if(isset($catID[0])){ echo category_description ( $catID[0] ); } ?>
                    
                </div>

                <button class="w-full flex items-center justify-center bottom-0 py-8 left-1/2 -translate-x-1/2 text-text1 text-xs font-bold absolute bg-gradient-to-t from-transparent to-gray1">
                    <span>مشاهده بیشتر</span>
					<i class="icon-chevron-bottom-2 w-2 h-2 mr-3"></i>
                </button>

            </div>
        </div>
    </section>
    <!-- seo desc  -->

    <!-- category posts  -->
    <section id="category-posts">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5">
            <div class="flex justify-between flex-wrap -mx-3 posts">
<?php while(have_posts()){ the_post(); ?>
                <div class="w-full md:w-1/3 p-3">
                    <article class="post-item p-5 bg-white rounded-2xl border border-strokeGray">
						
                        <?=get_the_post_thumbnail($post,"new_thumb_big",array("class"=>"w-full h-auto rounded-10","alt"=>get_the_title())); ?>

                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <h3 class="text-title1 text-sm font-extra leading-27 mt-5 duration-150 text-red-hover min-h-60 whitespace-normal">
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
				<div role="status" class="loading flex justify-center hidden">
    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
</div>
<a href="#loadmore" class="inline-table items-center justify-center mx-auto bg-white text-text1 text-sm font-bold py-3 px-11 ml-5 mt-5 mb-8 md:mb-0 border border-strokeGray rounded-2xl loadmore" data-cat="<?php $category = get_queried_object(); echo $category->term_id; ?>">نمایش بیشتر</a>
            </div>
        </div>
    </section>

    <!-- category posts  -->
<?php get_footer(); ?>