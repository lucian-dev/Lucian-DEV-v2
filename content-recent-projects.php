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
                    'meta_value' => 1
                );
                $loop = new WP_Query( $args );
                if ( $loop->have_posts()) : ?>
                <div class="row">
                <?php while ( $loop->have_posts()) : $loop->the_post();?>
                    <div class="col-sm project-wrapper">
                        <div class="project-inner">
                            <div class="project-image">
                                <?php if ( get_field('badge_construction')) : ?>
                                    <span class="project-progress"><?php esc_html_e('Under Construction','yabu');?></span>
                                <?php endif; ?>
                                <a href="<?php the_permalink();?>">
                                    <?php the_post_thumbnail('large', array('class' => 'project-th')); ?>
                                </a>
                            </div>
                            <div class="project-info">
                                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata() ;?>
            <div class="btn-bottom text-center">
                <a href="<?php the_field('projects_btn','option');?>" class="btn transition"><?php esc_html_e('more','yabu');?></a>
            </div>
        </div>
    </div>
</div>