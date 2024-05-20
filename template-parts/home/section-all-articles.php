<?php
/**
 * The template part for displaying all articles section
 *
 * @package nsc-blog
 */
?>
<section id="nsc-all-articles" class="nsc-all-articles">
    <div class="section-title-wrap">
        <h2 class="section-main-head">ALL ARTICLES</h2>
        <a href="javascript:void(0);" onclick="openCategoryPopup()" class="see-more-cat-btn">
            <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 12H11V10H7V12ZM0 0V2H18V0H0ZM3 7H15V5H3V7Z" fill="url(#paint0_linear_278_1690)"/>
                <defs>
                    <linearGradient id="paint0_linear_278_1690" x1="0" y1="6" x2="18" y2="6" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFD11A"/>
                        <stop offset="1" stop-color="#DE772E"/>
                    </linearGradient>
                </defs>
            </svg>
        </a>
    </div>
        <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 8,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) { ?>
        <div class="nsc-blog-post-grid">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="post-container">
                    <?php if (has_post_thumbnail()) {
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        $image_title = get_the_title($image_id);
                    ?>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php echo esc_attr($image_alt ?: get_the_title()); ?>" title="<?php echo esc_attr($image_title ?: get_the_title()); ?>">
                    <?php } ?>
                    <div class="">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) { ?>
                            <a class="nsc-post-cat" href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" title="<?php echo esc_attr($categories[0]->name); ?>">
                                <?php echo esc_html($categories[0]->name); ?>
                            </a>
                        <?php } ?>
                        <h3 class="nsc-post-title mb-0">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
                                <?php echo get_the_title(); ?>
                            </a>
                        </h3>
                        <div class="nsc-post-para">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <?php
                            $author_id = get_the_author_meta('ID');
                            $avatar_url = get_avatar_url($author_id) ?: esc_url(get_template_directory_uri() . '/assets/images/default-user.png');
                            if (get_theme_mod('nsc_blog_single_post_author_image', true)) { ?>
                                <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo esc_attr(get_the_author()); ?>" class="nsc-author-image" title="<?php echo esc_attr(get_the_author()); ?>">
                            <?php }
                            if (get_theme_mod('nsc_blog_single_post_author_name', true)) { ?>
                                <p class="nsc-author-name mb-0"><?php echo esc_html(get_the_author()); ?></p>
                            <?php } ?>
                            <p class="nsc-post-date mb-0"><?php echo esc_html(get_the_date()); ?></p>
                        </div>
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="read-more-btn">
                            <?php esc_html_e('Read More', 'nsc-blog'); ?>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php } else { ?>
        <h4><?php esc_html_e('Please add the post to see this section', 'nsc-blog'); ?></h4>
    <?php }
    wp_reset_postdata();

    // Get the URL of the page titled "All Articles"
    $all_articles_page = get_page_by_title('All Articles');
    if ($all_articles_page) {
        $all_articles_url = get_permalink($all_articles_page->ID);
    } else {
        $all_articles_url = home_url(); // fallback to home if the page is not found
    }
    ?>
    <a href="<?php echo esc_url($all_articles_url); ?>" class="nsc-common-btnn mt-4">
        <?php esc_html_e('View All Articles', 'nsc-blog'); ?>
    </a>
</section>