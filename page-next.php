<?php
/*Template Name: Next*/
?>

<?php get_header("next"); ?>

<div class="section next-index">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
        <div class="display-content">
            <div class="container">
                <div class="content-next">
                    <?php the_content();?>
                </div>
            </div>
        </div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer("next"); ?>