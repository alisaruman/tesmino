<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(is_home()){ bloginfo("name"); } else { wp_title(" - "); } ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
	<?php wp_head(); ?>
	<script src="<?php bloginfo("template_directory");?>/assets/js/tailwindcdn.js"></script>
	
    <link rel="stylesheet" href="<?=get_template_directory_uri(); ?>/style.css">
	<?php /*if(is_home()){ ?>
	<link rel="stylesheet" href="<?=get_template_directory_uri(); ?>/assets/index.css">
	<?php } else if(is_single() || is_page()){ ?>
	<link rel="stylesheet" href="<?=get_template_directory_uri(); ?>/assets/single.css">
	<?php } else if(is_archive()){ ?>
	<link rel="stylesheet" href="<?=get_template_directory_uri(); ?>/assets/archive.css">
	<?php } else { ?>
	<link rel="stylesheet" href="<?=get_template_directory_uri(); ?>/assets/index.css">
	<?php } */ ?>
    
</head>

<body class="bg-gray1 font-bakh">

    <!-- header -->
    <header class="py-11">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5">
            <div class="flex flex-wrap justify-between">

                <div class="w-3/5 md:w-2/12">
                    <a href="<?php bloginfo("url"); ?>" title="تسمینو">
                        <img src="<?=get_template_directory_uri(); ?>/images/global/logo.svg" alt="لوگو تسمینو" class="lg:w-[148px] lg:h-[32px]" />
                    </a>
                </div>

                <div class="hidden md:flex w-8/12">
                    <ul class="w-full flex items-center justify-center list-none" id="desktop-nav">
                        <?php wp_nav_menu( array( 'items_wrap' => '%3$s',"theme_location"=>"menu_items","container"=>"","echo"=>true,'li_class'=>"px-4",'link_class'=>"text-base leading-27 text-text1 font-bold duration-150 text-red-hover")); ?>
                    </ul>
                </div>

                <div class="w-2/5 md:w-2/12 text-left flex content-center justify-end">
                    <a href="https://next.tesmino.com" title=" ورود به حساب" class="hidden md:inline-flex items-center justify-center font-bold text-base text-white bg-red py-2 md:px-3 lg:px-6 xl:px-12 rounded-30 shadow-red1 duration-200 hover:shadow-none">
                        ورود | ثبت نام
                    </a>					
					<i class="icon-menu w-6 h-8 d-inline-flex md:hidden" id="hamburger"></i>
				</div>

                <div class="block md:hidden w-full text-center leading-10 max-h-0 overflow-hidden duration-300" id="mobile-menu">
                    <ul class="list-none">
                        <?php wp_nav_menu( array( 'items_wrap' => '%3$s',"theme_location"=>"menu_items","container"=>"","echo"=>true,'li_class'=>"",'link_class'=>"")); ?>
                    </ul>
                    <a href="https://next.tesmino.com" title="ورود به حساب" class="items-center justify-center font-bold text-base text-white bg-red py-2 px-6 rounded-30 shadow-red1">
                        ورود | ثبت نام
                    </a>
                </div>

                <div class="w-full flex flex-wrap bg-white mt-11 p-4 rounded-2xl border border-strokeGray shadow-blue1">

                    <div class="w-full md:w-6/12 xl:w-7/12 flex flex-col-reverse md:flex-row justify-between items-center">

                        <div class="w-full md:w-4/12 xl:3/12 flex items-center justify-between relative bg-gray1 border border-strokeGray py-3 md:py-2 px-4 cursor-pointer rounded-10 transition" id="catSelector">
                            <span class="md:text-xs lg:text-sm text-text1 font-semibold">دسته‌بندی ها</span>
							<i id="catChevron" class="icon-chevron-bottom-2 w-2 h-2 transition"></i>
                            <div class="absolute w-full p-3 top-full left-0 invisible hidden bg-gray1 border border-strokeGray shadow-blue1 z-10 rounded-bl-10 rounded-br-10" id="catList">
                                <ul class="max-h-56 overflow-y-scroll">
                                    
