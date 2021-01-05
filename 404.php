<?php get_header(); ?>

<div class="section page-404">
    <div class="display-content">
        <div class="container">
            <h1><?php esc_html_e('The page was not found','yabu');?></h1>
            <p><?php esc_html_e('Sorry, the requested page could not be found','yabu');?></p>
            <a href="<?php echo site_url() ?>" class="btn"><?php esc_html_e('Home','yabu');?></a>
        </div>
    </div>
</div>

<span class="line-separator"></span>

<?php get_footer(); ?>
