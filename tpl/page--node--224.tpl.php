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
  <div class="block-answers">
    <div class="container">
      <?php //print $breadcrumbs; ?>
      <ul class="breadcrumbs with-arrow">
        <li><a href="">Главная</a></li>
        <li><a href="">Подбор продукта</a></li>
        <li><a href="">Задайте вопрос эксперту</a></li>
        <li>Ответ эксперта</li>
      </ul>
      <div class="block-answers--body row">
        <div class="col-xl-7 col-force-center">
          <h2 class="text-center thin pink"><a href=""></a> Проблемы акне, как бороться?</h2>
          <div class="block-answers--list" id="bp-answers">
            <div class="block-answers--list-item">
              <div class="author-question bold text-center">Елена, 24 года, жирная кожа</div>
              <h3 class="text-center thin">Противозачаточные таблетки помогают при прыщах (акне)?</h3>
              <div class="answer">
                <div class="row">
                  <div class="col-12 col-lg-4 col-md-3 text-center pink">
                    <div class="author-wrapper">
                      <img src="/<?php print path_to_theme();?>/images/answer-author.png" />
                      <div class="author-name bold">Ирина Порох</div>
                      <div class="author-position">эксперт марки «Черный жемчуг»</div>                    
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-md-9">                  
                    <div class="author-text">Подход к лечению акне должен быть комплексным – как у подростков, так и у взрослых людей. Недостаточно только правильно питаться или просто пользоваться гелем для умывания. Первый шаг в решении проблемы – это всегда консультация у дерматолога.</div>
                  </div>
                </div>
              </div>
              <div class="answer-social">
                <ul class="float-right social-share inline-menu">
                 	<li><a onclick="Share.facebook('https://www.myblackpearl.ru/')"><span class="icon-social-facebook icon-social-mono"></span></a></li>
                	<li><a onclick="Share.odnoklassniki('https://www.myblackpearl.ru/')"><span class="icon-social-ok icon-social-mono"></span></a></li>
                	<li><a onclick="Share.vkontakte('https://www.myblackpearl.ru/')"><span class="icon-social-vk icon-social-mono"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="block-answers--list-item">
              <div class="author-question bold text-center">Марина, 19 лет, коомбинированная кожа</div>
              <h3 class="text-center thin">Могут быть гормоны причиной прыщей?</h3>
              <div class="answer">
                <div class="row">
                  <div class="col-12 col-lg-4 col-md-3 text-center pink">
                    <div class="author-wrapper">
                      <img src="/<?php print path_to_theme();?>/images/answer-author.png" />
                      <div class="author-name bold">Ирина Порох</div>
                      <div class="author-position">эксперт марки «Черный жемчуг»</div>                    
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-md-9">
                    <div class="author-text">Чтобы достичь какого-либо заметного улучшения состояния кожи лица – необходимо до 4х недель лечения. стандартный курс лечения составляет около 6ти недель, чтобы получить хороший результат и избавиться не только от прыщей, но и от пост-воспалительной пигментации кожи.</div>
                  </div>
                </div>
              </div>
              <div class="answer-social">
                <ul class="float-right social-share inline-menu">
                  <li><a href="#"><span class="icon-social-google icon-social-mono"></span></a></li>
                  <li><a href="#"><span class="icon-social-ok icon-social-mono"></span></a></li>
                  <li><a href="#"><span class="icon-social-vk icon-social-mono"></span></a></li>
                </ul>
              </div>
            </div>
         
            <div class="block-answers--list-item">
              <div class="author-question bold text-center">Елена, 24 года, жирная кожа</div>
              <h3 class="text-center thin">Противозачаточные таблетки помогают при прыщах (акне)?</h3>
              <div class="answer">
                <div class="row">
                  <div class="col-12 col-lg-4 col-md-3 text-center pink">
                    <div class="author-wrapper">
                      <img src="/<?php print path_to_theme();?>/images/answer-author.png" />
                      <div class="author-name bold">Ирина Порох</div>
                      <div class="author-position">эксперт марки «Черный жемчуг»</div>                    
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-md-9">
                    <div class="author-text">Подход к лечению акне должен быть комплексным – как у подростков, так и у взрослых людей. Недостаточно только правильно питаться или просто пользоваться гелем для умывания. Первый шаг в решении проблемы – это всегда консультация у дерматолога.</div>
                  </div>
                </div>
              </div>
              <div class="answer-social">
                <ul class="float-right social-share inline-menu">
                  <li><a href="#"><span class="icon-social-google icon-social-mono"></span></a></li>
                  <li><a href="#"><span class="icon-social-ok icon-social-mono"></span></a></li>
                  <li><a href="#"><span class="icon-social-vk icon-social-mono"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="block-answers--list-item">
              <div class="author-question bold text-center">Марина, 19 лет, коомбинированная кожа</div>
              <h3 class="text-center thin">Могут быть гормоны причиной прыщей?</h3>
              <div class="answer">
                <div class="row">
                  <div class="col-12 col-lg-4 col-md-3 text-center pink">
                    <div class="author-wrapper">
                      <img src="/<?php print path_to_theme();?>/images/answer-author.png" />
                      <div class="author-name bold">Ирина Порох</div>
                      <div class="author-position">эксперт марки «Черный жемчуг»</div>                    
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-md-9">
                    <div class="author-text">Чтобы достичь какого-либо заметного улучшения состояния кожи лица – необходимо до 4х недель лечения. стандартный курс лечения составляет около 6ти недель, чтобы получить хороший результат и избавиться не только от прыщей, 
