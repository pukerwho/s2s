<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="service">
	<div class="thumb" style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>); background-attachment: fixed; background-position: bottom; ">
		<div class="thumb_title animate-s2s">
			<h1 class="text-2xl lg:text-4xl text-center uppercase">
				<?php the_title(); ?>
			</h1>
		</div>
	</div>
	<div class="bg-gray-200 ">
		<div class="container mx-auto pt-10 pb-20 px-4 lg:px-0">
			<div class="w-full lg:w-3/4 mx-auto">
				<div class="service_content mb-12">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="flex flex-col lg:flex-row">
				<div class="service_album w-full lg:w-1/3 pr-0 lg:pr-10 mb-10 lg:mb-0">
					<div class="service_album_title text-4xl uppercase font-bold mb-8">
						<div><?php _e('Фотоальбом', 's2s'); ?>:</div>
					</div>
					<div class="service_album_thumb shadow-xl" data-modal="service-album-model">
						<?php 
							$album_photos = carbon_get_the_post_meta('crb_services_album'); 
							foreach (array_slice($album_photos, 0,1) as $album_photo):
						?>
							<?php $album_photo_src = wp_get_attachment_image_src($album_photo, 'large'); ?>
							<img src="<?php echo $album_photo_src[0]; ?>" loading="lazy" class="w-full ">
						<?php endforeach; ?>
						<div class="main-bg text-xl text-center uppercase py-4">
							Открыть
						</div>
					</div>
				</div>
				<div class="service_sostav w-full lg:w-2/3 pl-0 lg:pl-10">
					<div class="service_sostav_title text-4xl uppercase font-bold mb-8">
						<?php _e('Состав', 's2s'); ?>:
					</div>
					<div class="bg-white rounded-lg shadow-xl text-xl pt-8 pb-6 px-10">
						<?php echo apply_filters( 'the_content', carbon_get_the_post_meta('crb_services_sostav' ) ); ?>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="service_video video py-20">
		<div class="w-3/4 relative flex mx-auto" data-main="video">
			<div class="video_thumb">
				<img src="https://img.youtube.com/vi/<?php echo carbon_get_the_post_meta('crb_services_youtube'); ?>/maxresdefault.jpg" alt="" class="w-full h-full object-cover">		
			</div>
			<div class="video_play">
				<img src="<?php bloginfo('template_url'); ?>/img/play.svg" alt="">
			</div>
		</div>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>