<footer id="bp-main-footer" class="bg-grey-light">
	<div id="bp-footer-top" class="container black hidden-sm-down">
		<div class="title-small text-center light">«Черный Жемчуг» — нас объединяет красота</div>
	</div>
	<div id="bp-footer-bottom" class="container black">
		<div class="row">
			<div class="col-12 col-lg-10 text-center text-lg-left">
				<div class="row py-1">
					<div class="col-lg-3">
						<div class="copyright text-small regular hidden-xs-down">2016 ООО «Юнилевер Русь».<br>Все права защищены</div>
						<div class="copyright text-micro regular hidden-sm-up">2016 ООО «Юнилевер Русь». Все права защищены</div>
					</div>
					<div class="col-lg-8 hidden-sm-down">
						<ul class="footermenu text-center text-big">
							<li><a href="#">О нас</a></li>
							<li><a href="#">Магазины</a></li>
							<li><a href="#">Качество</a></li>
							<li><a href="#">Контакты</a></li>
						</ul>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-12">
						<ul class="policymenu inline-menu text-small regular">
							<li><a href="#" class="subscribe-link">Подписаться на новости</a></li>
							<li><a href="#">Политика конфеденциальности</a></li>
							<li><a href="#">Условия использования</a></li>
							<li><a href="#">Дисклеймер</a></li>
							<li><a href="#">Политика Cookies</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-2 float-right social-section">
				<div class="footer-subscribe btn-wrapper text-center"><a href="#" class="btn btn-big velvet btn-outline-velvet" data-toggle="modal" data-target="#subscription-modal">Подписаться</a></div>
				<ul class="footer-social social-share text-center m-0 p-0 mt-2">
					<li><a onclick="Share.facebook('https://www.myblackpearl.ru/')"><span class="icon-social-facebook icon-social-mono velvet"></span></a></li>
                <li><a onclick="Share.odnoklassniki('https://www.myblackpearl.ru/')"><span class="icon-social-ok icon-social-mono velvet"></span></a></li>
                <li><a onclick="Share.vkontakte('https://www.myblackpearl.ru/')"><span class="icon-social-vk icon-social-mono velvet"></span></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<a class="close" data-dismiss="modal" aria-label="Закрыть">
				<span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
			</a>
		</div>
	</div>
</div>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<a class="close" data-dismiss="modal" aria-label="Закрыть">
				<span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
			</a>
			<div class="modal-body">
				<div class="row">
					<div class="col-xl-10 col-force-center text-center">
						<div class="title-big thin mb-3">Авторизация</div>
						<form action="/" method="POST" class="form-login mt-3 mb-2">
							<div class="form-group login">
								<label for="form-username">Email</label>
								<input type="text" name="name" id="form-username">
							</div>
							<div class="form-group password">
								<label for="form-password">Пароль</label>
								<input type="password" name="pass" id="form-password">
								<!--
								<div class="eye">
										<img class="eye-closed" src="/sites/all/themes/bp_pink/images/ico-eye-closed.svg" alt="Показать пароль">
										<img class="eye-opened" src="/sites/all/themes/bp_pink/images/ico-eye-opened.svg" alt="Скрыть пароль">
								</div>
								-->
							</div>
							<div class="form-group pt-2"><a href="#" class="btn btn-big bg-blue trigger-login">Войти</a></div>
							<p>Или <a href="#" class="blue underline">зарегистрироваться</a></p>
							<div class="info pink mt-2">
								<?php //print render($page['bp-modal-login']); ?>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-controls bg-grey-light"></div>
		</div>
	</div>