но и от пост-воспалительной пигментации кожи.</div>
                  </div>
                </div>
              </div>
              <div class="answer-social">
                <ul class="float-right social-share inline-menu">
                  <li><a href="#"><span class="icon-social-google icon-social-mono"></span></a></li>
                  <li><a href="#"><span class="icon-social-ok icon-social-mono"></span></a></li>
                  <li><a href="#"><span class="icon-social-vk icon-social-mono"></span></a></li>
                </ul>
              </div>
            </div>
         
            <div class="block-answers--list-item">
              <div class="author-question bold text-center">Елена, 24 года, жирная кожа</div>
              <h3 class="text-center thin">Противозачаточные таблетки помогают при прыщах (акне)?</h3>
              <div class="answer">
                <div class="row">
                  <div class="col-12 col-lg-4 col-md-3 text-center pink">
                    <div class="author-wrapper">
                      <img src="/<?php print path_to_theme();?>/images/answer-author.png" />
                      <div class="author-name bold">Ирина Порох</div>
                      <div class="author-position">эксперт марки «Черный жемчуг»</div>                    
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-md-9">
                    <div class="author-text">Подход к лечению акне должен быть комплексным – как у подростков, так и у взрослых людей. Недостаточно только правильно питаться или просто пользоваться гелем для умывания. Первый шаг в решении проблемы – это всегда консультация у дерматолога.</div>
                  </div>
                </div>
              </div>
              <div class="answer-social">
                <ul class="float-right social-share inline-menu">
                  <li><a href="#"><span class="icon-social-google icon-social-mono"></span></a></li>
                  <li><a href="#"><span class="icon-social-ok icon-social-mono"></span></a></li>
                  <li><a href="#"><span class="icon-social-vk icon-social-mono"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="block-answers--list-item">
              <div class="author-question bold text-center">Марина, 19 лет, коомбинированная кожа</div>
              <h3 class="text-center thin">Могут быть гормоны причиной прыщей?</h3>
              <div class="answer">
                <div class="row">
                  <div class="col-12 col-lg-4 col-md-3 text-center pink">
                    <div class="author-wrapper">
                      <img src="/<?php print path_to_theme();?>/images/answer-author.png" />
                      <div class="author-name bold">Ирина Порох</div>
                      <div class="author-position">эксперт марки «Черный жемчуг»</div>                    
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-md-9">
                    <div class="author-text">Чтобы достичь какого-либо заметного улучшения состояния кожи лица – необходимо до 4х недель лечения. стандартный курс лечения составляет около 6ти недель, чтобы получить хороший результат и избавиться не только от прыщей, 
но и от пост-воспалительной пигментации кожи.</div>
                  </div>
                </div>
              </div>
              <div class="answer-social">
                <ul class="float-right social-share inline-menu">
                  <li><a href="#"><span class="icon-social-google icon-social-mono"></span></a></li>
                  <li><a href="#"><span class="icon-social-ok icon-social-mono"></span></a></li>
                  <li><a href="#"><span class="icon-social-vk icon-social-mono"></span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
	<div class="bp-footer-vessel"></div>
</main>
<?php include_once('inc/bp_footer.tpl.php'); ?>
