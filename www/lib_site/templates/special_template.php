<?

	$special_offer_center = $_POST['special_offer_center'];
	$special_offer_phone = $_POST['special_offer_phone'];
	$special_offer_email = $_POST['special_offer_email'];
	$special_offer_name = $_POST['special_offer_name'];
	$special_offer_details = $_POST['special_offer_details'];
	$special_offer_message = $_POST['special_offer_message'];
	
	$special_offer_manager_message_text .= "Здравствуйте,\r\nНа сайте была оставлена заявка в разделе «Спецпредложения».";
		
	$special_offer_manager_message_text .= "\r\n";
	
	$special_offer_manager_message_text .= "\r\nДанные заявки";
	$special_offer_manager_message_text .= "\r\nОфис-центр: " . $special_offer_center;
	$special_offer_manager_message_text .= "\r\nСпецпредложеие: " . $special_offer_details;
	$special_offer_manager_message_text .= "\r\nИмя: " . $special_offer_name;
	$special_offer_manager_message_text .= "\r\nE-mail: " . $special_offer_email;
	$special_offer_manager_message_text .= "\r\nТелефон: " . $special_offer_phone;
	$special_offer_manager_message_text .= "\r\nСообщение: " . $special_offer_message;
	
	$special_offer_customer_message_text .= "Здравствуйте,\r\nВаше заявка по спецпредложению была принята.";
	
	$special_offer_customer_message_text .= "\r\n";
	
	$special_offer_customer_message_text .= "\r\nДанные заявки";
	$special_offer_customer_message_text .= "\r\nОфис-центр: " . $special_offer_center;
	$special_offer_customer_message_text .= "\r\nСпецпредложеие: " . $special_offer_details;
	$special_offer_customer_message_text .= "\r\nИмя: " . $special_offer_name;
	$special_offer_customer_message_text .= "\r\nE-mail: " . $special_offer_email;
	$special_offer_customer_message_text .= "\r\nТелефон: " . $special_offer_phone;
	$special_offer_customer_message_text .= "\r\nСообщение: " . $special_offer_message;
	
	if ($special_offer_center && $special_offer_phone && $special_offer_email && $special_offer_name && $special_offer_message && $special_offer_details) {
	
		mail('e.izmalkova@gmail.com', 'Новое сообщение со страницы «О компании»', $about_contacts_manager_message_text);
		
		//mail('yojmm@yandex.ru', 'Новая заявка по спецпредложению', $special_offer_manager_message_text);
		
		mail($special_offer_email, 'Ваша заявка по спецпредложению принята', $special_offer_customer_message_text);
		
	}

