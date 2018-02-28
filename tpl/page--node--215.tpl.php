<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<?php include_once('inc/bp_header.tpl.php'); ?>
<main>
	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

		<?php print $user_picture; ?>

		<?php print render($title_prefix); ?>
		<?php if (!$page): ?>
			<h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
		<?php endif; ?>
		<?php print render($title_suffix); ?>

		<?php if ($display_submitted): ?>
			<div class="submitted">
				<?php print $submitted; ?>
			</div>
		<?php endif; ?>

		<div class="content"<?php print $content_attributes; ?>>
			<?php
			// We hide the comments and links now so that we can render them later.
			hide($content['comments']);
			hide($content['links']);
			print render($content);
			?>
			<div class="button-back-wrapper"><a href="/"><span class="icon-big icon-cross-slim button-back rounded-circle shadow-normal"></span></a></div>
			<div class="button-up-wrapper hidden-md-down"><a href="/"><span class="icon-big icon-arrow-up-thick button-up rounded-circle shadow-normal"></span></a></div>

			<div class="container section-product mt-2 mb-4">
				<div class="row">
					<div class="col-12">
						<ul class="breadcrumbs inline-menu black text-small regular">
							<li><a href="/">Главная</a></li>
							<li><a href="/уход-за-лицом">Уход за лицом</a></li>
							<li><a href="/уход-за-лицом/деликатное-очищение">Деликатное очищение</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<div class="row product-view">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-3 hidden-md-down">
										<div class="product-gallery-gutter-2">
											<div class="product-gallery-thumb" data-slide="0"><img src="http://blackpearl.e-produce.ru/sites/default/files/styles/product_normal/public/products/prod2.png?itok=EUaCDeXT" class="img-fluid" alt="Черный Жемчуг БИО-масло средство для умывания" title="Черный Жемчуг БИО-масло средство для умывания"></div>
											<div class="product-gallery-thumb" data-slide="1"><img src="http://blackpearl.e-produce.ru/sites/default/files/styles/product_normal/public/products/bio-maslo2.png?itok=lHwwIlih" class="img-fluid" alt="Черный Жемчуг БИО-масло средство для умывания" title="Черный Жемчуг БИО-масло средство для умывания"></div>
											<div class="product-gallery-thumb" data-slide="2"><img src="http://blackpearl.e-produce.ru/sites/default/files/styles/product_normal/public/products/bio-maslo3.png?itok=j9RQ5Y9K" class="img-fluid" alt="Черный Жемчуг БИО-масло средство для умывания" title="Черный Жемчуг БИО-масло средство для умывания"></div>
											<div class="product-gallery-thumb" data-slide="3"><img src="http://blackpearl.e-produce.ru/sites/default/files/styles/product_normal/public/products/bio-maslo4.png?itok=zWmMCP2j" class="img-fluid" alt="Черный Жемчуг БИО-масло средство для умывания" title="Черный Жемчуг БИО-масло средство для умывания"></div>
										</div>
									</div>
									<div class="col-lg-7">
										<div class="product-gallery">
											<div class="product-gallery-slide" data-slide="0">
												<img class="center-block img-fluid" src="http://blackpearl.e-produce.ru/sites/default/files/styles/product_normal/public/products/prod2.png?itok=EUaCDeXT" alt="Черный Жемчуг БИО-масло средство для умывания" title="Черный Жемчуг БИО-масло средство для умывания">
											</div>
											<div class="product-gallery-slide" data-slide="1">
												<img class="center-block img-fluid" src="http://blackpearl.e-produce.ru/sites/default/files/styles/product_normal/public/products/bio-maslo2.png?itok=lHwwIlih" alt="Черный Жемчуг БИО-масло средство для умывания" title="Черный Жемчуг БИО-масло средство для умывания">
											</div>
											<div class="product-gallery-slide" data-slide="2">
												<img class="center-block img-fluid" src="http://blackpearl.e-produce.ru/sites/default/files/styles/product_normal/public/products/bio-maslo3.png?itok=j9RQ5Y9K" alt="Черный Жемчуг БИО-масло средство для умывания" title="Черный Жемчуг БИО-масло средство для умывания">
											</div>
											<div class="product-gallery-slide" data-slide="3">
												<img class="center-block img-fluid" src="http://blackpearl.e-produce.ru/sites/default/files/styles/product_normal/public/products/bio-maslo4.png?itok=zWmMCP2j" alt="Черный Жемчуг БИО-масло средство для умывания" title="Черный Жемчуг БИО-масло средство для умывания">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<?php if ($bp_field_new): ?>
									<div class="btn-wrapper text-center text-lg-left mb-1"><span class="bp-card-label title-normal light bg-grey-trans" tabindex="0">Новинка</span></div>
								<?php endif; ?>
								<h1 class="text-center text-lg-left title-big thin mb-1">Черный Жемчуг БИО-масло средство для умывания</h1>
								<div class="text-medium pink bold mt-2">100 ml</div>
								<table class="product-specs text-small mt-2">
									<tr>
										<td class="velvet-light detail-name">Программа</td>
										<td class="detail-desc regular">Деликатное очищение</td>
									</tr>
									<tr>
										<td class="velvet-light detail-name">Действие</td>
										<td class="detail-desc regular">Выравнивание цвета лица, Очищение, Снятие макияжа, Увлажнение, Уход</td>
									</tr>
									<tr>
										<td class="velvet-light detail-name">Проблемы кожи</td>
										<td class="detail-desc regular">Загрязнение кожи в течение дня, сухость, Загрязнение кожи в течение дня, сухость, </td>
									</tr>
									<tr>
										<td class="velvet-light detail-name">Назначение</td>
										<td class="detail-desc regular">Очищение, снятие макияжа</td>
									</tr>
									<tr>
										<td class="velvet-light detail-name">Зона применения</td>
										<td class="detail-desc regular">Уход за лицом</td>
									</tr>
									<tr>
										<td class="velvet-light detail-name">Тип средства</td>
										<td class="detail-desc regular">БИО-масло для умывания</td>
									</tr>
								</table>
								<div class="hidden-lg-up mobile-product-img active mt-1">
									<img class="center-block img-fluid" src="<?php print $bp_field_image[0]['src']; ?>" alt="<?php print $bp_field_image[0]['alt']; ?>" title="<?php print $bp_field_image[0]['title']; ?>">
								</div>
								<div class="hidden-lg-up text-center product-controls mt-1">
									<a href="#" class="pink" data-endpoint="compare" data-product="" data-toggle="shop"><span class="icon-big bp-icon-compare"></span></a>
									<a href="#" class="pink" data-endpoint="favorite" data-product="" data-toggle="shop"><span class="icon-big bp-icon-favorite"></span></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-6 product-page-controls product-controls text-center">
								<div class="row">
									<div class="col-10 offset-lg-2">
										<a href="#" class="hidden-md-down pink" data-endpoint="compare" data-product="71" data-toggle="shop"><span class="icon-big bp-icon-compare balance"></span>Сравнить</a>
										<a href="#" class="hidden-md-down pink" data-endpoint="favorite" data-product="71" data-toggle="shop"><span class="icon-big bp-icon-favorite heart"></span>В избранное</a>
									</div>
								</div>
							</div>
							<div class="col-xl-6 product-rating">
								<a href="#" class="btn btn-big bg-pink ml-0" data-endpoint="cart" data-product="71" data-toggle="shop">В корзину</a>
								<span class="text-nowrap">
									<span class="pink mx-1">Рейтинг</span>
									<span class="rating-preview">
										<span class="icon-normal star icon-star yellow"></span>
										<span class="icon-normal star icon-star yellow"></span>
										<span class="icon-normal star icon-star yellow"></span>
										<span class="icon-normal star icon-star yellow"></span>
										<span class="icon-normal star icon-star yellow"></span>
									</span>
								</span>
								<a href="#" class="btn btn-oval bg-pink-light text-small trigger-rating">Оценить</a>
								<div id="product-rating-popover">
									<div id="product-rating-popover-inner" class="text-center shadow-normal">
										<!--<span class="icon-huge icon-star-fill pink"></span>-->
										<div><?php print render($content['field_rating']); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bg-grey-light">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 col-force-center">
							<div class="horizontal-tabs-wrapper pb-3">
								<div class="horizontal-tabs-links text-center py-2">
									<ul class="horizontal-tabs">
										<li class="horizontal-tab active" data-tab="1"><a href="#">Описание</a></li>
										<li class="horizontal-tab" data-tab="2"><a href="#">Состав</a></li>
										<li class="horizontal-tab" data-tab="3"><a href="#">Эффекты</a></li>
										<li class="horizontal-tab trigger-slick-components" data-tab="4"><a href="#">Компоненты</a></li>
										<li class="horizontal-tab" data-tab="5"><a href="#">Правила ухода</a></li>
										<li class="horizontal-tab trigger-slick-reviews" data-tab="6"><a href="#">Отзывы</a></li>
									</ul>
								</div>
								<div class="horizontal-tabs-content text-center mt-1">
									<div class="horizontal-tab-content text-normal active" data-tab="1">
										<h2>Био-масло средство для умывания Черный Жемчуг Драгоценные Масла</h2>
										<div class="row">
											<div class="col-md-8 col-force-center">
												Мягкая моющая основа бережно очищает кожу, эффективно удаляет даже водостойкий макияж. Легкая  масляная текстура не повреждает защитный барьерный слой кожи, защищает кожу от сухости и стянутости. 7 БИО-активных натуральных масел (винограда, оливы, миндаля, авокадо, жожоба, арганы, макадамии)
											</div>
										</div>
									</div>
									<div class="horizontal-tab-content text-normal" data-tab="2">
										<h2 class="thin">Состав продукта</h2>
										<div class="row text-left">
											<div class="col-md-3 offset-md-3">
												<ul class="consist-list">
													<li>BIO-гранулы жожоба</li>
													<li>Масло авокадо</li>
													<li>Масло арганы</li>
													<li>Масло виноградных косточек</li>
												</ul>
											</div><div class="col-md-3">
												<ul class="consist-list">
													<li>Масло макадемии</li>
													<li>Масло миндаля</li>
													<li>Масло оливы</li>
													<li>Про-витамин B5</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="horizontal-tab-content text-normal" data-tab="3">
										<h2 class="thin">Видимый результат</h2>
										<div class="row text-left">
											<div class="col-md-4 offset-md-2">
												<ul class="consist-list">
													<li>Очищение, увлажнение</li>
													<li>Очищение без пересушивания</li>
													<li>Мягкая тающая текстура</li>
													<li>Ощущение заботы и ухода о коже</li>
												</ul>
											</div><div class="col-md-4">
												<ul class="consist-list">
													<li>Эффективное удаление макияжа</li>
													<li>Не повреждает защитный слой кожи</li>
													<li>Способствует сохранению естественного баланса увлажнения</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="horizontal-tab-content" data-tab="4">
										<div id="bp-components-carousel">
											<div class="component-item text-left">
												<div class="title-small thin px-1">BIO-гранулы жожоба</div>
												<div class="mt-2 px-1">Микрогранулы масла жожоба. Масло жожоба имеет хорошее сродство с кожей, поэтому оно способно достаточно глубоко проникать в кожу. Обладает прекрасными увлажняющими и защитными свойствами.</div>
											</div>
											<div class="component-item text-left">
												<div class="title-small thin px-1">Масло авокадо</div>
												<div class="mt-2 px-1">Масло из плодов авокадо. Масло имеет темный цвет, приятных аромат и вкус, напоминающий ореховое масло. В масле содержатся витамины A, C, D, E, K, PP, группы B, а также микроэлементы. </div>
											</div>
											<div class="component-item text-left">
												<div class="title-small thin px-1">Масло арганы</div>
												<div class="mt-2 px-1">Масло, получаемое холодным прессованием из косточек плодов дерева аргании. Имеет золотисто-желтый цвет и ореховый запах, с оттенком специй.</div>
											</div>
										</div>
									</div>
									<div class="horizontal-tab-content text-normal" data-tab="5">
										<h2 class="thin">Очищать кожу необходимо 2 раза в день - утром и вечером</h2>
										<div class="row">
											<div class="col-md-8 col-force-center">
												Каждый день наша кожа впитывает токсины, которые скапливаются в порах и приводят 
												к ускоренному старению кожи. Очищение кожи 2 раза в день помогает освободить кожу 
												от токсинов, восстановить нормальную работу клеток и подготовить кожу к усвоению 
												полезных веществ из питательного крема.
											</div>
										</div>
									</div>
									<div class="horizontal-tab-content" data-tab="6">
										<div class="text-center title-small thin">Написать отзыв</div>
										<div class="row mt-2">
											<form action="#" method="POST" class="col-md-6 col-force-center">
												<div class="custom-form-row custom-field">
													<input type="text" name="name" placeholder="Ваше имя">
												</div>
												<div class="custom-form-row custom-field">
													<textarea name="review" placeholder="Ваш отзыв" rows="4"></textarea>
												</div>
											</form>
										</div>
										<div class="row mt-3">
											<div class="reviews-list-2 col-12">
												<div class="title title-normal velvet bold"><span class="bg-grey-light">Всего 23 отзыва</span></div>
												<div id="bp-reviews-carousel" class="mt-3">
													<div class="review-item px-1">
														<div class="velvet text-small regular">27.04.2017</div>
														<div class="velvet text-medium">Инна Ионова</div>
														<div class="pt-1">Купила всю серию деликатного очищения: утром пенка, вечером демакияж гидрофильным маслом, дважды в неделю пилинг. Очень довольна. Кожа гладкая, нежная, поры очищены. Пенка деликатная, мягкая, ароматная.</div>
													</div>
													<div class="review-item px-1">
														<div class="velvet text-small regular">27.04.2017</div>
														<div class="velvet text-medium">Инна Ионова</div>
														<div class="pt-1">Купила всю серию деликатного очищения: утром пенка, вечером демакияж гидрофильным маслом, дважды в неделю пилинг. Очень довольна. Кожа гладкая, нежная, поры очищены. Пенка деликатная, мягкая, ароматная.</div>
													</div>
													<div class="review-item px-1">
														<div class="velvet text-small regular">27.04.2017</div>
														<div class="velvet text-medium">Инна Ионова</div>
														<div class="pt-1">Купила всю серию деликатного очищения: утром пенка, вечером демакияж гидрофильным маслом, дважды в неделю пилинг. Очень довольна. Кожа гладкая, нежная, поры очищены. Пенка деликатная, мягкая, ароматная.</div>
													</div>
													<div class="review-item px-1">
														<div class="velvet text-small regular">27.04.2017</div>
														<div class="velvet text-medium">Инна Ионова</div>
														<div class="pt-1">Купила всю серию деликатного очищения: утром пенка, вечером демакияж гидрофильным маслом, дважды в неделю пилинг. Очень довольна. Кожа гладкая, нежная, поры очищены. Пенка деликатная, мягкая, ароматная.</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mt-3">
									<div class="text-center velvet-light">Поделиться в соц. сетях</div>
									<ul class="horizontal-tabs-social text-center p-0 m-0 mt-2">
										<li><a href="#"><span class="icon-social-facebook bg-velvet-light"></span></a></li>
										<li><a href="#"><span class="icon-social-google bg-velvet-light"></span></a></li>
										<li><a href="#"><span class="icon-social-vk bg-velvet-light"></span></a></li>
										<li><a href="#"><span class="icon-social-ok bg-velvet-light"></span></a></li>
										<li><a href="#"><span class="icon-social-twitter bg-velvet-light"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container other-products experts my-3">
				<div class="text-center title-big thin mb-3">Советы экспертов</div>
				<div class="other-slider-wrap">
					<div class="other-products-slider text-center">
						<div class="other-products-item">
							<div class="other-products-item-img">
								<a href="javascript:void(0)">
									<img src="/sites/all/themes/bp_pink/images/d-1.png">
								</a>
							</div>
							<div class="mt-2">
								<a href="javascript:void(0)" class="black">Крем-гель для умывания</a>
							</div>
							<div class="bold pink mt-1">100 ml</div>
							<div class="pink mt-1">Уменьшение покраснений</div>
						</div>
						<div class="other-products-item">
							<div class="other-products-item-img">
								<a href="javascript:void(0)">
									<img src="/sites/all/themes/bp_pink/images/d-1.png">
								</a>
							</div>
							<div class="mt-2">
								<a href="javascript:void(0)" class="black">Крем-гель для умывания</a>
							</div>
							<div class="bold pink mt-1">100 ml</div>
							<div class="pink mt-1">Уменьшение покраснений</div>
						</div>
						<div class="other-products-item">
							<div class="other-products-item-img">
								<a href="javascript:void(0)">
									<img src="/sites/all/themes/bp_pink/images/d-1.png">
								</a>
							</div>
							<div class="mt-2">
								<a href="javascript:void(0)" class="black">Крем-гель для умывания</a>
							</div>
							<div class="bold pink mt-1">100 ml</div>
							<div class="pink mt-1">Уменьшение покраснений</div>
						</div>
						<div class="other-products-item">
							<div class="other-products-item-img">
								<a href="javascript:void(0)">
									<img src="/sites/all/themes/bp_pink/images/d-1.png">
								</a>
							</div>
							<div class="mt-2">
								<a href="javascript:void(0)" class="black">Крем-гель для умывания</a>
							</div>
							<div class="bold pink mt-1">100 ml</div>
							<div class="pink mt-1">Уменьшение покраснений</div>
						</div>
						<div class="other-products-item">
							<div class="other-products-item-img">
								<a href="javascript:void(0)">
									<img src="/sites/all/themes/bp_pink/images/d-1.png">
								</a>
							</div>
							<div class="mt-2">
								<a href="javascript:void(0)" class="black">Крем-гель для умывания</a>
							</div>
							<div class="bold pink mt-1">100 ml</div>
							<div class="pink mt-1">Уменьшение покраснений</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php print render($content['links']); ?>

		<?php print render($content['comments']); ?>

	</div>
	<div class="bp-footer-vessel"></div>
</main>
<?php include_once('inc/bp_footer_grey.tpl.php'); ?>
