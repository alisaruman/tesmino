<?php get_header(); ?>
    <!-- last edits -->
    <section id="last-edits" class="pt-5 relative lg:min-h-[620px]">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5">
<?php $cat = get_option("lastes_edits_cat","1"); ?>
            <h2 class="block md:hidden text-title1 text-2xl font-extra text-center -mt-8">آخرین ویرایش ها</h2>
            <a href="<?=get_category_link($cat); ?>" class="flex md:hidden w-full items-center justify-center text-red text-base font-semibold my-5">
                مشاهده همه
				<i class="icon-arrow-left-2 mr-2 w-5 h-5"></i>
            </a>
            <div class="grid grid-cols-1 md:grid-cols-3 md:gap-6">
                <div class="col-span-1 mb-4 md:mb-0">
                    <div class="h-full">
<?php $p = get_posts(array("showposts"=>"1","meta_key"=>"top","meta_value"=>"right"));
if(empty($p)){ $p = get_posts(array("showposts"=>"1")); }
$p = $p[0];
?>
                        <article class="post-item h-full p-5 bg-white rounded-2xl border border-strokeGray">
                            <?=get_the_post_thumbnail($p,"new_thumb_big",array("class"=>"w-full h-auto rounded-10","alt"=>get_the_title($p))); ?>
							<div class="flex flex-col justify-between">
								<a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
									<h3 class="text-title1 text-sm font-extra leading-27 overflow-ellipsis overflow-hidden whitespace-nowrap mt-5 duration-150 text-red-hover">
										<?=get_the_title($p); ?>
									</h3>
								</a>
								<div class="text-xs leading-7 text-text6 font-semibold overflow-hidden relative line-clamp-7 line-clamp-unset">
									<?=get_the_excerpt($p); ?>
								</div>
								<div class="flex justify-between items-center mt-4">
									<div class="flex items-center more-info">
										<i class="icon-calendar w-5 h-5 ml-1"></i>
										<span
											  class="text-text2 text-xs font-semibold border-l border-strokeGray ml-3 pl-3"><?=human_time_diff(get_the_time("U",$p),current_time("U")); ?></span>
										<i class="icon-comment w-5 h-5 ml-1"></i>
										<span class="text-text2 text-xs font-semibold"><?=get_comments_number($p); ?></span>
									</div>
									<a href="<?=get_permalink($p); ?>" class="flex items-center text-title1 font-bold text-xs" title="<?=get_the_title($p); ?>">
										ادامه مطلب
										<i class="icon-chevron-left mr-1 w-2 h-2"></i>
									</a>
								</div>
							</div>
                        </article>
                    </div>
                </div>
                <div class="col-span-2">
                    
<?php
$posts = get_posts(array("showposts"=>"2","meta_key"=>"top","meta_value"=>"left"));
if(empty($posts)){ $posts = get_posts(array("showposts"=>"2")); }
foreach($posts as $p){
?>
                    <div class="inside mb-4 md:mb-0">
                        <article class="post-item flex flex-col items-start md:flex-row p-5 bg-white rounded-2xl border border-strokeGray">
                            <?=get_the_post_thumbnail($p,"new_thumb_big",array("class"=>"rounded-10 w-full lg:w-[47%] object-contain","alt"=>get_the_title($p))); ?>
                            <div class="w-full lg:w-[53%] md:pr-5 flex flex-col justify-between">
                                <a href="<?=get_permalink($p); ?>">
                                    <h3 class="text-title1 text-sm font-extra leading-27 overflow-ellipsis overflow-hidden whitespace-nowrap mt-5 md:mt-0 duration-150 text-red-hover">
                                        <?=get_the_title($p); ?>
                                    </h3>
                                </a>
                                <div class="text-xs leading-7 text-text6 font-semibold line-clamp-5 2xl:line-clamp-6">
                                    <?=get_the_excerpt($p); ?>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <div class="flex items-center more-info">
                                        <i class="icon-calendar w-5 h-5 ml-1"></i>
                                        <span
                                            class="text-text2 text-xs font-semibold border-l border-strokeGray ml-3 pl-3"><?=human_time_diff(get_the_time("U",$p),current_time("U")); ?></span>
                                        <i class="icon-comment w-5 h-5 ml-1"></i>
                                        <span class="text-text2 text-xs font-semibold"><?=get_comments_number($p); ?></span>
                                    </div>
                                    <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>" class="flex items-center text-title1 font-bold text-xs">
                                        ادامه مطلب
                                        <i class="icon-chevron-left mr-1 w-2 h-2"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
<?php } ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- last edits  -->

    <!-- ads blog  -->
