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
  <div class="block-questions">
    <div class="block-questions--header">
      <h2 class="text-center thin white">Есть вопросы? <br />Наш эксперт ответит<br /> вам на них</h2>
    </div>
    <div class="container">
      <?php //print $breadcrumbs; ?>
      <ul class="breadcrumbs with-arrow">
        <li><a href="">Главная</a></li>
        <li><a href="">Подбор продукта</a></li>
        <li>Задайте вопрос эксперту</li>
      </ul>
      <div class="block-questions--body row">
        <div class="col-12 col-lg-6 col-md-6">
          <div class="mr-2">
            <div class="title mb-4">задайте свой вопрос</div>
            <form>
              <div class="form-item">
                <select class="form-select" id="" name="" />
                  <option value="" selected="selected">Тип кожи</option>
                  <option value="">Тип кожи: комбинированная</option>
                  <option value="">Тип кожи: некомбинированная</option>
                  <option value="">Тип кожи: перекомбинированная</option>
                  <option value="">Тип кожи: недокомбинированная</option>
                </select>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-item">
                    <input type="text" value="" id="" name="" class="form-text" placeholder="Имя" />
                  </div>                
                </div>
                <div class="col-6">
                  <div class="form-item">
                    <input type="text" value="" id="" name="" class="form-text" placeholder="Возраст" />
                  </div>                
                </div>                
              </div>
              <div class="form-item">
                <input type="text" value="" id="" name="" class="form-text" placeholder="Электронный адрес" />
              </div>
              <div class="form-item">
                <input type="text" value="" id="" name="" class="form-text" placeholder="Тема вопроса" />
              </div>
              <div class="form-item">
                <textarea id="" name="" class="form-textarea" placeholder="Я хочу спросить"></textarea>
              </div>
              <div class="form-actions">
                <input type="submit" name="" value="Отправить" />
              </div>
            </form>
            
            <!-- message after submit -->
            <div class="message-after-question pink">
              <div class="title mb-4">вопрос отправлен эксперту</div>
              <div class="content">
                <div class="uppercase mb-1">Спасибо за ваш вопрос!</div>
                <div>После обработки вопроса экспертом, ответ будет отправлен на адрес вашей электронной почты.</div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="ml-2">
            <div class="title mb-4">посмотреть все ответы</div>
            <div class="block-questions--list" id="bp-questions">
              <div class="block-questions--list-item uppercase thin">
                <a href="">Проблемы акне, как бороться?</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Где купить?</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Сняли с производства?</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Зона декольте</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Как очистить?</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Все о антивозрастных программах</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Аллергия на косметику</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Зона декольте</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Проблемы акне, как бороться?</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Где купить?</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Сняли с производства?</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Зона декольте</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Как очистить?</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Все о антивозрастных программах</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Аллергия на косметику</a>
              </div> 
              <div class="block-questions--list-item uppercase thin">
                <a href="">Зона декольте</a>
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
