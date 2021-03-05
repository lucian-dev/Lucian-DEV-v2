<?php
/*Template Name: Contact*/
?>

<?php get_header();?>

<section class="section contact">
    <div class="display-content yabu-scene">
        <div class="container">
            <div class="main-title text-center">
                <h1><?php echo get_field( 'main_title_contact' )[ 'title' ];?></h1>
                <p><?php echo get_field( 'main_title_contact' )[ 'sub_title' ];?></p>
            </div>
            <div class="p-grid contact__content">
                <div class="contact__social">
                    <span class="contact__icon">
                        <svg><use xlink:href="#social"></use></svg>
                    </span>
                    <h5><?php esc_html_e('Social','yabu');?></h5>
                    <?php if( get_field('linkedin','option') ): ?>
                        <a href="<?php the_field('linkedin','option') ?>" target="_blank">
                            <svg><use xlink:href="#linkedin"></use></svg>
                        </a>
                    <?php endif; ?>
                    <?php if( get_field('github','option') ): ?>
                        <a href="<?php the_field('github','option') ?>" target="_blank">
                            <svg><use xlink:href="#github"></use></svg>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="contact__email">
                    <span class="contact__icon">
                        <svg><use xlink:href="#envelope"></use></svg>
                    </span>
                    <h5><?php esc_html_e('Email','yabu');?></h5>
                    <a href="mailto:<?php the_field( 'email' );?>"><?php the_field( 'email' );?></a>
                </div>
            </div>
            <div class="form-wrapper">
                <?php echo do_shortcode(get_field( 'contact_form' ));?>
            </div>
        </div>
    </div>
</section>

<span class="line-separator"></span>

<?php get_footer();?>

