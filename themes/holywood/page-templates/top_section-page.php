<?php
/* Template Name: Top section */
?>
<section class="top_section" style="background-color: <?php the_field('background_color'); ?>; background-image: url(<?php the_field('background_image'); ?>);">
    <div class="wrapper">
        <div class="top_blk_content">
            <div class="top_blk_text">
                <p class="slogan"><?php the_field('slogan'); ?></p>
                <h1 class="title"><?php the_field('title'); ?></h1>
                <p class="text"><?php the_field('text'); ?></p>
                <a href="#contact_us" class="contact_us"><?php the_field('contact_us_text'); ?></a>
            </div>
        </div>
    </div>
</section>