</div>
<div class="modal fade" id="shipping-rates-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<a class="close" data-dismiss="modal" aria-label="Закрыть">
				<span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
			</a>
			<div class="modal-body">
				<div class="row">
					<div class="col-xl-12 col-force-center text-center">
						<div class="title-big thin mb-3">Тарифы на доставку</div>
						<table class="table text-left">
							<tr>
								<td>Пункты выдачи заказов OZON.ru</td>
								<td class="text-nowrap"><strong>175</strong> <i class="icon-rubble"></i></td>
							</tr>
							<tr>
								<td>Пункты выдачи OZON.ru - МТС в Москве</td>
								<td class="text-nowrap"><strong>199</strong> <i class="icon-rubble"></i></td>
							</tr>
							<tr>
								<td>Партнерские пункты выдачи OZON.ru</td>
								<td class="text-nowrap"><strong>110</strong> <i class="icon-rubble"></i></td>
							</tr>
							<tr>
								<td>Почтоматы Pick Point</td>
								<td class="text-nowrap"><strong>36</strong> <i class="icon-rubble"></i></td>
							</tr>
							<tr>
								<td>Почтоматы InPost</td>
								<td class="text-nowrap"><strong>74</strong> <i class="icon-rubble"></i></td>
							</tr>
							<tr>
								<td>Курьерская доставка по Москве и Московской области</td>
								<td class="text-nowrap"><strong>210</strong> <i class="icon-rubble"></i></td>
							</tr>
							<tr>
								<td>Курьерская доставка по Санкт-Петербургу и Ленинградской области</td>
								<td class="text-nowrap"><strong>150</strong> <i class="icon-rubble"></i></td>
							</tr>
							<tr>
								<td>Курьерская доставка в регионы России</td>
								<td class="text-nowrap"><strong>180</strong> <i class="icon-rubble"></i></td>
							</tr>
						</table>
					</div>
					<div class="col-xl-6 col-force-center"><a href="#" class="custom-btn" data-dismiss="modal">Продолжить</a></div>
				</div>
			</div>
			<div class="modal-controls bg-grey-light">
				<!--<a href="#" class="custom-btn">Продолжить</a>-->
				<!--<a href="#" class="btn btn-big bg-blue trigger-login">Продолжить</a>-->
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="subscription-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<a class="close" data-dismiss="modal" aria-label="Закрыть">
				<span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
			</a>
			<form action="#" method="POST" class="modal-body">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="title-big thin mb-2">Подписаться на рассылку</div>
						<div class="mb-2">Подписывайтесь на рассылку и будьте в курсе всей самой полезной и актуальной информации, а также первыми узнавайте о новинках</div>
					</div>
					<div class="col-lg-10 col-force-center">
						<div class="custom-form-row custom-field">
							<input type="text" name="name" placeholder="Ваше имя">
						</div>
						<div class="custom-form-row custom-field">
							<input type="text" name="email" placeholder="E-mail" required>
						</div>
						<div class="mb-1">
							<div class="checkbox-wrap">
								<label class="text-left">
									<input type="checkbox" name="agree1">
									<span class="checkbox-span velvet">Подтверждаю согласие на обработку моих персональных данных в соответствии с <a href="javascript:void(0)">Политикой о персональных данных</a></span>
								</label>
							</div>
						</div>
						<div class="mb-1">
							<div class="checkbox-wrap">
								<label class="text-left">
									<input type="checkbox" name="agree2">
									<span class="checkbox-span velvet">Подтверждаю согласие на получение рекламной информации ООО «Юниливер Русь»</span>
								</label>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-force-center mt-2"><button type="submit" class="custom-btn">Подписаться</button></div>
				</div>
			</form>
			<div class="modal-controls bg-grey-light">
				<!--<a href="#" class="custom-btn">Продолжить</a>-->
				<!--<a href="#" class="btn btn-big bg-blue trigger-login">Продолжить</a>-->
			</div>
		</div>
	</div>
</div>
<div class="console-container">
	<div id="console">
		<div class="close-console-cross close-console-btn"><span class="title-small icon-cross cyan"></span></div>
		<div class="console-inner center-content">
			<?php print $messages; ?>
		</div>
	</div>
</div>
