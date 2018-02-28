<?php
/**
 * Implemenents hook_preprocess_html().
 */
function bp_pink_preprocess_html(&$vars) {
  if(module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
    if($alias != $_GET['q']) {
      $template_filename = 'html';
      foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '__' . $path_part;
        $vars['theme_hook_suggestions'][] = $template_filename;
      }
    }
  }
  // Adds user id to body tag
  if($vars['user']->uid) {
    $vars['attributes_array']['data-uid'] = $vars['user']->uid;
  }
  if($vars['user']->roles) {
    $vars['attributes_array']['data-user-role'] = implode(' ', $vars['user']->roles);
  }

      if(preg_match('/\.|\~|changelog|install|readme|bugs/i', request_path())){
           drupal_add_http_header('Status', '404 Not Found');
             drupal_exit();
      }
  //bp_meta_add();
}

/**
 * Implements hook_preprocess_page().
 */
function bp_pink_preprocess_page(&$variables) {
  // Add theme hook suggestion to allow custom page.tpl.php for content type
  // if(isset($variables['node']->type)) {
  //   $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  // }
  $header = drupal_get_http_header('status'); 
  if($header == '404 Not Found') {     
    $variables['theme_hook_suggestions'][] = 'page__404';
  }

  if ($_GET['q'] == 'cart') {
    $theme_path = drupal_get_path('theme', 'bp_pink');
    drupal_add_css($theme_path . '/css/cart.css', array('group' => CSS_THEME));
    drupal_add_js($theme_path . '/js/cart.js');
  } 
  
  $variables['compare_modal_params'] = '';
  if (arg(0) != 'compare') {
	$ids = _bp_shop_api_cookie('compare'); 

	if (count($ids['compare_products']) > 0) {
	  $variables['compare_modal_params'] = 'data-toggle="modal" data-target="#modal-compare"'; 
	}  
  }
  
  $variables['favourite_modal_params'] =  '';
  if (!(arg(0) == 'user' && arg(1) == 'favourite')) {
	$ids = _bp_shop_api_cookie('favorite');
	if (count($ids['favorite_products']) > 0) {
	  $variables['favourite_modal_params'] = 'data-toggle="modal" data-target="#modal-favourite"'; 
	} 	
  }
  
  if (arg(0) == 'node' && is_numeric(arg(1))) {
	$node = node_load(arg(1));
	global $user;
    if ($node->type == 'question' && $user->uid != 1) {
	  drupal_not_found();  
    }
  }
  
  /* Подготовка переменных для меню */
  bp_pink_get_menu_vars($variables);
  
}

/**
 * Implements hook_preprocess_node().
 */
