<div class="grid-item">
	<a href="<?php the_permalink(); ?>">
		<div class="grid-photo">
			<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>">
		</div>
		<div class="grid-item-box flex flex-col justify-end">
			<div class="grid-item-content flex flex-col px-6 py-6">
				<div class="grid-item-title relative text-2xl text-white">
					<?php the_title(); ?>
				</div>
				<div class="grid-item-category relative main-color">
					Категория
				</div>	
			</div>
			
		</div>
	</a>
</div>