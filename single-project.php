<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<section class="section project">
    <div class="display-content yabu-scene">
        <div class="container">
            <div class="main-title">
                <h1><?php the_title();?></h1>
            </div>
            <div class="d-grid project__content">
                <div class="project__info">
                    <?php the_content();?>
                    <span><?php esc_html_e( 'Project type:', 'yabu' );?></span>
                    <?php 
                        $categories = get_the_terms( $post->ID, 'project-category');
                        if ( !empty($categories) && ! is_wp_error( $categories )){
                            foreach ($categories as $category) {
                                echo $category->name;
                            } 
                        }         
                    ?>
                    <span><?php esc_html_e('Tech:','yabu');?></span>
                    <?php the_field('tech_project');?>
                    <span><?php esc_html_e('Maintenance:','yabu');?></span>
                    <?php the_field('maintenance');?>
                    <?php if (get_field('collab_project')) : ?>
                        <span><?php esc_html_e('Collab:','yabu');?></span>
                        <?php the_field('collab');?>
                    <?php endif; ?>
                    <div class="link-project">
                        <a href="<?php the_field('project_url');?>" class="btn" target="_blank" rel="noreferrer"><?php esc_html_e('Visit Website','yabu');?></a>
                    </div>
                </div>
                <div class="project__images-wrapper">
                    <div id="progressbar" data-value="<?php the_field('project_progress');?>">
                        <strong></strong>
                        <span><?php esc_html_e('Project Complete','yabu');?></span>
                    </div>
	                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                    <?php the_post_thumbnail( 'large', array('class' => 'project__image-back'));?>
                    <div class="project__image-front-wrapper">
                        <img src="<?php echo get_template_directory_uri() ?>/images/phone.png" alt="">
                        <div class="project__image-front" style="background-image:url(<?php echo $backgroundImg[0] ; ?>);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; endif; ?>

<span class="line-separator"></span>

<?php get_template_part( 'content','related-projects' );?>

<span class="line-separator"></span>

<?php get_footer();?>
