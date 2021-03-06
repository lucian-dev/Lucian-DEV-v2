<?php get_header();?>

<div class="section policy">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
        <div class="display-content yabu-scene">
            <div class="container">
                <div class="main-title text-center">
                    <h1><?php the_title();?></h1>
                </div>
                <div class="content-policy">
                    <?php the_content();?>
                </div>
            </div>
        </div>
	<?php endwhile; endif; ?>
</div>

<span class="line-separator"></span>

<?php get_footer();?>
