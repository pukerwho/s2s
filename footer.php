    </section>
    <footer id="footer" class="footer py-20">
    	<?php if( !is_page_template( 'tpl_contact.php' )): ?>
    	<div class="container mx-auto px-4 lg:px-0">
    		<div class="contacts w-full lg:w-3/4 mx-auto">
	    		<div class="mb-20">
	    			<h2 class="text-3xl lg:text-5xl uppercase mb-6"><span class="animate-s2s"><?php _e('Наши контакты'); ?></span></h2>
	    			<div class="text-2xl">
	    				Команда S2S_Architect готова выполнить проект Вашего дома, квартиры или офиса, не только в Харькове, но и в других городах и странах. Многолетний опыт удаленной работы, позволил нам составить оптимальный алгоритм удаленного проектирования.
	    			</div>
	    		</div>
	    		<div class="flex flex-col lg:flex-row ">
	    			<div class="w-full lg:w-2/3">
	    				<div class="mb-10">
	    					<div class="flex items-center mb-4">
	    						<img src="<?php bloginfo('template_url'); ?>/img/phone.svg" alt="" width="25px" class="mr-10">
	    						<div class="text-xl "><a href="tel:+38 0974151161" class="font-bold">+38 0974151161</a> (Telegram, Whatsapp)</div>
	    					</div>
	    					<div class="flex items-center mb-4">
	    						<img src="<?php bloginfo('template_url'); ?>/img/phone.svg" alt="" width="25px" class="mr-10">
	    						<div class="text-xl "><a href="tel:+38 0974121136" class="font-bold">+38 0974121136</a> (Telegram, Whatsapp, Viber)</div>
	    					</div>
	    				</div>
	    				<div class="mb-10">
	    					<div class="flex items-center">
	    						<img src="<?php bloginfo('template_url'); ?>/img/mail.svg" alt="" width="25px" class="mr-10">
	    						<div class="text-xl "><a href="mailto:s2s.archi@gmail.com" class="font-bold">s2s.archi@gmail.com</a></div>
	    					</div>
	    				</div>
	    				<div class="mb-16">
	    					<div class="flex items-center">
	    						<img src="<?php bloginfo('template_url'); ?>/img/skype.svg" alt="" width="25px" class="mr-10">
	    						<div class="text-xl "><a href="mailto:s2s.archi@gmail.com" class="font-bold">Architect S2S</a></div>
	    					</div>
	    				</div>
	    				<div class="social mb-10 lg:mb-0">
	    					<div class="text-2xl mb-6">
	    						<?php _e('Мы в социальных сетях', 's2s'); ?>:
	    					</div>
	    					<div class="flex">
	    						<li>
	    							<a href="#">
	    								<img src="<?php bloginfo('template_url'); ?>/img/facebook.svg" alt="" width="30px">
	    							</a>
	    						</li>
	    						<li>
	    							<a href="#">
	    								<img src="<?php bloginfo('template_url'); ?>/img/instagram.svg" alt="" width="30px">
	    							</a>
	    						</li>
	    					</div>
	    				</div>
	    			</div>
	    			<div class="w-full lg:w-1/3">
	    				<form name="contact">
								<input type="text" name="Имя" placeholder="Ваше имя" class="w-full mb-4 p-3">
								<input type="text" name="Телефон/Email" placeholder="Ваш номер телефона или email" class="w-full mb-4 p-3">
								<textarea name="Сообщение" rows="5" placeholder="Ваше сообщение" class="w-full p-3 mb-4"></textarea>
								<div class="contact_success hidden text-white text-center bg-green-600 p-3 mb-4">Сообщение успешно отправлено</div>
								<button type="submit" class="contact_send p-4">Отправить</button>
							</form>
	    			</div>
	    		</div>	
    		</div>
    	</div>
    	<?php endif; ?>
    </footer>
    <div class="order modal_click_js" data-modal-id="modal_order">
			<div class="order_text text-xl">
				Заявка
			</div>
		</div>
		<div class="modal modal_order" data-modal-id="modal_order">
    	<div class="modal_block rounded-lg shadow-lg">
        <div class="px-4 py-8 lg:px-12">
          <h3 class="secondary-font text-black text-3xl text-center uppercase mb-6">
            <?php _e('Оставить заявку', 's2s'); ?>
          </h3>
          <div class="flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/2 pr-0 lg:pr-10">
              <div>
                <div>
                  Форма
                  <div class="close_btn"><?php _e('Закрыть', 's-cast'); ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </div>
    <div class="modal_bg"></div>
    <?php wp_footer(); ?>
</body>
</html>