    <?php

class ProductController extends Controller
{
    public $layout = 'application.modules.shop.views.layouts.shop';


    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'ajaxOnly + AddToCart',
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
                'actions'=>array('index','view' ,'addToCart' , 'cart', 'rating'),
                'users'=>array('*'),
            ),


            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array(''),
                'users'=>Yii::app()->getModule('user')->getAdmins(),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


    public function actionIndex()
	{
        $this->render('index');
	}


    public function actionView($id = false , $alias_url = false)
    {
        if($id !== false){
            $model = $this->loadModel($id);
        }
        elseif($alias_url !== false) {
            $model = $this->loadModelByAlias($alias_url);
        }
        $products = SProducts::model()->with('attrs','attrs.attrTitles','attrs.attrValues')->findByPk($model->id);
        $category = SCategories::model()->findByPk($model->category->id);
        $children = $category->children()->findAll();
        $accessories = SProducts::getAccessoriesForProduct($model->id);
        $this->render('view' , array(
            'model'       => $model ,
            'children'    => $children,
            'products'    => $products,
            'accessories' => $accessories
        ));
    }

    public function loadModel($id)
    {
        $model=SProducts::model()
            ->activeOnly()
            ->with(array('category','image','gallery'))
            ->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Извините, такой страницы не существует');
        return $model;
    }

    public function loadModelByAlias($alias)
    {
        $model=SProducts::model()
            ->activeOnly()
            ->with(array('category','image','gallery'))
            ->find(
            't.alias_url = :alias', array(
            'alias' => $alias,
        ));
        if($model===null)
            throw new CHttpException(404,'Такой страницы не существует');
        return $model;
    }
}