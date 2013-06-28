<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>
<h1><?php echo UserModule::t("Login"); ?></h1>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

<div class="form-vertical login-form">
<?php echo CHtml::beginForm(); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo CHtml::errorSummary($model); ?>

    <div class="control-group">
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-user"></i>
                <?php echo CHtml::activeTextField($model,'username', array('class'=>'m-wrap',  'placeholder' => 'Логин')) ?>
            </div>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                <?php echo CHtml::activePasswordField($model,'password', array('class'=>'m-wrap', 'placeholder' => 'Пароль')) ?>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <label class="checkbox">
            <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
            Запомнить меня
        </label>
        <br />
        <div style="text-align: center">
            <?php echo CHtml::submitButton(UserModule::t("Login")); ?>
        </div>
    </div>

	<div class="row">
		<p class="hint">
		<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
		</p>
	</div>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>