?>
<div class="vd_specialoffer">
	<div class="vd_specialoffer-header">
		<div class="g-container">
			<div class="vd_specialoffer-header-dates">1 апреля - 29 мая 2016</div>
			<div class="vd_specialoffer-header-virtual"></div>
			<div class="vd_specialoffer-header-meeting"></div>
			<h1>Вирутальный офис +4 часа переговорных в подарок</h1>
			<p>Для всех клиентов, заключивших договор на услуги «Виртуальный офис» до 29 февраля 2016 г., предоставляется бесплатно 4 часа аренды переговорной комнаты в любом офисном центре «Деловой». Воспользоваться переговорными комнатами можно в течение срока действия договора.</p>
		</div>
	</div>

	<div class="vd_specialoffer-offers">
		<div class="g-container">
			<div class="vd_specialoffer-offers-title">Бизнес-центры, в которых идет акция</div>
			<div class="vd_specialoffer-offers-list">
				<?
				
				foreach ($_DATA['office_center']['items'] as $special_offer_office_center) {
					
					
					
				?>
				<div class="vd_specialoffer-offers-list-element">
					<div class="vd_specialoffer-offers-list-element-header">
						<div class="vd_specialoffer-offers-list-element-header-office">
							<img src="<? echo $special_offer_office_center['ext_img_src']; ?>" />
							<span><? echo $special_offer_office_center['title']; ?></span>
						</div>
						<div class="vd_specialoffer-offers-list-element-header-services">
							<?
								
							$special_offer_office_center_service_groups = explode(',', $special_offer_office_center['service_group']);
								
							foreach($special_offer_office_center_service_groups as $special_offer_office_center_service_group) {
								
								$special_offer_office_center_service_group_title = $_DATA['service_group']['items'][$special_offer_office_center_service_group]['title'];
								
							?>
							
							<div class="vd_officelistwrapper-office-services-service vd_officelistwrapper-office-services-service_<? echo $special_offer_office_center_service_group; ?>" title="<? echo $special_offer_office_center_service_group_title; ?>"></div>
							
							<?
								
							}	
							
							?>
						</div>
						<div class="vd_specialoffer-offers-list-element-header-place">
							<div class="reserve">ОСТАВИТЬ ЗАЯВКУ</div>
							<span class="price">
							<?
							
							if ($special_offer_office_center['metro_id_lookup'] != "") {
								echo '<div class="vd_specialoffer-offers-list-element-header-place-marker" style="background-color: ' . $special_offer_office_center['metro_color'] . ';"></div> ' . $special_offer_office_center['metro_id_lookup'];
							} else {
								echo $special_offer_office_center['city_id_lookup'];
							}
								
							?>
							</span>
						</div>
					</div>
					<div class="vd_specialoffer-offers-list-element-menu">
						<form method="post">
							<div class="vd_specialoffer-offers-list-element-menu-reserveform">
								<div class="vd_specialoffer-offers-list-element-menu-reserveform-left">
									<div class="vd_specialoffer-offers-list-element-menu-reserveform-left-text">
										Если вас заинтересовало наше предложение – оставьте свои данные и наш менеджер свяжется с вами.
									</div>
									<div class="vd_specialoffer-offers-list-element-menu-reserveform-left-photo">
										<img src="" />
									</div>
									<div class="vd_specialoffer-offers-list-element-menu-reserveform-left-name">
										Ник Гевин
									</div>
									<div class="vd_specialoffer-offers-list-element-menu-reserveform-left-phone">
										<? echo $special_offer_office_center['phone']; ?>
									</div>
									<div class="vd_specialoffer-offers-list-element-menu-reserveform-left-email">
										<a href="mailto:<? echo $special_offer_office_center['email_request']; ?>"><? echo $special_offer_office_center['email_request']; ?></a>
									</div>
								</div>
								<div class="vd_specialoffer-offers-list-element-menu-reserveform-right">
									<input type="hidden" name="special_offer_center" value="<? echo $special_offer_office_center['title']; ?>">
									<input type="hidden" name="special_offer_details" value="Вирутальный офис +4 часа переговорных в подарок">
									<input type="text" name="special_offer_phone" class="phone" value="" placeholder="+7 (___) ___-__-__">
									<input type="text" name="special_offer_email" class="email" value="" placeholder="E-mail">
									<input type="text" name="special_offer_name" class="name" value="" placeholder="Имя">
									<textarea name="special_offer_message" class="message" placeholder="Ваше сообщение"></textarea>
									<button>ОСТАВИТЬ ЗАЯВКУ</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?
					
				}
					
				?>
			</div>
		</div>
	</div>

		<div class="vd_singleofficewrapper-content-special">
			<a name="special"></a>
			<div class="g-container">
				<div class="g-container-row">
					<h2 class="g-section-title">Cпецпредложения</h2>
					<ul class="offers-items">
				        <li>
				            <div class="offers-item">
				                <div class="offers-item-title c-icon c-office">
				                    Получите скидку 10% на аренду офиса
				                </div>
				                <div class="offers-item-date">
				                    1 февраля – 29 апреля 2016
				                </div>
				                <div class="offers-item-link"><a href="#" class="g-button c-office">ПОДРОБНЕЕ</a></div>
				            </div>
				        </li>
				        <li>
				            <div class="offers-item">
				                <div class="offers-item-title c-icon c-virtual">
				                    Виртуальный офис + 4 часа переговорных в подарок
				                </div>
				                <div class="offers-item-date">
				                    20 марта – 18 мая  2016
				                </div>
				                <div class="offers-item-link"><a href="#" class="g-button c-virtual">ПОДРОБНЕЕ</a></div>
				            </div>
				        </li>
				        <li>
				            <div class="offers-item">
				                <div class="offers-item-title c-icon c-meeting">
				                    Акция февраля – скидка 70% на аренду переговорных
				                </div>
				                <div class="offers-item-date">
				                    1 февраля – 29 апреля  2016
				                </div>
				                <div class="offers-item-link"><a href="#" class="g-button c-meeting">ПОДРОБНЕЕ</a></div>
				            </div>
				        </li>
				    </ul>		
				</div>
			</div>
		</div>
	
</div>