<?php
$webly_layout_class = "col-md-8";
if (!is_active_sidebar("webly-sidebar-1")) {
    $webly_layout_class = "col-md-10 offset-md-1";
}
?>


<?php get_header(); ?>
<?php get_template_part("template-parts\common\hero"); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">

            <!-- contents part -->
            <div class="<?php echo $webly_layout_class; ?>">
                <div class="posts">
                    <div class="post" <?php post_class(); ?>>
                        <div class="">

                            <div class="">
                                <div class="col-md-12">
                                    <h2 class="post-title">
                                        <!-- set post title/heading -->
                                        <?php the_title(); ?>
                                    </h2>
                                </div>
                            </div>

                            <div class="">
                                <div class="col-md-12 text-right">
                                    <p>
                                        <strong>
                                            <!-- set post author -->
                                            <?php the_author(); ?>
                                        </strong>
                                        <br />
                                        <!-- set post date -->
                                        <?php echo get_the_date(); ?>
                                    </p>

                                    <!-- set post tag(s) -->
                                    <?php echo get_the_tag_list('<ul class="list-unstyled"><li>', '</li><li>', '</li></ul>'); ?>
                                </div>

                                <div class="col-md-12 text-center">
                                    <p>
                                        <!-- set post featured image -->
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $thumbnail_url = get_the_post_thumbnail_url(null, "large");

                                            echo '<a href="' . $thumbnail_url . '" data-featherlight="image" class="popup-img">';

                                            the_post_thumbnail('large', array("class" => "img-fluid"));

                                            echo "</a>";
                                        }

                                        // set post content/paragraph
                                        the_content();

                                        // It is not working for page navigation
                                        wp_link_pages()
                                        ?>
                                    </p>

                                </div>
                            </div>

                            <div class="">
                                <div class="col-md-12 ">
                                    <!-- if comments open show the sec otherwise ignore it -->
                                    <?php
                                    if (comments_open()) :
                                        comments_template();
                                    endif;

                                    next_post_link();
                                    "<br/>";
                                    previous_post_link();
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- sidebar part -->
            <?php
            if (is_active_sidebar("webly-sidebar-1")) :
            ?>
                <div class="col-md-4">
                    <?php
                    if (is_active_sidebar("webly-sidebar-1")) {
                        dynamic_sidebar("webly-sidebar-1");
                    }
                    ?>
                </div>
            <?php
            endif;
            ?>

        </div>
    </div>
</div>


<?php get_footer(); ?>