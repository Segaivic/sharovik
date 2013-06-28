<?php

/**
 * This is the model class for table "{{attributes}}".
 *
 * The followings are the available columns in table '{{attributes}}':
 * @property string $id
 * @property integer $product_id
 * @property integer $attribute_id
 * @property string $attr_value
 */
class SAttrs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attributes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{shop_attrs}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, attribute_id', 'required'),
			array('product_id, attribute_id, attr_valueid', 'numerical', 'integerOnly'=>true),
			array('attr_valueid', 'length', 'max'=>10),
          	// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, attribute_id, attr_value', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'products'=>array(self::BELONGS_TO, 'Products', 'product_id'),
            'attrTitles'=>array(self::BELONGS_TO, 'SAttributeTitles', 'attribute_id' , 'order'=>'pos ASC'),
            'attrValues'=>array(self::BELONGS_TO, 'SAttrvalue', 'attr_valueid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'attribute_id' => 'Attribute',
			'attr_value' => 'Значение',
            'pos' => 'Порядок',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('attribute_id',$this->attribute_id);
		$criteria->compare('attr_value',$this->attr_value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getUrl()
    {
        return Yii::app()->createUrl('shopcategories/attributes', array(
            'id'=>$this->id,
         ));
    }
    public static function convertCheckboxValue($value) {

        if ($value == 1) {
            $checkbox = "есть";
        }

        elseif ($value == 0) {
            $checkbox = "нет";
        }

        else {
            $checkbox = "";
        }
        return $checkbox;

    }

    public static function getValues() {

        $criteria = new CDbCriteria();
        $criteria->select = "attr_value";
        $model = self::model()->findAll($criteria);
        return $model;
    }



    /**
     * Accept array $attrs contains pair of attribute id and value
     *Return lists of products by attributes
     */
    public static function getProductsByAttributes($attrs) {

        $categoryProducts = SProducts::getProductsIdbyCategory(Yii::app()->getRequest()->getQuery('id'));
        $products = array();
        $criteria = new CDbCriteria();
        foreach($attrs as $key=>$value){

//           Обработка значений из слайдера
           if(isset($value['from']) && isset($value['to'])){
                    $value = self::findAttributesByRange($key, intval($value['from']) , intval($value['to']));
                    if(empty($value)){
                        unset($products);
                        $products = array();
                        continue;
                    }
                }

//            первая итерация
            if(empty($products)){
                    $criteria->select = "product_id";
                    $criteria->compare('attr_valueid',$value);
                    $model = self::model()->findAll($criteria);
                    foreach($model as $m) {
                        array_push($products, $m->product_id);
                }
            }
            else {
                    $model = self::findAttributes($products , $value);
                    unset($products);
                    $products = array();
                    foreach($model as $m) {
                        array_push($products, $m->product_id);
                    }
            }

        }
       return $products;
    }

    public static function checkAttributes($product_id , $attribute_id){
        $model = self::model()->find(array(
            'condition' => 'product_id = :product_id AND attribute_id = :attribute_id',
            'params' => array(':product_id' => $product_id , ':attribute_id' => $attribute_id),
        ));
        if($model) { return true; } else { return false; }
    }

    public static function findAttributes($products , $value){
       $criteria = new CDbCriteria();
       $criteria->select = "product_id";
       $criteria->addInCondition('product_id',$products);
       $criteria->compare('attr_valueid',$value);
       return self::model()->findAll($criteria);
    }

    public static function findAttributesByRange($attr_id,$from,$to){
        $attributes = array();
        $criteria = new CDbCriteria();
        $criteria->select = "id";
        $criteria->addBetweenCondition('value' , $from , $to);
        $criteria->compare('attr_id',$attr_id);
        $model = Attrvalue::model()->findAll($criteria);

        foreach($model as $m) {
            $attributes[] = $m->id;
        }

        return $attributes;

    }


}