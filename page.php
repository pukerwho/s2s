<?php get_header(); ?>
<section class="entry-section">
  <?php
  if( have_posts() ): the_post();
    // Load default block template page
    get_template_part('blocks/page', 'default');
  endif;
  ?>
	<?php wp_link_pages(); ?>
</section>

asdas
<?php get_footer(); ?>