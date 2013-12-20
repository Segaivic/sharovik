<?php

/**
 * This is the model class for table "{{shop_optionkits}}".
 *
 * The followings are the available columns in table '{{shop_optionkits}}':
 * @property string $id
 * @property string $adds_sessions_id
 * @property string $options
 */
class SOptionkits extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{shop_optionkits}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('options', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, options', 'safe', 'on'=>'search'),
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
			'options' => 'Options',
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
		$criteria->compare('options',$this->options,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SOptionkits the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function getOptions($position_id){
        $addsId = SAddsSessions::model()->with('optionskit')->findByPk($position_id);

        $items = array();
        if($addsId->optionskit !== null){
            if(!Yii::app()->shoppingCart->isEmpty()) {
                $model = ShopAddsItems::model()->with('group')->findAll(array(
                    'condition' => 't.id IN ('.$addsId->optionskit->options.')',
                ));
                foreach($model as $m){
                    $items[] = array('group' => $m->group->title,
                        'withprice' => $m->group->withprice,
                        'title' => $m->title,
                        'price' => $m->price);
                }
            }
        }
        return $items;
    }

    public static function getOptionsByOptionsKitId($options_id){
        $items = array();
             if($options_id) {
                $options = SOptionkits::model()->findByPk($options_id);
                $model = ShopAddsItems::model()->with('group')->findAll(array(
                    'condition' => 't.id IN ('.$options->options.')',
                ));
                foreach($model as $m){
                    $items[] = array('group' => $m->group->title,
                        'withprice' => $m->group->withprice,
                        'title' => $m->title,
                        'price' => $m->price);
                }
            }
        return $items;
    }
}
