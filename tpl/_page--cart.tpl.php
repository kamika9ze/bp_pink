<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<?php include_once('inc/bp_header.tpl.php'); ?>
<main class="overflow-hidden">
	<!--<div class="bp-main-content">
	<?php /* if ($tabs): */ ?><div class="tabs"><?php /* print render($tabs); */ ?></div><?php /* endif; */ ?>
	<?php /* print render($page['help']); */ ?>
	<?php /* if ($action_links): */ ?><ul class="action-links"><?php /* print render($action_links); */ ?></ul><?php /* endif; */ ?>
	<?php /* print render($page['content']); */ ?>
	</div>
	<div class="bp-footer-vessel"></div>-->
	<div class="container">
		<div class="bp-main-content">
			<div class="cart-wrapper">
				<div class="cart-tabs justify-wrap">
					<div class="cart-tabs-link">
						1. Моя корзина
					</div>
					<div class="cart-tabs-link">
						2. Способ доставки
					</div>
					<div class="cart-tabs-link">
						3. Способ оплаты
					</div>
					<div class="cart-tabs-link">
						4. Подтверждение
					</div>
				</div>
				<div class="cart-tabs-content">
					<div class="cart-tabs-item active">
						<div class="cart-not-logged">
							<div class="cart-custom-row clearfix">
								<div class="cart-custom-col">
									<div class="custom-header">
										Авторизация
									</div>
									<div class="custom-form">
										<form method="post" action="">
											<div class="custom-form-row">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="custom-field">
															<input type="text" name="login" placeholder="Логин">
														</div>
													</div>
												</div>
											</div>
											<div class="custom-form-row">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="custom-field">
															<input type="password" name="pass" placeholder="Пароль">
														</div>
													</div>
												</div>
											</div>
											<div class="custom-form-row actions-row">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<button type="submit" class="custom-btn">Войти</button>
													</div>
												</div>
											</div>
											<div class="custom-form-row">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<a href="javascript:void(0)" class="custom-link">
															Забыли пароль?
														</a>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="cart-custom-col">
									<div class="custom-header">
										Регистрация нового пользователя
									</div>
									<div class="custom-form">
										<form method="post" action="">
											<div class="custom-form-row">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="custom-field">
															<input type="text" name="name" placeholder="Имя">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="custom-field">
															<input type="text" name="sname" placeholder="Фамилия">
														</div>
													</div>
												</div>
											</div>
											<div class="custom-form-row">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="custom-field">
															<input type="text" name="login" placeholder="Логин">
														</div>
													</div>
												</div>
											</div>
											<div class="custom-form-row">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="custom-field">
															<input type="password" name="pass" placeholder="Пароль">
														</div>
													</div>
												</div>
											</div>
											<div class="custom-form-row">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="custom-field">
															<input type="password" name="pass2" placeholder="Повторите пароль">
														</div>
													</div>
												</div>
											</div>
											<div class="custom-form-row">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="custom-field">
															<div class="checkbox-wrap">
																<label>
																	<input type="checkbox" checked name="agree">
																	<span class="checkbox-span">Я согласен с <a href="javascript:void(0)">правилами сайта</a></span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="custom-form-row actions-row">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<button type="submit" class="custom-btn">Продолжить</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="cart-tabs-item">
						<div class="cart-main">
							<div class="cart-main-header">
								<div class="cart-main-header-title">
									Выберите интернет-магазин*
								</div>
								<div class="cart-main-header-hint">
									*Для оплаты покупок мы предлагаем вам несколько сайтов-партнеров
								</div>
								<div class="cart-main-header-row">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="fake-select">
												<span><img src="/sites/all/themes/bp_pink/images/ozon-img-logo.png"></span>
												<ul>
													<li>
														<img src="/sites/all/themes/bp_pink/images/ozon-img-logo.png">
													</li>
													<li>
														<img src="/sites/all/themes/bp_pink/images/ali-img-logo.png">
													</li>
												</ul>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="custom-field city-field">
												<input type="text" name="city" placeholder="Ваш город" value="Москва">
											</div>
										</div>
									</div>
								</div>
								<div class="card-main-links">
									<ul>
										<li>
											<a href="javascript:void(0)">Как сделать заказ</a>
										</li>
										<li>
											<a href="javascript:void(0)">Доставка</a>
										</li>
										<li>
											<a href="javascript:void(0)">Оплата</a>
										</li>
										<li>
											<a href="javascript:void(0)">Помощь</a>
										</li>
										<li>
											<a href="javascript:void(0)">Обратная связь</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="cart-main-table">
								<table>
									<thead>
										<tr>
											<th>
												Товары
											</th>
											<th>
												Объем
											</th>
											<th>
												Количество
											</th>
											<th>
												Сумма
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td data-title="Товар">
												<div class="cart-product-item">
													<a href="javascript:void(0)" class="cart-product-item-img">
														<img src="/sites/all/themes/bp_pink/images/d-1.png">
													</a>
													<div class="cart-product-item-content">
														<div class="cart-product-item-title">
															<a href="javascript:void(0)">
																Двойной крем для лица
																нормальный и комбинированной
																кожи
															</a>
														</div>
														<div class="actions-wrap">
															<a href="javascript:void(0)" class="product-view-link">
																<i class="icon-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</td>
											<td data-title="Объем">
												<span class="amount-val">100 ml</span>
											</td>
											<td data-title="Количество">
												<div class="count-wrap">
													<a href="javascript:void(0)" class="count-nav count-nav-minus">
														<i class="icon-arrow-left-thick"></i>
													</a>
													<div class="count-field">
														<div class="custom-field">
															<input type="text" name="amount-field" readonly value="1">
														</div>
													</div>
													<a href="javascript:void(0)" class="count-nav count-nav-plus">
														<i class="icon-arrow-right-thick"></i>
													</a>
													<div class="count-hint">
														в наличии
													</div>
												</div>
											</td>
											<td data-title="Сумма">
												<div class="cart-form-price">
													1000, <span>00</span> <i class="icon-rubble"></i>
												</div>
												<a href="javascript:void(0)" class="remove-from-cart"></a>
											</td>
										</tr>
										<tr>
											<td data-title="Товар">
												<div class="cart-product-item">
													<a href="javascript:void(0)" class="cart-product-item-img">
														<img src="/sites/all/themes/bp_pink/images/d-1.png">
													</a>
													<div class="cart-product-item-content">
														<div class="cart-product-item-title">
															<a href="javascript:void(0)">
																Двойной крем для лица
																нормальный и комбинированной
																кожи
															</a>
														</div>
														<div class="actions-wrap">
															<a href="javascript:void(0)" class="product-view-link">
																<i class="icon-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</td>
											<td data-title="Объем">
												<span class="amount-val">100 ml</span>
											</td>
											<td data-title="Количество">
												<div class="count-wrap">
													<a href="javascript:void(0)" class="count-nav count-nav-minus">
														<i class="icon-arrow-left-thick"></i>
													</a>
													<div class="count-field">
														<div class="custom-field">
															<input type="text" name="amount-field" readonly value="1">
														</div>
													</div>
													<a href="javascript:void(0)" class="count-nav count-nav-plus">
														<i class="icon-arrow-right-thick"></i>
													</a>
													<div class="count-hint count-hint-red">
														нет в наличии
													</div>
												</div>
											</td>
											<td data-title="Сумма">
												<div class="cart-form-price">
													1000, <span>00</span> <i class="icon-rubble"></i>
												</div>
												<a href="javascript:void(0)" class="remove-from-cart"></a>
											</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td>
												<div class="amount-title">
													Товаров 2 шт
												</div>
											</td>
											<td>
												<div class="cart-form-price cart-form-price-result">
													5000, <span>00</span> <i class="icon-rubble"></i>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="actions-wrap">
								<button type="submit" class="custom-btn">Оформить заказ</button>
							</div>
						</div>
						<div class="other-products">
							<div class="custom-title">
								Вам может понравиться
							</div>
							<div class="other-slider-wrap">
								<div class="custom-nav prev-nav">
									<i class="icon-arrow-left"></i>
								</div>
								<div class="custom-nav next-nav">
									<i class="icon-arrow-right"></i>
								</div>
								<div class="other-slider">
									<div class="other-item">
										<div class="other-item-img">
											<a href="javascript:void(0)">
												<img src="/sites/all/themes/bp_pink/images/d-1.png">
											</a>
										</div>
										<div class="other-item-title">
											<a href="javascript:void(0)">
												Крем-гель
												для умывания
											</a>
										</div>
										<div class="other-item-amount">
											100 ml
										</div>
									</div>
									<div class="other-item">
										<div class="other-item-img">
											<a href="javascript:void(0)">
												<img src="/sites/all/themes/bp_pink/images/d-1.png">
											</a>
										</div>
										<div class="other-item-title">
											<a href="javascript:void(0)">
												Крем-гель
												для умывания
											</a>
										</div>
										<div class="other-item-amount">
											100 ml
										</div>
									</div>
									<div class="other-item">
										<div class="other-item-img">
											<a href="javascript:void(0)">
												<img src="/sites/all/themes/bp_pink/images/d-1.png">
											</a>
										</div>
										<div class="other-item-title">
											<a href="javascript:void(0)">
												Крем-гель
												для умывания
											</a>
										</div>
										<div class="other-item-amount">
											100 ml
										</div>
									</div>
									<div class="other-item">
										<div class="other-item-img">
											<a href="javascript:void(0)">
												<img src="/sites/all/themes/bp_pink/images/d-1.png">
											</a>
										</div>
										<div class="other-item-title">
											<a href="javascript:void(0)">
												Крем-гель
												для умывания
											</a>
										</div>
										<div class="other-item-amount">
											100 ml
										</div>
									</div>
									<div class="other-item">
										<div class="other-item-img">
											<a href="javascript:void(0)">
												<img src="/sites/all/themes/bp_pink/images/d-1.png">
											</a>
										</div>
										<div class="other-item-title">
											<a href="javascript:void(0)">
												Крем-гель
												для умывания
											</a>
										</div>
										<div class="other-item-amount">
											100 ml
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="cart-tabs-item">
						<div class="cart-form">
							<form method="post">
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cart-form-title">
												Город доставки
											</div>
										</div>
										<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
											<div class="custom-field city-field">
												<input type="text" name="city" placeholder="Ваш город" value="Москва">
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

										</div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cart-form-title">
												Адрес доставки
											</div>
										</div>
										<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
											<div class="cart-address-section">
												<div class="cart-address-item">
													<div class="radio-wrap">
														<label>
															<input type="radio" checked name="delivery_address">
															<span class="radio-span">123022, ул. Сергея Макеева, д.13, кв. 80 </span>
														</label>
													</div>
												</div>
												<div class="cart-address-item new-address-item">
													<div class="radio-wrap">
														<label>
															<input type="radio" name="delivery_address">
															<span class="radio-span">Новый адрес</span>
														</label>
													</div>
													<div class="delivery-form">
														<div class="custom-form-row">
															<div class="row">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column">
																	<div class="custom-field">
																		<div class="custom-form-label">Почтовый индекс</div>
																		<input type="text" name="index">
																	</div>
																</div>
															</div>
														</div>
														<div class="custom-form-row">
															<div class="row">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column">
																	<div class="custom-field">
																		<div class="custom-form-label">Улица</div>
																		<input type="text" name="street">
																	</div>
																</div>
															</div>
														</div>
														<div class="custom-form-row">
															<div class="row">
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 column">
																	<div class="custom-field">
																		<div class="custom-form-label">Дом</div>
																		<input type="text" name="numb">
																	</div>
																</div>
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 column">
																	<div class="custom-field">
																		<div class="custom-form-label">Квартира/Офис</div>
																		<input type="text" name="flat">
																	</div>
																</div>
															</div>
														</div>
														<div class="custom-form-row">
															<div class="row">
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 column">
																	<div class="custom-field">
																		<div class="custom-form-label">Подъезд</div>
																		<input type="text" name="section">
																	</div>
																</div>
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 column">
																	<div class="custom-field">
																		<div class="custom-form-label">Этаж</div>
																		<input type="text" name="floor">
																	</div>
																</div>
															</div>
														</div>
														<div class="custom-form-row actions-row">
															<div class="row">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column">
																	<button type="submit" class="custom-btn">Сохранить</button>
																</div>
															</div>
														</div>
													</div>
												</div>

											</div>
											<div class="cart-address-section" style="display: none;">
												<div class="delivery-form">
													<div class="custom-form-row">
														<div class="row">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column">
																<div class="custom-field">
																	<div class="custom-form-label">Почтовый индекс</div>
																	<input type="text" name="index">
																</div>
															</div>
														</div>
													</div>
													<div class="custom-form-row">
														<div class="row">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column">
																<div class="custom-field">
																	<div class="custom-form-label">Улица</div>
																	<input type="text" name="street">
																</div>
															</div>
														</div>
													</div>
													<div class="custom-form-row">
														<div class="row">
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 column">
																<div class="custom-field">
																	<div class="custom-form-label">Дом</div>
																	<input type="text" name="numb">
																</div>
															</div>
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 column">
																<div class="custom-field">
																	<div class="custom-form-label">Квартира/Офис</div>
																	<input type="text" name="flat">
																</div>
															</div>
														</div>
													</div>
													<div class="custom-form-row">
														<div class="row">
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 column">
																<div class="custom-field">
																	<div class="custom-form-label">Подъезд</div>
																	<input type="text" name="section">
																</div>
															</div>
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 column">
																<div class="custom-field">
																	<div class="custom-form-label">Этаж</div>
																	<input type="text" name="floor">
																</div>
															</div>
														</div>
													</div>
													<div class="custom-form-row actions-row">
														<div class="row">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column">
																<button type="submit" class="custom-btn">Сохранить</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right text-center-xs">
											<a href="javascript:void(0)" class="border-btn news-address-check">
												<i class="plus-icon"></i> Новый адрес
											</a>
										</div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center-xs">
											<div class="cart-form-title">
												Варианты доставки
											</div>
											<a href="#" class="custom-link" data-toggle="modal" data-target="#shipping-rates-modal">
												посмотреть тарифы
											</a>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
											<div class="radio-wrap">
												<label>
													<input type="radio" name="delivery">
													<span class="radio-span">Курьерская доставка</span>
												</label>
											</div>
											<div class="radio-wrap">
												<label>
													<input type="radio" name="delivery">
													<span class="radio-span">Почта России, оплата при получении</span>
												</label>
											</div>
											<div class="radio-wrap">
												<label>
													<input type="radio" name="delivery">
													<span class="radio-span">Почта России, предоплата</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cart-form-title">
												Самовывоз
											</div>
										</div>
										<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="delivery_own">
													<span class="radio-span">Пункт выдачи</span>
												</label>
											</div>
											<div class="select-wrap">
												<select name="del_address">
													<option>г. Москва, ул. Арбат, д.10, 3 этаж. Пункт выдачи № 232</option>
													<option>г. Москва, ул. Строителей, д.20, 1 этаж. Пункт выдачи № 132</option>
													<option>г. Москва, ул. Кировы, д.20, 2 этаж. Пункт выдачи № 122</option>
												</select>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
											<div class="cart-form-price">
												99 <i class="icon-rubble"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
										<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"></div>
										<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
											<button type="submit" class="custom-btn">Продолжить</button>
										</div>
									</div>
								</div>
							</form>

						</div>
					</div>
					<div class="cart-tabs-item">
						<div class="cart-form">
							<form method="post">
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cart-form-title">
												Карты оплаты
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="pay_type">
													<span class="radio-span">Банковской картой онлайн</span>
												</label>
											</div>
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="pay_type">
													<span class="radio-span">Карта Сбербанка и бонусные баллы «спасибо»</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cart-form-title">
												Наличные
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="pay_type">
													<span class="radio-span">Наличными или банковской картой при получении</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cart-form-title">
												Электронный деньги
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="pay_type">
													<span class="radio-span">Сбербанк онлайн</span>
												</label>
											</div>
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="pay_type">
													<span class="radio-span">PayPal</span>
												</label>
											</div>
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="pay_type">
													<span class="radio-span">Яндекс Деньги</span>
												</label>
											</div>
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="pay_type">
													<span class="radio-span">Web Money</span>
												</label>
											</div>
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="pay_type">
													<span class="radio-span">Qiwi Wallet</span>
												</label>
											</div>
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="pay_type">
													<span class="radio-span">Бонусы Коллекция ВТБ 24</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cart-form-title">
												Переводы
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
											<div class="radio-wrap">
												<label>
													<input type="radio" checked name="pay_type">
													<span class="radio-span">Банковский перевод</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<button type="submit" class="custom-btn">Выбрать этот способ</button>
										</div>
									</div>
								</div>
							</form>

						</div>
					</div>
					<div class="cart-tabs-item">
						<div class="cart-form">
							<form method="post">
								<div class="cart-form-section addressee-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cart-form-title">
												Получатель
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
											<div class="custom-field">
												<input type="text" name="del_person" placeholder="Введите имя получателя" value="Чернова Алиса Евгеньевна">
											</div>
										</div>
									</div>
								</div>
								<div class="cart-form-section addressee-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cart-form-title">
												Контактный телефон
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
											<div class="addressee-phone-wrap">
												<div class="custom-field">
													<input type="text" name="del_person_phone" placeholder="" value="+7 (919) 365 14 91">
												</div>
												<div class="custom-hint">
													Для SMS  уведолмлений о ходе выполнения заказа
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center-xs">
											<div class="cart-form-title">
												Способ доставки
											</div>
											<a href="javascript:void(0)" class="custom-link">
												изменить
											</a>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center-xs">
											<div class="delivery-info">
												<div class="delivery-info-label">
													Курьерская
												</div>
												<div class="delivery-info-value">
													ул. Заречная, д. 31, кв. 98, под. 3, эт. 11
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center-xs">
											<div class="cart-form-price">
												99 <i class="icon-rubble"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center-xs">
											<div class="cart-form-title">
												Способ оплаты
											</div>
											<a href="javascript:void(0)" class="custom-link">
												изменить
											</a>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center-xs">
											<div class="delivery-info">
												<div class="delivery-info-value">
													Наличными или банковской картой при получении
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center-xs">
											<div class="cart-form-title">
												Ваш заказ
											</div>
											<a href="javascript:void(0)" class="custom-link">
												изменить
											</a>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center-xs">
											<div class="delivery-info">
												<div class="delivery-info-value">
													1 товар
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
									</div>
								</div>
								<div class="cart-form-section">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center-xs">
											<div class="cart-form-title">
												Всего:
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center-xs">
											<div class="delivery-info">
												<div class="delivery-info-value">
													1 товар
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center-xs">
											<div class="cart-form-price cart-form-price-result">
												4000,<span>00</span> <i class="icon-rubble"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="cart-form-section result-form-section">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center-xs">
											<div class="checkbox-wrap">
												<label>
													<input type="checkbox" checked name="news">
													<span class="checkbox-span">Я согласен получать рассылку</span>
												</label>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right text-center-xs">
											<button type="submit" class="custom-btn">Оформить заказ</button>
										</div>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</main>
<?php include_once('inc/bp_footer.tpl.php'); ?>
