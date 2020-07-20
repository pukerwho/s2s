<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="project">
		<div class="thumb" style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>); -webkit-background-size: cover; background-size: cover; background-position: top; ">
			<div class="thumb_title s2s-animate">
				<h1 class="text-4xl text-center uppercase">
					<?php the_title(); ?>	
				</h1>
			</div>
		</div>
		<div class="project_content bg-gray-200 py-20">
			<div class="container mx-auto">
				<div class="flex flex-col lg:flex-row mb-8">
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
								<h3 class="text-4xl mb-6">
									<?php _e('Характеристики', 's2s'); ?>
								</h3>
								<div class="grid grid-cols-2 bg-white rounded-lg shadow-lg p-6 pb-2 ">
									<div class="flex mb-6">
										<div class="text-xl font-bold mr-4">
											<?php _e('Общая площадь', 's2s'); ?>:
										</div>
										<div class="text-xl">
											<?php echo carbon_get_the_post_meta('crb_project_common'); ?>
										</div>
									</div>
									<div class="flex mb-6">
										<div class="text-xl font-bold mr-4">
											<?php _e('Площадь застройки', 's2s'); ?>:
										</div>
										<div class="text-xl">
											<?php echo carbon_get_the_post_meta('crb_project_square'); ?>
										</div>
									</div>
									<div class="flex mb-6">
										<div class="text-xl font-bold mr-4">
											<?php _e('Габариты', 's2s'); ?>:
										</div>
										<div class="text-xl">
											<?php echo carbon_get_the_post_meta('crb_project_gabarit'); ?>
										</div>
									</div>
									<div class="flex mb-6">
										<div class="text-xl font-bold mr-4">
											<?php _e('Высота', 's2s'); ?>:
										</div>
										<div class="text-xl">
											<?php echo carbon_get_the_post_meta('crb_project_height'); ?>
										</div>
									</div>
								</div>
							</div>
							<div>
								<h3 class="text-4xl mb-6">
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
				<div class="project_photos flex flex-wrap mx-0 lg:-mx-2">
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
		<?php get_template_part('blocks/main/video', 's2s'); ?>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>