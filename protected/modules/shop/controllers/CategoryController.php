<?php

class CategoryController extends Controller
{
    public $layout = 'application.modules.shop.views.layouts.shop';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index , view'),
                'users'=>array('*'),
            ),
         );
    }


    public function actionIndex()
	{
        $this->render('index');
	}


    public function actionView($id = false , $alias_url = false, $sort = 'created_asc')
    {
        if($id !== false){
            $model = $this->loadModel($id);
        }
        elseif($alias_url !== false) {
            $model = $this->loadModelByAlias($alias_url);
        }
        $children = $model->children()->findAll();

        $criteria = new CDbCriteria();
        $criteria->condition = 'category_id = :category_id';
        $order = SCategories::getSort($sort);
        $criteria->order = $order['value'];
        $criteria->params = array(':category_id' => $model->id);

        //pager
        $count = SProducts::model()->count($criteria);
        $pages=new CPagination($count);
        $pages->pageSize= Yii::app()->getModule('shop')->productsInPage;;
        $pages->applyLimit($criteria);

        $products = SProducts::model()
                        ->activeOnly()
                        ->showByAdded()
                        ->findAll($criteria);



        $this->render('view' , array(
            'model' => $model ,
            'children' => $children ,
            'products' => $products ,
            'pages'=>$pages,
            'order' => $order));
    }

    public function loadModel($id)
    {
        $model=SCategories::model()
            ->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Извините, такой страницы не существует');
        return $model;
    }

    public function loadModelByAlias($alias)
    {
        $model=SCategories::model()->find(
            'alias_url = :alias', array(
            'alias' => $alias,
        ));
        if($model===null)
            throw new CHttpException(404,'Такой страницы не существует');
        return $model;
    }
}