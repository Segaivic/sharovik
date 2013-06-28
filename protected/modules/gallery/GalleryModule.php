<?php

class GalleryModule extends CWebModule
{
    public $defaultController = 'default';
    public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'gallery.models.*',
			'gallery.components.*',
		));

        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $dir = YiiBase::getPathOfAlias('application').DIRECTORY_SEPARATOR.'modules/gallery';
        $baseUrl = Yii::app()->getAssetManager()->publish($dir);
        $this->setBu($baseUrl);
        $cs->registerScriptFile($baseUrl.'/js/gallery.js' ,CClientScript::POS_END);
        $cs->registerCssFile($baseUrl.'/css/style.css');
	}

    private $bu;

    public function setBu($value) {
        return $this->bu = $value;
    }

    public function getBu() {
        return $this->bu;
    }

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
