    <!-- footer  -->
    <footer class="md:pt-11">
        <div class="container lg:max-w-4xl xl:max-w-6xl 2xl:max-w-screen-2xl 2xl:px-5">

            <div class="w-full flex flex-col md:flex-row items-center justify-between bg-footer rounded-30 md:rounded-complete p-3 md:p-5 md:pr-10" id="newsletter">
                <h4 class="text-sm text-center text-white sm:text-xl lg:text-right">
                    پیشنهادات ویژه تسمینو را سریع‌تر از همه دریافت کنید.
                </h4>
                <form action="#" class="w-full md:w-96 flex items-center justify-between relative bg-white rounded-complete p-1 pr-3 shadow-2xl mt-3 md:mt-0">
                    <i class="icon-footer-mail w-6 h-6"></i>
                    <input type="text" placeholder="ایمیل خود را وارد کنید" class="placeholder-text3 text-title1 text-xs md:text-sm w-1/2 md:w-auto" />
                    <button class="bg-red text-white text-base leading-27 rounded-complete p-3">
                        مشترک شدن
                    </button>
                </form>
            </div>

            <div class="w-full flex justify-between flex-wrap pt-11">

                <div class="w-full md:w-1/5">
                    <img src="<?=get_template_directory_uri(); ?>/images/global/logo.svg" class="mx-auto md:mx-0" alt="تسمینو" />
                    <p class="text-xs text-title1 leading-7 text-center md:text-justify mt-3">
                       	<?php the_field("about_footer","option"); ?>
                    </p>
                </div>

                <div class="w-full md:w-1/5">
                    <h4 class="mt-2 font-medium text-base text-title1 mb-3">
                        دسترسی سریع
                    </h4>
                    <ul class="footer-list leading-8">
                        <?php wp_nav_menu( array( 'items_wrap' => '%3$s',"theme_location"=>"footer_fast","container"=>"","echo"=>true,'li_class'=>"",'link_class'=>"transition-colors ease-linear text-red-hover text-sm text-text6")); ?>
                    </ul>
                </div>

                <div class="w-full md:w-1/6">
                    <h4 class="mt-2 font-medium text-base text-title1 mb-3">
                        پیوندها
                    </h4>
                    <ul class="footer-list leading-8">
                        <?php wp_nav_menu( array( 'items_wrap' => '%3$s',"theme_location"=>"footer_links","container"=>"","echo"=>true,'li_class'=>"",'link_class'=>"transition-colors ease-linear text-red-hover text-sm text-text6")); ?>
                    </ul>
                </div>

                <div class="w-full md:w-1/6 text-right md:text-left">
                    <h4 class="mt-2 font-medium text-base text-title1 mb-3 md:pl-16">
                        نمادها
                    </h4>
                    <div class="flex items-center justify-center md:justify-end">
                        <a href="<?php the_field("enamad","option"); ?>" rel="nofollow">
                            <img src="<?=get_template_directory_uri(); ?>/images/temp/namad1.png" width="56" alt="ای‌نماد" />
                        </a>
                        <a href="<?php the_field("samandehi","option"); ?>" rel="nofollow">
                            <img src="<?=get_template_directory_uri(); ?>/images/temp/namad2.png" width="56" alt="ساماندهی" />
                        </a>
                    </div>
                </div>

            </div>

            <div class="w-full flex justify-center md:justify-start mt-5">
                <a href="<?php the_field("twitter","option"); ?>" rel="nofollow" class="bg-red rounded-full p-3 ml-2" aria-label="Twitter">
					<i class="icon-footer-twitter block w-5 h-5"></i>
                </a>
                <a href="<?php the_field("linkedin","option"); ?>" rel="nofollow" class="bg-red rounded-full p-3 ml-2" aria-label="Linkedin">
                    <i class="icon-footer-linkedin block w-5 h-5"></i>
                </a>
                <a href="<?php the_field("telegram","option"); ?>" rel="nofollow" class="bg-red rounded-full p-3 ml-2" aria-label="Telegram">
                    <i class="icon-footer-telegram block w-5 h-5"></i>
                </a>
                <a href="<?php the_field("instagram","option"); ?>" rel="nofollow" class="bg-red rounded-full p-3 ml-2" aria-label="Instagram">
                    <i class="icon-footer-instagram block w-5 h-5"></i>
                </a>
            </div>

            <div id="copyright" class="w-full text-center mt-5 mb-2">
                <span class="text-xs text-text2">
                    کلیه حقوق این سایت محفوظ و متعلق به آژانس دیجیتال مارکتینگ تسمینو است.
                </span>
            </div>

        </div>
    </footer>
    <!-- footer  -->
<?php wp_footer(); ?>
	<script> var ajax_url = '<?=admin_url("admin-ajax.php"); ?>'; var $ = jQuery; </script>
    <!--<script src="<?=get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>-->
	<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="<?=get_template_directory_uri(); ?>/assets/js/custom.js?v=1.2" async></script>
</body>

</html>