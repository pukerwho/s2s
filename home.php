<?php get_header(); ?>

<div class="posts pt-20 pb-10">
	<div class="container mx-auto">
		<div class="mb-16">
			<h1 class="text-5xl text-center uppercase"><?php _e('Новости', 's2s'); ?></h1>
			<div class="line mx-auto"></div>
		</div>
		<div class="w-full lg:w-3/4 flex flex-col lg:flex-row mx-auto">
			<div class="w-full lg:w-2/5 pr-0 lg:pr-10 mt-3">
				<?php dynamic_sidebar( 'true_side' ); ?>
			</div>
			<div class="w-full lg:w-3/5 pl-0 lg:pl-10">
				<?php 
				$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
				$posts_query = new WP_Query( array(
					'post_type' => 'post',
					'orderby' => 'date',
					'post_per_page' => 10,
					'paged' => $current_page,
				));
				if ($posts_query->have_posts()) : while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
					<div class="posts_item border-b-2 border-gray-300 pb-12 mb-10">
						<div class="posts_item_title text-3xl font-bold mb-6">
							<?php the_title(); ?>
						</div>
						<div class="posts_item_meta flex items-center mb-6">
							<div class="flex items-center mr-3">
								<div class="mr-2">
									<?php 
										$avatar = get_avatar_url(get_the_author_meta('ID'));
									?>
									<?php if ($avatar): ?>
										<img src="<?php echo $avatar; ?>" width="40px" class="rounded-full">
		              <?php else: ?>
		                <img src="<?php bloginfo('template_part'); ?>/img/user.svg" width="40px">
		              <?php endif; ?>
								</div>
	              <div>
	              	s2s	
	              </div>
							</div>
							<div> · </div>
							<?php 
								$current_term = wp_get_post_terms(  get_the_ID() , 'category', array( 'parent' => 0 ) );
								foreach (array_slice($current_term, 0,1) as $myterm); {
								} ?>
							<?php if ($myterm): ?>
								<div class="mx-3">
									<?php echo $myterm->name; ?>	
								</div>
							<?php endif; ?>
							<div> · </div>
							<div class="ml-3">
								<?php echo get_the_modified_time('j/n/Y') ?>
							</div>
						</div>
						<div class="posts_item_thumb mb-6">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>" class="w-full">
						</div>
						<div class="posts_item_content mb-6">
							<?php the_excerpt(); ?>
						</div>
						<div class="posts_item_more flex justify-between items-center">
							<div class="w-full">
								<a href="<?php the_permalink(); ?>" class="block main-bg text-xl text-center py-4 px-8"><?php _e('Продолжить чтение', 's2s'); ?></a>
							</div>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="b_pagination flex justify-center flex-wrap text-center mt-20">
			<?php 
				$big = 9999993991; // уникальное число
				echo paginate_links( array(
					'format' => '?page=%#%',
					'total' => $posts_query->max_num_pages,
					'current' => $current_page,
					'prev_next' => true,
					'next_text' => (''),
					'prev_text' => (''),
				)); 
			?>
		</div>
	</div>
</div>


<?php get_footer(); ?>