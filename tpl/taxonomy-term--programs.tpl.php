<?php
/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: (deprecated) The unsanitized name of the term. Use $term_name
 *   instead.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct URL of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<!--<div class="container">
  <ul class="breadcrumbs with-arrow">
    <li><a href="/">Главная</a></li>
    <li><?php print bp_pink_get_taxonomy_second_breadcrumb($term->tid); ?></li>
    <li><?php print $term_name; ?></li>
  </ul>
</div>
<h1 class="title-big thin text-center"><?php print $term->field_area['und'][0]['taxonomy_term']->name; ?></h1>-->
<?php print render(bp_shop_get_breagcrumbs_theme_arr()); ?> 
<div class="block-product-lines">
  <div class="block-product-lines--header">
    <!--<div class="block-product-lines--header-desc" style="background: url(<?php print $image_taxonomy_path; ?>) no-repeat 50% 0; background-size: cover;">
      <div class="container">
        <div class="px-3">
          <h2 class="thin"><?php //print $term_name; ?></h2>
          <div class="signature pb-1 mb-1"><?php //print render($content['description']); ?></div>
          <div class="consist light"></div>          
        </div>
      </div>
    </div> -->
	<?php print bp_shop_get_product_line_banner($term->tid); ?>
  </div>
  <div class="container">

	<?php $nodes = taxonomy_select_nodes($term->tid, FALSE); ?>
	<?php bp_pink_taxonomy_page_nodes_reorder($nodes); ?>
	<div class="col-xl-8 col-force-center">
    <div class="text-center uppercase bold my-3">Продукты программы</div>
      <div id="bp-line-products">
        <?php foreach ($nodes as $node): ?>
        <?php //$node = node_load($nid); ?>
        
        <?php 
        
        global $user;
        
        if (array_search('administrator', $user->roles)){
            //var_dump($node);
        }
        
        ?>

        <div class="row block-product-lines--product">
            <div class="col-lg-5 col-xl-5 col-md-6 col-12">
              <div class="teaser teaser-normal product-item text-center">
                <div class="teaser-inner">
                  <div class="teaser-image">
                    <?php $n_image = theme('image_style', array(
                    'style_name' => 'teaser_normal', 
                    'path' => $node->field_image['und'][0]['uri'], 
                    'getsize' => TRUE, 
                    'alt' => $node->field_image['und'][0]['alt'],
                    'attributes' => array(
                      'class' => array('teaser-img', 'img-fluid', 'center-block', 'mt-1'), 
                      'alt' => $term->name,
                    ) 
              )); 
              
            ?>
            <?php print l($n_image, 'node/' . $node->nid, array('html' => true)); ?>
                  </div>

                  <div class="product-controls">
                    <a href="#" class="pink" data-toggle="modal" data-target="#product-modal" data-product="<?php print $node->nid; ?>" tabindex="0"><span class="icon-big icon-eye"></span></a>
                    <a href="#" class="pink" data-endpoint="compare" data-product="<?php print $node->nid; ?>" data-toggle="shop" tabindex="0"><span class="icon-big bp-icon-compare"></span></a>
                    <a href="#" class="pink" data-endpoint="favorite" data-product="<?php print $node->nid; ?>" data-toggle="shop" tabindex="0"><span class="icon-big bp-icon-favorite"></span></a>
                  </div>

                  <div class="teaser-item title title-small light">
                    <?php print l($node->title, 'node/' . $node->nid, array('attributes' => array('class' => 'black'))); ?>
                  </div>
				  <div class="teaser-item pink bold"><?php print (isset($node->field_volume['und'][0]['taxonomy_term']->name) ? $node->field_volume['und'][0]['taxonomy_term']->name : ''); ?></div>
				  <?php if (isset($node->field_new['und'][0]['value']) && $node->field_new['und'][0]['value']): ?>
                    <div class="teaser-overlay-top label-new">
						<div class="btn-wrapper"><span class="bp-card-label title-normal light bg-grey-trans">Новинка</span></div>
					</div>
                  <?php endif; ?>
				  <?php if (isset($node->field_product_discontinued['und'][0]['value']) && $node->field_product_discontinued['und'][0]['value']): ?>
				    <div class="teaser-overlay-top label-new label-removed">
						<div class="btn-wrapper"><span class="bp-card-label title-normal light bg-grey-trans label-removed">Снято с производства</span></div>
					</div>
				  <?php endif;?>
                  <div class="product-options product-controls">
                    <div class="btn-wrapper">
                        <!--<a href="#" class="btn btn-big bg-pink" data-endpoint="cart" data-product="<?php print $node->nid; ?>" data-toggle="shop" tabindex="0"><span class="bp-label-add-to-cart">В корзину</span><span class="bp-label-added-to-cart">Добавлен в корзину</span></a>-->
						<?php  print bp_commerce_get_add_to_cart_button($node->field_product['und'][0]['product_id']); ?>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-lg-7 col-xl-7 col-md-6 col-12">
              <div class="block-product-lines--product-description text-normal light">
                <h3 class="thin"><?php print $node->title; ?></h3>
                <p><?php print $node->body['und'][0]['value']; ?></p>
                <?php print l('Подробнее', 'node/' .  $node->nid, array('attributes' => array('class' => array('pink')))); ?>
              </div>
            </div>
        </div> 
        <?php endforeach; ?>      
      </div>      

	</div>
	
  </div>
</div>