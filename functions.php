<?php
add_theme_support("post-thumbnails");
add_theme_support("menus");
add_theme_support("widgets");
require_once("wids.php");
require_once("settings.php");
//Wordpress Init
add_action('init',function(){
    //Register Nav Menus
    register_nav_menus( array(
        'menu_items'=>'لینک های منوی اصلی',
        'footer_fast'=> 'فوتر دسترسی سریع',
        'footer_links'=> 'منوی پیوندها فوتر',
    ));
});
//Add Class Name for wpnavmenu
add_filter( 'nav_menu_link_attributes',function( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
      $atts['class'] = $args->link_class;
    }
    return $atts;
}, 1, 3 );
add_filter('nav_menu_css_class', function($classes, $item, $args) {
    if(isset($args->li_class)) {
        $classes[] = $args->li_class;
    }
    return $classes;
}, 1, 3);
add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml'; 
    return $mimes;
}); 
function get_all_titles($cont){
    preg_match_all("#<h2(.*)>(.*)<\/h2>#Us",$cont,$titles);
    if(isset($titles[2]) && !empty($titles[2])){
        return $titles[2];
    }
    return [];
}
//FEED
function load($url){
    return file_get_contents($url);
    $curl_handle=curl_init();
    curl_setopt($curl_handle,CURLOPT_URL,$url);
    curl_setopt($curl_handle, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36");
    curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
    $buffer = curl_exec($curl_handle);
    if(curl_error($curl_handle)){ die(curl_error($curl_handle)); }
    curl_close($curl_handle);
    die($buffer);
    return $buffer;
}
function get_other_data($url){
    $codes = load($url);
    $ret = [];
    preg_match("#<meta property=\"og:image\" content=\"(.*)\"#Us",$codes,$pic);
    $ret['pic'] = isset($pic[1]) ? $pic[1] : "";
    preg_match("#<div class=\"product-author-subtitle\">(.*)<\/div>#Us",$codes,$title);
    $ret['title'] = isset($title[1]) ? $title[1] : "مدرس دوره";
    preg_match("#<div class=\"product-author-name\">(.*)<\/div>#Us",$codes,$teacher);
    if(isset($teacher[1])){
        preg_match("#class=\"brand-color-hover\">(.*)<\/a>#Us",$teacher[1],$hername);
        $ret['teacher'] = isset($hername[1]) ? $hername[1] : "";
    } else {
        $ret['teacher'] = "";
    }
    return $ret;
}
function get_academy_posts(){
    $cache = get_option("latest_academy",false);
    if(!$cache || time() - $cache['time'] > 12 * 60 * 60){
        $xml = simplexml_load_string(load("https://tesmino.com/academy/shop/feed"));
        $out = [];
        $cnt = 0;
        foreach($xml->channel->item as $item){
            $cnt+=1;
            $datas = get_other_data($item->link);
            $out[] = array("title"=>(string)$item->title,"pic"=>$datas['pic'],"teacher"=>$datas['teacher'],"herTitle"=>$datas['title'],"url"=>(string)$item->link);
            if($cnt >= 4){ break; }
        }
        update_option("latest_academy",array("time"=>time(),"items"=>$out));
        return $out;
    }
    return $cache['items'];
}
//Class For Paginations
function class_to_pagination(){
    return 'class="inline-table items-center justify-center mx-auto bg-white text-text1 text-sm font-bold py-3 px-11 ml-5 mt-5 mb-8 md:mb-0 border border-strokeGray rounded-2xl"';
}
add_filter("previous_posts_link_attributes","class_to_pagination");
add_filter('next_posts_link_attributes',"class_to_pagination");
//Comments Function
function tesmino_comments($comment, $args, $depth) { 
?>
<div class="w-full bg-gray1 p-5 md:p-8 mb-8 rounded-10" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
                            <div class="w-full flex flex-col md:flex-row items-center justify-between mb-4">
                                <div class="flex items-center mb-3 md:mb-0" itemprop="author" itemscope itemtype="http://schema.org/Person">
									<i class="icon-profile w-5 h-5 ml-2"></i>
                                    <span class="text-text1 text-base author" itemprop="name"><?php comment_author(); ?></span>
                                </div>
                                <div class="flex items-center">
									<i class="icon-calendar-2 ml-2 w-5 h-5"></i>
                                    <span class="text-text1 text-base"><?php comment_date("Y/m/d"); ?></span>
                                </div>
                            </div>
	<meta itemprop="dateCreated" content="<?php comment_date("Y-m-d"); ?>">
                            <div class="text-sm text-text6 text-right md:text-justify leading-9 mb-3" itemprop="text">
                                <?php comment_text(); ?>
                            </div>
                            <div class="w-full flex items-center justify-end">
                                <a href="#replay" data-parent="<?=comment_ID(  ); ?>" class="cm_replay w-full md:w-auto justify-center md:justify-start rounded-10 bg-text10 text-text1 text-sm font-semibold flex items-center py-3 px-7 duration-200 hover:shadow-blue3">
                                    پاسخ
									<i class="icon-reply mr-2 w-5 h-5"></i>
                                </a>
                            </div>
                        </div>
<?php
}
//Search Category
add_action("pre_get_posts",function($q){
    if($q->is_search() && $q->is_main_query()){
        if(isset($_GET['c']) && !empty($_GET['c'])){
            $q->set("cat",$_GET['c']);
        }
    }
});
//Ajax Loadmore
function load_more_archive(){
	$c = isset($_POST['c']) ? $_POST['c'] : 0;
	$g = isset($_POST['g']) ? $_POST['g'] : "1";
	$args = array("cat"=>$c,"showposts"=>get_option("posts_per_page"),"paged"=>$g);
	if(!isset($c)){ unset($args['cat']); }
	$posts = get_posts($args);
	foreach($posts as $post){
		echo '<div class="w-full md:w-1/3 p-3">
                    <article class="post-item p-5 bg-white rounded-2xl border border-strokeGray">
						
						
                        	'.get_the_post_thumbnail($post,"new_thumb_big",array("class"=>"rounded-10 w-full","alt"=>get_the_title($post))).'
						

                        <a href="'.get_permalink($post).'" title="'.get_the_title($post).'">
                            <h3 class="text-title1 text-sm font-extra leading-27 mt-5 duration-150 text-red-hover min-h-60 whitespace-normal">
                                '.get_the_title($post).'
                            </h3>
                        </a>
                        <div class="text-xs leading-7 text-text6 font-semibold line-clamp-2 overflow-hidden relative">
                            '.get_the_excerpt($post).'
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center more-info">
								<i class="icon-calendar w-5 h-5 ml-1"></i>
                                <span class="text-text2 text-xs font-semibold border-l border-strokeGray ml-3 pl-3">'.human_time_diff(get_the_time("U",$post),current_time("U")).'</span>
								<i class="icon-comment w-5 h-5 ml-1"></i>
                                <span class="text-text2 text-xs font-semibold">'.get_comments_number().'</span>
                            </div>
                            <a href="'.get_permalink($post).'" class="flex items-center text-title1 font-bold text-xs" title="'.get_the_title($post).'">
                                ادامه مطلب
								<i class="icon-chevron-left mr-1 w-2 h-2"></i>
                            </a>
                        </div>
                    </article>
                </div>';
	}
	die();
}
add_action("wp_ajax_load_more","load_more_archive");
add_action("wp_ajax_nopriv_load_more","load_more_archive");
//Calculate Time TO Read
function my_word_count($str) {
  $mystr = str_replace("\xC2\xAD",'', $str);        // soft hyphen encoded in UTF-8
  return preg_match_all('~[\p{L}\'\-]+~u', $mystr); // regex expecting UTF-8
}
function calculate_post_reading_time($post_id, $wpm = 200) {
    $content = get_the_content( $post_id);
    $word_count = my_word_count($content);
    $reading_time = ceil($word_count / $wpm);
    
    return $reading_time . ' دقیقه';
}
add_shortcode("tesmino_readmore",function($atts){
	$p = get_post($atts[0]);
	if(!$p){ return ""; }
	return '<div class="w-full p-5 md:p-10 bg-gray1 rounded-2xl my-10">
                                <span class="block text-text1 text-xs md:text-base font-bold mb-3">بیشتر بخوانید: </span>
                                <div class="w-full flex items-center">
                                    <span class="w-9 h-9 bg-[url(\'images/icons/read-more.svg\')] bg-center bg-no-repeat"></span>
                                    <a href="'.get_permalink($p).'" title="'.get_the_title($p).'" class="text-title1 text-base md:text-22 font-extra leading-27 duration-150 text-red-hover">
                                        '.get_the_title($p).'
                                    </a>
                                </div>
                            </div>';
});

add_action( 'wp_enqueue_scripts', function(){
	if(is_admin() || get_query_var("elementor-preview")){ return false; }
	wp_enqueue_script(array( 'jquery' ) );
});
function show_shortcode_cb(){
	global $post;
	echo '<input type="text" id="txtcode" value="[tesmino_readmore '.$post->ID.']" style="direction:ltr;width:100%;" disabled><br><br><button id="copy" class="button button-primary">کپی</button>
<script>
var $ = jQuery;
$(function(){
	$("#copy").click(function(e){
		e.preventDefault();
		navigator.clipboard.writeText($("#txtcode").val()).then(() => {
                alert("کپی شد");
   		});	
	})
});
</script>
	
	';
}
function show_shortcode_box() {
	add_meta_box( 'shortcode_shower', "بیشتر بخوانید", 'show_shortcode_cb', 'post' );
}
add_action( 'add_meta_boxes', 'show_shortcode_box' );

add_filter( 'excerpt_length', function($length){
	return 90;
}, 999 );
//Resize Images
add_action("after_setup_theme",function(){
	add_image_size( 'new_thumb_big', 700, 400, true );
	add_image_size( 'new_thumb_small', 350, 200, true );
});
?>