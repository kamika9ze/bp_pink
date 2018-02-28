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
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="button-back-wrapper"><a href="javascript:history.back();"><span class="icon-big icon-cross-slim button-back rounded-circle"></span></a></div>
    <div class="section-product">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-wrapper text-small regular mb-2">
                    <?php print $bp_breadcrumbs; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-2 w-100">
                <div class="row product-view">
                    <div class="col-12 hidden-md-up">
                      <h2 class="text-center text-lg-left title-big thin mb-2"><?php print $title; ?></h2>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-2 col-lg-2">
                                <div class="product-gallery-gutter">
                                    <?php for($i = 0; $i < count($bp_field_image); $i++): ?>
                                      <div class="product-gallery-thumb" data-slide="<?php print $i; ?>"><img src="<?php print $bp_field_image[$i]['src']; ?>" class="img-fluid" alt="<?php print $bp_field_image[$i]['alt']; ?>" title="<?php print $bp_field_image[$i]['title']; ?>"></div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="col-10 col-lg-10">
                                <?php if ($bp_field_new): ?>
                                  <div class="btn-wrapper text-center text-lg-left mb-1 hidden-md-down"><span class="bp-card-label title-normal light bg-grey-trans" tabindex="0">Новинка</span></div>
                                <?php endif; ?>  
								<?php if ($bp_field_discontinued): ?>
                                  <div class="btn-wrapper text-center text-lg-left mb-1 hidden-md-down"><span class="bp-card-label title-normal light bg-grey-trans label-removed" tabindex="0">Снято с производства</span></div>
                                <?php endif; ?>                                
                                <div class="product-gallery">
                                    <?php for($j = 0; $j < count($bp_field_image); $j++): ?>
                                      <?php //print_R($bp_field_image); ?>
                                      <div class="product-gallery-slide" data-slide="<?php print $j; ?>">
                                        <a href = "<?php print $bp_field_image[$j]['original']; ?>" class="zoom-<?php print $j; ?>" style="cursor: crosshair;">
                                          <img class="center-block img-fluid" src="<?php print $bp_field_image[$j]['src']; ?>" alt="<?php print $bp_field_image[$j]['alt']; ?>" title="<?php print $bp_field_image[$j]['title']; ?>">
                                        </a>
                                      </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="text-center text-lg-left title-big thin mb-2 hidden-md-down"><?php print $title; ?></h1>

                        <div class="hidden-lg-up text-center product-controls mt-1">
                            <a href="#" class="pink" data-endpoint="compare" data-product="<?php print $node->nid; ?>" data-toggle="shop"><span class="icon-big bp-icon-compare"></span></a>
                            <a href="#" class="pink" data-endpoint="favorite" data-product="<?php print $node->nid; ?>" data-toggle="shop"><span class="icon-big bp-icon-favorite"></span></a>
                        </div>
                        <span class="text text-big bold pink regular volume"><?php print $bp_field_volume; ?></span>
                        <table class="product-specs text-small mt-1">
							<?php foreach($bp_product_details as $detail_key => $detail_value): ?>
                                <?php if(!empty($detail_value)) :?>
                                <tr>
                                    <td class="text-left detail-name bold"><span class="regular"><?php print $detail_key; ?></span></td>
                                    <td class="regular detail-desc"><?php print $detail_value; ?></td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                
                <div class="row product-page-controls product-controls text-center mt-2">
                    <div class="col-xl-5 col-md-5">
                      <a href="#" class="hidden-md-down pink" data-endpoint="compare" data-product="<?php print $node->nid; ?>" data-toggle="shop"><span class="icon-big bp-icon-compare balance"></span>Сравнить</a>
                      <a href="#" class="hidden-md-down pink" data-endpoint="favorite" data-product="<?php print $node->nid; ?>" data-toggle="shop"><span class="icon-big bp-icon-favorite heart"></span>В избранное</a>
                        <div class="button-wrapper text-center mt-1 row">
                            <a href="/node/264" class="btn btn-big bg-pink">Магазины рядом</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-7">
                      <div class="float-right product-rating">
                          <span class="title pink mr-1">Рейтинг</span>
                          <?php //print render($content['field_rating']); $_SESSION['fivestar_widget_my'] = $content['field_rating']; ?>  
						  <?php $fivestar_widget = bp_fivestar_widget_get_callback($node->nid); $_SESSION['fivestar_widget_my'] = render($fivestar_widget); ?>
						  <?php print render($fivestar_widget);?>
                      </div>                      
                      <div class="text-left"><?php print bp_commerce_get_add_to_cart_button($node->field_product['und'][0]['product_id']); ?></div>
                    </div>
                    <div class="col-xl-2 col-12 socials text-right">
                      <div class="social-share-wrapper">
                          <?php include_once('inc/bp_social_share.tpl.php'); ?>
                      </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-forced-full-width bg-grey-light section-description bp-block-m-t">
        <div class="row">
            <div class="col-xl-8 col-force-center">
                <div class="py-1">
                    <div class="horizontal-tabs-wrapper">
                        <div class="horizontal-tabs-links text-center py-2">
                            <div class="horizontal-tabs-data hidden-md-up"><span class="data-text">Описание</span> <span class="icon-arrow-down-thick"></span></div>
                            <ul class="horizontal-tabs">
                                <li class="horizontal-tab active" data-tab="1"><a href="#">Описание</a></li>
                                <li class="horizontal-tab" data-tab="6"><a href="#">Состав</a></li>
                                <li class="horizontal-tab" data-tab="2"><a href="#">Эффекты</a></li>
                                <li class="horizontal-tab trigger-slick-components" data-tab="3"><a href="#">Компоненты</a></li>
                                <li class="horizontal-tab" data-tab="4"><a href="#">Правила ухода</a></li>
                                <li class="horizontal-tab" data-tab="5"><a href="#">Отзывы</a></li>
                            </ul>
                        </div>
                        <div class="horizontal-tabs-content text mt-1">
                            <div class="horizontal-tab-content text-normal active" data-tab="1">
                                <h2 class="thin"><?php print $title; ?></h2>
                                <?php print render($content['body']); ?>
                                <?php /*<!--<h2 class="thin">Черный Жемчуг БИО-масло средство для умывания</h2>
                                <div class="content">Мягкая моющая основа бережно очищает кожу, эффективно удаляет даже водостойкий макияж. Легкая  масляная текстура не повреждает защитный барьерный слой кожи, защищает кожу от сухости и стянутости. 7 БИО-активных натуральных масел (винограда, оливы, миндаля, авокадо, жожоба, арганы, макадамии)</div>-->
                                */?>
                            </div>
                            <div class="horizontal-tab-content text-normal" data-tab="6">
                                <?php // print render($content['field_effects']); ?>
                                <h2 class="thin">Состав продукта</h2>
                                <div class="content content-two-col">
                                  <?php print $field_content_product; ?>
								 <?php /* <!--<ul>
                                    <li>BIO-гранулы жожоба</li>
                                    <li>Масло авокадо</li>
                                    <li>Масло арганы</li>
                                    <li>Масло виноградных косточек</li>
                                    <li>Масло макадемии</li>
                                    <li>Масло миндаля</li>
                                    <li>Масло оливы</li>
                                    <li>Про-витамин B5</li>
                                  </ul>--> */?>
                                </div>
                            </div>
                            <div class="horizontal-tab-content text-normal" data-tab="2">
                                
                                <h2 class="thin">Видимые эффекты</h2>
                                <div class="content content-two-col">
                                  <?php print render($content['field_effects']); ?>
								  <?php /*<!--<ul>
                                    <li>Очищение, увлажнение</li>
                                    <li>Очищение без пересушивания</li>
                                    <li>Мягкая тающая текстура</li>
                                    <li>Ощущение заботы и ухода о коже</li>
                                    <li>Эффективное удаление макияжа</li>
                                    <li>Не повреждает защитный слой кожи</li>
                                    <li>Способствует сохранению естественного баланса увлажнения</li>
                                  </ul>-->*/?>
                                </div>                                
                            </div>
                            <div class="horizontal-tab-content" data-tab="3">
                                <div id="bp-components-carousel">
                                    <?php foreach($bp_components as $component) : ?>
                                        <div class="component-item">
                                            <h2 class="thin"><?php print $component['title']; ?></h2>
                                            <div class="regular"><?php print $component['desc']; ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="horizontal-tab-content text-normal" data-tab="4">
                                <?php print render($content['field_care_rules']); ?>
                               <?php /* <!--<h2 class="thin">Очищать кожу необходимо 2 раза в день - утром и вечером</h2>
                                <div class="content">Каждый день наша кожа впитывает токсины, которые скапливаются в порах и приводят к ускоренному старению кожи. Очищение кожи 2 раза в день помогает освободить кожу от токсинов, восстановить нормальную работу клеток и подготовить кожу к усвоению полезных веществ из питательного крема.</div>-->
                                */?>
                            </div>
                            <div class="horizontal-tab-content text-normal trigger-slick-review" data-tab="5">
                              <?php print render($content['comments']); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	
    <div class="section-carousel row bp-block-m-t">
        <div id="bg-carousel-wrapper" class="col-12">
            <div class="teasers-wrapper">
                <div class="title-normal text-center uppercase mb-2">Выбор месяца</div>
                <?php if($bp_products_carousel): ?>
                    <?php print render($bp_products_carousel); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="section-bottom container-forced-full-width">

        <div class="btn-up-wrapper"><a href="#" class="btn-round black"><span class="icon-small icon-arrow-up-thick"></span><span class="text-small regular">Наверх</span></a></div>
    </div>
</div>
