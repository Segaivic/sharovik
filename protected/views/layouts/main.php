<!DOCTYPE html>
<html>
<head>
    <!--  SEO STUFF START HERE -->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="author" content="" />
    <meta name="robots" content="follow, index" />
    <!--  SEO STUFF END -->
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--  revolution slider plugin : begin -->
    <link rel="stylesheet" type="text/css" href="/rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/rs-responsive.css" media="screen" />
    <!--  revolution slider plugin : end -->
    <link rel="stylesheet" href="/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/custom.css" />
    <link rel="stylesheet" href="/css/css3-menu.css" />
    <link rel="stylesheet" href="/css/isotope.css" />
    <link rel="stylesheet" href="/css/color_scheme.css" />
    <link href='http://fonts.googleapis.com/css?subset=cyrillic&family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css' />    <link rel="stylesheet" href="/css/font-awesome.css" />
    <link rel="stylesheet" href="/css/font-awesome-ie7.css" />
    <link rel="stylesheet" href="/css/flexslider.css" />
    <style type="text/css">
        @font-face { font-family: "Rubl Sign"; src: url(http://www.artlebedev.ru/;-)/ruble.eot); }
        span.rur { font-family: "Rubl Sign"; text-transform: uppercase; // text-transform: none;}
        span.rur span { position: absolute; overflow: hidden; width: .45em; height: 1em; margin: .1ex 0 0 -.55em; // display: none; }
        span.rur span:before { content: '\2013'; }
    </style>
    <?php Yii::app()->clientScript->registerCssFile('/css/gallery.css', 'screen' , CClientScript::POS_HEAD); ?>
    <?php Yii::app()->clientScript->registerCssFile('/css/shop.css', 'screen' , CClientScript::POS_HEAD); ?>
    <?php $this->widget('application.extensions.fancybox.EFancyBox', array(
            'target'=>'a[rel=fbox]',
            'config'=>array(),
        )
    ); ?>
    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="css/IE-fix.css" />
    <![endif]-->
</head>
<body>
<!-- THE LINE AT THE VERY TOP OF THE PAGE -->
<div class="top_line"></div>
<!-- HEADER AREA -->
<header>
    <div class="container">
        <div class="row">
            <!-- HEADER: LOGO AREA -->
            <div class="span4 logo">
                <a class="logo" href="/">
                    <img alt="logo" title="Мангальчик" src="/images/logo.png">
                </a>
            </div>
            <div class="span4 offset4">
                <!-- HEADER: PHONE NUMBER -->
                <p class="head_phone">
                    <span class="icon-phone"></span><a href="tel:555-555-5555">(800) 655-7800</a></p>
            </div>
            <!-- HEADER: SOCIAL ICONS -->
            <ul class="socials unstyled">
                <li><a data-rel="tooltip" title="Follow us on Flickr" class="flickr" href="#"></a></li>
                <li><a data-rel="tooltip" title="Follow us on Twitter" class="twitter" href="#"></a></li>
                <li><a data-rel="tooltip" title="Follow us on Facebook" class="facebook" href="#"></a></li>
                <li><a data-rel="tooltip" title="Follow us on Youtube" class="youtube" href="#"></a></li>
                <li><a data-rel="tooltip" title="Follow us on Dribbble" class="dribbble" href="#"></a></li>
                <li><a data-rel="tooltip" title="Follow us on Pinterest" class="pinterest" href="#"></a></li>
            </ul>
        </div>
    </div>
    <!-- HEADER: PRIMARY SITE NAVIGATION -->
</header>

<!-- SEARCH FORM -->
<div class="searchbar-wrapper">
    <div class="container">
        <div class="search">
            <?php
            $this->widget('application.modules.shop.components.SearchBlock', array());
            ?>
        </div>
    </div>
</div>

<!-- PRIMARY SITE NAVIGATION -->
<div class="navbar-wrapper">
    <div class="container">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="buttons-container">
                </div>
                <div>
                    <?php $this->widget('MainMenu'); ?>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- MAIN CONTENT AREA -->

        <?php echo $content; ?>

<!-- FOOTER STARTS HERE -->
<footer id="footer"  style="margin-top: 20px">
    <div class="footer-top"></div>
    <div class="footer-wrapper">
        <div class="container">
            <div class="row show-grid">
                <div class="span12">
                    <div class="row show-grid">
                        <!-- FOOTER: LOGO -->
                        <div class="span4">
                            <img alt="" class="footer-logo" src="/img/grey_logo.png" />
                            <!-- FOOTER: ADDRESS -->
                            <address class="address">
                                <p><i class="icon-map-marker icon-large"></i>Карпинск, ул. Пока ХЗ</p>
                                <p><i>&nbsp;</i>Офис 800</p>
                                <p><i class="icon-phone icon-large"></i>Тел.: (800) 655-7800</p>
                                <p><i class="icon-print icon-large"></i>Факс: (800) 655-7800</p>
                            </address>
                        </div>
                        <!-- FOOTER: ABOUT US -->
                        <div class="span4 footer-center">
                            <h4 class="center-title">О нас</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus.</p>
                        </div>
                        <!-- FOOTER: NAVIGATION LINKS -->
                        <div class="span4 footer-right">
                            <h4 class="center-title">Navigate</h4>
                            <ul class="footer-navigate">
                                <li>
                                    <a href="">Home</a>
                                </li>
                                <li>
                                    <a href="">Features</a>
                                </li>
                                <li>
                                    <a href="">Pages</a>
                                </li>
                                <li>
                                    <a href="">Portfolio</a>
                                </li>
                                <li>
                                    <a href="">Blog</a>
                                </li>
                                <li>
                                    <a href="">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row show-grid">
                <!-- FOOTER: COPYRIGHT TEXT -->
                <div class="span12">
                    <p>reDesign Premium HTML Template by <a href="http://www.themeleaf.com">Themeleaf</a>. Copyright 2012</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- END FOOTER -->
<!-- Placed at the end of the document so the pages load faster -->
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/bootstrap.js' , CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.flexslider-min.js' , CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.isotope.js' , CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.imagesloaded.min.js' , CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/rs-plugin/js/jquery.themepunch.plugins.min.js' , CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/rs-plugin/js/jquery.themepunch.revolution.min.js' , CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/revolution.custom.js' , CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/custom.js' , CClientScript::POS_END); ?>
</body>
</html>