<?php $cat = get_field("reportaj_cat","option"); ?>
    <section id="tabligh-blog" class="xl:mt-20 2xl:mt-32">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5 relative p-0">
            <img src="<?=get_template_directory_uri(); ?>/images/global/tesmino-watermark.webp" draggable="false" class="hidden md:flex absolute top-0 right-0" alt="تسمینو" />
            <div class="w-full flex flex-wrap py-12 md:p-12 bg-red shadow-red2 rounded-0 md:rounded-2xl overflow-hidden">

                <div class="w-full flex flex-col md:flex-row items-center justify-between">
                    <h2 class="text-white text-2xl font-extra leading-27">مقالات رپورتاژ آگهی</h2>
                    <a href="<?=get_category_link($cat); ?>" class="flex items-center text-white text-base leading-27 font-semibold mt-4 md:mt-0">
                        مشاهده همه
						<i class="icon-arrow-left w-5 h-5 mr-2"></i>
                    </a>
                </div>

                <div class="flex -mx-3 pt-8 flex-nowrap md:flex-wrap whitespace-nowrap md:whitespace-normal overflow-x-scroll md:overflow-x-auto">
<?php
$posts = get_posts(array("showposts"=>"3","cat"=>$cat));
foreach($posts as $p){ 
?>
                    <div class="w-5/6 md:w-1/3 p-3 z-10">
                        <article class="post-item p-5 bg-white rounded-2xl border border-strokeGray">
                            
                        	<?=get_the_post_thumbnail($p,"new_thumb_big",array("class"=>"w-full h-auto rounded-10","alt"=>get_the_title($p))); ?>

                            <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                                <h3 class="text-title1 text-sm font-extra leading-27 mt-5 duration-150 text-red-hover min-h-60 whitespace-normal">
                                    <?=get_the_title($p); ?>
                                </h3>
                            </a>
                            <div class="text-xs leading-7 text-text6 font-semibold line-clamp-2 overflow-hidden relative">
                               <?=get_the_excerpt($p); ?>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <div class="flex items-center more-info">
									<i class="icon-calendar w-5 h-5 ml-1"></i>
                                    <span class="text-text2 text-xs font-semibold border-l border-strokeGray ml-3 pl-3"><?=human_time_diff(get_the_time("U",$p),current_time("U")); ?></span>
                                    <i class="icon-comment w-5 h-5 ml-1"></i>
                                    <span class="text-text2 text-xs font-semibold"><?=get_comments_number($p); ?></span>
                                </div>
                                <a href="<?=get_permalink($p); ?>" class="flex items-center text-title1 font-bold text-xs">
                                    ادامه مطلب
                                    <i class="icon-chevron-left mr-1 w-2 h-2"></i>
                                </a>
                            </div>
                        </article>
                    </div>
<?php } ?>
                </div>

            </div>
        </div>
    </section>
    <!-- ads blog  -->
    <!-- blog tabs  -->
<?php
$cats = [];
while(have_rows('cats','option')){
	the_row();
	$cats[] = get_term_by('id',get_sub_field('cat'), 'category');
}

//$cats = get_categories(array("hide_empty"=>"true","number"=>"8","orderby"=>"none","include"=>$mcats));
?>
    <section id="blog-tabs" class="px-6 md:px-0 md:pt-20 pb-16 md:pb-20 lg:min-h-[820px]">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5 hidden md:flex">
            <div class="w-full flex justify-right items-center" id="buttons">
<?php $set = false; foreach($cats as $c){ ?>
                <button class="flex items-center m-2 justify-center border border-strokeGray rounded-40 py-2 px-6 bg-white<?php if(!$set){ echo " active"; $set=true; } ?>" id="tab<?=$c->term_id; ?>">
                    <?php if(get_field("icon",$c)){ ?><i class="<?php the_field("icon",$c); ?> w-4 h-4"></i> <?php } ?>	
                    <span class="text-sm text-text1 whitespace-nowrap leading-27 font-semibold pr-2"><?=$c->name; ?></span>
                </button>
<?php } ?>
            </div>
        </div>

        <div class="w-full pt-9" id="blog-tabs-cont">
			
		<div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5 flex p-0 whitespace-nowrap overflow-x-scroll pb-4 mb-4 md:hidden">
                        <div class="w-full flex justify-right items-center" id="buttons">
