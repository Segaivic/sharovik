<?php

class RandomGoods extends CWidget
{
	public function run()
	{
        Yii::import('application.modules.shop.models.*');
        $dependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM tbl_shop_products');
        $models = SProducts::model()->cache(1000 , $dependency)->findAll(array(
            'select'=>'id, title, description, rand() as rand',
            'condition'=>'active = '.SProducts::STATUS_ACTIVE,
            'limit'=> 3,
            'order'=>'rand',
        ));

    	$this->render('randomGoods', array('models'=>$models ));
  	}
}