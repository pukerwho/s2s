<div class="welcome mb-24">
	<div class="swiper-container swiper-welcome-container">
		<div class="swiper-wrapper">
			<?php 
			$welcome_sliders = carbon_get_the_post_meta('crb_main_sliders');
			foreach( $welcome_sliders as $welcome_slider ): ?>
			<div class="swiper-slide">
				<div class="welcome_item flex items-end welcome_item-<?php echo $welcome_slider['crb_main_slider_position'] ?>" style="background: url(<?php echo $welcome_slider['crb_main_slider_img'] ?>); -webkit-background-size: cover; background-size: cover; background-position: top; ">
					<div class="container mx-auto">

						<!-- ТИП СЛАЙДЕРА №1 -->
						<?php if(carbon_get_the_post_meta('crb_slider_type') === 'title_and_subtitle'): ?>
						<div class="inline-flex flex-col mb-10">
							<div class="welcome_item_title  mb-4">
								<span class="inline-block text-4xl bg-white py-4 px-8">
									<?php echo $welcome_slider['crb_main_slider_title'] ?>		
								</span>
							</div>
							<div class="welcome_item_subtitle inline-block text-2xl main-bg py-4 px-8">
								<?php echo $welcome_slider['crb_main_slider_subtitle'] ?>
							</div>
						</div>
						<?php endif; ?>
						<!-- END ТИП СЛАЙДЕРА №1 -->

					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<!-- ТИП СЛАЙДЕРА №2 -->
	<?php if(carbon_get_the_post_meta('crb_slider_type') === 'only_button'): ?>
		<div class="welcome_btn animate-s2s">
			<div class="main-bg relative text-3xl text-center uppercase rounded-lg shadow-lg cursor-pointer px-4 py-2 modal_click_js" data-modal-id="modal_order">
				<?php _e('Связаться с нами', 's2s'); ?>
			</div>
		</div>
	<?php endif; ?>
	<!-- END ТИП СЛАЙДЕРА №2 -->
</div>