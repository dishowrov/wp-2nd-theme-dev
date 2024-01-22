<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Custom Logo Setup -->
                <?php
                if (current_theme_supports("custom-logo")) :
                ?>
                    <div class="hero-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php
                endif;
                ?>

                <h3 class="tagline">
                    <?php bloginfo("description"); ?>
                </h3>
                <h1 class="align-self-center display-1 text-center heading">
                    <?php bloginfo("name"); ?>
                </h1>
            </div>

            <!-- Hero Menu -->
            <div class="col-md-12">
                <div class="navigation">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'middle-menu',
                            'menu_id' => 'middle-menu-container',
                            'menu_class' => 'text-center',
                        )
                    )
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>