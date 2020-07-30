<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="project">
		<div class="thumb" style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>); -webkit-background-size: cover; background-size: cover; background-position: top; ">
			<div class="thumb_title animate-s2s">
				<h1 class="text-2xl lg:text-4xl text-center uppercase">
					<?php the_title(); ?>	
				</h1>
			</div>
		</div>
		<div class="project_content bg-gray-200 py-20">
			<div class="container mx-auto px-4 lg:px-0">
				<div class="flex flex-col-reverse lg:flex-row mb-8">
					<?php if (carbon_get_the_post_meta('crb_project_plans')): ?>
						<div class="w-full lg:w-1/3 pr-0 lg:pr-4">
							<?php $project_plans = carbon_get_the_post_meta('crb_project_plans');
							foreach( $project_plans as $project_plan ): ?>
								<?php $plan_src = wp_get_attachment_image_src($project_plan, 'large'); ?>
								<a href="<?php echo $plan_src[0]; ?>" data-lightbox="plan-lightbox" data-title="<?php the_title(); ?>" class="p-2">
									<img src="<?php echo $plan_src[0]; ?>" loading="lazy" class="w-full shadow-lg">
								</a>
							<?php endforeach; ?>
						</div>
						<div class="w-full lg:w-2/3 pl-0 lg:pl-4">
							<div class="mb-10">
								<h3 class="text-2xl lg:text-4xl mb-6">
									<?php _e('Характеристики', 's2s'); ?>
								</h3>
								<div class="grid grid-cols-1 lg:grid-cols-2 bg-white rounded-lg shadow-lg p-6 pb-2 ">
									<div class="flex mb-6">
										<div class="w-1/2 lg:w-auto text-xl font-bold mr-4">
											<?php _e('Общая площадь', 's2s'); ?>:
										</div>
										<div class="w-1/2 lg:w-auto text-xl">
											<?php echo carbon_get_the_post_meta('crb_project_common'); ?>
										</div>
									</div>
									<div class="flex mb-6">
										<div class="w-1/2 lg:w-auto text-xl font-bold mr-4">
											<?php _e('Площадь застройки', 's2s'); ?>:
										</div>
										<div class="w-1/2 lg:w-auto text-xl">
											<?php echo carbon_get_the_post_meta('crb_project_square'); ?>
										</div>
									</div>
									<div class="flex mb-6">
										<div class="w-1/2 lg:w-auto text-xl font-bold mr-4">
											<?php _e('Габариты', 's2s'); ?>:
										</div>
										<div class="w-1/2 lg:w-auto text-xl">
											<?php echo carbon_get_the_post_meta('crb_project_gabarit'); ?>
										</div>
									</div>
									<div class="flex mb-6">
										<div class="w-1/2 lg:w-auto text-xl font-bold mr-4">
											<?php _e('Высота', 's2s'); ?>:
										</div>
										<div class="w-1/2 lg:w-auto text-xl">
											<?php echo carbon_get_the_post_meta('crb_project_height'); ?>
										</div>
									</div>
								</div>
							</div>
							<div>
								<h3 class="text-2xl lg:text-4xl mb-6">
									<?php _e('Описание проекта', 's2s'); ?>
								</h3>
								<div>
									<?php the_content(); ?>	
								</div>
							</div>
						</div>
					<?php else: ?>
						<div>
							Нету
						</div>
					<?php endif; ?>
				</div>
				<div class="project_photos flex flex-wrap mx-0 lg:-mx-2 mb-12">
					<?php $project_photos = carbon_get_the_post_meta('crb_project_photos');
					foreach( $project_photos as $project_photo ): ?>
						<div class="w-full lg:w-1/3 px-0 lg:px-2 py-2">
							<?php $photo_src = wp_get_attachment_image_src($project_photo, 'large'); ?>
							<a href="<?php echo $photo_src[0]; ?>" data-lightbox="photo-lightbox" data-title="<?php the_title(); ?>">
								<img src="<?php echo $photo_src[0]; ?>" loading="lazy" class="w-full p-3">
							</a>	
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php if (carbon_get_the_post_meta('crb_project_video_id')): ?>
		<div class="video py-20">
			<div class="container mx-auto px-4 lg:px-0">
				<div>
					<h2 class="video_title text-3xl lg:text-4xl text-center text-white uppercase mb-20 animate-s2s"><?php _e('Видео'); ?></h2>
					<div class="w-full lg:w-3/4 relative flex mx-auto modal_click_js" data-main="video" data-modal-id="main_video">
						<div class="video_thumb">
							<img src="https://img.youtube.com/vi/<?php echo carbon_get_the_post_meta('crb_project_video_id'); ?>/maxresdefault.jpg" alt="" class="w-full h-full object-cover">		
						</div>
						<div class="video_play">
							<img src="<?php bloginfo('template_url'); ?>/img/play.svg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal modal_order container mx-auto" data-modal-id="main_video">
			<div class="modal_block rounded-lg shadow-lg">
		    <div class="px-4 py-8 lg:px-12">
		      <div class="flex flex-col lg:flex-row">
		        <div class="w-full">
		          <div>
		            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo carbon_get_the_post_meta('crb_project_video_id'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="height: 75vh;"></iframe>
		          </div>
		        </div>
		      </div>
		    </div>
			</div>
		</div>
		<?php endif; ?>
		<div>
			<div class="container mx-auto px-4 lg:px-0">
				<div class="w-full lg:w-3/4 flex justify-between mx-auto py-10">
					<div class="w-1/2 pr-5">
						<div class="flex items-center justify-start text-md mb-6">
							<div class="mr-4">
								<img src="<?php bloginfo('template_url'); ?>/img/arrow.svg" alt="" width="30px" style="-webkit-transform: rotate(180deg);-ms-transform: rotate(180deg);transform: rotate(180deg);">
							</div>
							<div>
								<?php _e('Следующий проект', 's2s'); ?>	
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
					<div class="w-1/2 pl-5">
						<div class="flex items-center justify-end text-md text-right mb-6">
							<div>
								<?php _e('Предыдущий проект', 's2s'); ?>
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
								<img src="<?php echo get_the_post_thumbnail_url($next_post, 'medium'); ?>" alt="<?php the_title(); ?>" class="w-full mb-4">
								<div class="text-xl text-center"><?php echo esc_html($next_post->post_title); ?></div>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>