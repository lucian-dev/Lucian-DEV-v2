<section class="section working yabu-scene">
    <div class="display-content scene_element scene_element--fadeinleft">
        <div class="container">
            <div class="main-title">
              <h2><?php esc_html_e('Working ','yabu');?>
                <span><?php esc_html_e('on','yabu');?></span>
                <span class="bullets-anim">
                  <i></i>
                  <i></i>
                  <i></i>
                </span>
              </h2>
            </div>
            <div class="d-grid working__content">
              <div class="working__code-wrapper">
                <p>.pawan-studio {</p>
                  <div class="working__typed">
                    <span>display: flex;</span>
                    <span>align-items: center;</span>
                    <span>justify-content: center;</span>
                  </div>
                <p>}</p>
              </div>
              <div class="working__image-wrapper">
                <?php 
                  $queryPost = new WP_Query(array(
                    'post_type' => 'project',
                    'p'         => 282,
                  ));
                  if($queryPost->have_posts(  )) : while($queryPost->have_posts(  )) : $queryPost->the_post(); ?>
                  <div id="progressbar" data-value="<?php the_field('project_progress');?>">
                    <strong></strong>
                    <span><?php esc_html_e('Project Complete','yabu');?></span>
                  </div>
                  <div class="working__image">
                    <?php the_post_thumbnail( 'full', ' ' );?>
                  </div>
                  <?php endwhile; endif; ?>
                  <?php wp_reset_postdata();?>
              </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
  
</script>