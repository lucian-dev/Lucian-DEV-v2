<?php get_header();?>

<div id="yabu-main" class="section blog yabu-scene">
    <div class="display-content scene_element scene_element--fadeinright">
        <div class="container">
            <div class="main-title text-center">
                <h1><?php single_post_title(); ?></h1>
                <p><?php esc_html_e( 'My journal of code snippets, reviews, code learning, projects that I made...dev stuff', 'yabu' ); ?></p>
            </div>
            <div class="yabu-blog-content">
                <?php if ( have_posts()) : ?>
                    <div class="row loop-posts">
                        <?php while ( have_posts()) : the_post();?>
                            <article class="col-sm">
                                <div class="post-inner">
                                    <?php the_post_thumbnail( 'medium' );?>
                                    <div class="post-link">
                                        <span class="post-meta"><?php echo get_the_date();?></span>
                                        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>  
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                    <div class="posts-navigation">
                        <?php posts_nav_link(' . ','...Go previous page','Go next page...'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<span class="line-separator"></span>

<?php get_footer();?>