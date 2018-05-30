<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package holywood
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="icon"
          type="image/png"
          href="<?php echo get_stylesheet_directory_uri() ?>/favicon.png" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic" rel="stylesheet">


    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
    if(get_id_by_slug( 'header-page' )){
        $header_page_id = get_id_by_slug( 'header-page' );
    }
?>

<header>
    <div class="wrapper">
        <a href="/" class="logo">
            Holywood
        </a>
        <div class="header_menu">
            <a href="" class="mobile_menu_btn"></a>
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </div>
    </div>
</header>