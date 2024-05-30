<?php
/**
 * The template part for display aviationist carousel
 *
 * @package nsc-blog
 */
?>

<section id="nsc-aviationist-carousel" class="nsc-aviationist-carousel">
  <div class="">
    <?php if (get_theme_mod('nsc_blog_also_on_aviationist_heading') !='') { ?>
      <h2 class="section-main-head">
        <?php echo esc_html(get_theme_mod('nsc_blog_also_on_aviationist_heading')); ?>
      </h2>
    <?php } ?>

    <?php $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => get_theme_mod('nsc_blog_also_on_aviationist_post_num'),
    );
     $query = new WP_Query($args);
     if ( $query->have_posts() ) { ?>
        <div class="multiple-items">
         <?php while ($query->have_posts()) : $query->the_post();
             $image_id = get_post_thumbnail_id();
             $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
             $image_title = get_the_title($image_id); ?>
          <div class="">
            <div class="m-3">
             <?php nsc_blog_featured_image_with_custom_sizes(get_the_ID()); ?>

                <h3 class="nsc-post-title mb-0 mt-3">
                  <a href="<?php echo get_the_permalink(); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
                    <?php echo get_the_title(); ?>
                  </a>
                </h3>

                <div class="d-flex align-items-center gap-2">
                  <p class="nsc-post-date mb-0"><?php echo get_the_date(); ?></p>
                  <p class="nsc-author-name mb-0"><?php echo get_the_author(); ?></p>
                </div>
            </div>
           </div>
       <?php endwhile; ?>
       </div>
      <?php if (!is_home() && !is_front_page()) { ?>
        <a href="<?php echo esc_url($all_articles_url); ?>" class="nsc-common-btn mt-4">
          <?php esc_html_e('View All Articles', 'nsc-blog'); ?>
        </a>
      <?php } ?>
     <?php }else { ?>
      <h4> <?php echo esc_html_e('Please add the post to see this section', 'nsc-blog'); ?> </h4>
     <?php }
     wp_reset_query(); ?>
  </div>
</section>
