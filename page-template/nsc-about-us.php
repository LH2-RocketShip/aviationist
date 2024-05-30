<?php
/*
* Template Name: NSC About Us
*
*
* @package nsc-blog
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

$about_bgimage = get_theme_mod('nsc_blog_comments_policy_bgimage', get_template_directory_uri(). '/assets/images/About.png');
?>

<div class="ribbon-about custom-container">
    <?php get_template_part('template-parts/home/section-ribbon-news'); ?>
</div>

<main>
  <div id="responsive-container" class="custom-container">
    <div class="row">
      <div class="col-md-8 test">
        <div class="custom-container mb-3">
          <?php echo nsc_blog_breadcrumb(); ?>
        </div>
        <div class="about-banner">
          <section class="banner-content" style="background-image: url('<?php echo esc_url(get_theme_mod('about_banner_background', $about_bgimage)); ?>');">
            <h1><?php echo esc_html(get_theme_mod('about_banner_title', 'About Us')); ?></h1>
          </section>
        </div>
        <?php /* echo get_the_content(); */ ?>
        <div class="content">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
        the_content();
      }
    } else {
      echo '<p>No content found.</p>';
    }
    ?>
  </div>
      </div>
      <div class="col-md-4">
        <?php dynamic_sidebar('home-page');?>
      </div>
    </div>
    <?php get_template_part('template-parts/nsc-user'); ?>
    <?php get_template_part('template-parts/articles/section-video-interview'); ?>
    
        <?php
            if ( comments_open() || '0' != get_comments_number() ){
                comments_template();
            }
        ?>
</div>
<div class="container-fluid">
    <?php get_template_part('template-parts/home/section-comment-policy'); ?>
</div>
<div class="custom-container">
    <?php get_template_part('template-parts/home/section-aviationist-carousel'); ?>
  </div>
</main>

<?php get_footer(); ?>


<script>
document.addEventListener("DOMContentLoaded", function() {
    function updateContainerClass() {
        var container = document.getElementById('responsive-container');
        if (window.innerWidth < 641) {
            container.classList.remove('custom-container');
            container.classList.add('container-fluid');
        } else {
            container.classList.remove('container-fluid');
            container.classList.add('custom-container');
        }
    }

    // Initial class update
    updateContainerClass();

    // Update class on window resize
    window.addEventListener('resize', updateContainerClass);
});
</script>
