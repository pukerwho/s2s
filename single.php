<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="post pt-20">
		<div class="container mx-auto px-4 lg:px-0">
			<div class="post_item border-b-2 border-gray-300 w-full lg:w-3/4 mx-auto pb-10">
				<h1 class="post_item_title text-2xl lg:text-4xl font-bold mb-6">
					<?php the_title(); ?>
				</h1>	
				<div class="post_item_meta flex items-center mb-4">
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
            	<?php _e('Автор', 's2s'); ?>: s2s	
            </div>
					</div>
					<div> · </div>
					<?php 
						$current_term = wp_get_post_terms(  get_the_ID() , 'category', array( 'parent' => 0 ) );
						foreach (array_slice($current_term, 0,1) as $myterm); {
						} ?>
					<?php if ($myterm): ?>
						<div class="mx-3">
							<?php _e('Категория', 's2s'); ?>: <?php echo $myterm->name; ?>	
						</div>
					<?php endif; ?>
					<div> · </div>
					<div class="ml-3">
						<?php _e('Добавлено', 's2s'); ?>: <?php echo get_the_modified_time('j/n/Y') ?>
					</div>
				</div>
				<div class="post_item_content">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="w-full lg:w-3/4 flex justify-between mx-auto py-10 mb-10">
				<div class="w-1/4">
					<div class="flex items-center justify-start text-md mb-6">
						<div class="mr-4">
							<img src="<?php bloginfo('template_url'); ?>/img/arrow.svg" alt="" width="30px" style="-webkit-transform: rotate(180deg);-ms-transform: rotate(180deg);transform: rotate(180deg);">
						</div>
						<div>
							<?php _e('Следующая новость', 's2s'); ?>	
						</div>
					</div>
					<?php 
						$prev_post = get_previous_post(); 
						if( ! empty($prev_post) ){
					?>
						<a href="<?php echo get_permalink( $prev_post ); ?>">
							<img src="<?php echo get_the_post_thumbnail_url($prev_post, 'medium'); ?>" alt="<?php the_title(); ?>" class="w-full mb-4">
							<div class="text-xl text-center"><?php echo esc_html($prev_post->post_title); ?></div>
						</a>
					<?php } ?>
				</div>
				<div class="w-1/4">
					<div class="flex items-center justify-end text-md text-right mb-6">
						<div>
							<?php _e('Предыдущая новость', 's2s'); ?>
						</div>
						<div class="ml-4">
							<img src="<?php bloginfo('template_url'); ?>/img/arrow.svg" alt="" width="30px">
						</div>
					</div>
					<?php 
						$next_post = get_next_post(); 
						if( ! empty($next_post) ){
					?>
						<a href="<?php echo get_permalink( $next_post ); ?>">
							<img src="<?php echo get_the_post_thumbnail_url($next_post, 'medium'); ?>" alt="<?php the_title(); ?>" class="mb-4">
							<div class="text-xl text-center"><?php echo esc_html($next_post->post_title); ?></div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php get_template_part('blocks/parts/facebook', 's2s'); ?>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
<?php get_footer(); ?>