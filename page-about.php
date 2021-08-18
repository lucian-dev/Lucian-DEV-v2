<?php
/*Template Name: About*/
?>

<?php get_header();?>

<section class="section about">
    <div class="display-content">
        <div class="container">
            <div class="main-title text-center">
                <h1><?php echo get_field( 'main_title_about' )[ 'title' ];?></h1>
                <p><?php echo get_field( 'main_title_about' )[ 'sub_title' ];?></p>
            </div>
            <div class="about__content">
                <div class="about__info">
                    <?php the_field( 'about_text' );?>
                </div>
            </div>
        </div>
    </div>
</section>

<span class="line-separator"></span>

<?php get_template_part( 'content','recent-projects' );?>

<span class="line-separator"></span>

<?php get_footer();?>
