<?php

/**
 * This is the model class for table "{{shop_products_rating}}".
 *
 * The followings are the available columns in table '{{shop_products_rating}}':
 * @property string $id
 * @property string $product_id
 * @property string $rating
 *
 * The followings are the available model relations:
 * @property ShopProducts $product
 */
class SProductRating extends CActiveRecord
{
    /**
     * Среднее значение рейтинга
     * @var
     */
    public $avg;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SProductRating the static model class
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
		return '{{shop_products_rating}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id', 'required'),
			array('product_id, rating', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, rating', 'safe', 'on'=>'search'),
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
			'rating' => 'Рейтинг',
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
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('rating',$this->rating,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function avgValue($product_id){
        $model = self::model()->findAll(array(
                'select' => 'AVG(rating) as "avg"',
                'condition' => 'product_id = :product_id',
                'params' => array(':product_id' => $product_id)
        ));

        return isset($model) ? round($model[0]->avg) : 0;
    }
}