<?php $set = false; foreach($cats as $c){ ?>
                            <button class="flex items-center m-2 justify-center border border-strokeGray rounded-40 ml-2 md:ml-0 py-2 px-6 bg-white<?php if(!$set){ echo " active"; $set=true; } ?>" id="tab<?=$c->term_id; ?>">
								<?php if(get_field("icon",$c)){ ?><i class="<?php the_field("icon",$c); ?> w-4 h-4"></i><?php } ?>
                                <span class="text-sm whitespace-nowrap text-text1 leading-27 font-semibold pr-2"><?=$c->name;?></span>
                            </button>
<?php } ?>

                        </div>
                    </div>
			
<?php $set = false; foreach($cats as $c){
			$name = explode(" ",$c->name);
			$end = end($name);
			array_splice($name, -1, 1);
			?>
            <div class="w-full flex flex-wrap content transition tab<?=$c->term_id; ?>c<?php if(!$set){ echo " active"; $set=true; } ?>" id="tab<?=$c->term_id; ?>C">

                <div class="w-full flex flex-col justify-between md:w-2/6 md:pl-9">
                    <div>
                        <h2 class="text-text4 text-2xl text-center md:text-right md:text-42 font-extra leading-68">
							<?php if(!empty($name)){ echo implode(" ",$name); ?> <span class="text-red"><?=$end; ?></span> <?php } else { ?> <span class="text-red"><?=$c->name; ?></span> <?php } ?>
                        </h2>
                        <p class="text-base text-text2 leading-6 md:leading-8 xl:leading-45 text-justify md:pt-3">
                           <?=$c->category_description; ?>
                        </p>
                    </div>

                    <div class="relative flex justify-end items-center">
                        <div class="swiper-button-next hidden md:flex md:items-center md:justify-center text-white bg-red rounded-full blog-tabs-next"></div>
                        <div class="swiper-button-prev hidden md:flex md:items-center md:justify-center text-white bg-red rounded-full blog-tabs-prev"></div>
                        <a href="<?=get_category_link($c); ?>" class="flex items-center text-red text-base leading-27 font-semibold mt-4 mb-7 mx-auto md:mx-0 md:mt-0 md:mb-0">
                            مشاهده همه
							<i class="icon-arrow-left-2 w-5 h-5 mr-2"></i>
                        </a>
                    </div>

                </div>
                <div class="swiper mySwiper w-full md:w-4/6 m-0">
                    <div class="swiper-wrapper">
<?php $posts = get_posts(array("showposts"=>"5","cat"=>$c->term_id)); foreach($posts as $p){ ?>
                        <article class="swiper-slide post-item p-5 bg-white rounded-2xl border border-strokeGray">
                            
                            <?=get_the_post_thumbnail($p,"new_thumb_big",array("class"=>"w-full h-auto rounded-10","alt"=>get_the_title($p))); ?>
                            
                            <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                                <h3 class="text-title1 text-sm font-extra leading-27 mt-5 duration-150 text-red-hover min-h-60">
                                    <?=get_the_title($p); ?>
                                </h3>
                            </a>
                            <div class="text-xs leading-7 text-text6 font-semibold line-clamp-2 overflow-hidden relative">
                                <?=get_the_excerpt($p); ?>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <div class="flex items-center more-info">
									<i class="icon-calendar w-5 h-5 ml-1"></i>
                                    <span
                                        class="text-text2 text-xs font-semibold border-l border-strokeGray ml-3 pl-3"><?=human_time_diff(get_the_time("U",$p),current_time("U")); ?></span>
									<i class="icon-comment w-5 h-5 ml-1"></i>
                                    <span class="text-text2 text-xs font-semibold"><?=get_comments_number($p); ?></span>
                                </div>
                                <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>" class="flex items-center text-title1 font-bold text-xs">
                                    ادامه مطلب
									<i class="icon-chevron-left w-2 h-2 mr-1"></i>
                                </a>
                            </div>
                        </article>
<?php } ?>
                        

                    </div>
                </div>
            </div>
<?php } ?>
            

        </div>

    </section>
    <!-- blog tabs  -->

    <!-- last webinars -->
