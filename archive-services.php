<?php get_header(); ?>

<div class="services pt-20">
	<div class="container mx-auto px-4 lg:px-0">
		<h1 class="text-5xl text-center uppercase mb-12"><?php _e('Услуги', 's2s'); ?></h1>
		<div class="services_nav hidden lg:flex flex-col lg:flex-row justify-center mb-12">
			<?php 
				$services_query = new WP_Query(array(
					'post_type' => 'services',
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
				)); 
				if ($services_query->have_posts()) : while ($services_query->have_posts()) : $services_query->the_post(); 
			?>
				<li class="list-none border-2 border-gray-400 mx-2 mb-2 lg:mb-0"><a href="<?php the_permalink(); ?>" class="block text-center py-2 px-4"><?php the_title(); ?></a></li>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="w-full lg:w-3/4 mx-auto">
			<div class="services_list flex flex-col lg:flex-row flex-wrap justify-center mx-0 lg:-mx-4">
				<?php 
					$services_query = new WP_Query(array(
						'post_type' => 'services',
						'posts_per_page' => -1,
					)); 
					if ($services_query->have_posts()) : while ($services_query->have_posts()) : $services_query->the_post();
				?>
					<div class="services_item px-0 lg:px-4 mb-6">
						<a href="<?php the_permalink(); ?>" class="flex justify-center items-center">
							<div class="services_item_title text-2xl text-center font-bold uppercase p-6">
								<?php the_title(); ?>
							</div>
						</a>
					</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>