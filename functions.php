<?php

function webly_bootstrapping()
{
    load_theme_textdomain("webly");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}
add_action("after_setup_theme", "webly_bootstrapping");

function webly_assets()
{
    wp_enqueue_style("mainss", get_stylesheet_uri());
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
}
add_action("wp_enqueue_scripts", "webly_assets");


function webly_sidebar()
{
    register_sidebar(
        array(
            'name' => __('Sigle Post Sidebar', 'webly'),
            'id' => 'sidebar-1',
            'description' => __('It is a dummy, fake, faul, ajaira as well as vondo sidebar.', 'webly'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
}
add_action('widgets_init', 'webly_sidebar');
