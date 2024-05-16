<?php
/**
 * The Template for displaying all single posts.
 *
 * @package nsc-blog 
 */

 get_header();

 $sidebar = get_theme_mod('nsc_blog_category_sidebar', true);

 if ($sidebar == 0){
   $col8 = 'col-md-12';
 }else {
   $col8 = 'col-md-8';
 }

 $headh1 = get_theme_mod('nsc_blog_site_title', true);
 ?>

<main id="nsc-archieve" class="nsc-archieve">

  <?php
   if(get_theme_mod('nsc_blog_category_page_banner', true) != '0'){ ?>
    <div class="nsc-cat-image position-relative">
       <?php
        if (is_date()) {
          $date_query_args = array(
              'year' => get_query_var('year'),
              'monthnum' => get_query_var('monthnum'),
              'day' => get_query_var('day'),
          );
          $date_query = new WP_Query($date_query_args);
          $image_alt = $date_query->query['year'] . " Year category image";
          $image_title = $date_query->query['year'] . " Year category image";
          $post_count = $date_query->found_posts;
        }else {
          $category = get_queried_object();
          $cat_img_id = get_term_meta( $category->term_id, 'category-image-id', true );
          $image_alt = get_post_meta($cat_img_id, '_wp_attachment_image_alt', TRUE);
          $image_title = get_the_title($cat_img_id);
        }

          if ( ! empty( $cat_img_id ) && (!is_date()) ) {
            $cat_img_url = wp_get_attachment_image_url( $cat_img_id, 'full' );
            echo '<img src="' . esc_url( $cat_img_url ) . '" alt="'. (($image_alt) ? $image_alt : $category->name) .'" title="'.(($image_title) ? $image_title : $category->name).'">';
          }else {
            $cat_img_url = get_template_directory_uri(). '/assets/images/category-image.webp';
            echo '<img src="' . esc_url( $cat_img_url ) . '" alt="'. (($image_alt) ? $image_alt : $category->name) .'" title="'.(($image_title) ? $image_title : $category->name).'">';
          } ?>

      <div class="position-absolute top-50 start-50 translate-middle text-center">
        <?php
         if(get_theme_mod('nsc_blog_category_name', true) != '0'){
         echo ($headh1 == 0) ? '<h1 class="nsc-cat-head">' : '<h2 class="nsc-cat-head">';
            if (!is_date()) {
              echo esc_html($category->name, 'nsc-blog');
            }else {
              echo esc_html(get_the_date('Y'));
            }
          echo ($headh1 == 0) ? '</h1>' : '</h2>';
        }
         ?>

        <?php
          if(get_theme_mod('nsc_blog_category_post_count', true) != '0'){ ?>
            <p class="nsc-cat-count">
              <?php if (!is_date()) {
                echo esc_html($category->count . " Articles", 'nsc-blog');
              }else {
                 echo esc_html($post_count . " Articles", 'nsc-blog');
              } ?>
            </p>
        <?php } ?>

      </div>
    </div>
  <?php } ?>

  <div class="container">
    <div class="row">
      <div class="<?php echo esc_attr($col8); ?>">
        <div class="nsc-category-grid">
        <?php if ( have_posts() ) :
          while ( have_posts() ) : the_post(); ?>
            <div class="nsc-cat-post">
              <?php if(get_theme_mod('nsc_blog_category_post_image', true) != '0'){
                $post_image_id = get_post_thumbnail_id();
                $post_image_alt = get_post_meta($post_image_id, '_wp_attachment_image_alt', TRUE);
                $post_image_title = get_the_title($post_image_id);
                ?>
                <img src="<?php echo esc_url(get_the_post_thumbnail_url( get_the_ID(), 'medium' )); ?>" alt="<?php echo ($post_image_alt) ? $post_image_alt : get_the_title(); ?>" title="<?php echo ($post_image_title) ? $post_image_title : get_the_title(); ?>">
              <?php } ?>

              <div class="nsc-cat-content">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <?php
                    $avatar_html = get_avatar(get_the_author_meta('ID'));
                    $avatar_url = '';

                    if (!empty($avatar_html)){
                        $dom = new DOMDocument;
                        $dom->loadHTML($avatar_html);

                        $img_tags = $dom->getElementsByTagName('img');

                        if ($img_tags->length > 0) {
                            $avatar_url = $img_tags->item(0)->getAttribute('src');
                        }
                    } ?>

                    <div class="d-flex align-items-center gap-2">
                      <?php if(get_theme_mod('nsc_blog_category_author_image', true) != '0'){
                        if (!empty($avatar_url)) : ?>
                          <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo get_the_author(); ?>" class="author-img" title="<?php echo get_the_author(); ?>">
                        <?php else : ?>
                          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/default-user.png'); ?>" alt="<?php echo get_the_author(); ?>" class="author-img" title="<?php echo get_the_author(); ?>">
                        <?php endif;
                      } ?>

                      <?php if(get_theme_mod('nsc_blog_category_author_name', true) != '0'){ ?>
                        <p class="nsc-author mb-0"><?php echo get_the_author(); ?></p>
                      <?php } ?>
                    </div>

                    <?php if(get_theme_mod('nsc_blog_category_post_date', true) != '0'){ ?>
                      <p class="nsc-post-date mb-0"><?php echo get_the_date(); ?></p>
                    <?php } ?>
                </div>

                <?php if(get_theme_mod('nsc_blog_category_post_title', true) != '0'){ ?>
                  <h3 class="nsc-post-title mt-2">
                    <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                      <?php echo get_the_title(); ?>
                    </a>
                  </h3>
                <?php } ?>

              </div>
            </div>
          <?php endwhile;
          else :
            get_template_part( 'no-results' );
          endif; ?>
          </div>

          <?php
           $big = 999999999;
           echo '<div class="nsc-post-navigation">';
           echo paginate_links(array(
               'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
               'format' => '?paged=%#%',
               'current' => max(1, get_query_var('paged')),
               'total' => $wp_query->max_num_pages,
           ));
           echo '</div>';
           ?>

      </div>

      <?php if(get_theme_mod('nsc_blog_category_sidebar', true) != '0'){ ?>
        <aside class="col-md-4 nsc-sidebar">
          <?php dynamic_sidebar('right-sidebar');?>
        </aside>
      <?php } ?>

    </div>
  </div>
</main>


<?php get_footer(); ?>
