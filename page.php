<?php get_header(); ?>
<?php get_template_part("hero"); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">

            <!-- contents part -->
            <div class="col-md-8">
                <div class="posts">
                    <div class="post" <?php post_class(); ?>>
                        <div class="container">

                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="post-title">
                                        <!-- set post title/heading -->
                                        <?php the_title(); ?>
                                    </h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9 text-right">
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

                                <div class="col-md-9 text-center">
                                    <p>
                                        <!-- set post featured image -->
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $thumbnail_url = get_the_post_thumbnail_url(null, "large");
                                            
                                            echo '<a href="'.$thumbnail_url.'" data-featherlight="image" class="popup-img">';
                                            
                                            the_post_thumbnail('large', array("class" => "img-fluid"));

                                            echo "</a>";
                                        }
                                        ?>
                                    </p>

                                    <!-- set post content/paragraph -->
                                    <?php
                                    the_content();
                                    ?>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
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
            <div class="col-md-4">
                <?php
                if (is_active_sidebar('sidebar-1')) {
                    dynamic_sidebar('sidebar-1');
                }
                ?>
            </div>

        </div>
    </div>
</div>


<?php get_footer(); ?>