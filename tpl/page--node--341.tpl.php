<?php
global $base_root;
?>
<?php include_once('inc/bp_header.tpl.php'); ?>
<main>
  <div class="container-promo">
    <div class="slider">
        <div class="box-video">
          <a href="#" class="player-btn-close"></a>
          <div id="player"></div>        
        </div>
        <div class="slider-top">
          <!-- <div class="slider-face_name"><span class="slider-face_surname">Полина Гагарина</span><br>СЕКРЕТ КРАСОТЫ <br><span>ОТ ПОЛИНЫ ГАГАРИНОЙ</span></div> -->
          <div class="slider-face_name"><br>#ЛАЙФХАК <br><span>ОТ ПОЛИНЫ ГАГАРИНОЙ</span></div>
          <div class="slider-top-title">ОЧИЩЕНИЕ КОЖИ<br><span>2 РАЗА В ДЕНЬ!</span> <span class="slider-top-title2">- и никакой сухости!</span>
          </div>
          <button class="slider-top-btn-next">Продолжить</button>
          <a href="#" class="slider-top-btn-video">Смотреть видео</a>
        </div>
        <div id="Blocks" style="" class="Blocks1">
          <div class ="Block Block1" id = "1">
            <img src="/<?php print path_to_theme();?>/images/ochishchenie/baner-morning2.png" alt=""> 
            <!-- <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-left.png" alt="" class="img-morning-left img-morning">  -->
            <div class="slider-morning-left slider-product1">
              <div class="slider-block-img-title"><img src="/<?php print path_to_theme();?>/images/ochishchenie/sun.png" alt="" class=""> УТРО</div>
              <div class="slider-block-img-text">Свежесть лица <br><span>Крем-гель для умывания</span></div>
              <!-- <img src="./images/ochishchenie/крем-гель.png" alt="" class="slider-img-morning-left slider-img-morning" style="left: 0; bottom: -55px;">  -->
              <img src="/<?php print path_to_theme();?>/images/ochishchenie/крем-гель.png" alt="" class="slider-img-morning-left slider-img-morning" style="left: 3vw;        height: 16.66vw;">
            </div>
            <div class="slider-morning-right slider-product2">
              <img src="/<?php print path_to_theme();?>/images/ochishchenie/drop.png" alt="" class="slider-img-morning-right slider-img-morning">
              <div class="box-slider-product-procent">
                <div class="slider-product-procent">
                  <span class="proc">20%</span>
                  <span class="text">активой сыворотки <br>и никакой сухости!</span>
                </div>
              </div>
              <ul>
                <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/slider-product-properties.png" alt=""><span>Экстракт <br>камелии</span></li>
                <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/slider-product-properties2.png" alt=""><span>Жидкий <br>коллаген</span></li>
                <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/slider-product-properties3.png" alt=""><span>Гиалуроновая <br>кислота</span></li>
              </ul>
            </div>
            <!-- <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-right.png" alt="" class="img-morning-right img-morning">  -->
            <!-- <span class="slider-block2">
              <span class="slider-block2-min-text"><span>2</span>средства, <br>очищения, <br>ухода. </span>
              <span class="slider-block2-max-text">Вот и весь секрет!</span>
            </span> -->
            <button class="slick-btn slick-prev slick-arrow1" aria-label="prev" type="button" style="display: block;">prev</button>
          </div>
          <div class ="Block Block2" id = "2">
            <img src="/<?php print path_to_theme();?>/images/ochishchenie/baner-evening2.png" alt=""> 
            <div class="slider-evening-right slider-product1">
              <div class="slider-block-img-title"><img src="/<?php print path_to_theme();?>/images/ochishchenie/slider-luna.png" alt="" class="">ВЕЧЕР</div>
              <div class="slider-block-img-text">Снятие макияжа <br><span>Мицеллярная вода</span></div>
              <img src="/<?php print path_to_theme();?>/images/ochishchenie/Мицеллярка.png" alt="" class="slider-img-evening-left slider-img-evening" style="bottom: -44px; bottom: -16px; left: 2vw; height: 19.66vw;">
            </div>
            <!-- <img src="/<?php print path_to_theme();?>/images/ochishchenie/evening-left.png" alt="" class="img-evening-left img-evening">  -->
            <div class="slider-evening-right slider-product2">
              <img src="/<?php print path_to_theme();?>/images/ochishchenie/drop.png" alt="" class="slider-img-morning-right slider-img-morning">
              <div class="box-slider-product-procent">
                <div class="slider-product-procent">
                  <span class="proc">20%</span>
                  <span class="text">активой сыворотки <br>и никакой сухости!</span>
                </div>
              </div>
              <ul>
                <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/slider-product-properties.png" alt=""><span>Экстракт <br>камелии</span></li>
                <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/slider-product-properties2.png" alt=""><span>Жидкий <br>коллаген</span></li>
                <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/slider-product-properties3.png" alt=""><span>Гиалуроновая <br>кислота</span></li>
              </ul>
            </div>
            <!-- <img src="/<?php print path_to_theme();?>/images/ochishchenie/evening-right.png" alt="" class="img-evening-right img-evening">  -->
            <button class="slick-btn slick-next slick-arrow1" aria-label="next" type="button" style="display: block;">Next</button>
          </div>
          <!-- если надо полосу по середине -->
          <!-- <span class="handle"></span> -->
        </div>
    </div>
    <div class="block-ideal-means">
      <div class="ideal-means-title">Выбери идеальные средства для очищения</div>
      <div class="skin-type">
        <div class="skin-type-title">К какому типу относится твоя кожа?</div>
        <div class="skin-type-items">
          <div class="skin-type-item col-xs-6">
            <a href="javascript:void(0);" class="btn-norm">
              <img src="/<?php print path_to_theme();?>/images/ochishchenie/skin-type-item1.png" alt="">
              <span>Нормальная <br>и комбинированная</span>
            </a>
          </div>
          <div class="skin-type-item col-xs-6">
            <a href="javascript:void(0);" class="btn-such">
              <img src="/<?php print path_to_theme();?>/images/ochishchenie/skin-type-item2.png" alt="">
              <span>Сухая <br>и чувствительная</span>
            </a>
          </div>
        </div>
      </div>
      <div class="want-morning-evening want-morning-evening-norm">
        <div class="want-morning">
          <div class="box-want-morning">
            <div class="want-title">Выбери, чего твоей коже <br>хочется утром!</div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <!-- новая вкладка. нужно соблюдать ссылку в дальнейшем -->
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-morning-ico1.png" alt="" class="img-want-morning-evening">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-morning-ico12.png" alt="" class="img-hover-want-morning-evening"> 
                  Матирование
                </a>
              </li>
                <!-- конец новой вкладки -->
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-morning-ico2.png" alt="" class="img-want-morning-evening">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-morning-ico22.png" alt="" class="img-hover-want-morning-evening"> 
                  Нежность
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-morning-ico3.png" alt="" class="img-want-morning-evening">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-morning-ico32.png" alt="" class="img-hover-want-morning-evening"> 
                  Свежесть
                </a>
              </li>
            </ul>
          </div>
          <div class="box-want-morning-product tab-content" id="myTabContent">
              <!-- таб который появляется. надо указать id такой же как ссылка в во вкладке -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="box-want-product-title">Матирование</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="javascript:void(0);"></a>
                    <!-- блок box-want-product-item-popap - это попап. он срабатывает по классу. уникальных индендификаторов не надо. менять надо только то что внутри-->
                  <div class="box-want-product-item-popap">
                    <a href="javascript:void(0);" class="product-popap-close"></a>
                    <div class="product-popap-img"><img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product1.png" alt=""></div>
                    <div class="product-popap-text">
                      <div class="product-popap-title">Освежающий гель для умывания <br>для нормальной и комбинированной кожи</div>
                      <ul>
                        <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-ochischenie.png" alt=""><span>Глубоко очищает без сухости;</span></li>
                        <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-hours.png" alt=""><span>Матирует на 24 часа благодаря особой формуле сыворотки;</span></li>
                        <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-sensation.png" alt=""><span>Ощущение ухода <br>и увлажненности.</span></li>
                      </ul>
                      <a href="#" class="popap-more-product">Подробнее о продукте</a>
                    </div>
                  </div>
                    <!-- конец попапа -->
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product1.png" alt="" style="margin-top: 31px;">
                </div>   
                <div class="box-want-product-item">
                  <a href="javascript:void(0);"></a>
                  <div class="box-want-product-item-popap">
                    <a href="javascript:void(0);" class="product-popap-close"></a>
                    <div class="product-popap-img"><img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product2.png" alt=""></div>
                    <div class="product-popap-text">
                      <div class="product-popap-title">Освежающий гель для умывания <br>для нормальной и комбинированной кожи2</div>
                      <ul>
                        <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-ochischenie.png" alt=""><span>Глубоко очищает без сухости;</span></li>
                        <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-hours.png" alt=""><span>Матирует на 24 часа благодаря особой формуле сыворотки;</span></li>
                        <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-sensation.png" alt=""><span>Ощущение ухода <br>и увлажненности.</span></li>
                      </ul>
                      <a href="#" class="popap-more-product">Подробнее о продукте</a>
                    </div>
                  </div>
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product2.png" alt="">
                </div>                
              </div>
            </div>
              <!-- конец таба -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="box-want-product-title">Нежность</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="#"></a>
                </div>                
              </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <div class="box-want-product-title">Свежесть</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="#"></a>
                </div>                
              </div>
            </div>
          </div>
        </div>
        <div class="want-evening">
          <div class="box-want-evening">
            <div class="want-title">Отметь вечерние <br>потребности твоей кожи!</div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-evening-ico1.png" alt="" class="img-want-morning-evening">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-evening-ico12.png" alt="" class="img-hover-want-morning-evening"> 
                  Снятие макияжа
                </a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#recovery" role="tab" aria-controls="recovery" aria-selected="false">
                        <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-evening-ico2.png" alt="" class="img-want-morning-evening">
                        <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-evening-ico22.png" alt="" class="img-hover-want-morning-evening">
                        Восстановление
                    </a>
                </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-evening-ico3.png" alt="" class="img-want-morning-evening">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-evening-ico32.png" alt="" class="img-hover-want-morning-evening">
                  Глубокое очищение
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-evening-ico4.png" alt="" class="img-want-morning-evening">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-evening-ico42.png" alt="" class="img-hover-want-morning-evening">
                  Свежесть
                </a>
              </li>
            </ul>
          </div>
          <div class="box-want-evening-product tab-content" id="myTabContent">
              <div class="tab-pane fade" id="recovery" role="tabpanel" aria-labelledby="recovery-tab">
                  <div class="box-want-product-title">Восстановление</div>
                  <div class="box-want-product-info">Для восстановления</div>
                  <div class="box-want-product-items">
                      <div class="box-want-product-item">
                          <a href="javascript:void(0);"></a>
                          <!-- блок box-want-product-item-popap - это попап. он срабатывает по классу. уникальных индендификаторов не надо. менять надо только то что внутри-->
                          <div class="box-want-product-item-popap">
                              <a href="javascript:void(0);" class="product-popap-close"></a>
                              <div class="product-popap-img"><img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product1.png" alt=""></div>
                              <div class="product-popap-text">
                                  <div class="product-popap-title">Освежающий гель для умывания <br>для нормальной и комбинированной кожи</div>
                                  <ul>
                                      <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-ochischenie.png" alt=""><span>Глубоко очищает без сухости;</span></li>
                                      <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-hours.png" alt=""><span>Матирует на 24 часа благодаря особой формуле сыворотки;</span></li>
                                      <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-sensation.png" alt=""><span>Ощущение ухода <br>и увлажненности.</span></li>
                                  </ul>
                                  <a href="#" class="popap-more-product">Подробнее о продукте</a>
                              </div>
                          </div>
                          <!-- конец попапа -->
                          <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product1.png" alt="" style="margin-top: 31px;">
                      </div>
                      <div class="box-want-product-item">
                          <a href="javascript:void(0);"></a>
                          <div class="box-want-product-item-popap">
                              <a href="javascript:void(0);" class="product-popap-close"></a>
                              <div class="product-popap-img"><img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product2.png" alt=""></div>
                              <div class="product-popap-text">
                                  <div class="product-popap-title">Освежающий гель для умывания <br>для нормальной и комбинированной кожи2</div>
                                  <ul>
                                      <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-ochischenie.png" alt=""><span>Глубоко очищает без сухости;</span></li>
                                      <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-hours.png" alt=""><span>Матирует на 24 часа благодаря особой формуле сыворотки;</span></li>
                                      <li><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-sensation.png" alt=""><span>Ощущение ухода <br>и увлажненности.</span></li>
                                  </ul>
                                  <a href="#" class="popap-more-product">Подробнее о продукте</a>
                              </div>
                          </div>
                          <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product2.png" alt="">
                      </div>
                  </div>
              </div>
            <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
              <div class="box-want-product-title">Снятие макияжа</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="javascript:void(0);"></a>
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product1.png" alt="" style="margin-top: 31px;">
                </div>
                <div class="box-want-product-item">
                  <a href="javascript:void(0);"></a>
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product2.png" alt="">
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
              <div class="box-want-product-title">Глубокое очищение</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="javascript:void(0);"></a>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
              <div class="box-want-product-title">Свежесть</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="javascript:void(0);"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="want-morning-evening want-morning-evening-such">
        <div class="want-morning">
          <div class="box-want-morning">
            <div class="want-title">Выбери, чего твоей коже <br>хочется утром!</div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Увлажнение</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-morning-ico2.png" alt="" class="img-want-morning-evening">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-morning-ico22.png" alt="" class="img-hover-want-morning-evening">
                  Нежность
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Деликатный уход</a>
              </li>
            </ul>
          </div>
          <div class="box-want-morning-product tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="box-want-product-title">Увлажнение</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="javascript:void(0);"></a>
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product1.png" alt="" style="margin-top: 31px;">
                </div>
                <div class="box-want-product-item">
                  <a href="javascript:void(0);"></a>
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product2.png" alt="">
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="box-want-product-title">Нежность</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="#"></a>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <div class="box-want-product-title">Деликатный уход</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="#"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="want-evening">
          <div class="box-want-evening">
            <div class="want-title">Отметь вечерние <br>потребности твоей кожи!</div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-evening-ico1.png" alt="" class="img-want-morning-evening">
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/want-evening-ico12.png" alt="" class="img-hover-want-morning-evening">
                  Снятие макияжа
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">Нежность</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false">Деликатный уход</a>
              </li>
            </ul>
          </div>
          <div class="box-want-evening-product tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
              <div class="box-want-product-title">Снятие макияжа</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="javascript:void(0);"></a>
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product1.png" alt="" style="margin-top: 31px;">
                </div>
                <div class="box-want-product-item">
                  <a href="javascript:void(0);"></a>
                  <img src="/<?php print path_to_theme();?>/images/ochishchenie/morning-product2.png" alt="">
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
              <div class="box-want-product-title">Нежность</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="#"></a>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
              <div class="box-want-product-title">Деликатный уход</div>
              <div class="box-want-product-info">Для нормальной и комбинированной</div>
              <div class="box-want-product-items">
                <div class="box-want-product-item">
                  <a href="#"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="promo-catalog-carousel section-carousel row bp-block-m-t">
      <div id="bg-carousel-wrapper" class="col-12">
        <div class="teasers-wrapper">
            <div class="title-normal text-center uppercase mb-2">Каталог продукции</div>
        </div>
        <ul class="ochishchenie-product-filter">
          <li><a href="javascript:void(0);" class="ochishchenie-new-product"><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-catalog-new-product.png" alt="">Новинки</a></li>
          <li><a href="javascript:void(0);" class="ochishchenie-all-product"><img src="/<?php print path_to_theme();?>/images/ochishchenie/ico-catalog-all-product.png" alt="">Все продукты</a></li>
        </ul>
        <div style='width: 70%;margin: 0 auto;'>
          <?php print render($page['bp-ochishchenie-blocks']); ?>
        </div>
      </div>
    </div>
  </div>


</main>
<?php include_once('inc/bp_footer.tpl.php'); ?>