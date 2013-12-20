<?php

class Options extends CWidget
{

    public $product_id;

	public function run()
	{
        $model = ShopAddsGroups::model()->with('shopAddsItems')->findAll(array(
            'condition' => 'product_id = :product_id',
            'params'  => array(
               ':product_id' => $this->product_id
            )
        ));
        $this->render('options' , array('model' => $model));
  	}
}