function bp_pink_preprocess_node(&$variables) {
  // Adds theme suggestions for node
  if(module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit', '', $_GET['q']));
    if($alias != $_GET['q']) {
      $alias = str_replace('-', '_', $alias);
      $template_filename = 'node';
      foreach(explode('/', $alias) as $path_part) {
        if($path_part !== 'product') {
          $template_filename = $template_filename . '__' . $path_part;
          $variables['theme_hook_suggestions'][] = $template_filename;
        }
      }
    }
  }

  // Insert bp-products-carousel region into node
  if($blocks = block_get_blocks_by_region('bp-products-carousel')) {
    //  var_dump($blocks);die;
    $variables['bp_products_carousel'] = $blocks;
  }
  
  
  // Product Card Variables
  if($variables['type'] === 'product' && $variables['view_mode'] === 'full') {
    
	if(arg(0) === 'node') {
      $variables['theme_hook_suggestions'][] = 'node__product_card';
    }

    $field_area = '';
    $field_area_children = '';
    $field_area_alias = '';
    $field_action = '';
    $field_problems = '';
    $field_use = '';
    $field_skin_type = '';
    $field_age = '';
    
    //////////msv
    //$field_new_items = '';
    //$field_giftset = '';
    //////////msv
    
    
    
    $field_asset_type = '';
    $field_components = '';
    $field_programs = $variables['field_programs'][0]['taxonomy_term']->name;
    $field_programs_alias = drupal_get_path_alias('taxonomy/term/' . $variables['field_programs'][0]['taxonomy_term']->tid); //$variables['field_programs'][0]['taxonomy_term']->field_alias['und'][0]['value']; print_R($variables['field_programs'][0]['taxonomy_term']);
    $field_new = (bool) $variables['field_new'][0]['value'];
	$field_discontinued = (bool) $variables['field_product_discontinued'][0]['value']; //Снято с производства
    $field_volume = isset($variables['field_volume'][0]['taxonomy_term']->name) ? $variables['field_volume'][0]['taxonomy_term']->name : '';
    $field_image = array();
    $product_details = array();
    $components = array();

    // Gets the area field with only parent terms
    foreach($variables['field_area'] as $term) {
	  if(empty(taxonomy_get_parents($term['tid']))) {
        $field_area = $term['taxonomy_term']->name;
        $field_area_alias = bp_pink_get_taxonomy_second_breadcrumb($term['tid'], 'link');
      } else {
        if(!empty($field_area_children)) {
          $field_area_children .= ', ';
        }
        $field_area_children .= $term['taxonomy_term']->name;
        $taxonomy_parents = taxonomy_get_parents($term['taxonomy_term']->tid);
		$field_area = reset($taxonomy_parents);
        $field_area = $field_area->name;
        $field_area_alias = bp_pink_get_taxonomy_second_breadcrumb($term['tid'], 'link');

        // $field_area_alias = str_replace(' ', '-', mb_strtolower($field_area));
      }
    }

    // Parses field action array
    foreach($variables['field_action'] as $term) {
      if(!empty($field_action)) {
        $field_action .= ', ';
      }
      $field_action .= $term['taxonomy_term']->name;
    }

    // Parses field problems array
    foreach($variables['field_problems'] as $term) {
      if(!empty($field_problems)) {
        $field_problems .= ', ';
      }
      $field_problems .= $term['taxonomy_term']->name;
    }

    // Parses field prescription array
    /*foreach($variables['field_use'] as $term) {
      if(!empty($field_use)) {
        $field_use .= ', ';
      }
      $field_use .= $term['taxonomy_term']->name;
    }*/
	$field_use = $variables['field_use'][0]['value'];
	
	//print_R($variables['node']);
	
    // Parses field skin_type array
    foreach($variables['field_skin_type'] as $term) {
      if(!empty($field_skin_type)) {
        $field_skin_type .= ', ';
      }
      $field_skin_type .= $term['taxonomy_term']->name;
    }

    // Parses field age array
    foreach($variables['field_age'] as $term) {
      if(!empty($field_age)) {
        $field_age .= ', ';
      }
      $field_age .= $term['taxonomy_term']->name;
    }

    // Parses field asset_type array
    foreach($variables['field_asset_type'] as $term) {
      if(!empty($field_asset_type)) {
        $field_asset_type .= ', ';
      }
      $field_asset_type .= $term['taxonomy_term']->name;
    }

    // Parses field components array
    foreach($variables['field_components'] as $term) {
      if(!empty($field_components)) {
        $field_components .= ', ';
      }
      if(isset($term['taxonomy_term'])) {
        $field_components .= $term['taxonomy_term']->name;
      }
    }
	$field_content_product = $variables['field_components_txt'][0]['value'];

    // Parses field components array into handfull variable bp_components
    foreach($variables['field_components'] as $term) {
      if(isset($term['taxonomy_term'])) {
        $image = isset($term['taxonomy_term']->field_image_taxonomy['und'][0]['uri']) ? image_style_url('landscape_small', $term['taxonomy_term']->field_image_taxonomy['und'][0]['uri']) : null;
        //$desc = strlen($term['taxonomy_term']->description) > 100 ? mb_substr($term['taxonomy_term']->description, 0, 88) . '...' : $term['taxonomy_term']->description;
        $desc = $term['taxonomy_term']->description;

        $components[] = array(
          'title' => $term['taxonomy_term']->name,
          'desc' => $desc,
          'image' => $image
        );
      }
    }
	

    // Parses field image array
    foreach($variables['field_image'] as $image) {
      $field_image[] = array(
        'title' => $image['title'],
        'alt' => $image['alt'],
        'src' => image_style_url('product_normal', $image['uri']),
        'original' => file_create_url($image['uri'])
      );
    }
    
    
    //////////msv
    /*
    // Parses field giftset array
    foreach($variables['field_giftset'] as $term) {
      if(!empty($field_giftset)) {
        $field_giftset .= ', ';
      }
      $field_giftset .= $term['taxonomy_term']->name;
    }
    */
    // Parses field new_items array
    /*
    foreach($variables['field_new_items'] as $term) {
      if(!empty($field_new_items)) {
        $field_new_items .= ', ';
      }
      $field_new_items .= $term['taxonomy_term']->name;
    }
    */
    //////////msv
    
    // Populated product_details array
    $product_details['Программа'] = $field_programs;
    $product_details['Действие'] = $field_action;
    $product_details['Проблемы кожи'] = $field_problems;
    $product_details['Назначение'] = $field_use;
    $product_details['Зона применения'] = $field_area;
    $product_details['Тип кожи'] = $field_skin_type;
    $product_details['Возраст'] = $field_age;
    $product_details['Тип средства'] = $field_asset_type;
    $product_details['Состав'] = $field_components;
     
    //////////msv
    //$product_details['Новинки'] = $field_new_items;
    //$product_details['Подарочные наборы'] = $field_giftset;
    //////////msv

    // Creates breadcrumb
    $breadcrumbs  = '<ul class="breadcrumbs with-arrow">';
    $breadcrumbs .= 	'<li>' . l('Главная', '<front>') . '</li>';
    $breadcrumbs .= 	'<li>' . l($field_area, $field_area_alias) . '</li>';
    $breadcrumbs .= 	'<li>' . l($field_programs, $field_programs_alias) . '</li>';
    $breadcrumbs .= 	'<li>' . $variables['title'] . '</li>';
    $breadcrumbs .= '</ul>'; 
	$breadcrumbs .= bp_shop_get_mobile_menu();

    // Creates variables for node.tpl.php
    $variables['bp_breadcrumbs'] = $breadcrumbs;
    $variables['bp_field_new'] = $field_new;
    $variables['bp_field_discontinued'] = $field_discontinued;
    $variables['bp_field_volume'] = $field_volume;
    $variables['bp_field_image'] = $field_image;
    $variables['bp_product_details'] = $product_details;
    $variables['bp_components'] = $components;
    $variables['field_content_product'] = $field_content_product;
  }

  // Loads special node.tpl.php for modal view
  if(arg(0) === 'modal' && $variables['type'] === 'product') {
    //print_R($variables['content']);
	$variables['theme_hook_suggestions'][] = 'node__product_modal';
  }
  
}

