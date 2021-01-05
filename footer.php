<div id="yabu-main" class="section testimonials yabu-scene">
    <div class="display-content scene_element scene_element--fadeinleft">
        <div class="container">
            <div class="main-title">
                <h2><?php esc_html_e('Clients ','yabu');?><span><?php esc_html_e('say...','yabu');?></span></h2>
            </div>
            <div class="loop-testimonials">
                <?php if (have_rows( 'loop_testimonials','option' )) : while (have_rows( 'loop_testimonials','option' )) : the_row();?>
                <div class="col-md">
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
        </div>
    </div>
</div>

<div class="section footer">
    <footer class="main-footer">
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
</div>

</main><!--END WRAPPER-->

<?php get_template_part('content','cookie'); ?>

<?php wp_footer(); ?>
</body>
</html>