<?php
/* Template Name: Parent Page */

get_header();
?>

<?php
$args = array(
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_parent' => get_the_ID(),
);

$post_objects = get_children($args);
if( $post_objects ):
    ?>
    <?php foreach( $post_objects as $post): ?>

    <?php
        // setup post data, so page template will use it as a "master" post
        setup_postdata($post);

        // we get page template name for the post and remove ".php" at the end to make it work
        $template = preg_replace("/\.php$/", "", get_page_template_slug($post) );

        // now let WordPress fetch that page for you
        echo get_template_part($template);
    ?>

<?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>


<?php
get_footer();

