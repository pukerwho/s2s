<?php
/*
Template Name: ПОРТФОЛИО страница
*/
?>

<?php get_header(); ?>

<div class="portfolio bg-gray-200">
	<div class="portfolio_thumb" style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>); background-attachment: fixed; background-position: bottom; ">
	</div>
	<div class="container mx-auto py-12 px-4 lg:px-0">
		<div>
			<h1 class="text-2xl lg:text-5xl text-center uppercase mb-10"><?php _e('Портфолио', 's2s'); ?></h1>
		</div>
		<div class="w-full lg:w-3/4 flex justify-center mx-auto px-10">
			<div class="w-full lg:w-1/2 bg-white shadow-lg mr-0 lg:mr-10 mb-6">
				<div class="main-bg text-2xl uppercase text-center py-4 px-2">
					<?php _e('Архитектура', 's2s'); ?>
				</div>
				<div class="portfolio_photos px-6">
					<div class="swiper-container swiper-container-architect overflow-hidden">
						<div class="swiper-wrapper">
							<?php
							$architect_photos = carbon_get_the_post_meta('crb_portfolio_architect');
							foreach( $architect_photos as $architect_photo ): ?>
								<div class="swiper-slide">
									<?php $architect_src = wp_get_attachment_image_src($architect_photo, 'large'); ?>
									<a href="<?php echo $architect_src[0]; ?>" data-lightbox="architect-lightbox" data-title="<?php the_title(); ?>" class="p-2">
										<img src="<?php echo $architect_src[0]; ?>" loading="lazy">
									</a>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="swiper-architect-next swiper-button-next"></div>
						<div class="swiper-architect-prev swiper-button-prev"></div>
					</div>
				</div>
			</div>	
			<div class="w-full lg:w-1/2 bg-white shadow-lg ml:0 lg:ml-10 mb-6">
				<div class="main-bg text-2xl uppercase text-center py-4 px-2">
					<?php _e('Дизайн', 's2s'); ?>
				</div>
				<div class="portfolio_photos px-6">
					<div class="swiper-container swiper-container-design overflow-hidden">
						<div class="swiper-wrapper">
							<?php
							$design_photos = carbon_get_the_post_meta('crb_portfolio_design');
							foreach( $design_photos as $design_photo ): ?>
								<div class="swiper-slide">
									<?php $design_src = wp_get_attachment_image_src($design_photo, 'large'); ?>
									<a href="<?php echo $design_src[0]; ?>" data-lightbox="design-lightbox" data-title="<?php the_title(); ?>" class="p-2">
										<img src="<?php echo $design_src[0]; ?>" loading="lazy">
									</a>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="swiper-design-next swiper-button-next"></div>
						<div class="swiper-design-prev swiper-button-prev"></div>
					</div>
				</div>
			</div>	
		</div>
		<div class="w-full lg:w-3/4 flex justify-center mx-auto">
			<div class="w-full">
				<div class="main-bg text-2xl uppercase text-center py-4 px-2">
					<?php _e('Мы на объекте', 's2s'); ?>
				</div>
				<div class="portfolio_photos bg-white px-6">
					<div class="swiper-container swiper-container-object overflow-hidden">
						<div class="swiper-wrapper">
							<?php
							$object_photos = carbon_get_the_post_meta('crb_portfolio_object');
							foreach( $object_photos as $object_photo ): ?>
								<div class="swiper-slide">
									<?php $object_src = wp_get_attachment_image_src($object_photo, 'large'); ?>
									<a href="<?php echo $object_src[0]; ?>" data-lightbox="object-lightbox" data-title="<?php the_title(); ?>" class="p-2">
										<img src="<?php echo $object_src[0]; ?>" loading="lazy">
									</a>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="swiper-object-next swiper-button-next"></div>
						<div class="swiper-object-prev swiper-button-prev"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>