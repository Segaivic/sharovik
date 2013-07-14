<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main'); ?>
    <!-- MAIN CONTENT AREA: SLIDER BANNER (REVOLUTION SLIDER) -->
    <div class="fullwidthbanner-container" >
        <div class="banner" >
            <ul>
                <li class="slide2" data-transition="slotfade-horizontal"  data-masterspeed="300" data-slotamount="20">
                    <img alt="" src="/img/slide_01.png" />
                    <div class="caption lfb carousel-caption" data-x="0" data-y="0" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                        <img alt="" src="/img/screenshot.png" />
                    </div>
                    <div class="caption sft carousel-caption" data-x="500" data-y="21" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: none; padding-left: 0;">
                        <p class="large">Широкий ассортимент<br /> товаров для дачи<br /> и отдыха</p>
                    </div>
                    <div class="caption sfr carousel-caption" data-x="490" data-y="170" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                        <p class="medium"><img src="/img/slide2_bullet.png" alt="" />  Мангалы</p>
                        <p class="medium"><img src="/img/slide2_bullet.png" alt="" />  Коптильни</p>
                        <p class="medium"><img src="/img/slide2_bullet.png" alt="" />  Барбекю</p>
                        <p class="medium"><img src="/img/slide2_bullet.png" alt="" />  Казаны</p>
                        <p class="medium"><img src="/img/slide2_bullet.png" alt="" />  Кастрюли и жаровни</p>
                        <p class="medium"><img src="/img/slide2_bullet.png" alt="" />  И другие товары в нашем каталоге</p>
                    </div>
                    <div class="caption sfr carousel-caption" data-x="490" data-y="345" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                        <a class="slider-btn" href="#"><img src="/images/slider/catalogbtn.png" alt="" /></a>
                    </div>
                </li>

                <!-- MAIN CONTENT AREA: SLIDER BANNER (REVOLUTION SLIDER) - SLIDE 3 [SLIDE STYLE=LEFT] -->
                <li class="slide3" data-transition="slotfade-horizontal"  data-masterspeed="300" data-slotamount="20">
                    <img alt="" src="/images/slider/2.jpg" />
                    <div class="caption lfb carousel-caption" data-x="500" data-y="50" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                        <img alt="" src="/images/slider/23.png" />
                    </div>
                    <div class="caption sft carousel-caption" data-x="32" data-y="51" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: none; padding-left: 0;">
                        <p class="large">Рецепты популярных блюд</p>
                    </div>
                    <div class="caption sfr carousel-caption" data-x="17" data-y="155" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                        <p class="medium">Готовьте вместе с нами</p>
                    </div>
                    <div class="caption sfr carousel-caption" data-x="17" data-y="270" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                        <a class="slider-btn" href="#"><img src="/img/purchase_button.png" alt="" /></a>
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <div class="main-wrapper">
        <div class="main-content">
			<div class="container">
			<?php echo $content; ?>
			</div>
		</div>
<?php $this->endContent(); ?>

