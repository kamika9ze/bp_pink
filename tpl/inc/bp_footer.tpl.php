
<?php 
global $base_root;
?>
<footer id="bp-main-footer">
    <div id="bp-footer-bottom" class="container">
        <div class="row">
            <div class="col-12 col-lg-12 black hidden-sm-down">
                <div class="row py-1 delimeter">
                    <div class="col-md-3 col-sm-hidden buy_foot_box">
                    	<a href="<?= $base_root."/node/264"?>" class="w-buy buy-product">Где купить</a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="title-small text-center light">«Черный Жемчуг» — нас объединяет красота</div>
                    </div>
                    <div class="col-md-3 col-sm-12 text-right">
                        <div class="footer-subscribe-block">
                        	<div class=" hidden-xs-up">
                        		<a href="<?= $base_root."/node/264"?>" class="w-buy buy-product">Где купить</a>
                        	</div>
                            <div class="footer-subscribe btn-wrapper">
                            	<a href="#" data-toggle="modal" data-target="#modal-subscribe" class="w-buy subs-prod">Подписаться</a>
                            </div>
                        <?php /*  <ul class="footer-social social-share inline-menu">
                                <li><a onclick="Share.facebook('https://www.myblackpearl.ru/')"><span
                                                class="icon-social-facebook icon-social-mono"></span></a></li>
                                <li><a onclick="Share.odnoklassniki('https://www.myblackpearl.ru/')"><span
                                                class="icon-social-ok icon-social-mono"></span></a></li>
                                <li><a onclick="Share.vkontakte('https://www.myblackpearl.ru/')"><span
                                                class="icon-social-vk icon-social-mono"></span></a></li>
                            </ul> */?>   
                            
                            
                            


                            
                             <ul class="footer-social social-share inline-menu">
                                <li><a href='https://www.youtube.com/user/BlackPearlRussia' target='_blank'><span class="icon-social-yt icon-social-mono"></span></a></li>
                                <li><a href='https://ok.ru/blackpearlrussia' target='_blank'><span class="icon-social-ok icon-social-mono"></span></a></li>
                                <li><a href='https://vk.com/blackpearlrussia' target='_blank'><span class="icon-social-vk icon-social-mono"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row delimeter-top py-1">
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="copyright text-normal regular hidden-xs-down">
                            © Черный Жемчуг 2017, Россия<br>
                            <a target="_blank"
                               href="https://www.unilever.ru/Images/8infopersonaldata_tcm1315-510570_ru.pdf"
                               class="pink">Политика персональных данных</a><br>
                            <a target="_blank" href="/<?php print path_to_theme(); ?>/images/user-agreement.pdf"
                               class="pink">Условия использования сайта</a><br>
                            <a target="_blank" href="http://www.unilevercookiepolicy.com/russian/policy.aspx"
                               class="pink">Политика cookie</a>
                        </div>
                        <div class="copyright text-micro regular hidden-sm-up text-center">
                            © Черный Жемчуг 2017, Россия<br>
                            <a href="https://www.unilever.ru/Images/8infopersonaldata_tcm1315-510570_ru.pdf"
                               class="pink">Политика персональных данных</a> <a
                                    href="https://www.lesnoybalzam.ru/static/user-agreement.pdf" class="pink">Условия
                                использования сайта</a> <a
                                    href="http://www.unilevercookiepolicy.com/russian/policy.aspx" class="pink">Политика
                                cookie</a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-12">
                    	<script type="text/javascript" src="//vk.com/js/api/openapi.js?150"></script>
                        <!-- VK Widget -->
                    	<div id="vk_groups"></div>
                        <script type="text/javascript">
                            VK.Widgets.Group("vk_groups", {mode: 1, no_cover: 1}, 42661623);
                        </script>
                    </div>
                    <div class="col-xl-3 col-md-3 col-12 wrap-social-links">
                        <div class="addresses text-normal regular hidden-xs-down text-left">
                            <div id="social-likes">
                                <?php
                                $path = current_path();
                                $path_alias = drupal_lookup_path('alias', $path);
                                $full_url = $base_root . '/' . $path_alias;
                                ?>
                                <div id="vk_like">
                                    <iframe name="fXD64bd6" frameborder="0"
                                            src="https://vk.com/widget_like.php?app=5795402&amp;width=100%25&amp;_ver=1&amp;page=0&amp;url=https%3A%2F%2Fwww.myblackpearl.ru%2F&amp;type=mini&amp;verb=0&amp;color=&amp;title=.%20%D0%9E%D1%84%D0%B8%D1%86%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9%20%D1%81%D0%B0%D0%B9%D1%82&amp;description=%D0%92%D1%81%D0%B5%20%D0%BA%D1%80%D0%B5%D0%BC%D0%B0%20%D1%81%D0%B5%D1%80%D0%B8%D0%B8%20%C2%AB%D0%A7%D0%B5%D1%80%D0%BD%D1%8B%D0%B9%20%D0%B6%D0%B5%D0%BC%D1%87%D1%83%D0%B3%C2%BB%20%D0%BD%D0%B0%20%D1%81%D0%B0%D0%B9%D1%82%D0%B5%20Myblackpearl.%20%D0%98%D0%BD%D0%BD%D0%BE%D0%B2%D0%B0%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D1%8B%D0%B9%20%D0%B4%D0%BD%D0%B5%D0%B2%D0%BD%D0%BE%D0%B9%20%D0%B0%D0%BD%D1%82%D0%B8%D0%B2%D0%BE%D0%B7%D1%80%D0%B0%D1%81%D1%82%D0%BD%D0%BE%D0%B9%20%D0%BA%D1%80%D0%B5%D0%BC%20%D0%B4%D0%BB%D1%8F%20%D0%BB%D0%B8%D1%86%D0%B0%2C%20%D1%80%D1%83%D0%BA%20%D0%B8%20%D1%82%D0%B5%D0%BB%D0%B0%20%C2%AB%D0%A1%D0%B0%D0%BC%D0%BE%D0%BE%D0%BC%D0%BE%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5%C2%BB%2C%20%C2%AB%D0%94%D1%80%D0%B8%D0%BC%20%D0%BA%D1%80%D0%B8%D0%BC%C2%BB%20(Dream%20Cream...&amp;image=https%3A%2F%2Fwww.myblackpearl.ru%2Fimg%2Flogo2.png&amp;text=&amp;h=20&amp;height=20&amp;startWidth=45&amp;referrer=&amp;15e5dd43535"
                                            width="100%" height="20" scrolling="no" id="vkwidget2"
                                            style="overflow: hidden; height: 20px; width: 115px; z-index: 150;"></iframe>
                                </div>
                                <div>
                                    <div fb-iframe-plugin-query="action=like&amp;app_id=322519624614691&amp;container_width=0&amp;href=<?php print urlencode($full_url); ?>&amp;layout=button_count&amp;locale=ru_RU&amp;sdk=joey&amp;share=false&amp;show_faces=false&amp;size=small"
                                         fb-xfbml-state="rendered" data-share="false" data-show-faces="false"
                                         data-size="small" data-action="like" data-layout="button_count"
                                         data-href="https://www.myblackpearl.ru/" class="fb-like fb_iframe_widget">
                                         <span>
                                         	<iframe name="f2d62dbef6761c4" width="1000px" height="1000px" frameborder="0"
                                                    allowtransparency="true" allowfullscreen="true" scrolling="no"
                                                    title="fb:like Facebook Social Plugin"
                                                    src="https://www.facebook.com/v2.8/plugins/like.php?action=like&amp;app_id=322519624614691&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0sTQzbapM8j.js%3Fversion%3D42%23cb%3Df1f07bacd94b1dc%26domain%3Dwww.myblackpearl.ru%26origin%3Dhttps%253A%252F%252Fwww.myblackpearl.ru%252Ff1ee28a01fc3354%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fwww.myblackpearl.ru%2F&amp;layout=button_count&amp;locale=ru_RU&amp;sdk=joey&amp;share=false&amp;show_faces=false&amp;size=small"
                                                    class=""
                                                    style="border: none; visibility: visible; width: 97px; height: 20px;">
                                             </iframe>
                                         </span>
                                    </div>
                                </div>
                               	<div id="ok_shareWidget">
                                    <iframe id="__okShare0" scrolling="no" frameborder="0"
                                            src="https://connect.ok.ru/dk?st.cmd=WidgetShare&amp;st.shareUrl=<?php print urlencode($full_url); ?>&amp;st.title=%D0%A7%D0%B5%D1%80%D0%BD%D1%8B%D0%B9%20%D0%96%D0%B5%D0%BC%D1%87%D1%83%D0%B3%20-%20%D0%9E%D1%84%D0%B8%D1%86%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9%20%D1%81%D0%B0%D0%B9%D1%82&amp;st.description=&amp;st.imageUrl=&amp;st.fid=__okShare0&amp;st.hoster=https%3A%2F%2Fwww.myblackpearl.ru%2F&amp;st.settings=%7B%22sz%22%3A20%2C%22st%22%3A%22rounded%22%2C%22ck%22%3A3%7D"
                                            style="border: 0px; width: 116px; height: 20px;"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="addresses text-normal regular hidden-xs-down text-right">
                            ООО "Юнилевер Русь"<br>
                            г. Москва, ул. Сергея Макеева, д. 13<br>
                            т: +7 (495) 745 75 00<br>
                            <a class="pink" href="mailto:communication.Russia@unilever.com">communication.Russia@unilever.com</a><br>
                            Горячая линия 8 800 200 1 200 (бесплатно по России)
                        </div>
                        <div class="addresses text-micro regular hidden-sm-up text-center mt-1">
                            ООО "Юнилевер Русь"<br>
                            г. Москва, ул. Сергея Макеева, д. 13 т: +7 (495) 745 75 00 <a class="pink"
                                                                                          href="mailto:communication.Russia@unilever.com">communication.Russia@unilever.com</a><br>
                            Горячая линия 8 800 200 1 200 (бесплатно по России)
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 black hidden-sm-up">
                <div class="row py-1 pt-2">
                    <div class="col-12 pb-2">
                        <div class="title-small text-center light">«Черный Жемчуг» — нас объединяет красота</div>
                    </div>
                    <div class="col-4 text-left footer-box-social">
                        <div class="footer-subscribe-block">
                            <ul class="footer-social social-share inline-menu float-left">
                                <li><a onclick="Share.facebook('https://www.myblackpearl.ru/')"><span
                                                class="icon-social-facebook icon-social-mono"></span></a></li>
                                <li><a onclick="Share.odnoklassniki('https://www.myblackpearl.ru/')"><span
                                                class="icon-social-ok icon-social-mono"></span></a></li>
                                <li><a onclick="Share.vkontakte('https://www.myblackpearl.ru/')"><span
                                                class="icon-social-vk icon-social-mono"></span></a></li>
                            </ul>
                        </div>
                    </div>                   
                    <div class="col-4 footer-box-button1">
                        <div class="footer-subscribe-block">
                            <div class="footer-subscribe btn-wrapper">
                                <a href="<?= $base_root."/node/264"?>"  class="btn btn-big btn-outline-white inline-block">Где купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 footer-box-button2">
                        <div class="footer-subscribe-block">
                            <div class="footer-subscribe btn-wrapper">
                                <a href="#" data-toggle="modal" data-target="#modal-subscribe" class="btn btn-big btn-outline-white inline-block">Подписаться</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-2 delimeter-top">
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="copyright text-normal regular">
                            <p>&copy; Черный Жемчуг 2017, Россия</p>
                            <p><a target="_blank"
                                  href="https://www.unilever.ru/Images/8infopersonaldata_tcm1315-510570_ru.pdf"
                                  class="pink">Политика персональных данных</a></p>
                            <p><a target="_blank" href="/<?php print path_to_theme(); ?>/images/user-agreement.pdf"
                                  class="pink">Условия использования сайта</a></p>
                            <p><a target="_blank" href="http://www.unilevercookiepolicy.com/russian/policy.aspx"
                                  class="pink">Политика cookie</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 delimeter-top pt-2 pb-1">
                        <div class="addresses text-normal regular text-left">
                            <p>ООО "Юнилевер Русь"<br/>
                                г. Москва, ул. Сергея Макеева, д. 13<br/>
                                т: +7 (495) 745 75 00</p>
                            <p><a class="pink" href="mailto:communication.Russia@unilever.com">communication.Russia@unilever.com</a>
                            </p>
                            Горячая линия 8 800 200 1 200 (бесплатно по России)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a class="close" data-dismiss="modal" aria-label="Закрыть">
                <span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
            </a>
        </div>
    </div>
