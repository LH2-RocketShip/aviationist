<?php
/**
 * The template part for news scrollbar
 *
 * @package nsc-blog
 */
?>

<div class="nsc-news-bar">
  <span class="">
    News Tickers
  </span>

  <?php $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 5,
  );
   $query = new WP_Query($args);
   if ( $query->have_posts() ) { ?>
     <marquee>
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <span>
          <?php echo get_the_title(); ?>
        </span>
        <strong>
          <?php
          $categories = get_the_category();
         if ( ! empty( $categories ) ) { ?>
             <?php echo esc_html( $categories[0]->name );  ?>
         <?php } ?>
        </strong>
     <?php endwhile; ?>
   </marquee>
 <?php } ?>
</div>
