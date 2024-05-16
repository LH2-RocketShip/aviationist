<?php
/**
 * The template part for display comment policy
 *
 * @package nsc-blog
 */

 $bgimage = get_theme_mod('nsc_blog_comments_policy_bgimage', get_template_directory_uri(). '/assets/images/comment-policy.png');

?>

<section class="nsc-comments-policy" style="background-image: url(<?php echo $bgimage ?>)">
  <div class="container">
    <div class="row">
      <div class="col-md-6 d-flex justify-content-end">
        <div class="">
          <h2 class="section-heading">The Aviationist Comment Policy</h2>
          <p>Comments on this site are moderated. Comment policy applies. Please read our Comment Policy before commenting.</p>
          <a href="#" class="got-it-btn">
            Got It
          </a>
        </div>
      </div>
      <div class="col-md-6">
      </div>
    </div>
  </div>
</section>