/**
 * Implemenents hook_preprocess_image().
 */
function bp_pink_preprocess_image(&$variables) {
  // Removes width and height from any image field
  foreach(array('width', 'height') as $key) {
    unset($variables[$key]);
  }
  $variables['attributes']['class'][] = 'img-fluid';
}

function bp_pink_preprocess_user_profile(&$variables) {
  $variables['user_data'] = bp_login_current_user_data();
  $path = drupal_get_path('theme', 'bp_pink');
  drupal_add_js($path . '/js/user_profile.js'); 
}

/**
 * Implemenents hook_preprocess_taxonomy_term().
 */
function bp_pink_preprocess_taxonomy_term(&$variables) {
  $vocabulary = $variables['vocabulary_machine_name'];
  $variables['theme_hook_suggestions'][] = 'taxonomy_term__'.$vocabulary;
  if (isset($variables['field_image_taxonomy'][0]['uri'])) {
	$variables['image_taxonomy_path'] = image_style_url('poster_big', $variables['field_image_taxonomy'][0]['uri']);  
  }
}

function bp_pink_taxonomy_page_nodes_reorder(&$nodes) {
  $nodes_loaded = node_load_multiple($nodes);
  $orders = array();
  foreach ($nodes_loaded as $node) {
	//print_R($node->field_product_order);
	$orders[$node->nid] = $node->field_product_order['und'][0]['value'];
  }
  asort($orders);
  $nodes_sorted = array();
  foreach ($orders as $nid => $val) {
	$nodes_sorted[] = $nodes_loaded[$nid];
  }
  $nodes = $nodes_sorted;
}



/**
 * Custom functions
 */
