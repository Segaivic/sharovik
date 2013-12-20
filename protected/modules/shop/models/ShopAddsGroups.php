<?php

/**
 * This is the model class for table "{{shop_adds_groups}}".
 *
 * The followings are the available columns in table '{{shop_adds_groups}}':
 * @property string $id
 * @property string $title
 * @property string $active
 * @property string $product_id
 *
 * The followings are the available model relations:
 * @property ShopProducts $product
 * @property ShopAddsItems[] $shopAddsItems
 */
class ShopAddsGroups extends CActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{shop_adds_groups}}';
	}

    public function scopes(){
        return array(
            'activeOnly' => array(
                'condition' => 't.active ='.self::STATUS_ACTIVE
            ),
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, product_id', 'required'),
			array('title', 'length', 'max'=>200),
			array('active , multichoice , withprice , withstock', 'length', 'max'=>1),
			array('product_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, active, product_id', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'SProducts', 'product_id'),
			'shopAddsItems' => array(self::HAS_MANY, 'ShopAddsItems', 'group_id'),
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
			'active' => 'Активно',
			'product_id' => 'Product',
			'multichoice' => 'Использовать несколько вариантов',
			'withprice' => 'Платный',
			'withstock' => 'Вычитать количество из склада',
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
	public function search($product_id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('product_id',$product_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ShopAddsGroups the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
