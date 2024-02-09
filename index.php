<?php get_header(); ?>
<?php get_template_part("template-parts\common\hero"); ?>

<div class="posts">
    <?php
    while (have_posts()) {
        the_post();

        // to get post formats
        get_template_part("post-formats/content", get_post_format());
    }
    ?>


    <!-- post navigation -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-5">
                <?php
                the_posts_navigation(array(
                    "screen_reader_text" => ' ',
                    "prev_text" => "New Posts",
                    "next_text" => "Old Posts"
                ));
                ?>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>