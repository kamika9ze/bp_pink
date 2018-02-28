<div class="box-container-tab-checkout">
	<div class="block-container-tab-checkout">
		<nav class="nav nav-pills">
	        <a class="nav-link nav-item active" data-toggle="tab" href="#home5">Как сделать заказ</a>
	        <a class="nav-link nav-item" data-toggle="tab" href="#profile5">Доставка</a>
	        <a class="nav-link nav-item" data-toggle="tab" href="#fat5">Оплата</a>
	        <a class="nav-link nav-item" data-toggle="tab" href="#mdo5">Помощь</a>
	        <!-- <a class="nav-link nav-item" data-toggle="tab" href="#mdo6">Обратная связь</a> -->
      	</nav>

	      <div class="tab-content checkout-tab-content" role="tabpanel">
	        <div role="tabpanel" class="tab-pane fade show active" id="home5">
		      	<nav class="nav nav-pills-tabs">
			        <a class="nav-link nav-item active" data-toggle="tab" href="#buy-on-site">Купить на сайте</a>
			        <?php /* <a class="nav-link nav-item" data-toggle="tab" href="#forgot-password">Забыли пароль?</a> */?>
			    </nav>
		      	<div class="tab-pane fade show active" id="buy-on-site" role="tabpanel">
		      		<div class="checkout-tab-title">
		        		<img src="/sites/all/themes/bp_pink/images/ico-order.png" alt="">
		        		Как сделать заказ
		        	</div>
		        	<h6>Заказ оформляется в несколько шагов. Ничего сложного.</h6>
		        	<p><strong>Купить на сайте: </strong></p>
		        	<ul class="col-sm-6 col-xs-12 pink">
		        		<li><span>Зарегистрируйтесь на сайте www.myblackpearl.ru;</span></li>
		        		<li><span>Выберите необходимые товары в разделах «Лицо», «Тело» или «Подбор продукта», нажмите кнопку «В корзину»;</span></li>
		        		<li><span>Перейдите в раздел «Корзина»;</span></li>
		        	</ul>
		        	<ul class="col-sm-6 col-xs-12 pink">
		        		<li><span>Укажите номер телефона и ФИО получателя заказа;</span></li>
		        		<li><span>Введите индекс или название вашего населенного пункта;</span></li>
		        		<li><span>Установите удобные для Вас условия доставки (полный адрес) и оплаты, после чего нажмите кнопку «Подтвердить заказ».</span></li>
		        	</ul>
		        	<p>Если вы уже делали покупки, то система предложит вариант доставки по тому же адресу. При необходимости нажмите «Изменить» — доставку, оплату, получателя.</p>
		      	</div>
		     <?php /* 
		          <div class="tab-pane fade" id="forgot-password" role="tabpanel">
		      		<div class="checkout-tab-title">
		        		<img src="/sites/all/themes/bp_pink/images/ico-order.png" alt="">
		        		Как сделать заказ
		        	</div>
		        	<h6>Восстановите пароль</h6>
		        	<form action="" class="form-forgot-password">
		        		<div class="col-sm-6 col-xs-12">
		        			<div class="form-group">
								<label for="exampleInputEmail1">E-mail:</label>
								<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Укажите адрес электронной почты">
							</div>
		        		</div>
		        		<div class="col-sm-6 col-xs-12">
		        			<div class="form-group">
								<label for="exampleInputPassword1">Введите код:</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Укажите адрес электронной почты">
							</div>
							<div class="form-forgot-password-capcha"><img src="/sites/all/themes/bp_pink/images/capcha.png" alt=""></div>
							<input type="submit" id="edit-submit" name="op" value="Выслать пароль" class="form-submit">
							<a href="#" class="not-code">Не вижу код</a>
		        		</div>
		        	</form>
		        	<p>Если у вас возникли трудности с оформлением заказа — напишите нам по адресу <a href="#">help@ozon.ru</a>, мы вам обязательно поможем. Укажите, пожалуйста, в запросе название и версию используемого браузера. Приложите скриншот ошибки или страницы, на которой возникла проблема.</p>
		      	</div>	
		      	 */?> 
	        </div>
	        <div role="tabpanel" class="tab-pane fade" id="profile5">
				<div class="checkout-tab-title">
					<img src="/sites/all/themes/bp_pink/images/ico-delivery.png" alt="">
					Доставка
				</div>
				<ul class="delivery-menu">
					<li><a href="http://www.ozon.ru/context/map/?areaid=2" target="_blank">Карта пунктов выдачи заказов</a></li>
					<li><a href="http://www.ozon.ru/context/help/article/30" target="_blank">Курьерская доставка</a></li>
					<li><a href="http://www.ozon.ru/context/help/article/3" target="_blank">Самовывоз</a></li>
					<li><a href="http://www.ozon.ru/context/help/article/53" target="_blank">Почта России</a></li>
				</ul>
	        </div>
	        <div class="tab-pane tab-pane-text fade" id="fat5" role="tabpanel">
	        	<nav class="nav nav-pills-tabs">
			        <a class="nav-link nav-item active" data-toggle="tab" href="#payment1">Как оплатить заказ?</a>
			        <a class="nav-link nav-item" data-toggle="tab" href="#payment2"> Что делать, если не прошла оплата?</a>
			    </nav>
		      	<div class="tab-pane fade show active" id="payment1" role="tabpanel">
		      		<div class="checkout-tab-title">
						<img src="/sites/all/themes/bp_pink/images/ico-delivery.png" alt="">
						Оплата
					</div>
					<p>Оплатите покупку любым удобным для вас способом: на сайте или при получении.</p>
					<p>Доступны способы оплаты: наличные, банковские карты, электронные деньги, переводы, «Спасибо» от Сбербанка. Предоплаченный заказ выдается получателю при предъявлении <a href="#">удостоверения личности</a>.</p>
					<p>Подробнее о типах оплаты:</p>
					<h6>Наличный расчет</h6>
					<p>Заказ оплачивается наличными при получении в пункте выдачи или курьеру. Вместе с заказом выдается кассовый чек.</p>
					<h6>Банковской картой при получении</h6>
					<p>Принимаются банковские карты Visa, MasterCard и Maestro.</p>
					<p>При оформлении заказа со способами доставки OZON.ru (курьером и пункты выдачи) выберите способ оплаты <strong>«Наличными или банковской картой при получении».</strong></p>
					<p>Если способ оплаты не предложен, значит оплата картой при получении для выбранного способа доставки или вашего города недоступна.</p>
					<h6>Apple Pay</h6>
					<p>Удобный, безопасный и конфиденциальный способ оплаты покупок, доступный пользователям устройств с операционной системой iOS и macOS (iPhone, iPad, Apple Watch, Mac).</p>
					<p>Принимаем к оплате, как дебетовые, так и кредитные банковские карты VISA и MasterCard.</p>
					<p>Оплатить заказ очень просто:</p>
					<ul>
						<li><span>С помощью iPhone. Просто поднесите iPhone к терминалу, приложив палец к Touch ID. Вы увидите на экране надпись «Готово», почувствуете легкую вибрацию и услышите звуковой сигнал — это означает, что платеж прошел.</span></li>
						<li><span>C помощью Apple Watch. На Apple Watch дважды нажмите боковую кнопку и поверните Apple Watch дисплеем к терминалу. Легким прикосновением и звуковым сигналом Apple Watch подтвердят, что информация о платеже отправлена.</span></li>
					</ul>
					<p>Подробнее о настройках и оплате на <a href="#">Apple Pay</a></p>
					<p><strong>Ограничения по оплате Apple Pay:</strong></p>
					<ul>
						<li><span>Минимальная сумма платежа 20 рублей, максимальная – 1 000 000 руб.</span></li>
						<li><span>Общая сумма транзакций по одной карте за день также 1 млн руб.</span></li>
						<li><span>Максимальное количество транзакций по одной карте за день равно 5.</span></li>
						<li><span>Курьеры пока не принимают данный тип оплаты.</span></li>
					</ul>
					<h6>Банковской картой на сайте</h6>
					<p>Оплатите заказ банковской картой онлайн.</p>
					<p>Принимаем к оплате банковские карты, у которых 16, 18, 19 цифр в номере:</p>
					<ul>
						<li><span>VISA, MasterCard, American Express;</span></li>
						<li><span>VISA Electron/Plus, Cirrus/Maestro при наличии кода CVC2 и CVV2 (в верхнем правом углу полосы для подписи).</span></li>
						<li><span>Мир.</span></li>
					</ul>
					<p>Минимальная сумма платежа — 20 рублей.</p>
					<br>
					<br>
					<p><strong>Инструкция по оплате</strong></p>
					<ol>
						<li><span>После оформления заказа нажмите «Оплатить»</span></li>
						<li><span>Введите номер карты, срок действия, имя держателя карты (латинскими буквами, как на карте) и кодCVC2/CVV2
							<br><img src="/sites/all/themes/bp_pink/images/cart.png" alt="" style="    margin-left: -39px;"></span></li>
						<li><span>Нажмите «Оплатить»</span></li>
					</ol>
					<p><strong>У вас более 16 цифр в номере карты?</strong></p>
					<p>Наберите 16 цифр, курсор автоматически переводится на другое поле ввода.  Верните  курсор в поле ввода «Номер карты» и продолжите введение номера</p>
					<p><strong>Хотите удалить данные карты?</strong></p>
					<p>Напишите нам по адресу <a href="#">help@ozon.ru</a>, через онлайн чат или позвоните по телефону: <br>
					8 (800) 234-60-06 (круглосуточно). </p>
					<h6>Как оплатить заказ бонусами «Спасибо» от Сбербанка?</h6>
					<p>Оплата электронными деньгами</p>
					<ol>
						<li><span>Выберите способ оплаты: PayPal; Яндекс.Деньги; WebMoney; Сбербанк Онлайн.</span></li>
						<li><span>После подтверждения заказа нажмите «Оплатить». OZON.ru переадресует вас в систему электронных платежей;</span></li>
						<li><span>Действуйте далее по инструкциям платежной системы.</span></li>
					</ol>
					<br>
					<p>Подробнее о типах оплаты:</p>
					<p><strong>PayPal</strong></p>
					<p>PayPal позволяет оплатить покупку в несколько щелчков мыши. Система работает с картами Visa, <br>MasterCard, American Express и Maestro.</p>
					<p>Введите данные банковской карты один раз в системе PayPal. В дальнейшем их не нужно будет указывать при оплате. Информация в PayPal надежно защищена с помощью мощных инструментов шифрования данных.</p>
					<p><strong>Как оплатить через PayPal:</strong></p>
					<ol>
						<li><span>Если у вас есть счет PayPal, войдите в систему, используя ваш адрес электронной почты и пароль в ёё PayPal;</span></li>
						<li><span>Если вы решили оплатить без регистрации, вам нужно будет ввести данные вашей банковской карты, адрес, телефон и адрес электронной почты</span></li>
					</ol>
					<p>Ознакомитесь с возможными типами оплаты для Вашей страны на сайте PayPal</p>
					<p><strong>Яндекс.Деньги</strong></p>
					<p>Оплата заказа происходит в системе Яндекс.Деньги. Необходимая сумма перечисляется моментально, комиссия за платеж не взимается.</p>
					<p>Максимальная сумма платежа для идентифицированных пользователей 100 000 рублей, для анонимных — 15 000 рублей.</p>
					<p>Для оплаты введите платежный пароль от Яндекс.Деньги.</p>
					<br>
					<p><strong>WebMoney</strong></p>
					<p>Оплата заказа в системе электронных платежей WebMoney.</p>
					<p>Выберите тип оплаты:</p>
					<ul>
						<li><span>WebMoney быстрый платеж (нужен мобильный телефон и терминал оплаты, принимающий платежи);</span></li>
						<li><span>WebMoney Keeper (Выберите тип кошелька);</span></li>
						<li><span>Другие способы (WebMoney-карта, чек Paymer и тп).</span></li>
					</ul>
					<p>Ограничения по оплате:</p>
					<ul>
						<li><span>Для анонимных пользователей РФ максимальная сумма платежа ограничена 15 000 рублей;</span></li>
						<li><span>Для пользователей  нерезидентов РФ  ограничение максимальной суммы платежа в 15 000 руб, <br>не зависимо от типа аттестата.</span></li>					
					</ul>
					<br>
					<p><strong>Сбербанк Онлайн</strong></p>
					<p>Заказ оплачивается через Интернет с помощью сервиса Сбербанк Онлайн. Доступно для клиентов Сбербанк, зарегистрированных в системе Сбербанк Онлайн.</p>
					<p>Для оплаты введите логин и пароль для Сбербанк Онлайн.</p>
					<br>
					<h6>QIWI Wallet</h6>
					<p>Оплатите заказ на сайте <a href="#">QIWI Wallet</a> или с помощью приложений для социальных сетей и мобильных телефонов.</p>
					<p>Максимальная сумма 1 платежа — 15 000 рублей.</p>
					<p>При оформлении заказа обязательно укажите номер мобильного телефона без 8-ки, в десятизначном формате CCCXXXXXXX1, где  ССС — код оператора, XXXXXXX — номер телефона без тире и пробелов.</p>
					<p>После оформления заказа поступит SMS с пин-кодом для доступа к QIWI-кошельку.</p>
					<p>Если на ваш номер телефона уже зарегистрирован QIWI-кошелек, используйте старый пин-код.</p>
					<p>Для оплаты войдите или зарегистрируйтесь на сайте <a href="#">QIWI Wallet</a> или установите мобильное приложение <a href="#">QIWI Wallet для своего телефона</a>, логин — номер мобильного телефона, указанный в заказе.</p>
					<h6></h6>
					<p>Оплатите заказ в любом банке, действующим на территории России. Банк взимает комиссию за перевод  <br>3-7% от стоимости заказа. Срок зачисления денежных средств — 2-3 рабочих дня.</p>
					<p>Заполненный бланк перевода можно распечатать двумя способами:</p>
					<ul>
						<li><span>после оформления заказа, нажав  на кнопку «Распечатать бланк оплаты»;</span></li>
						<li><span>в разделе Заказы,  нажав кнопку «Оплатить».</span></li>
					</ul>
					<p>Вы можете заполнить бланк банковского перевода вручную в банке, в этом случае укажите в качестве получателя платежа ООО «Интернет Решения», а в комментарии к платежу — номер заказа.</p>
					<p>Если Ваш банк поддерживает онлайн переводы, воспользуйтесь услугами интернет-банкинга. Зарегистрируйтесь  в системе и не  выходя из дома переводите деньги со счета на счет, оплачивайте покупки и выполняйте другие банковские операции.</p>
					<p><a href="#">Реквизиты нашего счета</a></p>
		      	</div>
		      	<div class="tab-pane fade" id="payment2" role="tabpanel">
		      		<div class="checkout-tab-title">
						<img src="/sites/all/themes/bp_pink/images/ico-delivery.png" alt="">
						Оплата
					</div>
		        	<p>Вы оплатили заказ, а он не изменил статус? <Br>Выберите способ оплаты, и мы подскажем вам, в чем может быть дело. </p>
		        	<h6>Оплата банковской картой на сайте</h6>
		        	<p>Оплата поступает в течение нескольких минут. <br>Если произошел отказ в авторизации, причины могут быть:</p>
		        	<ul>
		        		<li><span>Банк-эмитент не поддерживает технологию 3D-Secure;</span></li>
		        		<li><span>На карте недостаточно средств;</span></li>
		        		<li><span>Банк установил запрет на оплату в интернете;</span></li>
		        		<li><span>Истекло время ожидания ввода данных (40 минут);</span></li>
		        	</ul>
		        	<br>
		        	<p>Что делать при отказе в авторизации платежа? </p>
		        	<ul>
		        		<li><span>Повторите попытку через 20 минут;</span></li>
		        		<li><span>Обратитесь в банк-эмитент;</span></li>
		        		<li><span>Попробуйте оплатить картой другого банка.</span></li>
		        	</ul>
		        	<h6></h6>
		        	<p>Оплата поступает в течение нескольких минут.</p>
		        	<p>Если у вас возникли вопросы по оплате, Вы можете связаться со службой поддержки <a href="#">PayPal.</a></p>
		        	<h6>Яндекс.Деньги</h6>
		        	<p>Оплата поступает в течение нескольких минут.</p>
		        	<p>При возникновении вопросов по оплате Яндекс. Деньги можно обратиться по адресу: <br><a href="#">support@money.yandex.ru</a> или по телефону 8 (800) 555-80-99.</p>
		        	<h6>Webmoney</h6>
		        	<p>Оплата поступает в течение нескольких минут.</p>
		        	<p>При возникновении вопросов по оплате Webmoney можно обратиться по адресу: <a href="#">financial@guarantee.ru</a> <br>или по телефону +7 (495) 727-20-07.</p>
		        	<h6>QIWI Wallet</h6>
		        	<p>Счет выставлен, но оплатить не получается?</p>
		        	<ul>
		        		<li><span>пожалуйста, обратитесь в службу поддержки QIWI Wallet по телефону 8 (800) 707-77-59. <br>Счет не выставлен?</span></li>
		        		<li><span>пожалуйста, обратитесь к нам по телефону 8 (800) 234-60-06.</span></li>
		        	</ul>
		        	<h6>Банковский перевод</h6>
		        	<p>Оплата поступает в течение 2-3 рабочих дней. </p>
		        	<p>Если сроки вышли, пожалуйста, напишите нам по адресу <a href="#">help@ozon.ru.</a></p>
		        	<h6>Безналичный расчет для юридических лиц</h6>
		        	<p>Денежные средства поступят на счет OZON.ru через 2-3 рабочих дня после оплаты.</p>
		        	<p>Не пройдет оплата если:</p>
		        	<ul>
		        		<li><span>Заказ оформлен под регистрацией физического лица, а оплачивает юридическое лицо;</span></li>
		        		<li><span>Заказ оформлен под регистрацией юридического лица «А», а оплату производит юридическое лицо «В»;</span></li>
		        		<li><span>Заказ оформлен под регистрацией юридического лица, а оплату производит физическое лицо;</span></li>
		        		<li><span>При регистрации указан один ИНН, оплату производит лицо с другим ИНН.</span></li>
		        	</ul>
		        	<p>В случае возникновения вопросов, напишите нам по адресу <a href="#">help@ozon.ru.</a></p>
		      	</div>
	        </div>
	        <div class="tab-pane fade" id="mdo5" role="tabpanel">
	          	<div class="checkout-tab-title">
					<img src="/sites/all/themes/bp_pink/images/ico-help.png" alt="">
					Помощь
				</div>
				<h6>Не нашли ответа на свой вопрос?</h6>
				<p><strong>Спросите наших специалистов круглосуточно по телефону</strong></p>
				<br>
				<p>Москва +7 (495) 730-67-67<br>
				Санкт-Петербург +7 (812) 494-06-06<br>
				Регионы 8 (800) 234-60-06 (звонок бесплатный)<br>
				или по электронной почте <a href="#">help@ozon.ru</a></p>
	        </div>
	        <!-- <div class="tab-pane fade" id="mdo6" role="tabpanel">
	          <p>4Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
	          <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
	        </div> -->
	      </div>		
	</div>
</div>

