<?php

class AdminController extends Controller
{

    public $layout = 'application.modules.admin.layouts.admin';


    public function filters()
    {
        return array(
            'rights', // perform access control for CRUD operations
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
                'actions'=>array('index , create , update , photos , upload , album , deletephoto , savephoto'),
                'users'=>Yii::app()->getModule('user')->getAdmins(),
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

    public function actionIndex()
	{
        $model=new Gallery('search');
        $model->unsetAttributes();  // clear any index values
        $blogs = Categories::model()->findAll();
        if(isset($_GET['Gallery']))
            $model->attributes=$_GET['Gallery'];

        $this->render('index',array(
            'model'=>$model,
        ));
	}

    public function actionCreate()
    {
        $model=new Gallery;

        if(isset($_POST['Gallery']))
        {
            $uniqid = uniqid();
            $model->attributes=$_POST['Gallery'];
            $img = CUploadedFile::getInstance($model,'thumbnail');
            if ($img){
                $model->thumbnail = '/uploads/gallery/title/'.$uniqid.CTranslit::translit($img);
            }
            if($model->save())
                if ($img){
                    CImageHandler::upload($img , Gallery::TMP_PATH.$uniqid.CTranslit::translit($img));
                    CImageHandler::resizeAndSave(
                        Gallery::TMP_PATH.$uniqid.CTranslit::translit($img),
                        $model->thumbnail,
                        'width',
                        200
                    );
                    CImageHandler::delete(Gallery::TMP_PATH.$uniqid.CTranslit::translit($img));
                }
                $this->redirect('/gallery/admin');
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if(isset($_POST['Gallery']))
        {
            $uniqid = uniqid();
            $thumb = $model->thumbnail;
            $model->attributes=$_POST['Gallery'];
            $img = CUploadedFile::getInstance($model,'thumbnail');
            if($img){
                $model->thumbnail = '/uploads/gallery/title/'.$uniqid.CTranslit::translit($img);
            };
            if($model->save())
                if($img){
                    CImageHandler::delete($thumb);
                    CImageHandler::upload($img , Gallery::TMP_PATH.$uniqid.CTranslit::translit($img));
                    CImageHandler::resizeAndSave(
                        Gallery::TMP_PATH.$uniqid.CTranslit::translit($img),
                        $model->thumbnail,
                        'width',
                        200
                    );
                    CImageHandler::delete(Gallery::TMP_PATH.$uniqid.CTranslit::translit($img));
                }
            $this->redirect('/gallery/admin');
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        if(!isset($_GET['ajax']))
            Yii::app()->user->setFlash('success_deleted', "Альбом был успешно удален");
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/gallery/admin'));
    }


    public function actionPhotos($id) {
        $gallery = $this->loadModel($id);
        $model = new Galleryphotos();
        $this->render('photos',array(
            'model'=>$model,
            'gallery' =>$gallery,
        ));
    }

    public function actionUpload() {
        $uniqid = uniqid();

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $path = '/uploads/gallery/original/'.$uniqid.CTranslit::translit($_FILES['file']['name']);
            $thumb = '/uploads/gallery/thumb/'.$uniqid.CTranslit::translit($_FILES['file']['name']);

            if(move_uploaded_file($_FILES['file']['tmp_name'], Yii::getPathOfAlias('webroot').$path)){
                $model = new Galleryphotos();
                $model->gallery_id = intval($_POST['gallery_id']);
                $model->image = $path;
                $model->thumb = $thumb;
                $model->save();
                echo($_POST['index']);
                $image = Yii::app()->simpleImage->load(Yii::getPathOfAlias('webroot').$path);
                $image->resizeToWidth(200);
                $image->save(Yii::getPathOfAlias('webroot').$thumb);
            }
            exit;
        }
    }

    public function actionAlbum($id){
       $model = Gallery::model()->with('photos')->findByPk($id);

       $this->render('album' , array('model' => $model));
    }

    public function actionDeletePhoto(){
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        Galleryphotos::model()->findByPk(intval($_POST['id']))->delete();
    }

    public function actionSavePhoto(){
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        $model = Galleryphotos::model()->findByPk(intval($_POST['id']));
        $model->title = CHtml::encode($_POST['title']);
        $model->save();
    }
    public function loadModel($id)
    {
        $model=Gallery::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }


}