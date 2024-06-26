<div class="header hero-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline">
                    <?php bloginfo("description"); ?>
                </h3>
                <h1 class="align-self-center display-1 text-center heading">
                    <?php bloginfo("name"); ?>
                </h1>
            </div>

        </div>
    </div>
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