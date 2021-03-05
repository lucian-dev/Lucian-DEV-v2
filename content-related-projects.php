<section class="section related-projects">
    <div class="display-content yabu-scene">
        <div class="container">
            <div class="main-title">
                <h2><?php esc_html_e('Other ','yabu');?><span><?php esc_html_e('projects...','yabu');?></span></h2>
            </div>
            <?php
                $args = array(
                    'post_type'         => 'project',
                    'category__in'      => wp_get_post_categories( get_the_ID()),
                    'post__not_in'      => array(get_the_ID()),
                    'posts_per_page'    => 3,
                    'orderby'           => 'rand',
                    'order'             => 'ASC'
                ); 
                $loop = new WP_Query( $args );
                if ( $loop->have_posts()) : ?>
                <div class="p-grid rr_projects">
                    <?php while ( $loop->have_posts()) : $loop->the_post();?>
                        <div class="rr_projects__content">
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
                                    <?php 
                                        $categories = get_the_terms( $post->ID, 'project-category');
                                        if ( !empty($categories) && ! is_wp_error( $categories )){
                                            foreach ($categories as $category) {
                                                echo '<span>' . $category->name . '</span>';
                                            } 
                                        }; ?>
                                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata() ;?>
            <div class="btn-bottom text-center">
                <a href="<?php the_field('projects_btn','option');?>" class="btn"><?php esc_html_e('more','yabu');?></a>
            </div>
        </div>
    </div>
</section>