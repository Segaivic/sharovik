<?php

class SBreadcrumbs extends CWidget
{
    public $params = array(
        'id'=>null,
    );

    public function run()
    {

        if($this->params['id'] !== null) {
            $model = SCategories::model()->findByPK($this->params['id']);
            $items = $model->getCategoriesArray();
            $this->render('sbreadcrumbs', array('model' => $model , 'items' => $items));
        }

    }

}

?>