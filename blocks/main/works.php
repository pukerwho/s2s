<div class="works">
	<div class="container mx-auto px-4 lg:px-0">
		<div class="mb-8">
			<h2 class="text-3xl lg:text-4xl text-center uppercase mb-6"><?php _e('Наши работы'); ?></h2>
			<div>
				<div class="line animate-s2s mx-auto"></div>	
			</div>
		</div>
	</div>
	<div>
		<div class="grid-container">
			<?php $custom_query = new WP_Query( array( 
				'post_type' => 'projects', 
				'posts_per_page' => 7,
				'orderby' => 'date',
				'order' => 'DESC',
			));
			if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<?php get_template_part('blocks/parts/grid-item', 's2s'); ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>