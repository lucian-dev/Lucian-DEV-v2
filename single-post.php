<?php get_header();?>

<section class="section blog-post">
    <div class="display-content">
        <div class="container">
            <div class="row yabu-blog-content">
                <?php if ( have_posts(  )) : while ( have_posts(  )) : the_post(); ?>
                    <div id="yabu-post-<?php the_ID();?>" <?php post_class( 'yabu-post' );?>>
                        <h1><?php the_title();?></h1>
                        <div class="content-blog-post">
                            <?php the_content();?>
                        </div>
                        <div class="posts-navigation">
                            <span class="prev-link">
                                <?php previous_post_link(); ?> 
                            </span>
                            <span class="next-link">
                                <?php next_post_link(); ?>
                            </span>
                        </div> <!-- end navigation -->
                    </div>
                <?php endwhile; endif; ?>
                <?php get_sidebar( );?>
            </div>
        </div>
    </div>
</section>

<span class="line-separator"></span>

<?php get_footer();?>