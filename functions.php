<?php

if (site_url() == "https://test-purpose.local") {
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
}

function webly_bootstrapping()
{
    load_theme_textdomain("webly");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("custom-header");
    register_nav_menu("top-menu", __("Top Menu", "webly"));
    register_nav_menu("middle-menu", __("Middle Menu", "webly"));
    register_nav_menu("bottom-menu", __("Bottom Menu", "webly"));
}
add_action("after_setup_theme", "webly_bootstrapping");

function webly_assets()
{
    wp_enqueue_style("mainss", get_stylesheet_uri(), null, time());
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("featherlight-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");

    wp_enqueue_script("featherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "0.1", "true");
    wp_enqueue_script("webly-custom", get_theme_file_uri("/assets/js/custom.js"), array("jquery", "featherlight-js"), "0", true);
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

function webly_menu_item_class($classes, $item)
{
    $classes[] = "list-inline-item";
    return $classes;
}
add_filter("nav_menu_css_class", "webly_menu_item_class", 10, 2);

function webly_islamic_page_template_banner()
{
    if (is_page()) {
        $webly_feature_img = get_the_post_thumbnail_url(null, "large");
?>
        <style>
            .hero-banner {
                background: url(<?php echo $webly_feature_img; ?>);
            }
        </style>

        <?
    }

    if (is_front_page()) {
        if (current_theme_supports("custom-header")) {
        ?>
            <style>
                .header {
                    background: url(<?php echo header_image(); ?>) no-repeat;
                    background-size: cover;
                }
            </style>
<?
        }
    }
}
add_action("wp_head",      "webly_islamic_page_template_banner");
