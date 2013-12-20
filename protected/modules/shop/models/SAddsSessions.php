<?php

/**
 * This is the model class for table "{{shop_adds_sessions}}".
 *
 * The followings are the available columns in table '{{shop_adds_sessions}}':
 * @property string $id
 * @property integer $product_id
 * @property integer $item_id
 */
class SAddsSessions extends CActiveRecord implements IECartPosition
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{shop_adds_sessions}}';
	}

    function getId(){
        return $this->id;
    }

    function getPrice(){
        $optionsPrice = 0.0;
        if(isset($this->product->price)){
            $optionsPrice = 0.0;
            $model = $this->getItems();
            if($model !== null) {
                foreach($model as $m){
                    $optionsPrice +=  (int)$m['price'];
                }
            }
            return $this->product->price + $optionsPrice ;
        }
        else {
            return $optionsPrice;
        }

    }


    function getTitle(){
        if(isset($this->product->title)){
            return $this->product->title;
        }
        else {
            return 'Товар удален';
        }
    }

    function getUrl(){
        if(isset($this->product->image->thumbnail)){
            return $this->product->url;
        }
        else {
            return '#';
        }
    }

    function getImage(){
        if(isset($this->product->image->thumbnail))
            return $this->product->image->thumbnail;
    }

    function getOptions(){
        return $this->optionskit['options'];
    }

    function getOptionkit_id(){
        return $this->optionkit_id;
    }
	
	function getProductId(){
        return $this->product_id;
    }

    /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('session_id', 'required'),
			array('product_id , optionkit_id', 'numerical', 'integerOnly'=>true),
			array('session_id', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, session_id ,product_id', 'safe', 'on'=>'search'),
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
            'product'=>array(self::BELONGS_TO, 'SProducts', 'product_id'),
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
			'product_id' => 'Product',
			'session_id' => 'ID сессии',
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
		$criteria->compare('product_id',$this->product_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SAddsSessions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function getItems(){
        $items = array();
        if((!Yii::app()->shoppingCart->isEmpty()) && (!empty($this->optionskit['options']))) {
            $model = ShopAddsItems::model()->with('group')->findAll(array(
                'condition' => 't.id IN ('.$this->optionskit['options'].')',
            ));
            foreach($model as $m){
                $items[] = array('price' => $m->price);

            }
        }
        return $items;
    }
}
