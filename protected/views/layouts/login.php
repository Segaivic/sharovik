<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Metronic Admin Dashboard Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="/backend/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/backend/assets/css/metro.css" rel="stylesheet" />
    <link href="/backend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/backend/assets/css/style.css" rel="stylesheet" />
    <link href="/backend/assets/css/style_responsive.css" rel="stylesheet" />
    <link href="/backend/assets/css/style_default.css" rel="stylesheet" id="style_color" />
    <link rel="stylesheet" type="text/css" href="/backend/assets/uniform/css/uniform.default.css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="/">
        <img src="/backend/assets/img/logo.png" alt="" />
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
   <?php echo $content ?>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="form-vertical forget-form" action="index.html" />
    <h3 class="">Forget Password ?</h3>
    <p>Enter your e-mail address below to reset your password.</p>
    <div class="control-group">
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-envelope"></i>
                <input class="m-wrap" type="text" placeholder="Email" />
            </div>
        </div>
    </div>
    <div class="form-actions">
        <a href="javascript:;" id="back-btn" class="btn">
            <i class="m-icon-swapleft"></i>  Back
        </a>
        <a href="javascript:;" id="forget-btn" class="btn green pull-right">
            Submit <i class="m-icon-swapright m-icon-white"></i>
        </a>
    </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    2013 &copy;
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS -->
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script src="/backend/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/backend/assets/uniform/jquery.uniform.min.js"></script>
<script src="/backend/assets/js/jquery.blockui.js"></script>
<script src="/backend/assets/js/app.js"></script>
<script>
    jQuery(document).ready(function() {
        App.initLogin();
    });
</script>
</body>
<!-- END BODY -->
</html>