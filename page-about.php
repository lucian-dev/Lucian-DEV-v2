<?php
/*Template Name: About*/
?>

<?php get_header();?>

<section class="section about yabu-scene">
    <div class="display-content scene_element scene_element--fadeinright">
        <div class="container">
            <div class="main-title text-center">
                <h1><?php echo get_field( 'main_title_about' )[ 'title' ];?></h1>
                <p><?php echo get_field( 'main_title_about' )[ 'sub_title' ];?></p>
            </div>
            <div class="d-grid about__content">
                <div class="about__info">
                    <?php the_field( 'about_text' );?>
                </div>
                <div class="about__skills">
                    <?php if ( have_rows( 'loop_skill' ) ) : while ( have_rows( 'loop_skill' )) : the_row();?>
                        <h4 class="about__skill"><?php the_sub_field( 'skill' );?></h4>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<span class="line-separator"></span>

<section class="section features yabu-scene">
    <div class="display-content scene_element scene_element--fadeinleft">
        <div class="container">
            <div class="main-title">
                <h2><?php echo the_field( 'main_title_features' );?></h2>
            </div>
            <div class="p-grid features__content">
                <?php if ( have_rows('loop_features') ) : while ( have_rows( 'loop_features' )) : the_row();?>
                <div class="features__wrapper">
                    <div class="features__icon">
                        <img src="<?php the_sub_field( 'feature_icon' );?>" alt="">
                    </div>
                    <div class="features__info">
                        <h4><?php the_sub_field( 'feature_title' );?></h4>
                        <p><?php the_sub_field( 'feature_info' );?></p>
                        <a href="<?php the_sub_field( 'btn_feature' );?>" class="btn"><?php _e( 'Contact Me' );
                        ?></a>
                    </div>
                </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</section>

<span class="line-separator"></span>

<?php get_template_part( 'content','recent-projects' );?>

<span class="line-separator"></span>

<?php get_footer();?>
