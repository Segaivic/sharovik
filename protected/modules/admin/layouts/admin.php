<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php Yii::app()->clientScript->registerCssFile('/css/gallery.css', 'screen' , CClientScript::POS_HEAD); ?>
    <?php Yii::app()->clientScript->registerCssFile('/backend/shop.css', 'screen' , CClientScript::POS_HEAD); ?>
    <link href="/backend/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/backend/assets/css/metro.css" rel="stylesheet" />
    <link href="/backend/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="/backend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/backend/assets/css/style.css" rel="stylesheet" />
    <link href="/backend/assets/css/style_responsive.css" rel="stylesheet" />
    <link href="/backend/assets/css/style_default.css" rel="stylesheet" id="style_color" />
    <link rel="stylesheet" type="text/css" href="/backend/assets/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/backend/assets/uniform/css/uniform.default.css" />
    <link rel="stylesheet" type="text/css" href="/backend/assets/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="/backend/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="/backend/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <?php $this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a[rel=gallery]',
        'config'=>array(),
    )); ?>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
<!-- BEGIN TOP NAVIGATION BAR -->
<div class="navbar-inner">
<div class="container-fluid">
<!-- BEGIN LOGO -->
<a class="brand" href="index.html">
    <img src="/backend/assets/img/logo.png" alt="logo" />
</a>
<!-- END LOGO -->
<!-- BEGIN RESPONSIVE MENU TOGGLER -->
<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
    <img src="/backend/assets/img/menu-toggler.png" alt="" />
</a>
<!-- END RESPONSIVE MENU TOGGLER -->
<!-- BEGIN TOP NAVIGATION MENU -->
<ul class="nav pull-right">
    <?php if (Yii::app()->hasModule('shop')): ?>
        <!-- BEGIN TODO DROPDOWN -->
        <?php $this->widget('shop.components.NewOrders'); ?>
        <!-- END TODO DROPDOWN -->
    <?php endif; ?>
<!-- BEGIN USER LOGIN DROPDOWN -->
<li class="dropdown user">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img alt="" src="/backend/assets/img/avatar1_small.jpg" />
        <span class="username"><?php echo $userObject = Yii::app()->getModule('user')->user()->username; ?></span>
        <i class="icon-angle-down"></i>
    </a>
    <ul class="dropdown-menu">
        <li><a href="/user/profile"><i class="icon-user"></i> Профиль</a></li>
        <li class="divider"></li>
        <li><a href="/user/logout"><i class="icon-key"></i>Выход</a></li>
    </ul>
</li>
<!-- END USER LOGIN DROPDOWN -->
</ul>
<!-- END TOP NAVIGATION MENU -->
</div>
</div>
<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar nav-collapse collapse">
    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <div class="slide hide">
        <i class="icon-angle-left"></i>
    </div>
    <div class="clearfix"></div>
    <!-- END RESPONSIVE QUICK SEARCH FORM -->
    <!-- BEGIN SIDEBAR MENU -->
    <ul id="css-menu">
        <li>
            <a href="/admin/default">
                <i class="icon-home"></i> Панель
                <span class="selected"></span>
            </a>
        </li>
        <li class="has-sub">
            <a href="javascript:;" class="">
                <i class="icon-user"></i> Профиль
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="/user/admin">Управление пользователями</a></li>
                <li><a class="" href="/user/profile/edit">Редактировать</a></li>
                <li><a class="" href="/user/profile/changepassword">Сменить пароль</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:;" class="">
                <i class="icon-th-list"></i> Редактор меню
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="/admin/menu/">Редактор</a></li>
                <li><a class="" href="/admin/menu/create">Добавить пункт</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:;" class="">
                <i class="icon-table"></i> Страницы сайта
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="/admin/page/index">Управление страницами</a></li>
                <li><a class="" href="/admin/page/create">Создать страницу</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:;" class="">
                <i class="icon-edit"></i> Новости
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="/admin/news/index">Управление новостями</a></li>
                <li><a class="" href="/admin/news/create">Создать</a></li>
            </ul>
        </li>
        <?php if (Yii::app()->hasModule('gallery')): ?>
        <li class="has-sub">
            <a href="javascript:;" class="">
                <i class="icon-picture"></i></i> Фотоальбомы
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="/gallery/admin">Управление альбомами</a></li>
                <li><a class="" href="/gallery/admin/create">Добавить альбом</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if (Yii::app()->hasModule('shop')): ?>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="icon-money"></i> Магазин
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="/shop/admin">Заказы</a></li>
                    <li><a class="" href="/shop/admin/product">Товары</a></li>
                    <li><a class="" href="/shop/admin/categories/">Категории товаров</a></li>
                    <li><a class="" href="/shop/admin/orders/archive">Архив заказов</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if (Yii::app()->hasModule('events')): ?>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="icon-tasks"></i> События
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="/events/admin/index">Список</a></li>
                    <li><a class="" href="/events/admin/index/create">Добавить</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if (Yii::app()->hasModule('lunch')): ?>
        <li class="has-sub">
            <a href="javascript:;" class="">
                <i class="icon-glass"></i></i> Бизнес-ланч
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="/lunch/admin/index">Настройки</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <li><a class="" href="/user/logout"><i class="icon-user"></i> Выйти</a></li>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
<!-- BEGIN PAGE -->
<div class="page-content">
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div id="portlet-config" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
    </div>
    <div class="modal-body">
        <p>Here will be a configuration form</p>
    </div>
</div>
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo isset($this->header)? $this->header : ''; ?>
                    <small><?php echo isset($this->smallDesc)? $this->smallDesc : ''; ?></small>
                </h3>
                <?php
                if(isset($this->breadcrumbs)):
                 if ( Yii::app()->controller->route !== 'site/index' )
                    $this->breadcrumbs = array_merge(array (Yii::t('zii','Home')=>Yii::app()->homeUrl), $this->breadcrumbs);

                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'homeLink'=>false,
                    'tagName'=>'ul',
                    'separator'=>'',
                    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
                    'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
                    'htmlOptions'=>array ('class'=>'breadcrumb')
                )); ?><!-- breadcrumbs -->
                <?php endif; ?>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row-fluid">
            <?php echo $content; ?>
        </div>
    </div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
    2013 &copy; Metronic by keenthemes.
    <div class="span pull-right">
        <span class="go-top"><i class="icon-angle-up"></i></span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<!--[if lt IE 9]>
<script src="/backend/assets/js/excanvas.js"></script>
<script src="/backend/assets/js/respond.js"></script>
<![endif]-->

<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/breakpoints/breakpoints.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/jquery-slimscroll/jquery.slimscroll.min.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/fullcalendar/fullcalendar/fullcalendar.min.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/bootstrap/js/bootstrap.min.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/js/jquery.blockui.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/js/jquery.cookie.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/jqvmap/jqvmap/jquery.vmap.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/gritter/js/jquery.gritter.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/uniform/jquery.uniform.min.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/js/jquery.pulsate.min.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/bootstrap-daterangepicker/date.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/bootstrap-daterangepicker/daterangepicker.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/backend/assets/js/app.js',CClientScript::POS_END) ?>
<script>
    jQuery(document).ready(function() {
        App.setPage("index");  // set current page
        App.init(); // init the rest of plugins and elements
    });
</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-37564768-1']);
    _gaq.push(['_setDomainName', 'keenthemes.com']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    $("ul#css-menu li").each(function () {if (this.getElementsByTagName("a")[0].href == location.href){
        this.className = "active";
        $(this).parent().parent().addClass("open active");
    } });
</script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