</div>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <a class="close" data-dismiss="modal" aria-label="Закрыть">
                <span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-10 col-force-center text-center">
                        <div class="title-big thin mb-3">Авторизация</div>
                        <form action="/" method="POST" class="form-login mt-3 mb-2">
                            <div class="form-group login">
                                <label for="form-username">Email</label>
                                <input type="text" name="name" id="form-username">
                            </div>
                            <div class="form-group password">
                                <label for="form-password">Пароль</label>
                                <input type="password" name="pass" id="form-password">
                                <!--
                                <div class="eye">
                                        <img class="eye-closed" src="/sites/all/themes/bp_pink/images/ico-eye-closed.svg" alt="Показать пароль">
                                        <img class="eye-opened" src="/sites/all/themes/bp_pink/images/ico-eye-opened.svg" alt="Скрыть пароль">
                                </div>
                                -->
                            </div>
                            <div class="form-group pt-2"><a href="#" class="btn btn-big bg-blue trigger-login">Войти</a>
                            </div>
                            <p>Или <a href="#" class="blue underline">зарегистрироваться</a></p>
                            <div class="info pink mt-2">
                                <?php //print render($page['bp-modal-login']); ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-controls bg-grey-light"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="shipping-rates-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <a class="close" data-dismiss="modal" aria-label="Закрыть">
                <span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-force-center text-center">
                        <div class="title-big thin mb-3">Тарифы на доставку</div>
                        <table class="table text-left">
                            <tr>
                                <td>Пункты выдачи заказов OZON.ru</td>
                                <td class="text-nowrap"><strong>175</strong> <i class="icon-rubble"></i></td>
                            </tr>
                            <tr>
                                <td>Пункты выдачи OZON.ru - МТС в Москве</td>
                                <td class="text-nowrap"><strong>199</strong> <i class="icon-rubble"></i></td>
                            </tr>
                            <tr>
                                <td>Партнерские пункты выдачи OZON.ru</td>
                                <td class="text-nowrap"><strong>110</strong> <i class="icon-rubble"></i></td>
                            </tr>
                            <tr>
                                <td>Почтоматы Pick Point</td>
                                <td class="text-nowrap"><strong>36</strong> <i class="icon-rubble"></i></td>
                            </tr>
                            <tr>
                                <td>Почтоматы InPost</td>
                                <td class="text-nowrap"><strong>74</strong> <i class="icon-rubble"></i></td>
                            </tr>
                            <tr>
                                <td>Курьерская доставка по Москве и Московской области</td>
                                <td class="text-nowrap"><strong>210</strong> <i class="icon-rubble"></i></td>
                            </tr>
                            <tr>
                                <td>Курьерская доставка по Санкт-Петербургу и Ленинградской области</td>
                                <td class="text-nowrap"><strong>150</strong> <i class="icon-rubble"></i></td>
                            </tr>
                            <tr>
                                <td>Курьерская доставка в регионы России</td>
                                <td class="text-nowrap"><strong>180</strong> <i class="icon-rubble"></i></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xl-6 col-force-center"><a href="#" class="custom-btn" data-dismiss="modal">Продолжить</a>
                    </div>
                </div>
            </div>
            <div class="modal-controls bg-grey-light">
                <!--<a href="#" class="custom-btn">Продолжить</a>-->
                <!--<a href="#" class="btn btn-big bg-blue trigger-login">Продолжить</a>-->
            </div>
        </div>
    </div>