function _bp_pink_mainmenu_programs_dropdown($tid, $mobile = false) {
  $vid = 3;
  $terms = '';
  if ($mobile) $terms = array();

  $result = bp_pink_get_program_tids($vid, $tid);
  
  if (isset($result['taxonomy_term'])) {
    $tids = array_keys($result['taxonomy_term']);
    for ($t=0; $t<count($tids); $t++) {
      $term = taxonomy_term_load($tids[$t]);
      $status = (isset($term->field_include_in_menu) && !empty($term->field_include_in_menu['und'])) ? $term->field_include_in_menu['und'][0]['value'] : null;
      if ($status === '1') {
        if (!$mobile) {
		  /* Просатвляем класс активного пункта меню */
		  $active_class = '';
		  
		  //Для страницы таксономии
		  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2)) && $term->tid == arg(2)) {
			$active_class = ' active-trail ';  
		  }
		  
		  //Для страницы материала
		  if (arg(0) == 'node' && is_numeric(arg(1))) {
			$node = node_load(arg(1));
			if (isset($node->field_programs['und'][0]['tid']) && $node->field_programs['und'][0]['tid'] == $term->tid) {
			  $active_class = ' active-trail ';	
			}
		  }
		  
		  $terms .= '<li class="extended' . $active_class .($t == 0 ? ' first' : ($t == (count($tids) - 1) ? ' last' : '')). '" data-tid="'.$term->tid.'"><a href="/' . drupal_get_path_alias('taxonomy/term/' . $term->tid) . '" class="trigger-megamenu-products" title="'.$term->name.'" data-tid="'.$term->tid.'">'.$term->name.'</a></li>';	
		} else {
		  $terms[] = array(
		    'link' => drupal_get_path_alias('taxonomy/term/' . $term->tid),
		    'name' => $term->name,
			'class' => '',
	      );	
		}
		  
      }
    }
  }

  return $terms;
}

function bp_pink_get_program_tids($vid, $tid) {
  $query = new EntityFieldQuery();

  $query->entityCondition('entity_type', 'taxonomy_term')
    ->propertyCondition('vid', $vid)
    ->propertyOrderBy('weight')
    ->fieldCondition('field_area', 'tid', $tid, '=');

  $result = $query->execute();
  return $result;  
}

// Переделка шаблона вывода прогресс бара для корзины и оформления заказа
function bp_pink_commerce_checkout_progress_list($variables) {
  $path = drupal_get_path('module', 'commerce_checkout_progress');
  drupal_add_css($path . '/commerce_checkout_progress.css');

  $items = $variables['items'];
  $type = $variables['type'];
  $link = $variables['link'];
  $current_page = $variables['current_page'];

  // Option to display back pages as links.
  if ($link) {
    if ($order = menu_get_object('commerce_order')) {
      $order_id = $order->order_id;
    }
    // Load the *shopping cart* order. It gets deleted on last page.
    elseif (module_exists('commerce_cart') && $order = commerce_cart_order_load($GLOBALS['user']->uid)) {
      $order_id = $order->order_id;
    }
  }

  // This is where we build up item list that will be themed
  // This variable is used with $variables['link'], see more in inside comment.
  $visited = TRUE;
  // Our list of progress pages.
  $progress = array();
  foreach ($items as $page_id => $page) {
    $class = array();
    if ($page_id === $current_page) {
      $class[] = 'active';
      // Active page and next pages should not be linked.
      $visited = FALSE;
    }
    if (isset($items[$current_page]['prev_page']) && $page_id === $items[$current_page]['prev_page']) {
      $class[] = 'previous';
    }
    if (isset($items[$current_page]['next_page']) && $page_id === $items[$current_page]['next_page']) {
      $class[] = 'next';
    }
    $class[] = $page_id;
    $data = t($page['title']);

    if ($visited) {
      // Issue #1345942.
      $class[] = 'visited';

      // On checkout complete page, the checkout order is deleted.
      if (isset($order_id) && $order_id) {
        // If a user is on step 1, clicking a link next steps will be redirect
        // them back. Only render the link on the pages those user has already
        // been on. Make sure the loaded order is the same one found in the URL.
        if (arg(1) == $order_id && ($page_id == 'cart' || commerce_checkout_page_access($page, $order))) {
          $href = isset($page['href']) ? $page['href'] : "checkout/{$order_id}/{$page_id}";
          $data = l(filter_xss($data), $href, array('html' => TRUE));
        }
      }
    }

    $item = array(
      'data'  => $data,
      'class' => $class,
    );
    // Only set li title if the page has help text.
    if (isset($page['help'])) {
      // #1322436 Filter help text to be sure it contains NO html.
      $help = strip_tags($page['help']);
      // Make sure help has text event after filtering html.
      if (!empty($help)) {
        $item['title'] = $help;
      }
    }
    // Add item to progress array.
    $progress[] = $item;
  }
  
  $classes = array(
    'commerce-checkout-progress',
    'clearfix',
    'inline',
    'checkout-pages-' . count($progress),
  );
  return theme('commerce_progress_bar', array(
    'items' => $progress,
    'type' => $type,
    'attributes' => array('class' => $classes),
  ));
}

//Убираем якорь комментария перед комментарием
function bp_pink_comment_view_alter(&$build){
   //If you want, add some validation
    unset($build['#prefix']); 
}

