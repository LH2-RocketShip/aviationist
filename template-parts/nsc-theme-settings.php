<?php
/**
 * The template part for theme settings
 *
 * @package nsc-blog
 */
?>

<div class="nsc-feature-settings">

  <button type="button" class="d-block ms-auto nsc-setting-btn" id="nsc-setting-btn" aria-label="nsc-setting-content">
    <i class="fa-solid fa-gear"></i>
    <span class="screen-reader-text">
      <?php echo esc_html(get_theme_mod('nsc_blog_theme_settings_button',__('Open setting','nsc-blog')));?>
    </span>
  </button>

  <div class="nsc-setting-content" id="nsc-setting-content">
    <?php if(get_theme_mod('nsc_blog_theme_settings_main_heading', true) != false){ ?>
      <h2 class="customier-title">
          <?php echo esc_html(get_theme_mod('nsc_blog_theme_settings_main_heading')); ?>
      </h2>
    <?php } ?>

    <?php if(get_theme_mod('nsc_blog_theme_settings_direction_heading', true) != false){ ?>
      <h3 class="">
          <?php echo esc_html(get_theme_mod('nsc_blog_theme_settings_direction_heading')); ?>
      </h3>
    <?php } ?>
    <div class="">
      <label for="nsc-dir-rtl">
        <?php echo esc_html(get_theme_mod('nsc_blog_theme_settings_direction_rtl')); ?>
        <input type="radio" name="nsc-theme-dir" id="nsc-dir-rtl" value="rtl">
      </label>
      <label for="nsc-dir-ltr">
        <?php echo esc_html(get_theme_mod('nsc_blog_theme_settings_header_style_ltr')); ?>
        <input type="radio" name="nsc-theme-dir" id="nsc-dir-ltr" value="ltr" checked>
      </label>
    </div>

    <label for="nsc-theme-modes" class="d-flex align-items-center gap-2">
      <?php echo esc_html(get_theme_mod('nsc_blog_theme_settings_theme_modes')); ?>
      <input type="checkbox" name="nsc-theme-mod" value="" id="nsc-theme-modes">
      <span></span>
    </label>
  </div>

</div>
