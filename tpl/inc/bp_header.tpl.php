<?php 
  global $user;
  /*if ($user->uid == 1) {
	$q = db_select('node', 'n');
	$q->condition('n.type', 'product');
	$q->addField('n', 'nid');
	$q->range(80, 20);
	$results = $q->execute();
	
	foreach ($results as $res) {
	  $n = node_load($res->nid);
	  $path = path_load(array('source' => 'node/' . $res->nid));
      print_r($path);
	  $end_path = '';
	  if (count(explode('product', $path['alias'])) > 1) {
		$end_path = '';
		if ($n->field_article_categories['und'][0]['tid'] == 136) {
		  $end_path = 'sovety_expertov';	
		} else if ($n->field_article_categories['und'][0]['tid'] == 137) {
		  $end_path = 'zolotye_pravila';
		}
		
		if ($end_path) {
		  $path['alias'] = transliteration_get($path['alias']);		
		  print_r('CHANGED ON "' . $path['alias'] . '"
		  ');
		  //path_save($path);
		//}
		
	  }	  
	}
	
    	
  }*/
  //$n = node_load(188); print_r($n);//print_r(bp_commerce_get_cart_products_ids()); exit(); 

?>
<div id="hamburger-wrapper">
    <div id="hamburger-inner" class="container">
        <div id="hamburger">
            <div class="hamburger-content">
                <div class="hamburger-search">
                    <form action="/search-products" method="POST">
                        <input type="text" name="search" placeholder="Поиск">
                    </form>
                </div>
                <ul class="hamburger-menu black">
                    <li class="text-normal"><a href="/uhod-za-licom"><span class="text"><strong>Лицо</strong></span></a></li>
                    <li class="text-normal"><a href="/uhod-za-telom"><span class="text"><strong>Тело</strong></span></a></li>
                    <li class="text-normal"><a href="/catalogue"><span class="text"><strong>Подбор продукта</strong></span></a></li>
                    <li class="text-normal"><a href="/questions"><span class="text"><strong>Задай вопрос эксперту</strong></span></a></li>
                    <li class="text-normal"><a href="/sekrety-krasoty/sovety_expertov"><span class="text"><strong>Советы экспертов</strong></span></a></li>
                    <li class="text-normal"><a href="/sekrety-krasoty/zolotye_pravila"><span class="text"><strong>Золотые правила</strong></span></a></li>
                    <li class="text-normal"><a href="/video_list"><span class="text"><strong>Видео</strong></span></a></li>
                    <li class="text-normal"><?= l('<span class="text"><strong>О бренде</strong></span>', 'node/231', array('html' => true)); ?></li>
                    <li class="text-normal"><a href="/promo"><span class="text"><strong>Промо</strong></span></a></li>
                </ul>
            </div>      
            
        </div>
    </div>
