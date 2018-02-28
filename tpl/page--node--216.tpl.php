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
  
    <div class="container mt-2">
      <h1 class="title-big thin text-center">Сравнение товаров</h1>
      <div class="row compare-header">
        <div class="col-4 hidden-lg-down uppercase bold compare-header--filter"><a href="" class="pink">Добавленные недавно</a></div>
        <div class="col-12 col-lg-4 text-center thin compare-header--saved">17 шт. сохранено</div>
        <div class="col-4 hidden-lg-down uppercase bold text-right compare-header--share"><a href="" class="pink">Поделиться</a></div>
      </div>
      <div class="bp-carousel-compare-content-wrapper">
        <div id="bp-carousel-compare-content" class="teasers-wrapper">
          <div class="teaser teaser-normal text-center compare-table product-item" data-product="84">
            <div class="compare-cell pt-1">
              <div class="teaser-inner position-relative">
                <div class="teaser-image">
                  <a href="/product/подарочный-набор-гармония"><img class="teaser-img img-fluid center-block" src="/sites/all/themes/bp_pink/images/img-placeholder.png" alt="Black Pearl" title="Black Pearl"></a>
                </div>

                <div class="text-small text-center regular p-x-1 teaser-item--name">Подарочный набор Гармония</div>

                <div class="text-small text-center pink regular p-x-1 teaser-item--description">увлажняет, повышает ее упругость, что-то делает</div>                    
                
                
                <div class="teaser-overlay-top">
                  <div class="btn-wrapper">
                    <span class="bp-card-label title-normal light bg-grey-trans">Новинка</span>
                  </div>
                </div>

                <div class="button-trash-wrapper">
                  <a href="#" class="button-trash" data-endpoint="compare" data-product="84" data-toggle="shop-remove"><span class="icon-big icon-cross-slim"></span></a>
                </div>
                
                <div class="product-options product-controls">
                  <div class="btn-wrapper">
                    <a href="#" class="btn btn-big bg-pink" data-endpoint="cart" data-product="84" data-toggle="shop" tabindex="0"><span class="bp-label-add-to-cart">В корзину</span><span class="bp-label-added-to-cart">Добавлен в корзину</span></a>
                  </div>
                </div>                
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--age">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">25-30</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--typeskin">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Сухая</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--body">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Тело</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--instruction">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Нанесите крем-гель на влажное лицо массирующими движениями, затем смойте водой</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--volume">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">тюбик 120 мл</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--consist">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">масло камелии, дезамидоколлаген, натрия гиалуронат</div>
              </div>
            </div>

          </div>
          
          <div class="teaser teaser-normal text-center compare-table product-item" data-product="83">
            <div class="compare-cell pt-1">
              <div class="teaser-inner position-relative">
                <div class="teaser-image">
                  <a href="/product/подарочный-набор-очарование"><img class="teaser-img img-fluid center-block" src="/sites/all/themes/bp_pink/images/img-placeholder.png" alt="Black Pearl" title="Black Pearl"></a>
                </div>

                <div class="text-small text-center regular p-x-1 teaser-item--name">Крем-бальзам для лица с Дамасской розой</div>

                <div class="text-small text-center pink regular p-x-1 teaser-item--description">увлажняет, повышает ее упругость, что-то делает</div>                    
                
                <div class="teaser-overlay-top">
                  <div class="btn-wrapper">
                    <span class="bp-card-label title-normal light bg-grey-trans">Новинка</span>
                  </div>
                </div>

                <div class="button-trash-wrapper">
                  <a href="#" class="button-trash" data-endpoint="compare" data-product="83" data-toggle="shop-remove"><span class="icon-big icon-cross-slim"></span></a>
                </div>
                
                <div class="product-options product-controls">
                  <div class="btn-wrapper">
                    <a href="#" class="btn btn-big bg-pink" data-endpoint="cart" data-product="83" data-toggle="shop" tabindex="0"><span class="bp-label-add-to-cart">В корзину</span><span class="bp-label-added-to-cart">Добавлен в корзину</span></a>
                  </div>
                </div>                 
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--age">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">25-30</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--typeskin">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Комбинированная</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--body">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Лицо</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--instruction">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Нанесите крем на чистую, сухую кожу лица, равномерно распределите, помассируйте</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--volume">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">банка 120 мл</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--consist">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">масло камелии, дезамидоколлаген, натрия гиалуронат</div>
              </div>
            </div>

          </div>
          <div class="teaser teaser-normal text-center compare-table product-item" data-product="82">
            <div class="compare-cell pt-1">
              <div class="teaser-inner position-relative">
                <div class="teaser-image">
                  <a href="/product/подарочный-набор-восхищение"><img class="teaser-img img-fluid center-block" src="http://blackpearl.e-produce.ru/sites/default/files/styles/teaser_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=3LYI9ZPV" alt="Подарочный набор Восхищение" title="Подарочный набор Восхищение"></a>
                </div>

                <div class="text-small text-center regular p-x-1 teaser-item--name">Подарочный набор Восхищение</div>

                <div class="text-small text-center pink regular p-x-1 teaser-item--description">глубоко очищает без сухости</div>                    

                <div class="teaser-overlay-top">
                  <div class="btn-wrapper">
                    <span class="bp-card-label title-normal light bg-grey-trans">Новинка</span>
                  </div>
                </div>

                <div class="button-trash-wrapper">
                  <a href="#" class="button-trash" data-endpoint="compare" data-product="82" data-toggle="shop-remove"><span class="icon-big icon-cross-slim"></span></a>
                </div>

                <div class="product-options product-controls">
                  <div class="btn-wrapper">
                    <a href="#" class="btn btn-big bg-pink" data-endpoint="cart" data-product="82" data-toggle="shop" tabindex="0"><span class="bp-label-add-to-cart">В корзину</span><span class="bp-label-added-to-cart">Добавлен в корзину</span></a>
                  </div>
                </div>                 
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--age">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">18-45</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--typeskin">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Сухая</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--body">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Лицо</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--instruction">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Нанесите крем на чистую, сухую кожу лица, равномерно распределите, помассируйте</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--volume">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">тюбик 120 мл</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--consist">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">масло камелии, дезамидоколлаген, натрия гиалуронат</div>
              </div>
            </div>
          </div>
          
          
          <div class="teaser teaser-normal text-center compare-table product-item" data-product="81">
            <div class="compare-cell pt-1">
              <div class="teaser-inner position-relative">
                <div class="teaser-image">
                  <a href="/product/крем-для-ног-интенсивное-смягчение"><img class="teaser-img img-fluid center-block" src="/sites/all/themes/bp_pink/images/img-placeholder.png" alt="Black Pearl" title="Black Pearl"></a>
                </div>

                <div class="text-small text-center regular p-x-1 teaser-item--name">Крем для ног Интенсивное смягчение</div>

                <div class="text-small text-center pink regular p-x-1 teaser-item--description">насыщенное увлажнение</div>                    
                
                <div class="teaser-overlay-top">
                  <div class="btn-wrapper">
                    <span class="bp-card-label title-normal light bg-grey-trans">Новинка</span>
                  </div>
                </div>

                <div class="button-trash-wrapper">
                  <a href="#" class="button-trash" data-endpoint="compare" data-product="81" data-toggle="shop-remove"><span class="icon-big icon-cross-slim"></span></a>
                </div>

                <div class="product-options product-controls">
                  <div class="btn-wrapper">
                    <a href="#" class="btn btn-big bg-pink" data-endpoint="cart" data-product="81" data-toggle="shop" tabindex="0"><span class="bp-label-add-to-cart">В корзину</span><span class="bp-label-added-to-cart">Добавлен в корзину</span></a>
                  </div>
                </div>                 
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--age">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">45+</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--typeskin">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Сухая</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--body">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Руки</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--instruction">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Нанесите крем на чистую, сухую кожу, равномерно распределите, помассируйте</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--volume">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">флакон 120 мл</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--consist">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">масло камелии, дезамидоколлаген, натрия гиалуронат</div>
              </div>
            </div>
          </div>
          
          <div class="teaser teaser-normal text-center compare-table product-item" data-product="57">
            <div class="compare-cell pt-1">
              <div class="teaser-inner position-relative">
                <div class="teaser-image">
                  <a href="/product/крем-для-лица-36"><img class="teaser-img img-fluid center-block" src="/sites/all/themes/bp_pink/images/img-placeholder.png" alt="Black Pearl" title="Black Pearl"></a>
                </div>  
                
                <div class="text-small text-center regular p-x-1 teaser-item--name">Крем для лица 36+</div>

                <div class="text-small text-center pink regular p-x-1 teaser-item--description">насыщенное увлажнение</div>                

                <div class="teaser-overlay-top">
                  <div class="btn-wrapper">
                    <span class="bp-card-label title-normal light bg-grey-trans">Новинка</span>
                  </div>
                </div>

                <div class="button-trash-wrapper">
                  <a href="#" class="button-trash" data-endpoint="compare" data-product="57" data-toggle="shop-remove"><span class="icon-big icon-cross-slim"></span></a>
                </div>
                
                <div class="product-options product-controls">
                  <div class="btn-wrapper">
                    <a href="#" class="btn btn-big bg-pink" data-endpoint="cart" data-product="57" data-toggle="shop" tabindex="0"><span class="bp-label-add-to-cart">В корзину</span><span class="bp-label-added-to-cart">Добавлен в корзину</span></a>
                  </div>
                </div>                 
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--age">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">45+</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--typeskin">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Сухая</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--body">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Руки</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--instruction">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Нанесите крем на чистую, сухую кожу, равномерно распределите, помассируйте</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--volume">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">флакон 120 мл</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--consist">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">масло камелии, дезамидоколлаген, натрия гиалуронат</div>
              </div>
            </div>
          </div>
          
          <div class="teaser teaser-normal text-center compare-table product-item" data-product="56">
            <div class="compare-cell pt-1">
              <div class="teaser-inner position-relative">
                <div class="teaser-image">
                <a href="/product/ночной-крем-для-лица-bio-программа"><img class="teaser-img img-fluid center-block" src="http://blackpearl.e-produce.ru/sites/default/files/styles/teaser_normal/public/products/nochnoi_krem_dlya_lica_1_3.png?itok=TdSDFsBt" alt="Ночной крем для лица BiO-программа" title="Ночной крем для лица BiO-программа"></a>
                </div>

                <div class="text-small text-center regular p-x-1 teaser-item--name">Ночной крем для лица BiO-программа</div>

                <div class="text-small text-center pink regular p-x-1 teaser-item--description">насыщенное увлажнение</div>
              
                <div class="teaser-overlay-top">
                  <div class="btn-wrapper">
                    <span class="bp-card-label title-normal light bg-grey-trans">Новинка</span>
                  </div>
                </div>

                <div class="button-trash-wrapper">
                  <a href="#" class="button-trash" data-endpoint="compare" data-product="56" data-toggle="shop-remove"><span class="icon-big icon-cross-slim"></span></a>
                </div>
                
                <div class="product-options product-controls">
                  <div class="btn-wrapper">
                    <a href="#" class="btn btn-big bg-pink" data-endpoint="cart" data-product="56" data-toggle="shop" tabindex="0"><span class="bp-label-add-to-cart">В корзину</span><span class="bp-label-added-to-cart">Добавлен в корзину</span></a>
                  </div>
                </div>                 
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--age">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">45+</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--typeskin">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Сухая</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--body">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Руки</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--instruction">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">Нанесите крем на чистую, сухую кожу, равномерно распределите, помассируйте</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--volume">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">флакон 120 мл</div>
              </div>
            </div>

            <div class="compare-cell d-table width-100 teaser-item--consist">
              <div class="d-table-cell align-middle">
                <div class="text-small text-center regular p-x-1">масло камелии, дезамидоколлаген, натрия гиалуронат</div>
              </div>
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
<?php include_once('inc/bp_footer.tpl.php'); ?>
