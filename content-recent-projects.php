<div id="yabu-main" class="section last-projects yabu-scene">
    <div class="display-content scene_element scene_element--fadeinleft">
        <div class="container">
            <div class="main-title">
                <h2><?php esc_html_e('Last ','yabu');?><span><?php esc_html_e('projects...','yabu');?></span></h2>
            </div>
            <?php
                $args = array(
                    'post_type'      => 'project',
                    'posts_per_page' => 3,
                    'meta_key' => 'featured_project',
                    'meta_compare' => '=',
                    'meta_value' => 1
                );
                $loop = new WP_Query( $args );
                if ( $loop->have_posts()) : ?>
            <div class="row loop-projects">
                <?php while ( $loop->have_posts()) : $loop->the_post();?>
                    <a href="<?php the_permalink();?>" class="col-sm project-item">
                        <div class="project-image">
                            <div class="project-title">
                                <h4><?php the_title();?></h4>
                                <span class="project-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="#5f5f5f"><path d="M60.3 42.4l-8.5-8.5c-4.3-4.3-11.2-4.8-16-1.3L31 27.8c1.3-2.1 2.1-4.5 2.1-6.9 0-3.5-1.3-6.7-3.7-9l-8-8.2c-4.8-4.8-12.8-4.8-17.6 0C1.5 6 .2 8.9.2 12.4s1.3 6.4 3.7 8.8l8.2 8.5c2.4 2.4 5.6 3.7 8.8 3.7 2.1 0 4.5-.5 6.4-1.9l5.1 5.1c-1.1 1.9-1.9 4-1.9 6.4 0 3.5 1.3 6.4 3.7 8.8l8.2 8.5c2.4 2.4 5.6 3.7 8.8 3.7 3.2 0 6.4-1.3 8.8-3.7 2.4-2.4 3.7-5.3 3.7-8.8.3-3.5-1-6.7-3.4-9.1zM15.9 25.9l-8.2-8.5c-1.3-1.3-2.1-3.2-2.1-5.1s.8-3.7 2.1-5.1 3.2-2.1 5.1-2.1 3.7.8 5.1 2.1l8.5 8.5c1.3 1.3 2.1 3.2 2.1 5.1 0 1.1-.3 2.1-.8 3.2l-2.4-2.4c-1.1-1.1-2.7-1.1-3.7 0-1.1 1.1-1.1 2.7 0 3.7l2.1 2.1c-2.8.9-5.7.4-7.8-1.5zm40.7 30.4c-2.9 2.9-7.5 2.9-10.1 0L38 47.8c-1.3-1.3-2.1-3.2-2.1-5.1 0-.8.3-1.6.5-2.4l2.1 2.1c.5.5 1.3.8 1.9.8.8 0 1.3-.3 1.9-.8 1.1-1.1 1.1-2.7 0-3.7l-2.1-2.4c1.1-.5 2.1-.8 3.2-.8 1.9 0 3.7.8 5.1 2.1l8.5 8.5c1.3 1.3 2.1 3.2 2.1 5.1-.4 1.9-1.2 3.8-2.5 5.1z"/></svg>
                                </span>
                            </div>
                            <?php if ( get_field('badge_construction')) : ?>
                                <span class="project-progress"><?php esc_html_e('Under Construction','yabu');?></span>
                            <?php endif; ?>
	                        <?php the_post_thumbnail('large', array('class'=>'img-abs')); ?>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata() ;?>
            <?php endif; ?>
            <div class="btn-bottom text-center">
                <a href="<?php the_field('projects_btn','option');?>" class="btn transition"><?php esc_html_e('more','yabu');?></a>
            </div>
        </div>
    </div>
</div>