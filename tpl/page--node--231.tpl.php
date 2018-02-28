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
  <div class="container">
    <?php $breadcrumbs_arr = bp_shop_get_breagcrumbs_theme_arr(false); print render($breadcrumbs_arr); ?>
  </div>
  <ul id="menu" class="menu-list">
    <li data-menuanchor="brand" class="menu-item active"><a href="#brand">Бренд</a></li>
    <li data-menuanchor="history" class="menu-item"><a href="#history">История</a></li>
    <li data-menuanchor="mission" class="menu-item"><a href="#mission">Миссия</a></li>
    <li data-menuanchor="phylosophy" class="menu-item"><a href="#phylosophy">Философия</a></li>
    <li data-menuanchor="news" class="menu-item"><a href="#news">Новости</a></li>
    <li id="move-section-down"><span><span class="icon-arrow-down-thick"></span>Далее</span></li>
  </ul>
  <div class="block-about" id="fullpage" data-speed="2">

    <div class="section section-brand fp-section fp-table active" id="section1" data-anchor="brand">
      <div class="container" id= "brand">
        <div class="middle-container col-xl-10 col-force-center">
          <h1 class="thin uppercase">О бренде</h1>
          <div class="block-about--slogan thin uppercase">
            <div class="block-about--slogan-wrapper">
              <span class="line"></span>
              <div class="descr">красота,<br /> счастье,<br /> забота о себе</div>
            </div>
          </div>
          <div class="block-about--viewmore">
            <a class="close" href="">
              <span class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="scrolling-content">
              <div class="scrolling-content--inner light">
                <h3 class="uppercase pink"><strong>«Черный Жемчуг»</strong> — бренд, стоявший у истоков российского косметического рынка, сформировавший рынок и его тренды.</h3>
                <p>Современный российский косметический рынок зародился в 1996 г., когда на полках массово появилась продукция международных брендов. Она была чем-то невиданным, признаком настоящего люкса.</p>
                <p>Альтернативой были дешевые немарочные отечественные продукты. Именно тогда группой высококлассных российских косметологов было принято решение наладить выпуск качественной, но доступной косметики под российской маркой. В процессе создания марки «Черный Жемчуг» был реализован многолетний опыт российских косметологов в разработке косметических продуктов, учитывающих специфику и предпочтения российских женщин, а в производство внедрены инновационные технологии и высокотехнологичное оборудование.</p> 
                <p>Уже через 2 года марка «Черный Жемчуг» заняла лидирующие позиции и фактически сформировала российский рынок косметики для ухода за собой. На сегодняшний день «Черный Жемчуг» является самым узнаваемым, используемым и любимым косметическим брендом российских женщин!*</p>
                <p>Наше вдохновение — это красота российских женщин, для которых мы создаем косметику. </p>
                <p class="text-small">* на основании данных AC Nielson.</p>
              </div>
            </div>
          </div>          
          <div class="block-about--description">
            <p>«Черный  Жемчуг» — это большой бренд, который любят миллионы женщин. Он несет в себе ценности красоты, счастья, заботы о себе, экспертизы в красоте.</p>
            <a href="" class="underline">Подробнее</a>
          </div>
        </div>
        <div class="pos-bottom"><img src="/<?php print path_to_theme();?>/images/about-brand-bg-bottom.png" /></div>
        <div class="pos-tl"><img src="/<?php print path_to_theme();?>/images/about-brand-bg-tl.png" /></div>
        <div class="pos-r"><img src="/<?php print path_to_theme();?>/images/about-brand-bg-r.png" /></div>
        <div class="pos-tube"><img src="/<?php print path_to_theme();?>/images/about-brand-bg-tube.png" alt="Мицеллярная вода для снятия макияжа" /></div>        
      </div>
    
    </div>  
    <div class="section section-history fp-section fp-table" id="section2" data-anchor="history">
      <div class="container" id= "history">
        <div class="middle-container col-xl-10 col-force-center">
          <h2 class="thin uppercase">История</h2>
          <div class="sup-header light uppercase">Наше вдохновение – наши женщины</div>
          <div class="block-about--slogan thin uppercase">
            <div class="block-about--slogan-wrapper">
              <div class="sub-header">бренда</div>
              <span class="line"></span>
              <div class="descr">у истоков<br /> косметического<br /> рынка </div>
            </div>
          </div>
          <div class="block-about--viewmore">
            <a class="close" href="">
              <span class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="scrolling-content">
              <div class="scrolling-content--inner light">
                <p><strong class="pink bold">1996 г.</strong> — «Черный Жемчуг» выпускает свой первый крем для лица. Высокое качество продукта производит революцию в российской косметической индустрии: до этого косметика такого уровня в России не производилась.</p>
                <p><strong class="pink bold">1997 г.</strong> — с появлением новых средств марка «Черный Жемчуг» предлагает полноценный комплекс для ежедневного ухода.</p>
                <p><strong class="pink bold">2005 г.</strong> — «Черный Жемчуг» осуществляет редизайн и выпускает несколько линий по уходу за лицом: «Упругость», «Лифтинг», «Аквабаланс».</p>
                <p><strong class="pink bold">2006 г.</strong> — «Черный Жемчуг» снова удивляет российских женщин: на рынке появляется декоративная косметика марки. Она разрабатывается с использованием активных компонентов по уходу за кожей на одном из крупнейших предприятий Италии, Intercos SPA. </p>
                <p><strong class="pink bold">2009 г.</strong> — «Черный Жемчуг» вновь производит революцию на косметическом рынке, впервые в истории развития косметологии предложив уход в соответствии с возрастными потребностями кожи.</p>
                <p><strong class="pink bold">2010 г.</strong> — «Черный Жемчуг» значительно расширяет ассортимент своих продуктов. Появляются специальные программы красоты, способные решать различные проблемы кожи: крема-эксперты, BIO-программа, возрастные программы, IDILICA.</p>
                Накопленные за длительный период времени знания и опыт позволяют марке «Черный Жемчуг» коренным образом пересмотреть подход к сохранению красоты и молодости кожи — в 2013 г. это находит воплощение в изменениях бренда с появлением линейки «Самоомоложение».</p>
                <p><strong class="pink bold">2015 г.</strong> — на рынке появляется новинка Dream Cream, средства по уходу за молодой кожей и инновационная линейка «Очищение+Уход», в каждом средстве которой содержится 20% ухаживающей сыворотки, которая действует даже после смывания продукта.</p>
              </div>
            </div>
          </div>             
          <div class="block-about--description">
            <p>Черный Жемчуг — бренд, стоявший у истоков российского косметического рынка. На сегодня это самый любимый косметический бренд росссийских женщин!</p>
            <a href="" class="underline">Подробнее</a>
          </div>
        </div>
        <div class="pos-bottom"><img src="/<?php print path_to_theme();?>/images/about-history-bg-bottom.png" /></div>
        <div class="pos-bl"><img src="/<?php print path_to_theme();?>/images/about-history-bg-bl.png" /></div>
        <div class="pos-tube"><img src="/<?php print path_to_theme();?>/images/about-history-bg-tube.png" alt="Косметика для лица Черный жемчуг" /></div>             
      </div>
    </div>  
    <div class="section section-mission fp-section fp-table" id="section3" data-anchor="mission">
      <div class="container" id= "mission">
        <div class="middle-container col-xl-10 col-force-center">
          <h2 class="thin uppercase black">Миссия</h2>
          <div class="sup-header light uppercase"><span>“</span> нас объединяет красота</div>
          <div class="block-about--slogan thin white">
            <div class="block-about--slogan-wrapper">
              <div class="sub-header">бренда</div>
              <span class="line"></span>
              <div class="descr">сделать красоту<br /> доступной<br /> и возможной</div>
            </div>
          </div>
          <div class="block-about--viewmore">
            <a class="close" href="">
              <span class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="scrolling-content">
              <div class="scrolling-content--inner light">
                <h3 class="uppercase"><strong>«Черный Жемчуг»</strong> — это большой бренд, который любят миллионы женщин.</h3>
                <p>Мы хотим дать нашим женщинам нечто большее, чем просто хорошие косметические продукты: ценности красоты, счастья, заботы о себе, экспертизы в области ухода за кожей. <br />
                Нас объединяет красота!</p>
                <p>В 2017 г. «Черный Жемчуг» проводит ряд инициатив в разных регионах России, которые позволят стать ближе к нашим женщинам.</p>                
              </div>
            </div>
          </div>            
          <div class="block-about--description">
            <p>«Черный  Жемчуг» ставит перед собой задачу раскрыть потенциал красоты каждой женщины, показав ей, как она может выглядеть в свой «эталон возраста». Ты прекрасна – действуй!</p>
           <a href="" class="underline">Подробнее</a>
          </div>
        </div>
        <div class="pos-t"><img src="/<?php print path_to_theme();?>/images/about-mission-bg-top.png" /></div>
        <div class="pos-br"><img src="/<?php print path_to_theme();?>/images/about-mission-bg-br.png" /></div>
        <div class="pos-bottom"><img src="/<?php print path_to_theme();?>/images/about-mission-bg-bottom.png" /></div>
        <div class="pos-tube"><img src="/<?php print path_to_theme();?>/images/about-mission-bg-tube.png" alt="Крем-сыворотка для век" /></div>            
      </div>
    </div>  
    <div class="section section-phylosophy fp-section fp-table" id="section4" data-anchor="phylosophy">
      <div class="container">
        <div class="middle-container col-xl-10 col-force-center">
          <h2 class="thin uppercase">Философия</h2>
          <div class="block-about--slogan thin">
            <div class="block-about--slogan-wrapper">
              <div class="sub-header">бренда</div>
              <span class="line"></span>
              <div class="descr">мы хотим дать<br /> нечто<br /> большее</div>
            </div>
          </div>
          <div class="block-about--viewmore">
            <a class="close" href="">
              <span class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="scrolling-content">
              <div class="scrolling-content--inner light">
                <h3 class="uppercase"><strong>«Черный Жемчуг»</strong> — бренд, стоявший у истоков российского косметического рынка, сформировавший рынок и его тренды.</h3>
                <p>Современный российский косметический рынок зародился в 1996 г., когда на полках массово появилась продукция международных брендов. Она была чем-то невиданным, признаком настоящего люкса.</p>
                <p>Альтернативой были дешевые немарочные отечественные продукты. Именно тогда группой высококлассных российских косметологов было принято решение наладить выпуск качественной, но доступной косметики под российской маркой. В процессе создания марки «Черный Жемчуг» был реализован многолетний опыт российских косметологов в разработке косметических продуктов, учитывающих специфику и предпочтения российских женщин, а в производство внедрены инновационные технологии и высокотехнологичное оборудование.</p> 
                <p>Уже через 2 года марка «Черный Жемчуг» заняла лидирующие позиции и фактически сформировала российский рынок косметики для ухода за собой. На сегодняшний день «Черный Жемчуг» является самым узнаваемым, используемым и любимым косметическим брендом российских женщин!*</p>
                <p>Наше вдохновение — это красота российских женщин, для которых мы создаем косметику. </p>                
              </div>
            </div>
          </div>            
          <div class="block-about--description">
            <p>Мы хотим больше, чем просто создавать для наших женщин хорошие косметические продукты. Мы хотим нести в общество ценности, которые объединяют нас с женщинами, которые выбирают Черный Жемчуг.</p>
            <a href="" class="underline">Подробнее</a>
          </div>
        </div>
        <div class="pos-bottom"><img src="/<?php print path_to_theme();?>/images/about-phylosophy-bg-bottom.png" /></div>
        <div class="pos-bl"><img src="/<?php print path_to_theme();?>/images/about-phylosophy-bg-bl.png" /></div>
        <div class="pos-br"><img src="/<?php print path_to_theme();?>/images/about-phylosophy-bg-br.png" /></div>
        <div class="pos-tube"><img src="/<?php print path_to_theme();?>/images/about-phylosophy-bg-tube.png" alt="ВВ-крем для лица" /></div>           
      </div>
    </div>  
    <div class="section section-news fp-section fp-table" id="section5" data-anchor="news">
      <div class="container">
        <div class="middle-container col-xl-10 col-force-center">
          <h2 class="thin uppercase">Новости</h2>
          <div class="block-about--slogan thin">
            <div class="block-about--slogan-wrapper">
              <div class="sub-header">события</div>
              <span class="line"></span>
              <div class="descr">мы рады поделиться<br /> приятными<br /> новостями</div>
            </div>
          </div>
          <div class="viewmore light uppercase"><div></div></div>
          <div class="block-about--viewmore">
            <a class="close" href="">
              <span class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="scrolling-content">
              <div class="scrolling-content--inner light">
                <h3 class="uppercase">Best of Beauty 2016</h3>
                <p>Сразу два продукта «Черного Жемчуга» были удостоены награды в рамках премии Best of Beauty 2016.<br />
                Пенка-мусс для умывания 2 в 1 «Очищение+Уход» для нормальной и комбинированной кожи стала лучшей пенкой для умывания. Она бережно очищает кожу без пересушивания, а также справляется со снятием даже яркого макияжа. 
                Лучшим антивозрастным ВВ-кремом стал «Черный Жемчуг. Самоомоложение, 36+». Лифтинг-эффект, равномерное нанесение, универсальный тон — все выделило наш ВВ-крем среди претендентов.</p>

                <h3 class="uppercase">METRO EXPO 2017</h3>
                <p>Бренд «Черный Жемчуг» стал одним из участников выставки METRO EXPO. Гости получили консультацию профессионального косметолога с применением специального сканера состояния кожи и составлением индивидуальных рекомендаций по уходу.<br />
                Посетители нашего стенда также получили подарки: сашеты средств ВВ-крема «Самоомоложение, 46+» и крем-геля из линейки «Очищение+Уход». <br />
                А наша команда визажистов предложила гостям METRO EXPO 2017 экспресс-макияж и укладку с помощью мобильных мейкап-станций.</p>

                <h3 class="uppercase">Ежегодная премия ANTI-AGING</h3>
                <p>В апреле 2017 г. журнал «Домашний Очаг» удостоил награды сразу два наших продукта в рамках своей ежегодной премии ANTI-AGING.</p>                
              </div>
            </div>
          </div>            
          <div class="block-about--description">
            <p>Черный Жемчуг получил две награды в рамках премии Best of Beauty 2016 В ноябре 2016 года журнал Allure подводил итоги своей ежегодной Экспертной премии в области красоты Best of beauty.</p>
            <a href="" class="underline">Подробнее</a>
          </div>
        </div>
        <div class="pos-tl"><img src="/<?php print path_to_theme();?>/images/about-news-bg-tl.png" /></div>
        <div class="pos-br"><img src="/<?php print path_to_theme();?>/images/about-news-bg-br.png" /></div>            
      </div>
    </div>  
 
	</div>
	<div class="bp-footer-vessel"></div>
</main>

<?php include_once('inc/bp_footer.tpl.php'); ?>
