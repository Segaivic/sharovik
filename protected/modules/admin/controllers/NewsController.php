<?php
class NewsController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';

    public function actions()
    {
        return array(
            'fileUpload'=>array(
                'class'=>'ext.redactor.actions.FileUpload',
                'uploadCreate'=>true,
            ),
            'imageUpload'=>array(
                'class'=>'ext.redactor.actions.ImageUpload',
                'uploadCreate'=>true,
            ),
            'imageList'=>array(
                'class'=>'ext.redactor.actions.ImageList',
            ),
        );
    }

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'ajaxOnly + savecontent',
            'ajaxOnly + savenews',
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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('index','delete','create','update','fileUpload','imageUpload','imageList', 'createBlog','updateBlog','deleteBlog','savecontent','savenews'),
                'users'=>Yii::app()->getModule('user')->getAdmins(),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        $model=new News('search');
        $model->unsetAttributes();  // clear any index values
        $blogs = Categories::model()->findAll();
        if(isset($_GET['News']))
            $model->attributes=$_GET['News'];

        $this->render('index',array(
            'model'=>$model,
            'blogs'=>$blogs,
        ));
    }


    /**
     * Saves custom pages after quick edit
     */
    public function actionSaveContent() {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        $model = Page::model()->findByPk(intval($_POST['id']));
        $model->content = $_POST['html'];
        $model->save();
    }

    public function actionSaveNews() {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        $model = News::model()->findByPk(intval($_POST['id']));
        $model->introtext = $_POST['intro'];
        $model->fulltext = $_POST['full'];
        $model->save();
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            Yii::app()->user->setFlash('success_deleted', "Новость была успешно удалена");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/admin/news'));
    }

    /**
     * Creates a new post.
     */
    public function actionCreate()
    {
        $model=new News;
        $categories = Categories::model()->findAll();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['News']))
        {

           $model->attributes=$_POST['News'];
            if($model->save())
                $this->redirect(array('/news/view','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
            'categories' => $categories,
        ));
    }


    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
        $categories = Categories::model()->findAll();

        if(isset($_POST['News']))
        {
            $model->attributes=$_POST['News'];
            if($model->save());
                $this->redirect($model->id);
        }

        $this->render('update',array(
            'model'=>$model,
            'categories' => $categories,
        ));
    }


    /**
     * Creates a new blog.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreateBlog()
    {
        $blog=new Categories();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Categories']))
        {
            $blog->attributes=$_POST['Categories'];
            if($blog->save())
                $this->redirect('/admin/news/index');
        }

        $this->renderPartial('new_blog',array(
            'blog'=>$blog

        ));
    }

    public function actionUpdateBlog($id)
    {
        $blog=Categories::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Categories']))
        {
            $blog->attributes=$_POST['Categories'];
            if($blog->save())
                echo "ok";
            $this->redirect('/admin/news');
        }

        $this->renderPartial('new_blog',array(
            'blog'=>$blog

        ));
    }


    public function actionDeleteBlog() {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        Categories::model()->findByPk(intval($_POST['id']))->delete();
    }


    public function loadModel($id)
    {
        $model=News::model()->with('category')->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

}
?>