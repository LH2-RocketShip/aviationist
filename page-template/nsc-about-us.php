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

 ?>

 <main>
   <div class="custom-container">
     <div class="row">
       <div class="col-md-8">
          <?php echo get_the_content(); ?>
       </div>
       <div class="col-md-4">
				 <?php dynamic_sidebar('home-page');?>
       </div>
     </div>

     <?php get_template_part('template-parts/nsc-user'); ?>
		 <?php get_template_part('template-parts/articles/section-video-interview'); ?>
   </div>
 </main>




<?php get_footer();
