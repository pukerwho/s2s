<div class="team mb-10">
	<div class="container mx-auto px-4 lg:px-0">
		<div class="mb-8">
			<h2 class="team_title text-3xl lg:text-4xl text-center uppercase mb-6">Мы работаем <span class="animate-s2s">Для Вас</span></h2>
			<div>
				<div class="line animate-s2s mx-auto"></div>	
			</div>
		</div>
		<div class="flex flex-col lg:flex-row mx-0 lg:-mx-4">
			<?php $custom_query = new WP_Query( array( 
				'post_type' => 'team', 
				'posts_per_page' => 4,
				'orderby' => 'menu_order',
				'order' => 'DESC',
			));
			if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<div class="team_item w-full lg:w-1/4 px-0 lg:px-4 mb-10 animate-s2s">
					<a href="#">
						<div class="team_item_photo mb-6">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="text-2xl text-center mb-6">
							<?php the_title(); ?>	
						</div>
						<div class="mb-6">
							<div class="line mx-auto"></div>
						</div>
						<div class="text-md text-center italic">
							<?php the_content(); ?>
						</div>
					</a>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>