</div>
<header id="bp-main-header" class="fixed-top">
    <div id="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-2 col-lg-4 hidden-xl-up text-left col-gamburger">
                    <a href="#" class="trigger-hamburger"><span class="icon-normal icon-hamburger"></span></a>
                </div>
                <div class="col-2 col-lg-4 col-xl-2 text-center text-xl-left col-logo">
                    <a href="/" id="bp-logo">
                        <img src="/sites/all/themes/bp_pink/images/logo.svg" id="logo" class="mt-1" alt="Черный жемчуг">
                    </a>
                </div>
                <div class="col-xl-7 hidden-lg-down mainmenu-wrapper">
                    <nav class="mainmenu-wrapper">
                        <?php $bp_path = urldecode($_SERVER['REQUEST_URI']); ?>
                        <ul class="mainmenu inline-menu uppercase title-normal light">
                            <li data-tid="129" class="expanded<?php echo !strpos($bp_path, 'uhod-za-licom') ? '' : ' active-trail'; ?>">
                                <a title="Лицо" href="/uhod-za-licom">Лицо</a>
                                <ul class="child-menu inline-menu text-normal">
                                    <?php print _bp_pink_mainmenu_programs_dropdown(129); ?>
                                </ul>
                            </li>
                            <li data-tid="128" class=" expanded<?php echo !strpos($bp_path, 'uhod-za-telom') ? '' : ' active-trail'; ?>">
                                <a title="Тело" href="/uhod-za-telom">Тело</a>
                                <ul class="child-menu inline-menu text-normal no-face">
                                    <?php print _bp_pink_mainmenu_programs_dropdown(128); ?>
                                </ul>
                            </li>
                            <li class="expanded<?php echo !strpos($bp_path, 'catalogue') ? '' : ' active-trail'; ?>">
                                <a title="Подбор продукта" href="/catalogue">Подбор продукта</a>
                                <ul class="inline-menu text-normal no-face">
                                    <li class="<?php echo !strpos($bp_path, 'catalogue') ? '' : ' active-trail'; ?>"><a href="/catalogue" title="Подбор по фильтрам">Подбор по фильтрам</a></li>
                                    <li class="<?php echo !strpos($bp_path, 'questions') ? '' : ' active-trail'; ?>"><a href="/questions" title="Задай вопрос эксперту">Задай вопрос эксперту</a></li>
                                </ul>
                            </li>
                            <li class="expanded<?php echo !strpos($bp_path, 'sekrety-krasoty') ? '' : ' active-trail'; ?>"> <!--  no-dropdown -->
                                <a title="Секреты красоты" href="/sekrety-krasoty">Секреты красоты</a>
                                <ul class="inline-menu text-normal no-face">
                                    <li class="<?php echo !strpos($bp_path, 'sovety_expertov') ? '' : 'active-trail'; ?>"><a href="/sekrety-krasoty/sovety_expertov" title="Советы экспертов">Советы экспертов</a></li>
                                    <li class="<?php echo !strpos($bp_path, 'zolotye_pravila') ? '' : 'active-trail'; ?>"><a href="/sekrety-krasoty/zolotye_pravila" title="Золотые правила">Золотые правила</a></li>
                                    <li class="<?php echo !strpos($bp_path, 'video_list') ? '' : 'active-trail'; ?>"><a href="/video_list" title="Видео">Видео</a></li>
                                </ul>
                            </li>
                            <?php $about = $variables['menu_vars']['o_brende'];?>
							<li class="expanded<?= $about['active-trail'];  ?>">
                                <?php print $about['link']; ?>
                                <ul class="inline-menu text-normal no-face">
                                  <?php foreach ($about['childs'] as $link): ?>
									<li><?= $link; ?></li>
                                  <?php endforeach; ?>
                                </ul>
                            </li>
							<li class="expanded <?php echo !strpos($bp_path, 'promo') ? '' : ' active-trail'; ?>"> <!-- no-dropdown -->
                                <a title="Промо" href="/promo">Промо</a>
                                <ul class="inline-menu text-normal no-face">
                                    <!--<li><a href="#" title="Акции">Акции</a></li>-->
                                    <li class="<?php echo !strpos($bp_path, 'promo') ? '' : 'active-trail'; ?>"><a href="/promo" title="Актуальное промо">Актуальное промо</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-8 col-xl-3 col-md-8 col-lg-4 col-usermenu">
                    <ul class="usermenu inline-menu float-right">
                        <li class="hidden-lg-down">
                            <a href="#" class="trigger-search"><span class="icon-normal icon-magnifier"></span>
                                <span class="tooltip">Поиск</span>
                            </a>
                        </li>
                        <li class="cart-status">
                        <?php 
                          $add_class = '';
                          $data_id = '';
                          /* if (!$logged_in) {
                            $add_class = 'trigger-smodal ';
                            $data_id = 'data-id="slogin"';
                          } */
                        ?>
                          <a href="/cart" class="<?php print $add_class; ?>trigger-cart" <?php print $data_id; ?>>
                            <span class="icon-normal icon-cart-thick"></span>
                            <?php $count = bp_commerce_get_cart_products_count(); ?>
                            <span class="indicator" <?php print (($count > 0) ? 'style="display:block"' : ''); ?>><?php print $count; ?></span>
                            <span class="tooltip">Корзина</span>
                          </a>
                        </li>
                        <li class="compare-status hidden-lg-down">
                          <a href="/compare" <?php print $compare_modal_params;  ?>><span class="icon-normal icon-balance-thick"></span><span class="indicator">0</span><span class="tooltip">Сравнение</span></a>
                        </li>
                        <li class="favorite-status hidden-lg-down">
                          <a href="/user/favourite" <?php print $favourite_modal_params;  ?>><span class="icon-normal icon-heart-thick"></span><span class="indicator">0</span><span class="tooltip">Избранное</span></a>
                        </li>
                        <?php if(!$logged_in): ?>
                        <li><a href="#" class="trigger-smodal" data-id="nslogin"><span class="icon-normal icon-login"></span><span class="tooltip">Вход</span></a></li>
						<!--<li class="hidden-lg-down">   
                            <a href="#" data-toggle="modal" data-target="#login-modal"><span class="icon-normal icon-login"></span></a>
                        </li>-->
                        <?php else: ?>
                        <li class="hidden-lg-down user-menu expanded">
                        	<a href="/user"><span class="icon-normal icon-logout"></span><span class="tooltip">Выход</span></a>
                            <!--a href="/user/logout"><span class="icon-normal icon-logout"></span></a-->
                            <!--logged-in-menu  <a href="#"><img src="/sites/all/themes/bp_pink/images/d-avatar.png" class="avatar"><span class="icon-small icon-arrow-down-thick icon"></span></a>-->
                            <ul class="<?php echo strpos($bp_path, 'user') ? 'user_cab_panel': '' ?> text-normal inline-menu no-face">
                             <li class="<?php echo !strpos($bp_path, 'orders') ? '' : 'active-trail'; ?>"><a href="/user/orders" title="Мои заказы">Мои заказы</a></li>
                               <li class="<?php echo $bp_path != '/user' ? '' : 'active-trail'; ?>"><a href="/user" title="Личные данные">Личные данные</a></li>
                                <li class="<?php echo !strpos($bp_path, 'settings') ? '' : 'active-trail'; ?>"><a href="/user/settings" title="Смена телефона/почты">Смена телефона/почты</a></li>
                                <li class="<?php echo !strpos($bp_path, 'change-password') ? '' : 'active-trail'; ?>"><a href="/user/change-password" title="Смена пароля">Смена пароля</a></li>
                                <li><a href="/user/logout" title="Выйти">Выйти</a></li>
                            
                                <!--li class="<?php // echo !strpos($bp_path, 'user') ? '' : 'active-trail'; ?>"><a href="/user" title="Персональные данные">Персональные данные</a></li-->
                                <!--<li><a href="/user/settings" title="Настройки">Настройки</a></li>-->
                                <!--<li><a href="/user/bonus" title="Мои баллы">Мои баллы</a></li>-->
                                <!--<li><a href="/user/favourite" title="Избранное">Избранное</a></li>-->
                                <!--li class="<?php // echo !strpos($bp_path, 'orders') ? '' : 'active-trail'; ?>"><a href="/user/orders" title="Заказы">Заказы</a></li-->
                            </ul> 
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
			<?php 
			//$u = user_load(1);
			//print_R($u->name);
			//user_save($u, array("pass" => 'd123456789'));
			?>
			<div class="search-block-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-9 col-sm-10">
                            <div class="position-relative">
                                <div class="search-block">
                                    <form action="/search-products">
                                        <input type="text">
                                        <input type="submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 col-sm-2 text-right">
                            <a href="#" class="trigger-close-search active"><span class="icon-normal icon-cross-slim"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header-additional">
        <div id="mainmenu-dropdown-wrapper"></div>
        <div id="megamenu-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="bp-megamenu-carousels" class="px-3 py-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="ajax-loader"></div>
        </div>
    </div>
    <div id="cart-preview-wrapper" class="container">
        <div id="cart-preview">
            <div id="cart-preview-inner" class="shadow-normal">
                <div class="px-2 py-2 text-center">
                    <p class="cart-info text-small mb-2">Вы добавили в корзину <span class="cart-subtotal-products">0 продуктов</span>:</p>
                    <div id="bp-carousel-cart-preview"></div>
                    <div class="btn-wrapper">
                      <a href="/cart" class="<?php print $add_class; ?>btn btn-oval bg-pink text-small" <?php print $data_id; ?>>Перейти в корзину</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php /* if($logged_in && strpos($bp_path, 'user') ){ ?>
    <div class='user_cabinet_menu'>
    	<div class='container'>
    		<ul>
    			<li>
    				<a href='/user/orders'>Мои заказы</a>
    			</li>
    			<li>
    				<a href='/user'>Личные данные</a>
    			</li>
    			<li>
    				<a href='/user/settings'>Смена телефона/почты</a>
    			</li>
    			<li>
    				<a href='/user/change-password'>Смена пароля</a>
    			</li>
    			<li>
    				<a href='/user/logout'>Выйти</a>
    			</li>
    		</ul>
    	</div>
    </div>
    <?php } */?>
</header>
<style>
.user_cabinet_menu{
	height:30px;
	background:#6b1485;
}
.user_cabinet_menu ul li {
    float: left;
    width: 20%;
    text-align: center;
	    padding: 5px;

	list-style-type: none;
}
.user_cabinet_menu ul li a{
		color:#e5d2eb;
	
}
</style>
