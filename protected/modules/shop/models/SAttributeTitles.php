<?php

/**
 * This is the model class for table "{{attribute_titles}}".
 *
 * The followings are the available columns in table '{{attribute_titles}}':
 * @property string $id
 * @property string $title
 * @property integer $category_id
 * @property integer $type
 */
class SAttributeTitles extends CActiveRecord
{

    const TEXTFIELD = 1;
    const DIGITALFIELD = 2;
    const BOOLEANFIELD = 3;

    public $maxPosition;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AttributeTitles the static model class
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
		return '{{shop_attribute_titles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, category_id', 'required'),
			array('category_id, type, pos', 'numerical', 'integerOnly'=>true),
            array('default_value , measure', 'length', 'max'=>50),
			array('title', 'length', 'max'=>300),
            array('in_search', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, category_id, type', 'safe', 'on'=>'search'),
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
            'attrs'=>array(self::HAS_MANY, 'SAttrs', 'attribute_id'),
            'attrValues'=>array(self::HAS_MANY, 'SAttrvalue', 'attr_id'),
            'category'=>array(self::BELONGS_TO, 'SCategories', 'category_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок',
			'category_id' => 'Category',
            'measure' => 'Ед. измерения',
			'type' => 'Тип',
            'default_value' => 'Значение по умолчанию',
            'in_search' => 'Использовать в поиске',
            'pos' => 'Позиция',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getTypeTitleById($id) {
        $title = "Не определено";
        switch ($id) {
            case 1 :
                $title = "Текстовое поле";
                break;
            case 2 :
                $title = "Числовое поле";
                break;
            case 3 :
                $title = "Да/Нет";
                break;
        };

        return $title;
    }


    public static function getAttributeForCategory($id) {
        $model = self::model()->findAll("category_id = :id" , array(':id' => $id));
        return $model;
    }

    /**
     * Возвращает список атрибутов для категории товаров
     * @param $id
     * @return mixed
     */
    public static function itemsList($id){
       return self::model()->findAll(array(
            'condition' => 'category_id = :id',
            'order' => 'pos ASC',
            'params' => array(':id' => $id),
        ));
    }

    public static function maxPosition(){
        $model = self::model()->find(array(
            'select' => 'max(pos) as maxPosition',
        ));

        return $model->maxPosition;
    }

}