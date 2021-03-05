<section class="section testimonials">
    <div class="display-content">
        <div class="container">
            <div class="main-title">
                <h2><?php esc_html_e('They ','yabu');?><span><?php esc_html_e('say...','yabu');?></span></h2>
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper loop-testimonials">
                    <?php if (have_rows( 'loop_testimonials','option' )) : while (have_rows( 'loop_testimonials','option' )) : the_row();?>
                    <div class="swiper-slide">
                        <div class="testimonial">
                            <div class="author-image">
                                <div class="author-image-inner">
                                    <img src="<?php the_sub_field( 'author_image' );?>" alt="">
                                </div>
                            </div>
                            <div class="author-testimonial">
                                <?php the_sub_field( 'testimonial' );?>
                            </div>
                            <div class="author-info">
                                <h5><?php the_sub_field( 'author_name' )?></h5>
                                <i>-</i>
                                <a href="<?php the_sub_field( 'author_info' )?>" target="_blank"><?php the_sub_field( 'author_info' )?></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

</main><!--END WRAPPER-->

<footer class="section main-footer">
    <div class="container">
        <div class="menu-footer">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main-footer',
                'link_before'    => '<span>',
                'link_after' => '</span>',
                'container'=> false,
            ) );
            ?>
        </div>
        <?php do_action('yabu_copy_footer' );?>
    </div>
</footer>

<?php get_template_part('svg');?>
<?php get_template_part('content','cookie'); ?>

<?php wp_footer(); ?>
</body>
</html>