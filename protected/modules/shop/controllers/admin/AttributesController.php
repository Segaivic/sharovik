<?php

class AttributesController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';

    public function filters()
    {
        return array(
            'rights', // perform access control for CRUD operations
        );
    }

    function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index' , 'create','titles','updateattribute','deletetitle','UpdatePositions','DeleteAttr'),
                'users'=>Yii::app()->getModule('user')->getAdmins(),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


    public function actionIndex($id)
	{
        $product = SProducts::model()->findByPk($id);
        $attribute = new SAttrs();
        $criteria = new CDbCriteria(array(
            'condition' => 'product_id = :id',
            'params' => array(':id' => $id),
        ));
        $model = SAttrs::model()->with('attrTitles','attrValues')->findAll($criteria);
        $allAttributes = SAttributeTitles::getAttributeForCategory($product->category_id);

        if(isset($_POST['Attr'])) {
            $i=0;
            foreach($model as $m) {
                $oldvalueid = $m->attr_valueid;
                $m->attributes = $_POST['Attr'][$i];
                $m->attr_valueid = $this->getValueId($m->attribute_id , $_POST['Attr'][$i]['attr_valueid']); //return attribute id by attributes
                if($m->save()) {
                    SAttrvalue::checkOldValueInUse($oldvalueid);
                    $i++;
                }
            }
            Yii::app()->user->setFlash('success_changed', "Успешно изменено");
            $this->redirect($id);
        }

        if(isset($_POST['availableAttr'])) {
            $attribute->attributes = $_POST['availableAttr'];
            $attribute->product_id = $id;
            $attribute->attr_valueid = $this->getValueId($attribute->attribute_id , $_POST['availableAttr']['attr_valueid']);

            if($attribute->save()) {
                Yii::app()->user->setFlash('success_added', "Успешно добавлено");
                $this->redirect($id);
            }

        }

        $this->render('index' , array(
            'model' => $model,
            'product' => $product,
            'allAttributes' => $allAttributes));

	}


    public function actionDeleteAttr($id)
    {
        $attr = SAttrs::model()->findByPk($id);
        $product_id = $attr->product_id;
        $attr_id = $attr->attr_valueid;
        $attr->delete();
        SAttrvalue::checkOldValueInUse($attr_id);    //delete value in values table if no goods with this attribute
        Yii::app()->user->setFlash('success_deleted', "Успешно удалено");
        $this->redirect('/shop/admin/attributes/'.$product_id);
    }

    public function actionTitles($id){
        $model = SAttributeTitles::itemsList($id);
        $category = SCategories::model()->findByPk($id);

        $attr = new SAttributeTitles();
        if(isset($_POST['SAttributeTitles']))
        {
            $attr->attributes=$_POST['SAttributeTitles'];
            $attr->category_id = $id;
            $attr->pos = SAttributeTitles::maxPosition() + 1;

            if($attr->save())
                Yii::app()->user->setFlash('success', "Успешно добавлено");
            $this->redirect($id);
        }
        $this->render('titles' , array(
                                    'model' => $model ,
                                    'category' => $category ,
                                    'attr' => $attr)
        );
    }

    public function actionUpdateAttribute($id) {

        $attr = SAttributeTitles::model()->with('category')->findByPk($id);


        if(isset($_POST['SAttributeTitles']))
        {

            $attr->attributes=$_POST['SAttributeTitles'];
            if($attr->save())
                Yii::app()->user->setFlash('success', "Успешно отредактировано");
            $this->redirect($id);
        }

        $this->render('updateattribute' , array('attr' => $attr));

    }

    public function actionDeleteTitle(){
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');

        $id = CHtml::encode($_POST['id']);
        $model = SAttributeTitles::model()->findByPk($id);

//        удалим атрибут у всех продуктов
        SAttrs::model()->deleteAll('attribute_id = :id' , array(':id' => $id));
        SAttrvalue::model()->deleteAll('attr_id = :id' , array(':id' => $id));

//      расставим позиции
        $positions_over = SAttributeTitles::model()->findAll(array(
            'condition'=>'category_id = :category_id AND pos > :pos',
            'params' => array(
                ':category_id' => $model->category_id,
                ':pos' => $model->pos,
            ),
        ));
        if($positions_over !== null) {
            foreach($positions_over as $po){
                $po->pos = $po->pos - 1;
                $po->save();
            }
        }

//      удаление записи
        $model->delete();
    }

    public function actionUpdatePositions(){
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        $positions = array();
        parse_str(Yii::app()->request->getPost('positions'),$positions);
        foreach ($positions['item'] as $key => $value){
            $model = SAttributeTitles::model()->findByPk(intval($value));
            if($model!==null){
                $model->pos = $key;
                $model->save();
            }
        }
    }


    public function loadTitlesModel($id)
    {
        $model=SAttributeTitles::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Извините, такой страницы не существует');
        return $model;
    }

    public function getValueId($id , $value){
        $model = SAttrvalue::model()->find('attr_id = :attr_id AND value =:value',
            array(
                ':attr_id' => $id,
                ':value' => $value,
            ));
        if($model===null) {
            $av = new SAttrvalue();
            $av->attr_id = $id;
            $av->value = $value;
            if ($av->save()){
                return $av->id;
            }
        }
        else {
            return $model->id;
        }
    }
}