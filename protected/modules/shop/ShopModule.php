<?php

class ShopModule extends CWebModule
{
    public $productsInPage = 20;
    public $defaultController = 'default';
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'shop.models.*',
			'shop.components.*',
			'shop.extensions.*',
		));

        // client script manager
        $cs=Yii::app()->clientScript;
        $dir = YiiBase::getPathOfAlias('application').DIRECTORY_SEPARATOR.'modules/shop';
        $baseUrl = Yii::app()->getAssetManager()->publish($dir);
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
