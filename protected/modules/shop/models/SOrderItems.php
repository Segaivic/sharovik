<?php

/**
 * This is the model class for table "{{shop_orders_items}}".
 *
 * The followings are the available columns in table '{{shop_orders_items}}':
 * @property string $id
 * @property string $order_id
 * @property string $product_id
 * @property integer $quantity
 * @property integer $price
 *
 * The followings are the available model relations:
 * @property ShopProducts $product
 * @property ShopOrders $order
 */
class SOrderItems extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderItems the static model class
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
		return '{{shop_orders_items}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, product_id, quantity, price', 'required'),
			array('quantity, optionkit_id, price, sum', 'numerical', 'integerOnly'=>true),
			array('order_id, product_id', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, optionkit_id ,product_id, quantity, price', 'safe', 'on'=>'search'),
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
			'order' => array(self::BELONGS_TO, 'SOrders', 'order_id'),
            'optionskit'=>array(self::BELONGS_TO, 'SOptionkits', 'optionkit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'product_id' => 'Product',
			'quantity' => 'Количество',
			'price' => 'Цена',
            'sum' => 'Сумма',
            'optionkit_id' => 'optionkit_id'
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
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getSum($order_id){
        $sum = 0;
        $models = self::model()->findAll(array(
           'select' => 'order_id, sum',
           'condition' => 'order_id = :order_id',
           'params' => array(':order_id' => $order_id),
        ));

        foreach($models as $model){
            $sum += $model->sum;
        }

        return $sum;
    }
}