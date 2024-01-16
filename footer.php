<div class="footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <?php
                if (is_active_sidebar("footer-left")) {
                    dynamic_sidebar('footer-left');
                }
                ?>
            </div>

            <div class="col-md-4">
                <?php
                if (is_active_sidebar("footer-middle")) {
                    dynamic_sidebar('footer-middle');
                }
                ?>
            </div>

            <div class="col-md-4">
                <?php
                if (is_active_sidebar("footer-right")) {
                    dynamic_sidebar('footer-right');
                }

                // Footer Menu
                wp_nav_menu(
                    array(
                        'theme_location' => 'bottom-menu',
                        'menu_id' => 'bottom-menu-container',
                        'menu_class' => 'list-inline text-right'
                    )
                );
                ?>
            </div>

        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>

</html>