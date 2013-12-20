<?php

/**
 * This is the model class for table "{{shop_adds_items}}".
 *
 * The followings are the available columns in table '{{shop_adds_items}}':
 * @property string $id
 * @property string $group_id
 * @property string $title
 * @property integer $price
 *
 * The followings are the available model relations:
 * @property ShopAddsGroups $group
 */
class ShopAddsItems extends CActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{shop_adds_items}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, title', 'required'),
			array('price , in_stock', 'numerical', 'integerOnly'=>true),
			array('group_id , in_stock', 'length', 'max'=>10),
			array('title', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, group_id, title, price', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'ShopAddsGroups', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'group_id' => 'Group',
			'title' => 'Заголовок',
			'price' => 'Цена, руб',
			'in_stock' => 'Количество на складе',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('group_id',$this->group_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ShopAddsItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
