<?php
/**
 * The Template for displaying all single posts.
 *
 * @package nsc-blog
 */

 get_header();

 $sidebar = get_theme_mod('nsc_blog_single_post_sidebar', true);

 if ($sidebar == 1){
   $col8 = 'col-md-8';
 }else {
   $col8 = 'col-md-12';
 }

 $headh1 = get_theme_mod('nsc_blog_site_title', true); ?>

<article class="nsc-single-post-page">
  <div class="custom-container">

    <?php get_template_part('template-parts/home/section-ribbon-news'); ?>

    <div class="row mb-5">
      <div class="<?php echo esc_attr($col8); ?>">
        <?php echo nsc_blog_breadcrumb(); ?>
        

      <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post(); ?>
        <div class="nsc-custom-container">

         <?php if(get_theme_mod('nsc_blog_single_post_title', true) != '0'){ ?>
            <h1 class="single-post-title">
                <?php echo get_the_title(); ?>
            </h1>
        <?php } ?>


          <?php
            if(get_theme_mod('nsc_blog_single_post_except', true) != '0'){
              if ( has_excerpt() ) {
                echo "<p class='nsc-content-single'>" . get_the_excerpt() . "</p>";
              }
            } ?>

          <div class="d-flex align-items-center justify-content-between flex-wrap single-post-container">
            <div class="d-flex align-items-center flex-wrap">
              <?php
              if(get_theme_mod('nsc_blog_single_post_cats', true) != '0'){
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                  $first_category = $categories[0]; ?>

                  <a href="<?php echo esc_attr( esc_url( get_category_link( $first_category->term_id ) ) ); ?>" class="nsc-post-cat me-2" title="<?php echo esc_attr( $first_category->name ); ?>">
                    <?php echo esc_html($first_category->name ); ?>
                  </a>
                  <?php
                  // echo esc_html( $first_category->name );
                  /* foreach ($categories as $key => $category) { ?>
                    <a href="<?php echo esc_attr( esc_url( get_category_link( $categories[0]->term_id ) ) ); ?>" class="nsc-post-cat me-2" title="<?php echo esc_attr( $category->name ); ?>">
                      <?php echo esc_html( $category->name ); ?>
                    </a>
                  <?php } */
                  }
                }
              ?>

              <ul class="nsc-post-metas mb-0">
                <li>
                  <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.99984 12.3333C2.77809 12.3333 0.166504 9.72171 0.166504 6.49996C0.166504 3.27821 2.77809 0.666626 5.99984 0.666626C9.22159 0.666626 11.8332 3.27821 11.8332 6.49996C11.8332 9.72171 9.22159 12.3333 5.99984 12.3333ZM5.99984 11.1666C7.23751 11.1666 8.4245 10.675 9.29967 9.79979C10.1748 8.92462 10.6665 7.73764 10.6665 6.49996C10.6665 5.26228 10.1748 4.0753 9.29967 3.20013C8.4245 2.32496 7.23751 1.83329 5.99984 1.83329C4.76216 1.83329 3.57518 2.32496 2.70001 3.20013C1.82484 4.0753 1.33317 5.26228 1.33317 6.49996C1.33317 7.73764 1.82484 8.92462 2.70001 9.79979C3.57518 10.675 4.76216 11.1666 5.99984 11.1666ZM6.58317 6.49996H8.9165V7.66663H5.4165V3.58329H6.58317V6.49996Z" fill="#8F90A6"/>
                  </svg>
                  <?php
                    $post_content = get_the_content();
                    $reading_time = nsc_blog_calculate_reading_time($post_content);
                    echo esc_html($reading_time . "Min Read", 'nsc-blog');
                  ?>
                </li>
                <li>
                  <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.4998 3.27081H3.49984C2.4528 3.27081 1.604 4.11961 1.604 5.16665V11C1.604 12.047 2.4528 12.8958 3.49984 12.8958H10.4998C11.5469 12.8958 12.3957 12.047 12.3957 11V5.16665C12.3957 4.11961 11.5469 3.27081 10.4998 3.27081Z" stroke="#8F90A6"/>
                    <path d="M3.9375 2.10419V4.14585" stroke="#8F90A6" stroke-linecap="round"/>
                    <path d="M2.1875 5.89581H11.8125" stroke="#8F90A6" stroke-linecap="round"/>
                    <path d="M10.354 2.10419V4.14585" stroke="#8F90A6" stroke-linecap="round"/>
                    <path d="M4.8125 8.66669C5.05412 8.66669 5.25 8.47081 5.25 8.22919C5.25 7.98756 5.05412 7.79169 4.8125 7.79169C4.57088 7.79169 4.375 7.98756 4.375 8.22919C4.375 8.47081 4.57088 8.66669 4.8125 8.66669Z" fill="#8F90A6"/>
                    <path d="M7.146 8.66669C7.38762 8.66669 7.5835 8.47081 7.5835 8.22919C7.5835 7.98756 7.38762 7.79169 7.146 7.79169C6.90437 7.79169 6.7085 7.98756 6.7085 8.22919C6.7085 8.47081 6.90437 8.66669 7.146 8.66669Z" fill="#8F90A6"/>
                    <path d="M9.479 8.66669C9.72063 8.66669 9.9165 8.47081 9.9165 8.22919C9.9165 7.98756 9.72063 7.79169 9.479 7.79169C9.23738 7.79169 9.0415 7.98756 9.0415 8.22919C9.0415 8.47081 9.23738 8.66669 9.479 8.66669Z" fill="#8F90A6"/>
                    <path d="M4.8125 11C5.05412 11 5.25 10.8041 5.25 10.5625C5.25 10.3209 5.05412 10.125 4.8125 10.125C4.57088 10.125 4.375 10.3209 4.375 10.5625C4.375 10.8041 4.57088 11 4.8125 11Z" fill="#8F90A6"/>
                    <path d="M7.146 11C7.38762 11 7.5835 10.8041 7.5835 10.5625C7.5835 10.3209 7.38762 10.125 7.146 10.125C6.90437 10.125 6.7085 10.3209 6.7085 10.5625C6.7085 10.8041 6.90437 11 7.146 11Z" fill="#8F90A6"/>
                    <path d="M9.479 11C9.72063 11 9.9165 10.8041 9.9165 10.5625C9.9165 10.3209 9.72063 10.125 9.479 10.125C9.23738 10.125 9.0415 10.3209 9.0415 10.5625C9.0415 10.8041 9.23738 11 9.479 11Z" fill="#8F90A6"/>
                  </svg>

                  <?php echo get_the_date(); ?>
                </li>
                <li>
                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.59625 2.41317C3.68005 1.51482 5.2371 0.5625 7.00023 0.5625C8.76337 0.5625 10.3204 1.51482 11.4042 2.41317C11.9523 2.86749 12.3948 3.3208 12.7004 3.66052C12.8535 3.83067 12.9729 3.97306 13.0547 4.07384C13.0956 4.12425 13.1272 4.16431 13.1489 4.19229C13.1598 4.20628 13.1682 4.21726 13.1741 4.22501L13.1811 4.23418L13.1831 4.2369L13.1838 4.23779C13.1838 4.23779 13.1842 4.23836 12.8336 4.5C13.1842 4.76164 13.184 4.76189 13.184 4.76189L13.1831 4.7631L13.1811 4.76582L13.1741 4.77499C13.1682 4.78274 13.1598 4.79372 13.1489 4.80771C13.1272 4.83569 13.0956 4.87575 13.0547 4.92616C12.9729 5.02694 12.8535 5.16933 12.7004 5.33948C12.3948 5.6792 11.9523 6.13251 11.4042 6.58683C10.3204 7.48518 8.76337 8.4375 7.00023 8.4375C5.2371 8.4375 3.68005 7.48518 2.59625 6.58683C2.04814 6.13251 1.60567 5.6792 1.30006 5.33948C1.147 5.16933 1.0276 5.02694 0.945771 4.92616C0.904841 4.87575 0.873263 4.83569 0.851526 4.80771C0.840656 4.79372 0.832242 4.78274 0.826345 4.77499L0.819394 4.76582L0.817348 4.7631L0.816684 4.76221C0.816684 4.76221 0.816262 4.76164 1.1669 4.5C0.816262 4.23836 0.816443 4.23811 0.816443 4.23811L0.817348 4.2369L0.819394 4.23418L0.826345 4.22501C0.832242 4.21726 0.840656 4.20628 0.851526 4.19229C0.873263 4.16431 0.904841 4.12425 0.945771 4.07384C1.0276 3.97306 1.147 3.83067 1.30006 3.66052C1.60567 3.3208 2.04814 2.86749 2.59625 2.41317ZM1.1669 4.5L0.816443 4.23811C0.70063 4.39332 0.700448 4.60644 0.816262 4.76164L1.1669 4.5ZM1.72888 4.5C1.79036 4.5729 1.86455 4.65865 1.95057 4.75427C2.23532 5.0708 2.64712 5.49249 3.15464 5.91317C4.1821 6.76482 5.54171 7.5625 7.00023 7.5625C8.45876 7.5625 9.81837 6.76482 10.8458 5.91317C11.3533 5.49249 11.7651 5.0708 12.0499 4.75427C12.1359 4.65865 12.2101 4.5729 12.2716 4.5C12.2101 4.4271 12.1359 4.34135 12.0499 4.24573C11.7651 3.9292 11.3533 3.50751 10.8458 3.08683C9.81837 2.23518 8.45876 1.4375 7.00023 1.4375C5.54171 1.4375 4.1821 2.23518 3.15464 3.08683C2.64712 3.50751 2.23532 3.9292 1.95057 4.24573C1.86455 4.34135 1.79036 4.4271 1.72888 4.5ZM12.8336 4.5L13.184 4.76189C13.2998 4.60668 13.3 4.39356 13.1842 4.23836L12.8336 4.5Z" fill="#8F90A6"/>
                    <path d="M5.1044 4.5C5.1044 3.45297 5.9532 2.60417 7.00023 2.60417C8.04727 2.60417 8.89607 3.45297 8.89607 4.5C8.89607 5.54703 8.04727 6.39583 7.00023 6.39583C5.9532 6.39583 5.1044 5.54703 5.1044 4.5ZM7.00023 3.47917C6.43645 3.47917 5.9794 3.93622 5.9794 4.5C5.9794 5.06378 6.43645 5.52083 7.00023 5.52083C7.56402 5.52083 8.02107 5.06378 8.02107 4.5C8.02107 3.93622 7.56402 3.47917 7.00023 3.47917Z" fill="#8F90A6"/>
                    </svg>
                    <?php echo nsc_blog_get_reading_count(get_the_ID()) . "Views"; ?>
                  </li>
              </ul>

            </div>
            <div class="d-flex nsc-post-share gap-2">
              <?php if(get_theme_mod('nsc_blog_single_post_share_button', true) != '0'){ ?>
                <div class="nsc-popup-container">
                    <?php 
                    if ( is_user_logged_in() ) {
                        global $wpdb;
                        $user_id = get_current_user_id();
                        $post_id = get_the_ID();
                        $table_name = $wpdb->prefix . 'bookmarks';
                    
                        $bookmark = $wpdb->get_row( $wpdb->prepare(
                            "SELECT id FROM $table_name WHERE user_id = %d AND post_id = %d",
                            $user_id, $post_id
                        ));
                    
                        if ( $bookmark ) {
                            echo '<button id="bookmark-btn" data-post-id="' . $post_id . '" class="remove-bookmark">
                                 <i class="far fa-bookmark"></i>
                                </button>';
                        } else {
                            echo '<button id="bookmark-btn" data-post-id="' . $post_id . '" class="add-bookmark">
                                 <i class="far fa-bookmark"></i>
                                </button>';
                        }
                    }
                    ?>

                    
                    
                  <button type="button" name="button" class="copy-link-pop-btn" aria-labelledby="<?php echo esc_attr("Share".$post_id); ?>">
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                    <span class="screen-reader-text">
                   <?php echo esc_html(get_theme_mod('nsc_blog_single_post_share_button',__('Share Button','nsc-blog'))); ?>
                    </span>
                  </button>
                  <div class="nsc-popups" id="<?php echo esc_attr("Share".$post_id); ?>">
                    <!-- <div class="d-flex flex-column"> -->
                      <?php  $post_url = get_permalink();
                            $post_title = get_the_title();
                      ?>
                      <ul class="mb-0">
                        <li>
                          <a href="<?php echo esc_attr('https://www.facebook.com/sharer/sharer.php?u=' . $post_url ); ?>" target="_blank" title="<?php echo esc_attr('Facebook', 'nsc-blog'); ?>">
                            <i class="fa-brands fa-facebook"></i>
                            <?php echo esc_html('Facebook', 'nsc-blog'); ?>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo esc_attr('https://twitter.com/intent/tweet?url=' . $post_url ); ?>" target="_blank" title="<?php echo esc_attr('Twitter', 'nsc-blog'); ?>">
                            <i class="fa-brands fa-x-twitter"></i>
                            <?php echo esc_html('Twitter', 'nsc-blog'); ?>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo esc_attr('https://www.linkedin.com/shareArticle?url=' . $post_url ); ?>" target="_blank" title="<?php echo esc_attr('Linkedin', 'nsc-blog'); ?>">
                            <i class="fa-brands fa-linkedin"></i>
                            <?php echo esc_html('Linkedin', 'nsc-blog'); ?>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo esc_attr('https://www.instagram.com/your_username_here/' . $post_url ); ?>" target="_blank" title="<?php echo esc_attr('Instagram', 'nsc-blog'); ?>">
                            <i class="fa-brands fa-instagram"></i>
                            <?php echo esc_html('Instagram', 'nsc-blog'); ?>
                          </a>
                        </li>
                      </ul>
                  </div>
                </div>
              <?php } ?>

              <?php if(get_theme_mod('nsc_blog_single_post_link_button', true) != '0'){ ?>
                <div class="nsc-popup-container">
                  <button type="button" name="button" class="copy-link-pop-btn" aria-labelledby="<?php echo esc_attr("copy".$post_id); ?>">
                    <i class="fa-solid fa-ellipsis"></i>
                    <span class="screen-reader-text">
                      <?php echo esc_html(get_theme_mod('nsc_blog_single_post_link_button',__('Link','nsc-blog')));?>
                    </span>
                  </button>

                  <div class="nsc-popups" id="<?php echo esc_attr("copy".$post_id); ?>">
                    <div class="d-flex flex-column">
                      <ul class="mb-0">
                          <li>
                            <button type="button" id="nsc-copy-link" class="copy-link" data-url="<?php echo esc_url(get_the_permalink()); ?>">
                              <i class="fa-regular fa-paste"></i>
                              <span class="normal-text">
                                <?php echo esc_html__('Copy link', 'nsc-blog'); ?>
                              </span>
                              <span class="copied-text">
                                <?php echo esc_html__('Copied', 'nsc-blog'); ?>
                              </span>
                            </button>
                          </li>
                          <li>
                            <a href="#comments" title="<?php echo esc_attr__('Comment this article', 'nsc-blog'); ?>">
                              <i class="fa-regular fa-message"></i>
                              <?php echo esc_html__('Comment this article', 'nsc-blog'); ?>
                            </a>
                          </li>
                        </ul>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>

            <?php
                $video_url = get_post_meta(get_the_ID(), '_video_url', true);
                
                if (!empty($video_url)) {
                    // If a video URL is found in the custom field
                    echo '<div class="video-wrapper">';
                    echo '<iframe width="440" height="500" src="' . esc_url($video_url) . '?controls=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>';
                    echo '</div>';
                } else {
                    // If no video URL is found, display the featured image
                    nsc_blog_featured_image_with_caption_and_srcset(get_the_ID());
                }
             ?>



            <?php if (get_theme_mod('nsc_blog_single_post_content', true) !== '0') { ?>
                <div class="nsc-content-single">
                    <?php echo apply_filters('the_content', get_the_content()); ?>
                </div>
            <?php } ?>

          <h3 class="section-main-head mt-5 nsc-about-section-1">About</h3>
          <div class="d-lg-flex nsc-single-post-author gap-3">
              
              
              
            <div class="text-center author-wrapper-outer">
                <div class="author-wrapper">
              <?php
              $avatar_html = get_avatar(get_the_author_meta('ID'));
              $avatar_url = '';

              if (!empty($avatar_html)) {
                $dom = new DOMDocument;
                $dom->loadHTML($avatar_html);

                $img_tags = $dom->getElementsByTagName('img');

                if ($img_tags->length > 0) {
                  $avatar_url = $img_tags->item(0)->getAttribute('src');
                }
              }

              if (!empty($avatar_url)) : ?>
                  <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo get_the_author(); ?>" title="<?php echo get_the_author(); ?>">
              <?php else : ?>
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/default-user.png'); ?>" alt="<?php echo get_the_author(); ?>" title="<?php echo get_the_author(); ?>">
              <?php endif; ?>

              <div class="author-details">
                  <p class="mb-0 single-author-name"><?php echo get_the_author(); ?></p>
              <p class="mb-0 single-author-designation"><?php
              $author_id = get_the_author_meta('ID');
              // echo get_the_author_meta('nsc_blog_user_designation', $user->ID);
              echo get_user_meta($author_id, 'nsc_blog_user_designation', true);
              ?>
              </p>
              </div>
            </div>
              <div class="d-flex justify-content-center normal-social-media gap-2 mt-3">
                <?php
                  $social_links = array(
                    'nsc_blog_user_facebook' =>
                                          '<svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect y="0.5" width="44" height="44" rx="5" fill="#1877F2" fill-opacity="0.08"/>
                                                <g clip-path="url(#clip0_74_1524)">
                                                <path d="M23.5488 32.5V23.3777H26.6096L27.0688 19.8216H23.5488V17.5515C23.5488 16.5222 23.8335 15.8208 25.3111 15.8208L27.1926 15.82V12.6392C26.8673 12.5969 25.7503 12.5 24.4503 12.5C21.7357 12.5 19.8773 14.157 19.8773 17.1993V19.8216H16.8073V23.3777H19.8773V32.5H23.5488Z" fill="#1877F2"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_74_1524">
                                                <rect width="20" height="20" fill="white" transform="translate(12 12.5)"/>
                                                </clipPath>
                                                </defs>
                                            </svg>',

                    'nsc_blog_user_instagram' =>
                                            '<svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <rect y="0.5" width="44" height="44" rx="5" fill="url(#paint0_linear_74_1525)" fill-opacity="0.08"/>
                                              <g clip-path="url(#clip0_74_1525)">
                                              <path d="M31.9804 18.3801C31.9336 17.3174 31.7617 16.5868 31.5156 15.9537C31.2616 15.2818 30.8709 14.6801 30.359 14.18C29.8589 13.6721 29.2533 13.2774 28.5891 13.0274C27.9524 12.7813 27.2256 12.6094 26.163 12.5626C25.0923 12.5118 24.7525 12.5 22.0371 12.5C19.3217 12.5 18.9818 12.5118 17.9152 12.5586C16.8525 12.6055 16.1219 12.7775 15.489 13.0235C14.8169 13.2774 14.2153 13.6681 13.7152 14.18C13.2073 14.6801 12.8127 15.2857 12.5626 15.9499C12.3164 16.5868 12.1446 17.3134 12.0977 18.3761C12.0469 19.4467 12.0352 19.7866 12.0352 22.502C12.0352 25.2173 12.0469 25.5572 12.0938 26.6239C12.1406 27.6865 12.3126 28.4171 12.5588 29.0502C12.8127 29.7221 13.2073 30.3238 13.7152 30.8239C14.2153 31.3318 14.8209 31.7265 15.4851 31.9765C16.1219 32.2226 16.8486 32.3945 17.9114 32.4413C18.9779 32.4883 19.3179 32.4999 22.0333 32.4999C24.7486 32.4999 25.0885 32.4883 26.1552 32.4413C27.2178 32.3945 27.9484 32.2226 28.5813 31.9765C29.9254 31.4568 30.9881 30.3941 31.5078 29.0502C31.7538 28.4133 31.9258 27.6865 31.9726 26.6239C32.0195 25.5572 32.0312 25.2173 32.0312 22.502C32.0312 19.7866 32.0273 19.4467 31.9804 18.3801ZM30.1794 26.5457C30.1364 27.5225 29.9723 28.0499 29.8355 28.4015C29.4995 29.2728 28.808 29.9643 27.9367 30.3004C27.585 30.4372 27.0538 30.6012 26.0808 30.6441C25.026 30.6911 24.7096 30.7027 22.0411 30.7027C19.3725 30.7027 19.0522 30.6911 18.0011 30.6441C17.0244 30.6012 16.4969 30.4372 16.1453 30.3004C15.7117 30.1402 15.317 29.8862 14.9967 29.5541C14.6646 29.2298 14.4106 28.8391 14.2504 28.4055C14.1137 28.0539 13.9496 27.5225 13.9067 26.5497C13.8597 25.4948 13.8481 25.1783 13.8481 22.5097C13.8481 19.8412 13.8597 19.5209 13.9067 18.4699C13.9496 17.4932 14.1137 16.9657 14.2504 16.6141C14.4106 16.1804 14.6646 15.7859 15.0007 15.4654C15.3248 15.1333 15.7155 14.8793 16.1493 14.7192C16.5009 14.5825 17.0323 14.4184 18.0051 14.3754C19.06 14.3285 19.3765 14.3168 22.0449 14.3168C24.7174 14.3168 25.0337 14.3285 26.0848 14.3754C27.0616 14.4184 27.589 14.5825 27.9406 14.7192C28.3742 14.8793 28.7689 15.1333 29.0892 15.4654C29.4213 15.7897 29.6753 16.1804 29.8355 16.6141C29.9723 16.9657 30.1364 17.497 30.1794 18.4699C30.2262 19.5248 30.238 19.8412 30.238 22.5097C30.238 25.1783 30.2262 25.4908 30.1794 26.5457Z" fill="url(#paint1_linear_74_1525)"/>
                                              <path d="M22.0371 17.3643C19.2007 17.3643 16.8994 19.6654 16.8994 22.502C16.8994 25.3385 19.2007 27.6397 22.0371 27.6397C24.8737 27.6397 27.1749 25.3385 27.1749 22.502C27.1749 19.6654 24.8737 17.3643 22.0371 17.3643ZM22.0371 25.8347C20.197 25.8347 18.7044 24.3422 18.7044 22.502C18.7044 20.6617 20.197 19.1693 22.0371 19.1693C23.8774 19.1693 25.3698 20.6617 25.3698 22.502C25.3698 24.3422 23.8774 25.8347 22.0371 25.8347Z" fill="url(#paint2_linear_74_1525)"/>
                                              <path d="M28.5775 17.1613C28.5775 17.8237 28.0404 18.3608 27.3779 18.3608C26.7155 18.3608 26.1785 17.8237 26.1785 17.1613C26.1785 16.4988 26.7155 15.9619 27.3779 15.9619C28.0404 15.9619 28.5775 16.4988 28.5775 17.1613Z" fill="url(#paint3_linear_74_1525)"/>
                                              </g>
                                              <defs>
                                              <linearGradient id="paint0_linear_74_1525" x1="3.6924" y1="40.8075" x2="40.3079" y2="4.19236" gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#FFD600"/>
                                              <stop offset="0.5" stop-color="#FF0100"/>
                                              <stop offset="1" stop-color="#D800B9"/>
                                              </linearGradient>
                                              <linearGradient id="paint1_linear_74_1525" x1="13.7132" y1="30.8216" x2="30.3565" y2="14.1815" gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#FFD600"/>
                                              <stop offset="0.5" stop-color="#FF0100"/>
                                              <stop offset="1" stop-color="#D800B9"/>
                                              </linearGradient>
                                              <linearGradient id="paint2_linear_74_1525" x1="17.7617" y1="26.7774" x2="26.3126" y2="18.2265" gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#FFD600"/>
                                              <stop offset="0.5" stop-color="#FF0100"/>
                                              <stop offset="1" stop-color="#D800B9"/>
                                              </linearGradient>
                                              <linearGradient id="paint3_linear_74_1525" x1="26.3798" y1="18.1595" x2="28.376" y2="16.1631" gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#FFD600"/>
                                              <stop offset="0.5" stop-color="#FF0100"/>
                                              <stop offset="1" stop-color="#D800B9"/>
                                              </linearGradient>
                                              <clipPath id="clip0_74_1525">
                                              <rect width="20" height="20" fill="white" transform="translate(12 12.5)"/>
                                              </clipPath>
                                              </defs>
                                            </svg>',

                    'nsc_blog_user_twitter' =>
                                            '<svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <rect y="0.5" width="44" height="44" rx="5" fill="#1DA1F2" fill-opacity="0.08"/>
                                              <g clip-path="url(#clip0_74_1526)">
                                              <path d="M32 16.2988C31.2563 16.625 30.4637 16.8412 29.6375 16.9462C30.4875 16.4388 31.1363 15.6412 31.4412 14.68C30.6488 15.1525 29.7738 15.4863 28.8412 15.6725C28.0887 14.8713 27.0162 14.375 25.8462 14.375C23.5763 14.375 21.7487 16.2175 21.7487 18.4763C21.7487 18.8012 21.7762 19.1137 21.8438 19.4112C18.435 19.245 15.4188 17.6113 13.3925 15.1225C13.0387 15.7363 12.8313 16.4388 12.8313 17.195C12.8313 18.615 13.5625 19.8737 14.6525 20.6025C13.9937 20.59 13.3475 20.3988 12.8 20.0975C12.8 20.11 12.8 20.1262 12.8 20.1425C12.8 22.135 14.2212 23.79 16.085 24.1712C15.7512 24.2625 15.3875 24.3062 15.01 24.3062C14.7475 24.3062 14.4825 24.2913 14.2337 24.2362C14.765 25.86 16.2725 27.0538 18.065 27.0925C16.67 28.1838 14.8988 28.8412 12.9813 28.8412C12.645 28.8412 12.3225 28.8263 12 28.785C13.8162 29.9563 15.9688 30.625 18.29 30.625C25.835 30.625 29.96 24.375 29.96 18.9575C29.96 18.7762 29.9538 18.6013 29.945 18.4275C30.7588 17.85 31.4425 17.1288 32 16.2988Z" fill="#1DA1F2"/>
                                              </g>
                                              <defs>
                                              <clipPath id="clip0_74_1526">
                                              <rect width="20" height="20" fill="white" transform="translate(12 12.5)"/>
                                              </clipPath>
                                              </defs>
                                            </svg>
                                            ',

                    'nsc_blog_user_linkedin' =>
                                            '<svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <rect y="0.5" width="44" height="44" rx="5" fill="#0E76A8" fill-opacity="0.08"/>
                                              <g clip-path="url(#clip0_74_1527)">
                                              <path d="M31.995 32.4999V32.499H32V25.164C32 21.5757 31.2275 18.8115 27.0324 18.8115C25.0158 18.8115 23.6624 19.9182 23.1099 20.9674H23.0516V19.1465H19.0741V32.499H23.2158V25.8874C23.2158 24.1465 23.5458 22.4632 25.7016 22.4632C27.8258 22.4632 27.8574 24.4499 27.8574 25.999V32.4999H31.995Z" fill="#0E76A8"/>
                                              <path d="M12.33 19.1475H16.4766V32.5H12.33V19.1475Z" fill="#0E76A8"/>
                                              <path d="M14.4017 12.5C13.0758 12.5 12 13.5758 12 14.9017C12 16.2275 13.0758 17.3258 14.4017 17.3258C15.7275 17.3258 16.8033 16.2275 16.8033 14.9017C16.8025 13.5758 15.7267 12.5 14.4017 12.5V12.5Z" fill="#0E76A8"/>
                                              </g>
                                              <defs>
                                              <clipPath id="clip0_74_1527">
                                              <rect width="20" height="20" fill="white" transform="translate(12 12.5)"/>
                                              </clipPath>
                                              </defs>
                                            </svg>'
                  );

                  foreach ($social_links as $input => $icon) {
                    if(get_user_meta($author_id, $input, true) ){
                        echo "<a href=" . get_user_meta($author_id, $input, true) ." title='" . ucfirst($input) . "'>$icon</a>";
                    }
                  } ?>
              </div>
              
              
              
              
              
              
              <div class="d-flex justify-content-center blend-social-media gap-2 mt-3">
                <?php
                  $social_links = array(
                    'nsc_blog_user_twitter' =>
                                          '<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_120_2663)">
                                            <path d="M20.0002 7.5C19.4502 7.85 18.9002 8.15 18.2002 8.3C17.6002 7.5 16.6002 7 15.5002 7C13.5502 7 12.0002 8.55 12.0002 10.5C12.0002 10.7 12.0002 10.9 12.0502 11.1C9.8502 10.75 7.9002 9.6 6.5502 7.9C6.3002 8.35 6.1502 8.9 6.1502 9.5C6.1502 10.6 6.7002 11.55 7.5002 12.1C7.0002 12.1 6.5002 11.95 6.1002 11.7V11.75C6.1002 13.3 7.1502 14.55 8.5502 14.85C8.3002 14.9 8.0002 14.95 7.7502 14.95C7.5502 14.95 7.3502 14.95 7.1502 14.9C7.5502 16.15 8.6502 17.05 10.0002 17.1C8.9502 17.95 7.6002 18.45 6.2002 18.45C5.9502 18.45 5.7002 18.45 5.4502 18.4C6.8002 19.3 8.4002 19.8 10.1502 19.8C15.7502 19.8 18.8502 15.05 18.9002 10.9L20.5002 10L19.0002 9.5L20.0002 7.5Z" stroke="url(#paint0_linear_120_2663)" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                            <linearGradient id="paint0_linear_120_2663" x1="5.4502" y1="13.4" x2="20.5002" y2="13.4" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FFD11A"/>
                                            <stop offset="1" stop-color="#DE772E"/>
                                            </linearGradient>
                                            <clipPath id="clip0_120_2663">
                                            <rect width="16" height="16" fill="white" transform="translate(5 5)"/>
                                            </clipPath>
                                            </defs>
                                            </svg>',

                    'nsc_blog_user_linkedin' =>
                                            '<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.3332 13.7537V16.2183H14.9045V13.9183C14.9045 13.341 14.6978 12.947 14.1805 12.947C13.7858 12.947 13.5505 13.2123 13.4472 13.4697C13.4098 13.5617 13.3998 13.6897 13.3998 13.8177V16.2183H11.9705C11.9705 16.2183 11.9898 12.3237 11.9705 11.9203H13.3998V12.529L13.3905 12.543H13.3998V12.529C13.5898 12.2357 13.9285 11.819 14.6878 11.819C15.6278 11.819 16.3332 12.4337 16.3332 13.7537ZM10.4752 9.84766C9.9865 9.84766 9.6665 10.169 9.6665 10.5903C9.6665 11.0037 9.97717 11.3337 10.4565 11.3337H10.4658C10.9645 11.3337 11.2745 11.003 11.2745 10.5903C11.2652 10.169 10.9645 9.84766 10.4752 9.84766ZM9.75117 16.2183H11.1805V11.9203H9.75117V16.2183Z" fill="url(#paint0_linear_120_2666)"/>
                                                <path d="M9.00016 7.66732C8.64654 7.66732 8.3074 7.80779 8.05735 8.05784C7.80731 8.30789 7.66683 8.64703 7.66683 9.00065V17.0007C7.66683 17.3543 7.80731 17.6934 8.05735 17.9435C8.3074 18.1935 8.64654 18.334 9.00016 18.334H17.0002C17.3538 18.334 17.6929 18.1935 17.943 17.9435C18.193 17.6934 18.3335 17.3543 18.3335 17.0007V9.00065C18.3335 8.64703 18.193 8.30789 17.943 8.05784C17.6929 7.80779 17.3538 7.66732 17.0002 7.66732H9.00016ZM9.00016 6.33398H17.0002C17.7074 6.33398 18.3857 6.61494 18.8858 7.11503C19.3859 7.61513 19.6668 8.29341 19.6668 9.00065V17.0007C19.6668 17.7079 19.3859 18.3862 18.8858 18.8863C18.3857 19.3864 17.7074 19.6673 17.0002 19.6673H9.00016C8.29292 19.6673 7.61464 19.3864 7.11454 18.8863C6.61445 18.3862 6.3335 17.7079 6.3335 17.0007V9.00065C6.3335 8.29341 6.61445 7.61513 7.11454 7.11503C7.61464 6.61494 8.29292 6.33398 9.00016 6.33398Z" fill="url(#paint1_linear_120_2666)"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_120_2666" x1="9.6665" y1="13.033" x2="16.3332" y2="13.033" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFD11A"/>
                                                <stop offset="1" stop-color="#DE772E"/>
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_120_2666" x1="6.3335" y1="13.0007" x2="19.6668" y2="13.0007" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFD11A"/>
                                                <stop offset="1" stop-color="#DE772E"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>',

                    'nsc_blog_user_instagram' =>
                                            '<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.5602 8.64065C16.4019 8.64065 16.2473 8.68757 16.1157 8.77548C15.9841 8.86338 15.8816 8.98832 15.8211 9.1345C15.7605 9.28068 15.7447 9.44154 15.7755 9.59672C15.8064 9.75191 15.8826 9.89445 15.9945 10.0063C16.1064 10.1182 16.2489 10.1944 16.4041 10.2253C16.5593 10.2561 16.7201 10.2403 16.8663 10.1798C17.0125 10.1192 17.1374 10.0167 17.2253 9.88511C17.3132 9.75355 17.3602 9.59888 17.3602 9.44065C17.3602 9.22848 17.2759 9.02499 17.1258 8.87497C16.9758 8.72494 16.7723 8.64065 16.5602 8.64065ZM19.6268 10.254C19.6139 9.70085 19.5103 9.15359 19.3202 8.63398C19.1507 8.18941 18.8868 7.78684 18.5468 7.45398C18.2167 7.11227 17.8132 6.8501 17.3668 6.68732C16.8486 6.49142 16.3007 6.38546 15.7468 6.37398C15.0402 6.33398 14.8135 6.33398 13.0002 6.33398C11.1868 6.33398 10.9602 6.33398 10.2535 6.37398C9.6996 6.38546 9.15172 6.49142 8.6335 6.68732C8.18795 6.85175 7.78479 7.11369 7.4535 7.45398C7.11178 7.7841 6.84961 8.18761 6.68683 8.63398C6.49094 9.15221 6.38497 9.70009 6.3735 10.254C6.3335 10.9607 6.3335 11.1873 6.3335 13.0007C6.3335 14.814 6.3335 15.0407 6.3735 15.7473C6.38497 16.3012 6.49094 16.8491 6.68683 17.3673C6.84961 17.8137 7.11178 18.2172 7.4535 18.5473C7.78479 18.8876 8.18795 19.1496 8.6335 19.314C9.15172 19.5099 9.6996 19.6158 10.2535 19.6273C10.9602 19.6673 11.1868 19.6673 13.0002 19.6673C14.8135 19.6673 15.0402 19.6673 15.7468 19.6273C16.3007 19.6158 16.8486 19.5099 17.3668 19.314C17.8132 19.1512 18.2167 18.889 18.5468 18.5473C18.8883 18.2157 19.1524 17.8128 19.3202 17.3673C19.5103 16.8477 19.6139 16.3005 19.6268 15.7473C19.6268 15.0407 19.6668 14.814 19.6668 13.0007C19.6668 11.1873 19.6668 10.9607 19.6268 10.254ZM18.4268 15.6673C18.422 16.0905 18.3453 16.5098 18.2002 16.9073C18.0937 17.1974 17.9227 17.4596 17.7002 17.674C17.4839 17.8943 17.2223 18.0649 16.9335 18.174C16.536 18.3192 16.1167 18.3958 15.6935 18.4007C15.0268 18.434 14.7802 18.4406 13.0268 18.4406C11.2735 18.4406 11.0268 18.4407 10.3602 18.4007C9.92076 18.4089 9.48323 18.3412 9.06683 18.2007C8.79068 18.086 8.54107 17.9158 8.3335 17.7007C8.11222 17.4865 7.94339 17.2241 7.84016 16.934C7.6774 16.5308 7.58712 16.1019 7.5735 15.6673C7.5735 15.0007 7.5335 14.754 7.5335 13.0007C7.5335 11.2473 7.5335 11.0007 7.5735 10.334C7.57648 9.90135 7.65546 9.47261 7.80683 9.06732C7.92419 8.78592 8.10434 8.53509 8.3335 8.33398C8.53604 8.10476 8.78635 7.92271 9.06683 7.80065C9.4732 7.65401 9.90149 7.57737 10.3335 7.57398C11.0002 7.57398 11.2468 7.53398 13.0002 7.53398C14.7535 7.53398 15.0002 7.53398 15.6668 7.57398C16.09 7.57884 16.5093 7.65548 16.9068 7.80065C17.2098 7.91309 17.4817 8.09588 17.7002 8.33398C17.9186 8.53877 18.0893 8.78914 18.2002 9.06732C18.3483 9.47327 18.425 9.90184 18.4268 10.334C18.4602 11.0007 18.4668 11.2473 18.4668 13.0007C18.4668 14.754 18.4602 15.0007 18.4268 15.6673ZM13.0002 9.58065C12.324 9.58197 11.6635 9.78367 11.1019 10.1603C10.5404 10.5369 10.1031 11.0714 9.84525 11.6965C9.58742 12.3215 9.52065 13.009 9.65336 13.6719C9.78607 14.3349 10.1123 14.9437 10.5909 15.4213C11.0694 15.8989 11.6788 16.224 12.3421 16.3554C13.0053 16.4868 13.6926 16.4187 14.3171 16.1597C14.9417 15.9006 15.4754 15.4623 15.8509 14.9C16.2264 14.3377 16.4268 13.6768 16.4268 13.0007C16.4277 12.5507 16.3396 12.1051 16.1677 11.6893C15.9957 11.2735 15.7432 10.8959 15.4247 10.578C15.1063 10.2602 14.7281 10.0084 14.312 9.83727C13.8959 9.6661 13.4501 9.57889 13.0002 9.58065ZM13.0002 15.2207C12.5611 15.2207 12.1319 15.0905 11.7668 14.8465C11.4017 14.6026 11.1172 14.2559 10.9491 13.8502C10.7811 13.4446 10.7372 12.9982 10.8228 12.5676C10.9085 12.1369 11.1199 11.7413 11.4304 11.4309C11.7409 11.1204 12.1364 10.909 12.5671 10.8233C12.9977 10.7376 13.4441 10.7816 13.8497 10.9496C14.2554 11.1177 14.6021 11.4022 14.846 11.7673C15.09 12.1324 15.2202 12.5616 15.2202 13.0007C15.2202 13.2922 15.1627 13.5809 15.0512 13.8502C14.9396 14.1196 14.7761 14.3643 14.5699 14.5704C14.3638 14.7766 14.1191 14.9401 13.8497 15.0517C13.5804 15.1632 13.2917 15.2207 13.0002 15.2207Z" fill="url(#paint0_linear_120_2670)"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_120_2670" x1="6.3335" y1="13.0007" x2="19.6668" y2="13.0007" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFD11A"/>
                                                <stop offset="1" stop-color="#DE772E"/>
                                                </linearGradient>
                                                </defs>
                                                </svg>

                                            ',

                    'nsc_blog_user_facebook' =>
                                            '<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.13 10.9573V11.8753H11.458V12.9973H12.13V16.3327H13.5113V12.9973H14.438C14.438 12.9973 14.5253 12.4593 14.5673 11.8707H13.5167V11.104C13.5167 10.9887 13.6673 10.8347 13.8167 10.8347H14.5687V9.66602H13.5453C12.096 9.66602 12.13 10.7893 12.13 10.9573Z" fill="url(#paint0_linear_120_2673)"/>
                                                <path d="M9.00016 7.66732C8.64654 7.66732 8.3074 7.80779 8.05735 8.05784C7.80731 8.30789 7.66683 8.64703 7.66683 9.00065V17.0007C7.66683 17.3543 7.80731 17.6934 8.05735 17.9435C8.3074 18.1935 8.64654 18.334 9.00016 18.334H17.0002C17.3538 18.334 17.6929 18.1935 17.943 17.9435C18.193 17.6934 18.3335 17.3543 18.3335 17.0007V9.00065C18.3335 8.64703 18.193 8.30789 17.943 8.05784C17.6929 7.80779 17.3538 7.66732 17.0002 7.66732H9.00016ZM9.00016 6.33398H17.0002C17.7074 6.33398 18.3857 6.61494 18.8858 7.11503C19.3859 7.61513 19.6668 8.29341 19.6668 9.00065V17.0007C19.6668 17.7079 19.3859 18.3862 18.8858 18.8863C18.3857 19.3864 17.7074 19.6673 17.0002 19.6673H9.00016C8.29292 19.6673 7.61464 19.3864 7.11454 18.8863C6.61445 18.3862 6.3335 17.7079 6.3335 17.0007V9.00065C6.3335 8.29341 6.61445 7.61513 7.11454 7.11503C7.61464 6.61494 8.29292 6.33398 9.00016 6.33398Z" fill="url(#paint1_linear_120_2673)"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_120_2673" x1="11.458" y1="12.9993" x2="14.5687" y2="12.9993" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFD11A"/>
                                                <stop offset="1" stop-color="#DE772E"/>
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_120_2673" x1="6.3335" y1="13.0007" x2="19.6668" y2="13.0007" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFD11A"/>
                                                <stop offset="1" stop-color="#DE772E"/>
                                                </linearGradient>
                                                </defs>
                                                </svg>
                                                '
                  );

                  foreach ($social_links as $input => $icon) {
                    if(get_user_meta($author_id, $input, true) ){
                        echo "<a href=" . get_user_meta($author_id, $input, true) ." title='" . ucfirst($input) . "'>$icon</a>";
                    }
                  } ?>
              </div>
            </div>

            <?php
            $author_desc = get_the_author_meta('description');
            if($author_desc != ''){ ?>
              <div>
                <h3 class="section-main-head mt-5 nsc-about-section-2">About</h3>
                <p class="mb-0"><?php echo get_the_author_meta('description'); ?></p>
              </div>
            <?php } ?>
          </div>

          <?php if(get_theme_mod('nsc_blog_single_post_tags', true) != '0'){ ?>
            <h3 class="section-main-head mt-5">Tags</h3>
            <ul class="nsc-single-tag-list nsc-posts-tags px-0">
              <?php
                $tags = get_tags();
                if ($tags !='') {
                  foreach ( $tags as $tag ) :
                    $tag_link = get_tag_link( $tag->term_id ); ?>
                    <li>
                      <a href='<?php echo $tag_link; ?>' title='<?php echo $tag->name; ?>' class='<?php echo $tag->slug ?>' title="<?php echo $tag->name; ?>">
                        <?php echo $tag->name; ?>
                        <span class="screen-reader-text">
                          <?php echo $tag->name; ?>
                        </span>
                      </a>
                    </li>
                    <?php
                  endforeach; } ?>
              </ul>
          <?php } ?>

          <h3 class="section-main-head mt-5">other articles</h3>
         <nav class="nsc-post-navigation">
              <div class="d-lg-flex" style="gap: 8px;">
                <?php
                $total_posts = wp_count_posts()->publish;
                if ($total_posts > 2) {
                  $prev_post = get_adjacent_post(false, '', true);
                  if (!empty($prev_post)): ?>
                    <div class="nav-previous">
                      <div class="d-flex" style="gap: 10px;">
                        <?php nsc_blog_featured_image_with_custom_sizes(get_the_ID()); ?>
                        <div>
                          <?php
                          $categories = get_the_category($prev_post->ID);
                          if (!empty($categories)) {
                            echo "<p class='nsc-post-nav-cat mb-0'>" . esc_html($categories[0]->name) . "</p>";
                          } ?>
                          <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nsc-nav-post-title">
                            <?php echo get_the_title($prev_post->ID); ?>
                          </a>
                          <ul class="nsc-single-tag-list nsc-posts-tags px-0 mb-0">
                            <?php
                            $tags = get_the_tags($prev_post->ID);
                            if ($tags) {
                              $count = 0;
                              foreach ($tags as $tag) {
                                if ($count == 3) break;
                                $tag_link = get_tag_link($tag->term_id); ?>
                                <li>
                                  <a href='<?php echo esc_url($tag_link); ?>' title='<?php echo esc_attr($tag->name); ?>' class='<?php echo esc_attr($tag->slug); ?>'>
                                    <?php echo esc_html($tag->name); ?>
                                    <span class="screen-reader-text"><?php echo esc_html($tag->name); ?></span>
                                  </a>
                                </li>
                                <?php
                                $count++;
                              }
                            } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  <?php endif;
            
                  $next_post = get_adjacent_post(false, '', false);
                  if (!empty($next_post)): ?>
                    <div class="nav-next">
                      <div class="d-flex" style="gap: 10px;">
                        <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
                        <div>
                          <?php
                          $categories = get_the_category($next_post->ID);
                          if (!empty($categories)) {
                            echo "<p class='nsc-post-nav-cat mb-0'>" . esc_html($categories[0]->name) . "</p>";
                          } ?>
                          <a href="<?php echo get_permalink($next_post->ID); ?>" class="nsc-nav-post-title">
                            <?php echo get_the_title($next_post->ID); ?>
                          </a>
                          <ul class="nsc-single-tag-list nsc-posts-tags px-0 mb-0">
                            <?php
                            $tags = get_the_tags($next_post->ID);
                            if ($tags) {
                              $count = 0;
                              foreach ($tags as $tag) {
                                if ($count == 3) break;
                                $tag_link = get_tag_link($tag->term_id); ?>
                                <li>
                                  <a href='<?php echo esc_url($tag_link); ?>' title='<?php echo esc_attr($tag->name); ?>' class='<?php echo esc_attr($tag->slug); ?>'>
                                    <?php echo esc_html($tag->name); ?>
                                    <span class="screen-reader-text"><?php echo esc_html($tag->name); ?></span>
                                  </a>
                                </li>
                                <?php
                                $count++;
                              }
                            } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php } ?>
              </div>
            
              <?php if ($total_posts > 2): ?>
                <div class="prev-next d-flex">
                  <?php if (!empty($prev_post)): ?>
                    <div class="post-prev">
                      <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nsc-nav-btn d-block">
                        <?php echo esc_html('<< Previous', 'nsc-blog'); ?>
                      </a>
                    </div>
                  <?php endif; ?>
                  <?php if (!empty($next_post)): ?>
                    <div class="next-post">
                      <a href="<?php echo get_permalink($next_post->ID); ?>" class="nsc-nav-btn text-end d-block">
                        <?php echo esc_html('Next >>', 'nsc-blog'); ?>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </nav>


          <?php
          endwhile;

          else :
            get_template_part( 'no-results' );
          endif;
          ?>
      </div>
    </div>

    <?php if(get_theme_mod('nsc_blog_single_post_sidebar', true) != '0'){ ?>
      <aside class="col-md-4 nsc-sidebar">
        <?php dynamic_sidebar('home-page');?>
      </aside>
    <?php } ?>
    </div>

    <div class="custom-container">
    <?php if(get_theme_mod('nsc_blog_single_post_related_posts', true) != '0'){
      get_template_part('template-parts/related-posts');
    } ?>
    
    <?php
      if(get_theme_mod('nsc_blog_single_post_comments_form', true) != '0'){
        if ( comments_open() || '0' != get_comments_number() ){
            comments_template();
        }
      }
    ?>
    </div>


    </div>
    <div class="container-fluid">
        <?php get_template_part('template-parts/home/section-comment-policy'); ?>
    </div>
    <div class="custom-container">
        <?php get_template_part('template-parts/home/section-aviationist-carousel'); ?>
  </div>

</article>

<?php get_footer(); ?>



<style>
  .mb-0 {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .mb-0 li {
    display: inline-block;
    margin-right: 10px; /* Adjust spacing between list items */
  }
  
  .single .copy-link, .single .nsc-popups ul li a {
    display: inline-block;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    transition: background-color 0.3s, color 0.3s;
  }
  
  .copy-link:hover, a:hover {
    /*background-color: transparent;*/
  }
  
  /* Icon styles */
  .copy-link i, a i {
    margin-right: 5px;
  }
  
  /* Hide the "Copied" text by default */
  .copied-text {
    display: none;
  }
  
  /* Show the "Copied" text when the button is clicked */
  .copy-link.clicked .normal-text {
    display: none;
  }
  
  .copy-link.clicked .copied-text {
    display: inline;
  }
  .dark-mode .nsc-post-share #bookmark-btn svg,.dark-mode .nsc-popup-container .copy-link-pop-btn svg{
    color: #fff;
    fill: #fff;
    }
</style>


<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#bookmark-btn').on('click', function() {
        var post_id = $(this).data('post-id');
        var action = $(this).hasClass('add-bookmark') ? 'add_bookmark' : 'remove_bookmark';

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'post',
            data: {
                action: action,
                post_id: post_id
            },
            success: function(response) {
                if (action == 'add_bookmark') {
                    $('#bookmark-btn').removeClass('add-bookmark').addClass('remove-bookmark').html('<i class="fas fa-bookmark"></i>');
                } else {
                    $('#bookmark-btn').removeClass('remove-bookmark').addClass('add-bookmark').html('<i class="far fa-bookmark"></i>');
                }
            }
        });
    });
});
</script>

