<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php wp_head();  ?>

</head>
<body <?php body_class()?>>
<!-- Loader -->
<div class="yabu-loader"></div>
<!-- Switch Dark Mode -->
<div class="yabu-theme-switch-wrapper">
    <label class="theme-switch">
        <input type="checkbox" class="switch-input">
        <div class="slider-switch round">
            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fff" d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z"></path></svg>
            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ffffff" d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"></path></svg>
        </div>
    </label>
</div>
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