</div>
<div class="console-container">
    <div id="console">
        <div class="close-console-cross close-console-btn"><span class="title-small icon-cross cyan"></span></div>
        <div class="console-inner center-content">
            <?php print $messages; ?>
        </div>
    </div>
</div>
<div class="modal fade modal-subscribe" id="modal-subscribe" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <a class="close" data-dismiss="modal" aria-label="Закрыть">
                <span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <?php $subscription_form = drupal_get_form('bp_subscription_form'); ?>
                        <?php print drupal_render($subscription_form); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade modal-compare" id="modal-compare" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <a class="close" data-dismiss="modal" aria-label="Закрыть">
                <span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="modal-body text-center">
                <span class="modal-icon"></span>
                <h3 class="thin mb-2 mt-1">Чтобы начать сравнение продуктов, выберите их в каталоге</h3>
                <div class="modal-footer-full"><a class="pink" href="/catalogue">Выбрать <span
                                class="icon-arrow-right-thick"></span></a></div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade modal-favourite" id="modal-favourite" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <a class="close" data-dismiss="modal" aria-label="Закрыть">
                <span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="modal-body text-center">
                <span class="modal-icon"></span>
                <h2 class="thin mb-2 mt-1">Чтобы добавить продукты в «избранное», выберите их в каталоге</h2>
                <div class="modal-footer-full"><a class="pink" href="/catalogue">Выбрать <span
                                class="icon-arrow-right-thick"></span></a></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-popup-cart" id="modal-popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<a class="close" data-dismiss="modal" aria-label="Закрыть">
                <span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="modal-body text-center">
                <div class="row">
                    <div class="col-12">
                        <h3 class="thin text-center">Оплата не была произведена</h3>
                        <div class="text-center text-subscribe">Пожалуйста, проверьте номер банковской карты или выберите другой способ оплаты.</div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<div class="modal fade modal-popup-cart-ozon" id="modal-popup-cart-ozon" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<a class="close" data-dismiss="modal" aria-label="Закрыть">
                <span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="modal-body text-center">
                <div class="row">
                    <div class="col-12">
                        <h3 class="thin text-center">Ошибка заказа</h3>
                        <div class="text-center text-subscribe">При заказе товара возникла непредвиденная ошибка. Пожалуйста, попробуйте позже.</div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<button id="btn-for-empty" data-toggle="modal" data-target="#modal-empty-cart"></button>
<div class="modal fade modal-empty-cart modal-compare" id="modal-empty-cart" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<a class="close" data-dismiss="modal" aria-label="Закрыть">
                <span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
            </a>
            <div class="modal-body text-center">
                <span class="icon-cart-modal icon-cart-thick"></span>
                <h2 class="cart_modal_h thin mb-2 mt-1">Корзина пуста.<br>Для оформления заказа добавьте товар.</h2>
                <div class="modal-footer-full"><a class="pink" href="/catalogue">Выбрать <span class="icon-arrow-right-thick"></span></a></div>
            </div>
       </div>
   </div>
</div>
