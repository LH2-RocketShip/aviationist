<?php
get_header();

$category = get_queried_object();
?>

<main id="nsc-archive" class="nsc-archive">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if (have_posts()) : ?>
					<header class="archive-header">
						<h1 class="archive-title"><?php echo single_cat_title('', false); ?></h1>
						<?php if (category_description()) : ?>
							<div class="archive-description"><?php echo category_description(); ?></div>
						<?php endif; ?>
					</header>

					<div class="nsc-blog-post-grid">
						<?php while (have_posts()) : the_post(); ?>
							<div class="post-container">
								<?php if (has_post_thumbnail()) : ?>
									<img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php the_title_attribute(); ?>">
								<?php endif; ?>

								<h3 class="post-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>

								<div class="post-excerpt">
									<?php the_excerpt(); ?>
								</div>

								<div class="post-meta">
									<span class="author"><?php the_author(); ?></span>
									<span class="date"><?php the_date(); ?></span>
								</div>
							</div>
						<?php endwhile; ?>
					</div>

					<div class="pagination">
						<?php
						echo paginate_links(array(
							'total' => $wp_query->max_num_pages,
						));
						?>
					</div>

				<?php else : ?>
					<p><?php esc_html_e('No posts found.', 'nsc-blog'); ?></p>
				<?php endif; ?>
			</div>

			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
