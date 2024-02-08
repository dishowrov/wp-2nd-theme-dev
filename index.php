<?php get_header(); ?>
<?php get_template_part("template-parts\common\hero"); ?>

<div class="posts">
    <?php
    while (have_posts()) {
        the_post();
    ?>
        <div <?php post_class(); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="post-title">
                            <!-- set post title/heading -->
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <p>
                            <strong>
                                <!-- set post author -->
                                <?php the_author(); ?>
                            </strong>
                            <br />
                            <!-- set post date -->
                            <?php echo get_the_date(); ?>
                        </p>

                        <?php
                        // set post tag(s) 
                        echo get_the_tag_list('<ul class="list-unstyled"><li>', '</li><li>', '</li></ul>');

                        // set post format
                        $webly_formats = get_post_format();
                        if ($webly_formats == 'quote') {
                            echo '<span class="dashicons dashicons-editor-quote"></span>';
                        } else if ($webly_formats == 'video') {
                            echo '<span class="dashicons dashicons-playlist-video"></span>';
                        } else if ($webly_formats == 'aside') {
                            echo '<span class="dashicons dashicons-format-aside"></span>';
                        }

                        ?>
                    </div>

                    <div class="col-md-8">
                        <p>
                            <!-- set post featured image -->
                            <?php
                            if (has_post_thumbnail()) {

                                the_post_thumbnail('large', array("class" => "img-fluid"));
                            }
                            ?>
                        </p>

                        <!-- set post content/paragraph -->
                        <?php
                        // if (!post_password_required()) {
                        //     the_excerpt();
                        // } else {
                        //     echo get_the_password_form();
                        // }

                        the_excerpt();
                        ?>

                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>


    <!-- post navigation -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-5">
                <?php
                the_posts_navigation(array(
                    "prev_text" => "New Posts",
                    "next_text" => "Old Posts"
                ));
                ?>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>