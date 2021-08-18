<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php wp_head();  ?>

</head>
<body <?php body_class()?>>
<header class="main-header" tabindex="0">
    <div class="progress-bar" id="progressBar"></div>
    <div class="smartphone-menu-trigger"></div>
    <div class="main-header-wrapper">
        <div class="avatar">
            <img src="<?php echo get_template_directory_uri();?>/images/th_lucian.jpg" alt="">
            <h3><?php esc_html_e('Lucian ','yabu');?><span><?php esc_html_e('DEV','yabu');?></span></h3>
            <!-- Social Media -->
            <div class="social-media">
                <?php if( get_field('linkedin','option') ): ?>
                    <a href="<?php the_field('linkedin','option') ?>" target="_blank">
                    <svg><use xlink:href="#linkedin"></use></svg>
                    </a>
                <?php endif; ?>
                <?php if( get_field('github','option') ): ?>
                    <a href="<?php the_field('github','option') ?>" target="_blank">
                    <svg><use xlink:href="#github"></use></svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'link_before'    => '<span>',
                'link_after' => '</span>',
                'container'=> false,
            ) );
            ?>
        </nav>
        <div class="scroll-icon"></div>
    </div>
</header>
<main class="main-wrapper">
