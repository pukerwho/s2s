<div class="counter py-20 mb-20" style="background: url(<?php echo carbon_get_the_post_meta('crb_main_count_bg'); ?>); background-attachment: fixed;">
	<div class="container mx-auto">
		<div class="flex flex-wrap flex-col lg:flex-row mx-0 lg:-mx-4">
			<div class="w-full lg:w-1/4 px-0 lg:px-4">
				<div class="relative text-6xl text-white font-bold text-center">
					<span class="count" data-to="<?php echo carbon_get_the_post_meta('crb_main_count_first_number'); ?>" data-time="1000" data-fps="20"></span>
				</div>
				<div class="relative text-xl text-white text-center">
					<?php echo carbon_get_the_post_meta('crb_main_count_first_title'); ?>
				</div>
			</div>
			<div class="w-full lg:w-1/4 px-0 lg:px-4">
				<div class="relative text-6xl text-white font-bold text-center">
					<span class="count" data-to="<?php echo carbon_get_the_post_meta('crb_main_count_second_number'); ?>" data-time="2300" data-fps="20"></span>
				</div>
				<div class="relative text-xl text-white text-center">
					<?php echo carbon_get_the_post_meta('crb_main_count_second_title'); ?>
				</div>
			</div>
			<div class="w-full lg:w-1/4 px-0 lg:px-4">
				<div class="relative text-6xl text-white font-bold text-center">
					<span class="count" data-to="<?php echo carbon_get_the_post_meta('crb_main_count_third_number'); ?>" data-time="1000" data-fps="20"></span>
				</div>
				<div class="relative text-xl text-white text-center">
					<?php echo carbon_get_the_post_meta('crb_main_count_third_title'); ?>
				</div>
			</div>
			<div class="w-full lg:w-1/4 px-0 lg:px-4">
				<div class="relative text-6xl text-white font-bold text-center">
					<span class="count" data-to="<?php echo carbon_get_the_post_meta('crb_main_count_fourth_number'); ?>" data-time="5000" data-fps="20"></span>
				</div>
				<div class="relative text-xl text-white text-center">
					<?php echo carbon_get_the_post_meta('crb_main_count_fourth_title'); ?>
				</div>
			</div>
		</div>
	</div>
</div>