<?php $posts = get_academy_posts(); ?>
    <section id="last-webinar" class="py-12 bg-gray2 relative">
        <img src="<?=get_template_directory_uri(); ?>/images/blog/dotes.svg" draggable="false" class="absolute right-0 top-1/2 -translate-y-1/2" alt="dotes" />
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5 relative p-0">
            <div class="w-full flex flex-wrap overflow-hidden">

                <div class="w-full flex flex-col md:flex-row items-center justify-between">
                    <h2 class="text-title1 text-2xl font-extra leading-27">آخرین وبینارهای برگزار شده</h2>
                    <a href="https://tesmino.com/academy" title="آکادمی تسمینو" class="flex items-center text-red text-base leading-27 font-semibold mt-4 md:mt-0">
                        مشاهده همه
						<i class="icon-arrow-left-2 w-5 h-5 mr-2"></i>
                    </a>
                </div>

                <div class="min-w-full flex -mx-3 pt-6 flex-nowrap md:flex-wrap whitespace-nowrap md:whitespace-normal overflow-x-scroll md:overflow-x-auto">
<?php $i=0;foreach($posts as $p){ $i+=1;?>
                    <div class="w-5/6 md:w-1/4 p-3">
                        <article class="post-item p-5 bg-white rounded-2xl border border-strokeGray">
                            <img src="<?=$p['pic']; ?>" class="rounded-10 w-56 lg:w-auto max-w-none lg:max-w-full" alt="<?=$p['title']; ?>" />
                            <a href="<?=$p['url']; ?>" title="<?=$p['title']; ?>">
                                <h3 class="text-title1 text-lg font-extra leading-27 mt-4 duration-150 text-red-hover whitespace-normal min-h-60">
                                    <?=$p['title']; ?>
                                </h3>
                            </a>
                            <h4 class="text-text2 leading-7 text-sm font-bold">
                                مدرس: <?=$p['teacher']; ?>
                            </h4>
                            <h5 class="text-text3 leading-7 text-sm">
                                (<?=$p['herTitle']; ?>)
                            </h5>
                            <a href="<?=$p['url']; ?>" class="block bg-red mt-4 rounded-10 py-3 text-xs text-white font-bold text-center">
                                ثبت نام
                            </a>
                        </article>
                    </div>
<?php if($i>=4){ break; }} ?>
                </div>

            </div>
        </div>
    </section>
    <!-- last webinars  -->

    <!-- final blog  -->
    <section id="ads-blog" class="mt-14">
        <div class="container lg:max-w-4xl xl:max-w-6xl px-6 2xl:max-w-screen-2xl 2xl:px-5 relative md:p-0">
            <img src="<?=get_template_directory_uri(); ?>/images/global/tesmino-watermark2.webp" draggable="false"
                class="hidden md:flex absolute top-0 right-0" alt="تسمینو" />
            <div
                class="w-full flex flex-wrap pb-12 md:py-12 md:p-12 md:border md:border-strokeGray rounded-0 md:rounded-2xl overflow-hidden">

                <div class="w-full flex flex-col md:flex-row items-center justify-start">
                    <h2 class="text-title1 text-2xl font-extra leading-27">آخرین مقالات تسمینو</h2>
                </div>

                <div class="flex -mx-3 pt-4 md:pt-8 flex-wrap posts">
<?php $posts = get_posts(array("showposts"=>"6"));
foreach($posts as $post){ ?>
                    <div class="w-full md:w-1/3 p-3">
                        <article class="post-item p-5 bg-white rounded-2xl border border-strokeGray">
                            
                            <?=get_the_post_thumbnail($post,"new_thumb_big",array("class"=>"rounded-10 w-full","alt"=>get_the_title())); ?>
                            
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <h3 class="text-title1 text-sm font-extra leading-27 mt-5 duration-150 text-red-hover">
                                    <?php the_title(); ?>
                                </h3>
                            </a>
                            <div class="text-xs leading-7 text-text6 font-semibold line-clamp-2 overflow-hidden relative">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <div class="flex items-center more-info">
                                    <i class="icon-calendar w-5 h-5 ml-1"></i>
                                    <span
                                        class="text-text2 text-xs font-semibold border-l border-strokeGray ml-3 pl-3"><?=human_time_diff(get_the_time("U"),current_time("U")); ?></span>
                                    <i class="icon-comment w-5 h-5 ml-1"></i>
                                    <span class="text-text2 text-xs font-semibold"><?=get_comments_number($post); ?></span>
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
				<div class="block text-center w-full">
<div role="status" class="loading flex justify-center hidden">
    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
</div>
                <a href="#loadmore" class="inline-flex items-center justify-center mx-auto bg-white text-text1 text-sm font-bold py-3 px-11 mt-11 border border-strokeGray rounded-2xl loadmore" data-cat="0" title="مشاهده ی همه ی مقالات">نمایش بیشتر</a>
				</div>

            </div>
        </div>
    </section>
    <!-- final blog  -->
<?php get_footer(); ?>