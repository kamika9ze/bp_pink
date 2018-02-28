<?php //print $_GET['search']; 
  $view = views_get_view('search_api_views');
  $view->set_display('page');

  $start = '2015-12-01 00:00:00';
  $end = '2015-12-31 00:00:00';
  $view->exposed_input['search_api_views_fulltext'] = $_GET['search'];
  $view->pre_execute();
  $view->execute();
  $search_results = $view->result;
  
  $products = array();
  $articles = array();
  
  foreach ($search_results as $sr) {
	$n = node_load($sr->entity);
	if ($n->type == 'product') {
	  $products[] = $n;	
	} else {
	  $articles[] = $n;	
	}
  }
?>
<div class="search-results-page mt-2">
    <div class="text-center">
        <h1>Результаты поиска</h1>
        <p class="title-normal mt-2">По вашему запросу «<?php print $_GET['search']; ?>» найдено (<?php print count($search_results);?>):</p>
    </div>
    <div class="search-result-sets mt-3">
        <div class="search-result-set mt-1">
            <div class="search-result-set-head border-b-2-grey-faint">
                <div class="row">
                    <div class="col-xl-8 col-force-center">
                        <p class="text-big text-center">Продукты (<?php print count($products);?>)</p>
                    </div>
                </div>
            </div>
            <div class="search-result-set-body mt-3">
                <div class="row">
                    <div class="col-xl-8 col-force-center">
                        <div class="teasers-small-block">
                            <?php foreach ($products as $product) :?>
							  <?php 
							    $volume = isset($product->field_volume['und'][0]['tid']) ? taxonomy_term_load($product->field_volume['und'][0]['tid'])->name : '';
								$image = theme('image_style', array(
														'style_name' => 'teaser_normal', 
														'path' => $product->field_image['und'][0]['uri'], 
														'attributes' => array(
															'class' => explode(' ','teaser-img center-block mt-1'), 
														)
													));
								$is_new = (isset($product->field_new['und'][0]['value']) && $product->field_new['und'][0]['value'] == 1) ? 1 : 0;
								$is_discontinued = (isset($product->field_product_discontinued['und'][0]['value']) && $product->field_product_discontinued['und'][0]['value'] == 1) ? 1 : 0;
								 
							  ?>
							  <div class="teaser teaser-small text-center">
                                <div class="teaser-inner">
                                    <a href="<?php print drupal_get_path_alias('node/' . $product->nid); ?>"><?php print $image; ?></a>
                                    <div class="teaser-item text-normal light"><?php print $product->title; ?></div>
                                    <div class="teaser-item text-small pink"><?php print $volume; ?></div>
                                    <?php if ($is_new): ?>
									  <div class="teaser-overlay-top label-new">
                                        <div class="btn-wrapper"><span class="bp-card-label title-normal light bg-grey-trans">Новинка</span></div>
                                      </div>
									<?php endif; ?>
									<?php if ($is_discontinued): ?>  
									  <div class="teaser-overlay-top label-new label-removed">
                                        <div class="btn-wrapper"><span class="bp-card-label title-normal light bg-grey-trans">Снято с производства</span></div>
                                      </div>
									<?php endif; ?>
                                </div>
                              </div>
							<?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="search-result-set mt-1">
            <div class="search-result-set-head border-b-2-grey-faint">
                <div class="row">
                    <div class="col-xl-8 col-force-center">
                        <p class="text-big text-center">Статьи (<?php print count($articles);?>)</p>
                    </div>
                </div>
            </div>
            <div class="search-result-set-body mt-3">
                <div class="row">
                    <div class="col-xl-8 col-force-center">
                        <?php foreach ($articles as $article) :?>
						  <div class="search-result my-3">
                            <div class="title title-micro"><a href = "<?php print drupal_get_path_alias('node/' . $article->nid); ?>"><strong><?php print $article->title; ?></strong></a></div>
                            <!--<ul class="breadcrumbs nav nav-inline pink text-small regular">
                                <li class="nav-item"><a class="nav-link" href="#">Программы</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Для лица</a></li>
                            </ul>-->
                            <div class="description text-normal">
                                <?php $stripped = strip_tags($article->body['und'][0]['value']); print truncate_utf8($stripped, 200, FALSE, TRUE);?>
								<!--<i>Увлажняющий крем</i>. Я чувствую себя частью команды и эмоционально связан с ней. Для меня важно быть сопричастным, важно разделять с командой как головокружительные успехи, так и последствия ошибок.... -->
                            </div>
                          </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>