<?php
$cats = get_categories(array("hide_empty"=>"true","orderby"=>"count","order"=>"desc"));
foreach($cats as $c){ 
	if($c->parent == "0"){
		?>
                                    <li class="py-2 md:duration-150" data-id="<?=$c->term_id; ?>">
                                        <a href="<?=get_category_link($c);?>" class="block text-sm text-text1 font-semibold transition cat-child-item" title="<?=$c->name;?>"><?=$c->name;?></a>
                                    </li>
<?php
foreach($cats as $c2){ if($c2->parent != $c->term_id){ continue; }
?>
<li class="py-2 pr-4 md:duration-150" data-id="<?=$c2->term_id; ?>">
                                        <a href="<?=get_category_link($c2);?>" class="block text-sm text-text1 font-semibold transition cat-child-item" title="<?=$c2->name;?>"><?=$c2->name;?></a>
                                    </li>					
<?php
					 }				
	}
} ?>

                                </ul>
                            </div>
                        </div>

                        <div class="hidden md:block md:w-1/12 text-center">
                            <div class="w-1px h-11 bg-strokeGray mx-auto"></div>
                        </div>

                        <div class="w-full md:w-7/12 xl:w-8/12 relative mb-4 md:mb-0">
                            <form method="get" action="<?php bloginfo("url"); ?>">
                                <input type="hidden" name="c" id="cat_search" value="0">
                                <input type="text" name="s" value="<?=get_search_query();?>" id="headerSearch" placeholder="جستجو در میان مطالب وبلاگ..." class="w-full rounded-10 border border-strokeGray py-2 px-4 md:text-xs lg:text-sm font-semibold text-text1 leading-27 placeholder-text5">
                                <button aria-label="Search" type="submit" class="absolute top-1/2 -translate-y-1/2 h-9 w-9 bg-no-repeat bg-center left-4 bg-[url(<?=get_template_directory_uri(); ?>/images/icons/search.svg)]"></button>
                            </form>
                        </div>

                    </div>

                    <div class="w-full md:w-6/12 xl:w-5/12 flex flex-col md:flex-row justify-between items-center">

                        <div class="hidden md:flex md:w-1/12 justify-end pl-2 xl:pl-0">
                            <div class="w-1px h-11 bg-strokeGray"></div>
                        </div>

                        <div class="w-full md:w-5.5/12 flex my-4 md:my-0 justify-center items-center">
                            <ul class="w-full md:w-auto flex justify-between md:justify-start">
                                <li class="md:mx-1 lg:mx-2">
                                    <a href="<?php the_field("twitter","option"); ?>" rel="nofollow" aria-label="Twitter">
										<i class="icon-ti flex w-6 h-6 image-red-hover"></i>
									</a>
                                </li>
                                <li class="md:mx-1 lg:mx-2">
                                    <a href="<?php the_field("facebook","option"); ?>" rel="nofollow" aria-label="Facebook">
										<i class="icon-facebook flex w-6 h-6 image-red-hover"></i>
									</a>
                                </li>
                                <li class="md:mx-1 lg:mx-2">
                                    <a href="<?php the_field("linkedin","option"); ?>" rel="nofollow" aria-label="Linkedin">
										<i class="icon-linkedin-2 flex w-6 h-6 image-red-hover"></i>
									</a>
                                </li>
                                <li class="md:mx-1 lg:mx-2">
                                    <a href="<?php the_field("telegram","option"); ?>" rel="nofollow" aria-label="Telegram">
										<i class="icon-telegram-2 flex w-6 h-6 image-red-hover"></i>
									</a>
                                </li>
                                <li class="md:mx-1 lg:mx-2">
                                    <a href="<?php the_field("instagram","option"); ?>" rel="nofollow" aria-label="Instagram">
										<i class="icon-instagram-2 flex w-6 h-6 image-red-hover"></i>
									</a>
                                </li>
                            </ul>
                        </div>

                        <div class="w-full md:w-5.5/12 flex justify-center items-center">
                            <a href="#newsletter" class="w-full text-orange1 bg-orange2 font-bold text-sm leading-27 block px-4 py-2 border border-orange1 rounded-10 text-center duration-150 orange-button-hover">عضویت
                                در خبرنامه</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </header>
    <!-- header  -->