function bp_pink_get_taxonomy_second_breadcrumb($tid, $type = 'html') {
  $face = array(3, 4, 5, 643, 2, 652, 608, 1, 6);
  $body = array(8,7,9);
  if ($type == 'html') {
	if (in_array($tid, $body)) {
	  return l('Уход за телом', 'uhod-za-telom');  
    } else {
	  return l('Уход за лицом', 'uhod-za-licom'); 
    }  
  } else if ($type = 'link') {
	if (in_array($tid, $body)) {
	  return 'uhod-za-telom';  
    } else {
	  return 'uhod-za-licom'; 
    }    
  }
  
}

function bp_pink_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $ul_classes = array('breadcrumbs', 'with-arrow');
  bp_pink_breadcrumb_fix($breadcrumb, $ul_classes);
  
  if (!empty($breadcrumb)) {
	$output = '<ul class="' . implode(' ', $ul_classes) . '"><li>' . implode('</li><li>', $breadcrumb) . '</li></ul>';
	return $output;
  }
}

function bp_pink_breadcrumb_fix(&$breadcrumb, &$ul_classes) {
  $path = current_path();
  //print_R($path);
  $path_parts = explode('/', $path);
  
  //Раздел секреты красоты
  if ($path_parts[0] == 'sekrety-krasoty') {
	if ($path == 'sekrety-krasoty') {
	  $breadcrumb[] = 'Секреты красоты';
	} else {
	  $breadcrumb[] = l('Секреты красоты', 'sekrety-krasoty'); 	
	}
	$ul_classes[] = 'mb-1';	
    //$ul_classes[] = 'mt-2';
    
	if (isset($path_parts[1])) {
	  if ($path_parts[1] == 'sovety_expertov') { 
		$breadcrumb = array_values($breadcrumb);
		$path_parts[1] = 'Советы экспертов'; 
	  }
	}
	
	if (isset($path_parts[1])) {
	  if ($path_parts[1] == 'zolotye_pravila') { 
	    unset($breadcrumb[1]);
		$breadcrumb = array_values($breadcrumb);
		$path_parts[1] = 'Золотые правила'; 
	  }
	  if(!preg_match('/[^a-zA-Zа-яА-Я0-9_-]/', $path_parts[1])){
	      $breadcrumb[] = $path_parts[1];
	  }	  
	 
	}	
  } elseif ($path_parts[0] == 'node' && $path_parts[1] == 18) {
	$breadcrumb[] = 'Промо'; 
	$ul_classes[] = 'mb-1';	
    $ul_classes[] = 'mt-2'; 
  } elseif ($path_parts[0] == 'node' && $path_parts[1] == 231) {
	$breadcrumb[] = 'О бренде';  
  } elseif ($path_parts[0] == 'catalogue') {
    $breadcrumb[] = 'Подбор по фильтрам';
  } else if ($path_parts[0] == 'uhod-za-licom') {
	$breadcrumb[] = 'Уход за лицом';  
  } else if ($path_parts[0] == 'uhod-za-telom') {
	$breadcrumb[] = 'Уход за телом';  
  } else if ($path_parts[0] == 'compare') {
	$breadcrumb[] = 'Сравнение товаров'; 
  } else if ($path_parts[0] == 'user') {
	unset($breadcrumb[1]);
	if ($path_parts[1] == 'favourite') {
	  $breadcrumb[] = 'Избранное';	
	} else if ($path_parts[1] == 'change-password') {
	  $breadcrumb[] = 'Смена пароля';	
	} else if ($path_parts[1] == 'settings') {
	  $breadcrumb[] = 'Смена телефона/почты';	
	} else if ($path_parts[1] == 'orders') {
	  $breadcrumb[] = 'Мои Заказы';	
	} else {
	  $breadcrumb[] = 'Личные данные';
	} 
  } else if ($path_parts[0] == 'taxonomy' && $path_parts[1] == 'term' && is_numeric($path_parts[2])) {
    $term = taxonomy_term_load($path_parts[2]);
	if ($term->vid == 3) { //Станица линейки
	  $breadcrumb[] = l($term->field_area['und'][0]['taxonomy_term']->name, bp_pink_get_taxonomy_second_breadcrumb($term->tid, 'link'));
	  $breadcrumb[] = $term->name;
	}
  }
	 
    
  /*} elseif ( == 'секреты-красоты/Советы экспертов') {
	
    $ul_classes[] = 'mb-1';	
    $ul_classes[] = 'mt-2';	  
  }*/
  /*for($i = 0; $i < 5; $i++) {
	  
  } */	
}

