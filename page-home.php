<?php
/*Template Name: Home*/
?>

<?php get_header();?>

<div id="yabu-main" class="section home-hero yabu-scene">
    <div class="display-content scene_element scene_element--fadeinright">
        <div class="container">
            <div class="row hero-content">
                <div class="col-md">
                    <h1><?php echo get_field( 'hero_brief' )[ 'title' ];?></h1>
                    <?php echo get_field( 'hero_brief' )[ 'sub_title' ];?>
                    <a href="<?php echo get_field( 'hero_brief' )[ 'btn_url' ];?>" class="btn-s"><?php _e( '...more about me' );?></a>
                </div>
                <div class="col-md">
                    <div class="features-wrapper">
                        <h3><?php esc_html_e('Your website will be...','yabu');?></h3>
                        <?php if ( have_rows( 'features_loop' )) : while ( have_rows( 'features_loop' )) : the_row() ;?>
                        <div class="feature">
                            <div class="feature-icon">
                                <img src="<?php the_sub_field( 'feature_icon' );?>" alt="">
                            </div>
                            <h4><?php the_sub_field( 'feature_title' );?></h4>
                        </div>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<span class="line-separator"></span>

<?php get_template_part( 'content','recent-projects' ); ?>

<span class="line-separator"></span>

<?php get_footer();?>