<?php

class CategoriesMenu extends CWidget
{
    public function run()
    {
        $root=SCategories::model()->findByPk(1);
        $model=$root->children()->cache(1000)->findAll();

        $this->render('categoriesMenu' , array('model'=>$model));
    }

}

?>