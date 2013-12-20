<?php

class ProductActions extends CWidget
{

    public $product_id;

	public function run()
	{
        $this->render('productActions' , array('id' => $this->product_id));
  	}
}