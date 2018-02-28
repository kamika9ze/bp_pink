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
  
<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<?php include_once('inc/bp_header.tpl.php'); ?>
<!-- region top slider -->
<?php print render($page['slider-top']); ?>

<main>
    
    <div class="container">
      <div class="bp-main-content">
          <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          
          <?php print render($page['hits']); ?>
      </div>    
    </div>
    <div class="block-bonus">
      <div class="block-bonus--description">
        <div class="container">
          <div class="content">
            <div class="row">
              <div class="col-12 col-lg-5 col-md-5">
                <h2 class="thin">У Вас <strong class="pink">1600 баллов</strong></h2>
                <div class="title">1 балл = 1 рубль</div>
                <p>Оплачивайте баллами до 25% стоимости заказа.</p>
                <p>Баллы начисляются на следующий день после перехода заказа в статус «Выполнен» (за заказы с товарами партнеров Ozon.ru — через 30 дней).</p>
                <p>Баллы действуют год с момента начисления.</p>
              </div>
              <div class="col-12 col-lg-2 col-md-2 hidden-sm-down"></div>
              <div class="col-12 col-lg-5 col-md-5">
                <h2 class="thin">Введите промо-код</h2>
                <form>
                  <div class="form-item form-type-code">
                    <input type="text" name="" value="" id="" placeholder="Промо-код"  />
                  </div>
                  <div class="form-actions">
                    <input id="edit-submit" name="op" value="Активировать" class="form-submit" type="submit" />                  
                  </div>              
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="block-bonus--rules">
        <div class="container">
          <div class="content white">
            <h2 class="thin text-center">Как получить больше баллов?</h2>
            <div class="row">
              <div class="col-12 col-lg-4 col-md-4">
                <div class="block-bonus--rules-num">1</div>
                <div class="block-bonus--rules-title">Покупайте продукцию «Черный жемчуг»</div>
                <div class="block-bonus--rules-content">Магнит, как бы это ни казалось парадоксальным, перманентно перевозит аккредитив.</div>
              </div>
              <div class="col-12 col-lg-4 col-md-4">
                <div class="block-bonus--rules-num">2</div>
                <div class="block-bonus--rules-title">Оставляйте отзывы о продукте</div>
                <div class="block-bonus--rules-content">Вечнозеленый кустарник иллюстрирует широкий социализм.</div>
              </div>
              <div class="col-12 col-lg-4 col-md-4">
                <div class="block-bonus--rules-num">3</div>
                <div class="block-bonus--rules-title">Покупайте продукцию «Черный жемчуг»</div>
                <div class="block-bonus--rules-content">Конечно, детройтское техно представляет собой речевой акт. </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="block-bonus--history">
        <div class="container">
          <div class="content">
            <h2 class="thin text-center">История баллов</h2>
            <table>
              <thead>
                <tr>
                  <th class="text-left bold uppercase">Действие</th>
                  <th class="text-center bold uppercase">Баланс баллов</th>
                  <th class="text-right bold uppercase">Дата</th>
                </tr>
              </thead>          
              <tbody>
                <tr>
                  <td>Активирован код 12344</td>
                  <td class="text-center bold positive">+10</td>
                  <td class="text-right">21.02.2017</td>
                </tr>
                <tr>
                  <td>Заказан омолаживающий крем для лица</td>
                  <td class="text-center bold negative">-20</td>
                  <td class="text-right">20.02.2017</td>
                </tr>
                <tr>
                  <td>Выигран подарочный набор</td>
                  <td class="text-center bold neutral">0</td>
                  <td class="text-right">19.02.2017</td>
                </tr>
                <tr>
                  <td>Заказан Скраб для тела «Идеальная кожа»</td>
                  <td class="text-center bold positive">+5</td>
                  <td class="text-right">18.02.2017</td>
                </tr>
                <tr>
                  <td>Заказано шелковое молочко для тела «Энергия и упругость»</td>
                  <td class="text-center bold negative">-7</td>
                  <td class="text-right">17.02.2017</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bp-footer-vessel"></div>
</main>
<?php  include_once('inc/bp_footer.tpl.php'); ?>
