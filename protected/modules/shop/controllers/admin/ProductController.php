<?php

class ProductController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';

    public function filters()
    {
        return array(
            'rights', // perform access control for CRUD operations
            'ajaxOnly + UpdatePrice',
        );
    }

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


     function accessRules()
        {
            return array(
                array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('index' , 'create', 'update' , 'gallery', 'delete' , 'deletephoto','fileUpload','imageUpload','imageList','savecharacters','duplicate','UpdatePrice'),
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
        $model=new SProducts('search');
        $model->unsetAttributes();  // clear any index values
        $blogs = SProducts::model()->findAll();
        if(isset($_GET['SProducts']))
            $model->attributes=$_GET['SProducts'];

        $this->render('index',array(
            'model'=>$model,
        ));
	}

    public function actionCreate(){
        $model= new SProducts;
        $image= new SProductsimg();

        if(isset($_POST['SProducts']))
        {
            $model->attributes=$_POST['SProducts'];

            if ($model->save()){
                    if(isset($_POST['SProductsimg']))
                {
                    $image->product_id = $model->id;
                    $uniqid = uniqid();

                    $imgName = CUploadedFile::getInstance($image,'image');
                    if($imgName){
                        $image->image = '/uploads/shop/product/title/'.$uniqid.$imgName;
                        $image->thumbnail = '/uploads/shop/product/thumb/'.$uniqid.$imgName;

                        if($image->save()){
                            CImageHandler::upload($imgName , $image->image , true);
                            CImageHandler::resizeAndSave($image->image , $image->thumbnail ,'height', 128);

                        }
                    }

                }
                $this->redirect(array($model->id));
            }
        }

        $this->render('create',array(
            'model'=>$model,
            'image'=>$image
        ));
    }


    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $image= SProductsimg::model()->find('product_id = :id' , array(':id' => $id));
        if(!$image){
            $image = new SProductsimg();
        }

        if(isset($_POST['SProducts']))
        {
            $model->attributes=$_POST['SProducts'];
            if ($model->save()){
                if(isset($_POST['SProductsimg']))
                {
                    $uniqid = uniqid();
                    $old_image = $image->image;
                    $old_thumb = $image->thumbnail;

                    $imgName = CUploadedFile::getInstance($image,'image');
                    if ($imgName){
                        $image->product_id = $id;
                        $image->image = '/uploads/shop/product/title/'.$uniqid.$imgName;
                        $image->thumbnail = '/uploads/shop/product/thumb/'.$uniqid.$imgName;

                        if($image->save())
                            if($imgName){
                                CImageHandler::delete($old_image);
                                CImageHandler::delete($old_thumb);
                                CImageHandler::upload($imgName , $image->image , true);
                                CImageHandler::resizeAndSave($image->image , $image->thumbnail ,'height', 128);
                            }

                    }
                }

                $this->redirect(array('admin/product/update/id/'.$model->id));
            }

        }
            $this->render('update', array(
                'model'=>$model,
                'image'=>$image,
            ));
    }


    public function actionGallery($id){
        $product = $this->loadModel($id);
        $photos = SGallery::model()->findAll('product_id = :id' , array(':id' => $id));
        $model= new SGallery();

        if(isset($_POST['SGallery']))
        {

            $images = CUploadedFile::getInstancesByName('images');
            $uniqid = uniqid();
            if (isset($images) && count($images) > 0) {

                foreach ($images as $image => $pic) {
                    $model->id = null;
                    $model->isNewRecord = true;
                    $model->image = '/uploads/shop/gallery/title/'.$uniqid.$pic->name;
                    $model->thumbnail = '/uploads/shop/gallery/thumb/'.$uniqid.$pic->name;
                    $model->product_id = $product->id;
                    $model->save();
                    CImageHandler::upload($pic , $model->image , true);
                    CImageHandler::resizeAndSave($model->image , $model->thumbnail ,'height', 128);
                }
            }
            $this->redirect(array('/shop/admin/product/gallery/id/'.$product->id));
        }

        $this->render('gallery',array(
            'model'=>$model,
            'product'=>$product,
            'photos'=>$photos,
        ));
    }

    public function actionDelete($id)
    {
        $model = $this->loadModel($id)->delete();
        if(!isset($_GET['ajax']))
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/shop/admin/product'));
    }

    public function actionDeletePhoto($id)
    {
        $model = $this->loadGalleryModel($id);
        $product_id = $model->product_id;
        $model->delete();
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/shop/admin/product/gallery/','id'=>$product_id));
    }

    public function actionSaveCharacters()
    {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        $model = SProducts::model()->findByPk(intval($_POST['id']));
        $model->characters = $_POST['characters'];
        $model->save();
    }

    public function loadModel($id)
    {
        $model=SProducts::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Извините, такой страницы не существует');
        return $model;
    }

    public function loadGalleryModel($id)
    {
        $model=SGallery::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Извините, такой страницы не существует');
        return $model;
    }



    public function actionDuplicate($id) {
        $model = $this->loadModel($id); // record that we want to duplicate
        $current_product_id = $model->id;
        $model->id = null;
        $model->alias_url = null;
        $model->isNewRecord = true;
        if($model->save()){

            $pictures = SProductsimg::model()->findAll('product_id = :product_id' , array(':product_id' => $current_product_id));
            if ($pictures) {
                foreach ($pictures as $picture){
                    $picture->isNewRecord = true;
                    $picture->id = null;
                    $picture->product_id = $model->id;
                    $picture->save();
                }
            }

            $attrs = SAttrs::model()->findAll('product_id = :product_id' , array(':product_id' => $current_product_id));
            if ($attrs) {
                foreach ($attrs as $attr){
                    $attr->isNewRecord = true;
                    $attr->id = null;
                    $attr->product_id = $model->id;
                    $attr->save();
                }
            }

            $accessories = SAccessories::model()->findAll('product_id = :product_id' , array(':product_id' => $current_product_id));
            if ($accessories) {
                foreach ($accessories as $acc){
                    $acc->isNewRecord = true;
                    $acc->id = null;
                    $acc->product_id = $model->id;
                    $acc->save();
                }
            }

            $gallery = SGallery::model()->findAll('product_id = :product_id' , array(':product_id' => $current_product_id));
            if ($gallery) {
                foreach ($gallery as $gal){
                    $gal->isNewRecord = true;
                    $gal->id = null;
                    $gal->product_id = $model->id;
                    $gal->save();
                }
            }
            $this->redirect(array('/shop/admin/product/update', 'id' => $model->id));
        }
    }

    public function actionUpdatePrice() {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        $model = SProducts::model()->findByPk(intval(Yii::app()->request->getPost('id')));
        if ($model === null){
            Yii::app()->end();
        }
        else {
            $model->price = intval(Yii::app()->request->getPost('price'));
            $model->save();
        }
    }


}