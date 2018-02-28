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
  <div class="block-product-lines">
    <div class="block-product-lines--header">
      <div class="block-product-lines--header-desc" style="background: url(/<?php print path_to_theme();?>/images/lines-header-bg.jpg) no-repeat 50% 0; background-size: cover;">
        <div class="container">
          <div class="px-3">
            <div class="title">Уход за лицом</div>
            <h2 class="thin">Серия «Очищение»</h2>
            <div class="signature pb-1 mb-1">Используется для очищения лица и придает коже упругость, свежесть, эластичность, устраняет сухость, шелушение, ощущение стянустоти кожи, раздражения, воспаления.</div>
            <div class="consist light">Полужидкая эмульсия на жирной основе, которая используется для быстрого очищения кожи от косметики и загрязнения. Особенно крем пказан при сухой и стареющей коже, примняют его 2 раза в день. При использовании очищающего крема следует пользоваться губкой.</div>          
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <?php //print $breadcrumbs; ?>
      <ul class="breadcrumbs with-arrow">
        <li><a href="">Главная</a></li>
        <li><a href="">Лицо</a></li>
        <li>Очищение</li>
      </ul>
      <div class="col-xl-8 col-force-center">
        <div class="row block-product-lines--product">
          <div class="col-lg-5 col-xl-5 col-md-6 col-12">
            <div class="teaser teaser-normal product-item text-center">
              <div class="teaser-inner">
                <div class="teaser-image">
                  <a href="/product/крем-для-ног-интенсивное-смягчение" tabindex="0"><img class="teaser-img img-fluid center-block mt-1" src="http://nevid.ikonan.ru/sites/default/files/styles/teaser_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=rMX244D0" alt="Подарочный набор Восхищение"></a>
                </div>

                <div class="product-controls">
                  <a href="#" class="pink" data-toggle="modal" data-target="#product-modal" data-product="81" tabindex="0"><span class="icon-big icon-eye"></span></a>
                  <a href="#" class="pink" data-endpoint="compare" data-product="81" data-toggle="shop" tabindex="0"><span class="icon-big bp-icon-compare"></span></a>
                  <a href="#" class="pink" data-endpoint="favorite" data-product="81" data-toggle="shop" tabindex="0"><span class="icon-big bp-icon-favorite"></span></a>
                </div>

                <div class="teaser-item title title-small light">
                  <a href="/product/крем-для-ног-интенсивное-смягчение" class="black" tabindex="0">Крем для ног Интенсивное смягчение</a>
                </div>

                <div class="teaser-item pink bold">80 мл</div>

                <div class="product-options product-controls">
                  <div class="btn-wrapper">
                      <a href="#" class="btn btn-big bg-pink" data-endpoint="cart" data-product="81" data-toggle="shop" tabindex="0"><span class="bp-label-add-to-cart">В корзину</span><span class="bp-label-added-to-cart">Добавлен в корзину</span></a>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-7 col-xl-7 col-md-6 col-12">
            <div class="block-product-lines--product-description">
              <h2 class="thin">Крем-гель для умывания с водой</h2>
              <p>Используется для очищения лица и придает коже упругость, свежесть, эластичность, устраняет сухость, шелушение, ощущение стянустоти кожи, раздражения, воспаления. Для очищения лица и придает коже упругость, свежесть, эластичность, устраняет сухость, шелушение, ощущение стянустоти кожи, раздражения, воспаления. Используется для очищения лица и придает коже упругость, свежесть, эластичность, устраняет сухость, шелушение, ощущение стянустоти кожи, раздражения, воспаления. </p>
              <a href="" class="pink">Подробнее</a>
            </div>
          </div>
        </div>
        <div class="row block-product-lines--product">
          <div class="col-lg-5 col-xl-5 col-md-6 col-12">
            <div class="teaser teaser-normal product-item text-center">
              <div class="teaser-inner">
                <div class="teaser-image">
                  <a href="/product/крем-для-ног-интенсивное-смягчение" tabindex="0"><img class="teaser-img img-fluid center-block mt-1" src="http://nevid.ikonan.ru/sites/default/files/styles/teaser_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=rMX244D0" alt="Подарочный набор Восхищение"></a>
                </div>

                <div class="product-controls">
                  <a href="#" class="pink" data-toggle="modal" data-target="#product-modal" data-product="81" tabindex="0"><span class="icon-big icon-eye"></span></a>
                  <a href="#" class="pink" data-endpoint="compare" data-product="81" data-toggle="shop" tabindex="0"><span class="icon-big bp-icon-compare"></span></a>
                  <a href="#" class="pink" data-endpoint="favorite" data-product="81" data-toggle="shop" tabindex="0"><span class="icon-big bp-icon-favorite"></span></a>
                </div>

                <div class="teaser-item title title-small light">
                  <a href="/product/крем-для-ног-интенсивное-смягчение" class="black" tabindex="0">Крем для ног Интенсивное смягчение</a>
                </div>

                <div class="teaser-item pink bold">80 мл</div>

                <div class="product-options product-controls">
                  <div class="btn-wrapper">
                      <a href="#" class="btn btn-big bg-pink" data-endpoint="cart" data-product="81" data-toggle="shop" tabindex="0"><span class="bp-label-add-to-cart">В корзину</span><span class="bp-label-added-to-cart">Добавлен в корзину</span></a>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-7 col-xl-7 col-md-6 col-12">
            <div class="block-product-lines--product-description">
              <h2 class="thin">Крем-гель для умывания с водой</h2>
              <p>Используется для очищения лица и придает коже упругость, свежесть, эластичность, устраняет сухость, шелушение, ощущение стянустоти кожи, раздражения, воспаления. Для очищения лица и придает коже упругость, свежесть, эластичность, устраняет сухость, шелушение, ощущение стянустоти кожи, раздражения, воспаления. Используется для очищения лица и придает коже упругость, свежесть, эластичность, устраняет сухость, шелушение, ощущение стянустоти кожи, раздражения, воспаления. </p>
              <a href="" class="pink">Подробнее</a>
            </div>
          </div>
        </div>
        <div class="row block-product-lines--product">
          <div class="col-lg-5 col-xl-5 col-md-6 col-12">
            <div class="teaser teaser-normal product-item text-center">
              <div class="teaser-inner">
                <div class="teaser-image">
                  <a href="/product/крем-для-ног-интенсивное-смягчение" tabindex="0"><img class="teaser-img img-fluid center-block mt-1" src="http://nevid.ikonan.ru/sites/default/files/styles/teaser_normal/public/products/podarochnyi_nabor_voshishchenie_1.png?itok=rMX244D0" alt="Подарочный набор Восхищение"></a>
                </div>

                <div class="product-controls">
                  <a href="#" class="pink" data-toggle="modal" data-target="#product-modal" data-product="81" tabindex="0"><span class="icon-big icon-eye"></span></a>
                  <a href="#" class="pink" data-endpoint="compare" data-product="81" data-toggle="shop" tabindex="0"><span class="icon-big bp-icon-compare"></span></a>
                  <a href="#" class="pink" data-endpoint="favorite" data-product="81" data-toggle="shop" tabindex="0"><span class="icon-big bp-icon-favorite"></span></a>
                </div>

                <div class="teaser-item title title-small light">
                  <a href="/product/крем-для-ног-интенсивное-смягчение" class="black" tabindex="0">Крем для ног Интенсивное смягчение</a>
                </div>

                <div class="teaser-item pink bold">80 мл</div>

                <div class="product-options product-controls">
                  <div class="btn-wrapper">
                      <a href="#" class="btn btn-big bg-pink" data-endpoint="cart" data-product="81" data-toggle="shop" tabindex="0"><span class="bp-label-add-to-cart">В корзину</span><span class="bp-label-added-to-cart">Добавлен в корзину</span></a>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-7 col-xl-7 col-md-6 col-12">
            <div class="block-product-lines--product-description">
              <h2 class="thin">Крем-гель для умывания с водой</h2>
              <p>Используется для очищения лица и придает коже упругость, свежесть, эластичность, устраняет сухость, шелушение, ощущение стянустоти кожи, раздражения, воспаления. Для очищения лица и придает коже упругость, свежесть, эластичность, устраняет сухость, шелушение, ощущение стянустоти кожи, раздражения, воспаления. Используется для очищения лица и придает коже упругость, свежесть, эластичность, устраняет сухость, шелушение, ощущение стянустоти кожи, раздражения, воспаления. </p>
              <a href="" class="pink">Подробнее</a>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
	<div class="bp-footer-vessel"></div>
</main>
<?php include_once('inc/bp_footer.tpl.php'); ?>
