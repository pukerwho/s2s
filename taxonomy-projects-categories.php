<?php get_header(); ?>

<?php 
	$project_cats = get_terms(array(
		'taxonomy' => 'projects-categories',
	));
	$current_project_cat_id = get_queried_object_id();
	$current_project_cat = get_term($current_project_cat_id, 'projects-categories'); 
?>

<div class="project-cat pt-20 pb-10">
	<div class="container mx-auto">
		<div class="mb-16">
			<h1 class="text-5xl text-center uppercase"><?php echo $current_project_cat->name ?></h1>
			<div class="line mx-auto"></div>
		</div>
	</div>
		<div class="grid-container">
			<?php 
				$query = new WP_Query( array( 
					'post_type' => 'projects', 
					'posts_per_page' => -1,
					'order'    => 'DESC',
					'tax_query' => array(
				    array(
			        'taxonomy' => 'projects-categories',
					    'terms' => $current_project_cat_id,
			        'field' => 'term_id',
			        'include_children' => true,
			        'operator' => 'IN'
				    )
					),
				) );
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				<?php get_template_part('blocks/parts/grid-item', 's2s'); ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>