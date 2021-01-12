<?php
/*Template Name: Projects*/
?>

<?php get_header();?>

<section class="section projects yabu-scene">
    <div class="display-content scene_element scene_element--fadeinright">
        <div class="container">
            <div class="main-title text-center">
                <h1><?php echo get_the_title();?></h1>
            </div>
            <?php
                $categories = get_terms( array(
                    'post_type'     => 'project',
                    'taxonomy'      => 'project-category',
                    'hide_empty'    => true,
                ));
                if ( $categories ) : ?>
                <div class="filter-btn-group filter-projects">
                    <button data-filter="*" class="btn-filter is-checked">
                        <?php esc_html_e( 'All', 'yabu' ); ?>
                    </button>
                    <?php foreach ( $categories as $category) {
                        echo '<button class="btn-filter" data-filter=".'.$category->slug.'">'.$category->name.'</button>';
                    }
                    ?>
                </div>
            <?php endif; ?>
            <?php
            $args = array(
                'post_type'      => 'project',
                'posts_per_page' => -1,
                'orderby'        => 'rand'
            );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts()) : ?>
                <div class="rr_projects loop-projects">
                    <?php while ( $loop->have_posts()) : $loop->the_post();?>
                        <div class="col-sm project-isotope <?php $categories = get_the_terms( get_the_id(), 'project-category'); foreach ( $categories as $category ){
                            echo $category->slug;
                        }?>">
                            <div class="rr_projects__inner">
                                <div class="rr_projects__image">
                                    <?php if ( get_field('badge_construction')) : ?>
                                        <span class="rr_projects__progress"><?php esc_html_e('Under Construction','yabu');?></span>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink();?>">
                                        <?php the_post_thumbnail('large', array('class' => 'project-th')); ?>
                                    </a>
                                </div>
                                <div class="rr_projects__info">
                                    <span>
                                        <?php echo $category->name; ?>
                                    </span>
                                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
	        <?php wp_reset_postdata() ;?>
        </div>
    </div>
</section>

<span class="line-separator"></span>

<?php get_footer();?>
