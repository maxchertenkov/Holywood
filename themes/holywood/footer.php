<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package holywood
 */

?>

<?php
    if(get_id_by_slug( 'footer-page' )){
        $footer_page_id = get_id_by_slug( 'footer-page' );
    }
?>
<footer>
    <div class="wrapper">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        <div class="footer_copyright">
            <p>Holywood 2018</p>
        </div>
    </div>
</footer>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script>
    $(document).ready(function(){
        $('.top_slider_blk').bxSlider();
    });
</script>

<?php wp_footer(); ?>


</body>
</html>
