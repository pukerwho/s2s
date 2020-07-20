<?php
/*
Template Name: О НАС страница
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="about bg-gray-200 pb-12">
	<div class="about_thumb mb-12" style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>); -webkit-background-size: cover; background-attachment: fixed; background-position: bottom; ">
	</div>
	<div class="container mx-auto px-4 lg:px-0">
		<div class="w-full lg:w-3/4 mx-auto">
			<h1 class="text-2xl lg:text-5xl text-center uppercase mb-12">
				<?php the_title(); ?>
			</h1>
			<div class="about_content mb-16">
				<?php the_content(); ?>
			</div>
			<div class="about_blocks mb-16">
				<?php 
				$about_blocks = carbon_get_the_post_meta('crb_about_blocks');
				foreach( $about_blocks as $about_block ): ?>
					<div class="about_block flex flex-col lg:flex-row bg-white shadow-lg rounded mb-10">
						<div class="about_block_photo w-full lg:w-2/5">
							<img src="<?php echo $about_block['crb_about_block_photo'] ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="w-full lg:w-3/5 p-8 ">
							<?php echo $about_block['crb_about_block_text'] ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php get_template_part('blocks/main/team', 's2s'); ?>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>



<?php get_footer(); ?>