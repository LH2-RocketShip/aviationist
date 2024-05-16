<?php
/**
 * The template part for display all article section
 *
 * @package nsc-blog
 */
?>
<section id="nsc-all-articles" class="nsc-all-articles">
    <h2 class="section-main-head">ALL ARTICLES</h2>

    <?php $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 8,
    );
     $query = new WP_Query($args);
     if ( $query->have_posts() ) { ?>
        <div class="nsc-blog-post-grid">
         <?php while ($query->have_posts()) : $query->the_post();
         $image_id = get_post_thumbnail_id();
         $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
         $image_title = get_the_title($image_id);
          ?>

          <div class="post-container">
            <?php
            $image_id = get_post_thumbnail_id();
            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
            $image_title = get_the_title($image_id); ?>

            <img src="<?php echo esc_url(get_the_post_thumbnail_url( get_the_ID(), 'medium' )); ?>" alt="<?php echo esc_attr(($image_alt) ? $image_alt : get_the_title() ); ?>" title="<?php echo esc_attr(($image_title) ? $image_title : get_the_title() ); ?>">
            <div class="">
                <?php
                $categories = get_the_category();
               if ( ! empty( $categories ) ) { ?>
                 <a class="nsc-post-cat" href="<?php echo esc_attr( esc_url( get_category_link( $categories[0]->term_id ) ) ); ?>" title="<?php echo esc_attr( $categories[0]->name );  ?>">
                   <?php echo esc_html( $categories[0]->name );  ?>
                 </a>
               <?php } ?>

               <h3 class="nsc-post-title mb-0">
                 <a href="<?php echo get_the_permalink(); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
                   <?php echo get_the_title(); ?>
                 </a>
               </h3>
               <div class="nsc-post-para">
                 <?php echo get_the_content(); ?>
               </div>

               <div class="d-flex align-items-center gap-2">
                   <div class="d-flex align-items-center gap-2">
                   <?php $avatar_html = get_avatar(get_the_author_meta('ID'));
                       $avatar_url = '';
                       if (!empty($avatar_html)) {
                         $dom = new DOMDocument;
                         $dom->loadHTML($avatar_html);

                         $img_tags = $dom->getElementsByTagName('img');

                         if ($img_tags->length > 0) {
                           $avatar_url = $img_tags->item(0)->getAttribute('src');
                         }
                       } ?>

                     <?php
                     if(get_theme_mod('nsc_blog_single_post_author_image', true) != '0'){
                        if (!empty($avatar_url)) : ?>
                         <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo get_the_author(); ?>" class="nsc-author-image" title="<?php echo get_the_author(); ?>">
                       <?php else : ?>
                         <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/default-user.png'); ?>" alt="<?php echo get_the_author(); ?>" class="nsc-author-image"  title="<?php echo get_the_author(); ?>">
                       <?php endif;
                     } ?>

                       <?php if(get_theme_mod('nsc_blog_single_post_author_name', true) != '0'){ ?>
                         <p class="nsc-author-name mb-0"><?php echo get_the_author(); ?></p>
                       <?php } ?>

                       <p class="nsc-post-date mb-0"><?php echo get_the_date(); ?></p>
                   </div>
               </div>
               <a href="<?php echo get_the_permalink(); ?>" class="read-more-btn">
                 <?php echo esc_html__('Read More', 'nsc-blog'); ?>
               </a>
              </div>
          </div>
       <?php endwhile; ?>
       </div>
    <?php  }else { ?>
      <h4> <?php echo esc_html_e('Please add the post to see this section', 'nsc-blog'); ?> </h4>
     <?php }
     wp_reset_query(); ?>
     <a href="#" class="nsc-common-btn mt-4">
       View All Articles
     </a>
</section>
