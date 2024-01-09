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

    register_sidebar(
        array(
            'name' => __('Footer Left', 'webly'),
            'id' => 'footer-left',
            'description' => __('It is a dummy, fake, faul, ajaira as well as vondo footer left part.', 'webly'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '',
            'after_title' => ''
        )
    );

    register_sidebar(
        array(
            'name' => __('Footer Middle', 'webly'),
            'id' => 'footer-middle',
            'description' => __('It is a dummy, fake, faul, ajaira as well as vondo footer Middle part.', 'webly'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );

    register_sidebar(
        array(
            'name' => __('Footer Right', 'webly'),
            'id' => 'footer-right',
            'description' => __('It is a dummy, fake, faul, ajaira as well as vondo footer right  part.', 'webly'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
}
add_action('widgets_init', 'webly_sidebar');

function webly_the_excerpt($excerpt)
{
    if (!post_password_required()) {
        return $excerpt;
    } else {
        echo get_the_password_form();
    }
}
add_filter('the_excerpt', 'webly_the_excerpt');

function webly_protected_title_change()
{
    return "%s";
}
add_action('protected_title_format', "webly_protected_title_change");
