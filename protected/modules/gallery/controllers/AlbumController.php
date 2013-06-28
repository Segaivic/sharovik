 <?php

class AlbumController extends Controller
{
    public $layout = 'application.modules.gallery.views.layouts.gallery';

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
                'actions'=>array('view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array(),
                'users'=>array('@'),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $model = Gallery::model()->with('photos')->onlyActive()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Извините, в альбом не загружена ни одна фотография');
        $this->render('view' , array('model' => $model));
    }



}