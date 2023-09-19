<?php
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'تنظیمات قالب',
        'menu_title'    => 'تنظیمات قالب',
        'menu_slug'     => 'tesmino_settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}
?>