//ХАК для страницы Подбор продукта. Чтобы отрабатывала форма и при этом оставалось на этой же странице
function bp_pink_form_alter(&$form, $form_state, $form_id) {
  $parts = explode('commerce_cart_add_to_cart', $form_id);
  if (count($parts) > 1) {
	$parts1 = explode('/api/get/products', $form['#action']);
	if (count($parts1) > 1) {
	  unset($form['#submit'][1]);
	  unset($form['#attached']['js'][1]);
	  $form['#submit'][] = 'bp_pink_commerce_cart_add_to_cart_form_submit';
	}
	
	$parts2 = explode('/modal/product', $form['#action']);
	if (count($parts2) > 1) {
	  unset($form['#submit'][1]);
	  unset($form['#attached']['js'][1]);
	  $form['#submit'][] = 'bp_pink_commerce_cart_add_to_cart_form_submit';
	}
  }	
}

function bp_pink_commerce_cart_add_to_cart_form_submit($form, $form_state){
  global $base_root;
  $redirect_url = str_replace($base_root.'/', '', $_SERVER['HTTP_REFERER']);
  drupal_goto($redirect_url);	
}

function bp_pink_get_menu_vars(&$variables) {
  
  /* Страница О бренде */
  $a_url = 'node/231';
  $a_url_parts = explode('/', $a_url);
  $variables['menu_vars']['o_brende'] = array(
    'active-trail' => (arg(0) == $a_url_parts[0] && arg(1) == $a_url_parts[1]) ? ' active-trail' : '',
	
	'link' => l('О бренде', $a_url, 
	  array(
	    'attributes' => array(
	      'title' => 'О бренде'
	    )
      )
    ),
	
	'childs' => array(
	  'history' => l('История', $a_url, 
          array(
	        'attributes' => array(
	          'title' => 'История', 
	          'class' => array("menu-history"), 
	        ),
	        'fragment' => 'history'
          )
        ),
	  
	  'mission' => l('Миссия', $a_url, 
          array(
	        'attributes' => array(
	          'title' => 'Миссия', 
	          'class' => array("menu-mission"), 
	        ),
	        'fragment' => 'mission'
          )
        ),
	  
	  'news' => l('Новости', $a_url, 
          array(
	        'attributes' => array(
	          'title' => 'Новости', 
	          'class' => array("menu-news"), 
	        ),
	        'fragment' => 'news'
          )
        )
	),
	
  );
}

function bp_pink_get_years_text($count) {
  $count = (string) $count;
  if (strlen($count) > 1) {
	$last_number = $count[strlen($count)-2] . $count[strlen($count)-1];
    if ($last_number >= 20) {
	  $last_number = $count[strlen($count)-1];	
	}	
  } else {
	$last_number = $count[strlen($count)-1];  
  }
  
  $text_patterns = array(
	0 => 'лет',
	1 => 'год',
	2 => 'года',
	3 => 'года',
	4 => 'года',
	5 => 'лет',
	6 => 'лет',
	7 => 'лет',
	8 => 'лет',
	9 => 'лет',
	10 => 'лет',
	11 => 'лет',
	12 => 'лет',
	13 => 'лет',
	14 => 'лет',
	15 => 'лет',
	16 => 'лет',
	17 => 'лет',
	18 => 'лет',
	19 => 'лет',
  );
  
  return $count . ' ' . $text_patterns[$last_number];  
}

function bp_pink_theme() {
  return array(
   'commerce_progress_bar' => array(
      'variables' => array('items' => array(), 'type' => '', 'attributes' => array()),
      'template' => 'tpl/commerce-progress-bar'
    ),
    /*'hit_product_teasers' => array(
      'variables' => array(
        'title'       => NULL,
        'description' => NULL,
        'url'         => NULL,
        'nid'         => NULL,
        'image'       => NULL,
        'volume'      => NULL,
        'new'         => NULL,
        'bp_count'    => 1,
        'trash'       => NULL,
        'controls'    => true,
        'cart'        => true,
        'trigger'     => false,
        'style'       => 'teaser_normal'
      ),
      'template' => 'tpl/hit-product-teasers'
    ),*/
  );
}

/* function bp_pink_preprocess_html(&$vars) {
    drupal_add_html_head(array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
            'name' => 'test',
            'content' => 'test',
        )
    ), 'meta_viewport');
} */
