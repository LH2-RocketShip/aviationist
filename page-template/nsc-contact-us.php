<?php
/*
* Template Name: NSC Contact Us
*
*
* @package nsc-blog
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$headh1 = get_theme_mod('nsc_blog_site_title', true);
?>

<main id="nsc-contact-us" class="nsc-contact-us">
  <div class="custom-container">
    <?php // if (get_theme_mod('nsc_blog_contact_us_description') !=''): ?>
      <p class="text-start text-md-center nsc-contact-desc nsc-contact-common-para">
        <?php echo esc_html(get_theme_mod('nsc_blog_contact_us_description', 'If you want to tell me something or if you need to prepare books, articles, brochures, datasheets, documentaries, presentations, meetings, movies and so on, and need the world’s most authoritative aviation journalist and blogger, you can send me an email.')); ?>
      </p>
    <?php // endif; ?>

    <?php // if(get_theme_mod('nsc_blog_contact_us_page_title', true) != '0'){ ?>
      <?php echo ($headh1 == 0) ? '<h1 class="text-center nsc-contact-main-title">' : '<h2 class="text-center nsc-contact-main-title">' ?>
        <?php echo esc_html(get_theme_mod('nsc_blog_contact_us_page_title', 'Get in touch')) ?>
      <?php echo ($headh1 == 0) ? '</h1>' : '</h2>' ?>
    <?php // } ?>

    <?php // if (get_theme_mod('nsc_blog_contact_us_description') !=''): ?>
      <p class="text-center nsc-contact-common-para">
        <?php echo esc_html(get_theme_mod('nsc_blog_contact_us_title_desc', 'Reach out, and let\'s create a universe of possibilities together!')); ?>
      </p>
    <?php // endif; ?>

    <div class="px-md-5 py-4">
      <div class="row">
        <div class="col-md-5 px-md-4">
          <?php // if(get_theme_mod('nsc_blog_contact_us_form_title', true) != '0'){ ?>
            <?php echo ($headh1 == 0) ? '<h2 class="contact-form-title text-md-start text-center">' : '<h3 class="contact-form-title text-md-start text-center">' ?>
              <?php echo esc_html(get_theme_mod('nsc_blog_contact_us_form_title', 'Let’s connect constellations')) ?>
            <?php echo ($headh1 == 0) ? '</h2>' : '</h3>' ?>
          <?php // } ?>

          <?php // if (get_theme_mod('nsc_blog_contact_us_form_description') !=''): ?>
            <p class="contact-form-desc text-md-start text-center">
              <?php echo esc_html(get_theme_mod('nsc_blog_contact_us_form_description', 'Let\'s align our constellations! Reach out and let the magic of collaboration illuminate our skies.')); ?>
            </p>
          <?php // endif; ?>

          <?php // if (get_theme_mod('nsc_blog_contact_us_form_shortcode') !=''): ?>
              <?php echo do_shortcode(get_theme_mod('nsc_blog_contact_us_form_shortcode', '[wpforms id="60"]')); ?>
          <?php // endif; ?>
        </div>
        <div class="col-md-7 ps-md-4">
          <?php // if (get_theme_mod('nsc_blog_contact_us_description') !=''): ?>
            <img src="<?php echo esc_attr(get_theme_mod('nsc_blog_contact_us_title_desc', get_template_directory_uri() . '/assets/images/contact-us.png')); ?>" alt="">

            </p>
          <?php // endif; ?>
        </div>
      </div>
    </div>

    <?php // if (get_theme_mod('nsc_blog_contact_us_below_description') !=''): ?>
      <p class="text-center nsc-contact-common-para">
        <?php echo esc_html(get_theme_mod('nsc_blog_contact_us_below_description', 'If you were looking for one of world’s most read military aviation blogger, you have just found him. My bio can be read in the About page.')); ?>
        <a href="<?php echo esc_url(get_theme_mod('nsc_blog_contact_us_about_page_link')); ?>"><?php echo esc_html('About page'); ?></a>
      </p>
    <?php // endif; ?>

    <?php get_template_part('template-parts/home/section-aviationist-carousel'); ?>
  </div>
</main>

<?php
get_footer();
