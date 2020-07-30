<?php if (carbon_get_the_post_meta('crb_main_video_id')): ?>
<div class="video py-20">
	<div class="container mx-auto px-4 lg:px-0">
		<div>
			<h2 class="video_title text-3xl lg:text-4xl text-center text-white uppercase mb-20 animate-s2s"><?php _e('Заголовок для видео'); ?></h2>
			<div class="w-full lg:w-3/4 relative flex mx-auto modal_click_js" data-main="video" data-modal-id="main_video">
				<div class="video_thumb">
					<img src="https://img.youtube.com/vi/<?php echo carbon_get_the_post_meta('crb_main_video_id'); ?>/maxresdefault.jpg" alt="" class="w-full h-full object-cover">		
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
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo carbon_get_the_post_meta('crb_main_video_id'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="height: 75vh;"></iframe>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
<?php endif; ?>