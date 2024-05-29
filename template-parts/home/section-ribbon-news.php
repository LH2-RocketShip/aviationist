<?php
/**
 * The template part for news scrollbar
 *
 * @package nsc-blog
 */
?>

<div class="nsc-news-bar">
  <?php if (get_theme_mod('nsc_blog_news_ribbon_heading') !=''){ ?>
    <span class="">
      <?php echo esc_html(get_theme_mod('nsc_blog_news_ribbon_heading')); ?>
    </span>
  <?php } ?>

  <?php $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => get_theme_mod('nsc_blog_news_ribbon_post_num'),
  );
   $query = new WP_Query($args);
   if ( $query->have_posts() ) { ?>
<marquee>
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <a href="<?php echo esc_url(get_permalink()); ?>">
      <span>
        <?php echo get_the_title(); ?>
      </span>
    </a>
    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
      <strong>
        <?php
        $categories = get_the_category();
        if (!empty($categories)) {
          echo esc_html($categories[0]->name);
        }
        ?>
      </strong>
    </a>
  <?php endwhile; ?>
</marquee>
 <?php } ?>
</div>
