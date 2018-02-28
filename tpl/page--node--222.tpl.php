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

    <div class="container">
      <div class="bp-main-content">
          <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          
          <?php print render($page['hits']); ?>
      </div>    
    </div>
    <div class="block-history mt-2">
      <div class="block-history--tabs">
        <div class="container">
          <div class="content">
            <ul>
              <li class="active"><a href="" rel="tab-orders">Заказы <span>3</span></a></li>
              <li><a href="" rel="tab-sells">Купленные товары <span>3</span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="block-history--content">

          <div class="block-history--content-header">
            <div class="container">
              <div class="row">
                <div class="col-3 bold uppercase text-left">номер</div>
                <div class="col-3 bold uppercase text-center">дата и время заказа</div>
                <div class="col-3 bold uppercase text-center">статус</div>
                <div class="col-3 bold uppercase text-right">сумма</div>
              </div>
            </div>
          </div>
          <div id="tab-orders" class="history-tab">
            <div class="block-history--content-body">
              <div class="row-product">
                <div class="container">
                  <div class="row">
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-left pink">
                      <span class="block-history--num">436457457</span>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 uppercase text-center pink light">12.04.2017 15:30</div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-center pink">доставлено</div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-right pink row-product--detail-price nowrap">3 000,<span>00</span>  <span class="icon-rubble"></span></div>
                  </div>                
                </div>
                <div class="row-product--detail hidden">
                  <div class="container">
                    <div class="row">
                      <div class="col-2 text-center">
                        <img class="center-block" src="/sites/default/files/styles/product_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=O6R-F3AP" alt="Подарочный набор Восхищение" title="Подарочный набор Восхищение">
                      </div>
                      <div class="col-7 text-left light">
                        <div class="row-product--detail-name mb-1">Двойной крем для лица нормальный и комбинированной кожи</div>
                        <a href="#" class="pink"><span class="icon-big icon-eye rounded-circle"></span></a>
                      </div>
                      <div class="col-3 bold uppercase text-right pink row-product--detail-price nowrap">1 000,<span>00</span>  <span class="icon-rubble"></span></div>
                    </div> 
                    <div class="row">
                      <div class="col-2 text-center">
                        <img class="center-block" src="/sites/default/files/styles/product_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=O6R-F3AP" alt="Подарочный набор Восхищение" title="Подарочный набор Восхищение">
                      </div>
                      <div class="col-7 text-left light">
                        <div class="row-product--detail-name mb-1">Освежающий гель для умывания</div>
                        <a href="#" class="pink"><span class="icon-big icon-eye rounded-circle"></span></a>
                      </div>
                      <div class="col-3 bold uppercase text-right pink row-product--detail-price nowrap">
                        <div class="row-product--detail-count">2 шт</div>
                        1 000,<span>00</span> <span class="icon-rubble"></span>
                      </div>
                    </div>  
                    <div class="row row-product--detail-sum">
                      <div class="col-6 text-left light">
                        <div class="row-product--detail-address">
                          <div class="label pink">Было доставлено по адресу: </div>г. Москва, Цветной Бульвар 14, кв. 47
                        </div>
                      </div>
                      <div class="col-6 bold uppercase text-right pink row-product--detail-price nowrap">
                        3 000,<span>00 </span> <span class="icon-rubble"></span>
                      </div>
                    </div>  
                  </div>                
                </div>
              </div><!-- // .row-product -->
              <div class="row-product return">
                <div class="container">
                  <div class="row">
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-left pink">
                      <span class="block-history--num">436457457</span>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 uppercase text-center grey light">12.04.2017 15:30</div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-center grey">возврат</div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-right grey row-product--detail-price nowrap">2 927,<span>00</span> <span class="icon-rubble"></span></div>
                  </div>                
                </div>
                <div class="row-product--detail hidden">
                  <div class="container">
                    <div class="row">
                      <div class="col-2 text-center">
                        <img class="center-block" src="/sites/default/files/styles/product_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=O6R-F3AP" alt="Подарочный набор Восхищение" title="Подарочный набор Восхищение">
                      </div>
                      <div class="col-7 text-left light">
                        <div class="row-product--detail-name mb-1">Двойной крем для лица нормальный и комбинированной кожи</div>
                        <a href="#" class="grey"><span class="icon-big icon-eye rounded-circle"></span></a>
                      </div>
                      <div class="col-3 bold uppercase text-right grey row-product--detail-price nowrap">2 927,<span>00</span> <span class="icon-rubble"></span></div>
                    </div>   
                    <div class="row row-product--detail-sum">
                      <div class="col-6 text-left light">
                        <div class="row-product--detail-address">
                          <div class="label grey">Было доставлено по адресу: </div>г. Москва, Цветной Бульвар 14, кв. 47</div>
                      </div>
                      <div class="col-6 bold uppercase text-right grey row-product--detail-price nowrap">
                        2 927,<span>00 </span> <span class="icon-rubble"></span>
                      </div>
                    </div>  
                  </div>                
                </div>
              </div><!-- // .row-product -->
            </div>    
          </div>          
     
          <div id="tab-sells" class="history-tab">
            <div class="block-history--content-body">
              <div class="row-product">
                <div class="container">
                  <div class="row">
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-left pink">
                      <span class="block-history--num">436457457</span>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 uppercase text-center pink light">12.04.2017 15:30</div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-center pink">доставлено</div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-right pink row-product--detail-price nowrap">3 000,<span>00</span>  <span class="icon-rubble"></span></div>
                  </div>                
                </div>
                <div class="row-product--detail hidden">
                  <div class="container">
                    <div class="row">
                      <div class="col-2 text-center">
                        <img class="center-block" src="/sites/default/files/styles/product_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=O6R-F3AP" alt="Подарочный набор Восхищение" title="Подарочный набор Восхищение">
                      </div>
                      <div class="col-7 text-left light">
                        <div class="row-product--detail-name mb-1">Двойной крем для лица нормальный и комбинированной кожи</div>
                        <a href="#" class="pink"><span class="icon-big icon-eye rounded-circle"></span></a>
                      </div>
                      <div class="col-3 bold uppercase text-right pink row-product--detail-price nowrap">1 000,<span>00</span>  <span class="icon-rubble"></span></div>
                    </div> 
                    <div class="row">
                      <div class="col-2 text-center">
                        <img class="center-block" src="/sites/default/files/styles/product_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=O6R-F3AP" alt="Подарочный набор Восхищение" title="Подарочный набор Восхищение">
                      </div>
                      <div class="col-7 text-left light">
                        <div class="row-product--detail-name mb-1">Освежающий гель для умывания</div>
                        <a href="#" class="pink"><span class="icon-big icon-eye rounded-circle"></span></a>
                      </div>
                      <div class="col-3 bold uppercase text-right pink row-product--detail-price nowrap">
                        <div class="row-product--detail-count">2 шт</div>
                        1 000,<span>00</span> <span class="icon-rubble"></span>
                      </div>
                    </div>  
                    <div class="row row-product--detail-sum">
                      <div class="col-6 text-left light">
                        <div class="row-product--detail-address">
                          <div class="label pink">Было доставлено по адресу: </div>г. Москва, Цветной Бульвар 14, кв. 47
                        </div>
                      </div>
                      <div class="col-6 bold uppercase text-right pink row-product--detail-price nowrap">
                        3 000,<span>00 </span>
                      </div>
                    </div>  
                  </div>                
                </div>
              </div><!-- // .row-product -->
              <div class="row-product">
                <div class="container">
                  <div class="row">
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-left pink">
                      <span class="block-history--num">436457111</span>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 uppercase text-center pink light">10.02.2017 15:30</div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-center pink">доставлено</div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-right pink row-product--detail-price nowrap">5 000,<span>00</span>  <span class="icon-rubble"></span></div>
                  </div>                
                </div>
                <div class="row-product--detail hidden">
                  <div class="container">
                    <div class="row">
                      <div class="col-2 text-center">
                        <img class="center-block" src="/sites/default/files/styles/product_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=O6R-F3AP" alt="Подарочный набор Восхищение" title="Подарочный набор Восхищение">
                      </div>
                      <div class="col-7 text-left light">
                        <div class="row-product--detail-name mb-1">Освежающий гель для умывания</div>
                        <a href="#" class="pink"><span class="icon-big icon-eye rounded-circle"></span></a>
                      </div>
                      <div class="col-3 bold uppercase text-right pink row-product--detail-price nowrap">
                        <div class="row-product--detail-count">5 шт</div>
                        1 000,<span>00</span> <span class="icon-rubble"></span>
                      </div>
                    </div>  
                    <div class="row row-product--detail-sum">
                      <div class="col-6 text-left light">
                        <div class="row-product--detail-address">
                          <div class="label pink">Было доставлено по адресу: </div>г. Москва, Цветной Бульвар 14, кв. 47
                        </div>
                      </div>
                      <div class="col-6 bold uppercase text-right pink row-product--detail-price nowrap">
                        3 000,<span>00 </span>
                      </div>
                    </div>  
                  </div>                
                </div>
              </div><!-- // .row-product -->
              <div class="row-product">
                <div class="container">
                  <div class="row">
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-left pink">
                      <span class="block-history--num">436111111</span>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 uppercase text-center pink light">11.01.2017 11:30</div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-center pink">доставлено</div>
                    <div class="col-6 col-lg-3 col-md-3 col-sm-3 bold uppercase text-right pink row-product--detail-price nowrap">5 000,<span>00</span>  <span class="icon-rubble"></span></div>
                  </div>                
                </div>
                <div class="row-product--detail hidden">
                  <div class="container">
                    <div class="row">
                      <div class="col-2 text-center">
                        <img class="center-block" src="/sites/default/files/styles/product_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=O6R-F3AP" alt="Подарочный набор Восхищение" title="Подарочный набор Восхищение">
                      </div>
                      <div class="col-7 text-left light">
                        <div class="row-product--detail-name mb-1">Освежающий гель для умывания</div>
                        <a href="#" class="pink"><span class="icon-big icon-eye rounded-circle"></span></a>
                      </div>
                      <div class="col-3 bold uppercase text-right pink row-product--detail-price nowrap">
                        <div class="row-product--detail-count">5 шт</div>
                        1 000,<span>00</span> <span class="icon-rubble"></span>
                      </div>
                    </div>  
                    <div class="row row-product--detail-sum">
                      <div class="col-6 text-left light">
                        <div class="row-product--detail-address">
                          <div class="label pink">Было доставлено по адресу: </div>г. Москва, Цветной Бульвар 14, кв. 47
                        </div>
                      </div>
                      <div class="col-6 bold uppercase text-right pink row-product--detail-price nowrap">
                        3 000,<span>00 </span>
                      </div>
                    </div>  
                  </div>                
                </div>
              </div><!-- // .row-product -->
            </div>

               
          </div>          
     
      </div>
    </div>
    
    <div class="bp-footer-vessel"></div>
  </div>
</main>
<?php  include_once('inc/bp_footer.tpl.php'); ?>
