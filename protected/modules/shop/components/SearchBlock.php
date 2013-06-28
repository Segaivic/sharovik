<?php

Yii::import('zii.widgets.CPortlet');

class SearchBlock extends CPortlet
{

    protected function renderContent()
    {

        echo CHtml::beginForm(array('/shop/search/search'), 'get', array('class'=> 'search_form')) .
            CHtml::textField('q', '', array('placeholder'=> 'Поиск по товарам...', 'class' => 'input-block-level search-query')) .
            CHtml::endForm('');
    }
}