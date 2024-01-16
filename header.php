<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php wp_head(); ?>

    <!-- Header Menu -->
    <div class="header-menu">
        <?php 
        wp_nav_menu (
            array(
                'theme_location' => 'top-menu',
                'menu_id' => 'top-menu-container',
                'menu_class' => 'text-center'  
            )
        );
        ?>
    </div>
</head>

<body <?php body_class(); ?>>