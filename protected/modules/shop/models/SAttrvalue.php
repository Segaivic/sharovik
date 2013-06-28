<?php

/**
 * This is the model class for table "{{attr_value}}".
 *
 * The followings are the available columns in table '{{attr_value}}':
 * @property string $id
 * @property string $attr_id
 * @property string $value
 */
class SAttrvalue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attrvalue the static model class
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
		return '{{shop_attr_value}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attr_id, value', 'required'),
			array('id, attr_id', 'length', 'max'=>10),
			array('value', 'length', 'max'=>1500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, attr_id, value', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'attr_id' => 'Attr',
			'value' => 'Value',
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
		$criteria->compare('attr_id',$this->attr_id,true);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     *Return lists of attributes by attribute_id
     */
    public static function getLists($attribute_id) {
        $criteria = new CDbCriteria();
        $criteria->condition = "attr_id = :attr_id";
        $criteria->params = array(':attr_id' => $attribute_id);
        $criteria->group = "value";
        $model = self::model()->findAll($criteria);
        return $model;
    }

    public static function checkOldValueInUse($id) {

        $model = SAttrs::model()->findAll(array(
            'condition' => 'attr_valueid = :value_id',
            'params' => array(':value_id' => $id),
        ));
        if(empty($model)) {
            self::model()->deleteByPk($id);
        }
    }

    public static function getValues($valueid) {
      $values = array();
      $criteria = new CDbCriteria();
      $criteria->select = 'id, value';
      $criteria->addInCondition('id',$valueid);
      $model = self::model()->findAll($criteria);

      foreach($model as $m) {
          $values[] = $m->value;
      }

      return $values;

    }
}