<?php

/**
 * This is the model class for table "{{events_reserve}}".
 *
 * The followings are the available columns in table '{{events_reserve}}':
 * @property string $id
 * @property string $name
 * @property string $contacts
 * @property string $date_start
 * @property string $date_end
 * @property string $description
 */
class EventsReserve extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EventsReserve the static model class
	 */
    const STATUS_ACTIVE=1;
    const STATUS_DISABLED=2;
    public $verifyCode;

    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{events_reserve}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, contacts, date_start, date_end', 'required'),
			array('name', 'length', 'max'=>200),
            array('visited', 'length', 'max'=>1),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, contacts, date_start, date_end, description', 'safe', 'on'=>'search'),
            array(
                'verifyCode',
                'captcha',
                // авторизованным пользователям код можно не вводить
                'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
            ),
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
			'name' => 'ФИО',
			'contacts' => 'Как с вами связаться?',
			'date_start' => 'Дата начала',
			'date_end' => 'Дата окончания',
			'description' => 'Описание события',
            'verifyCode' => 'Код проверки',
            'visited' => 'Просмотрено',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('contacts',$this->contacts,true);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_end',$this->date_end,true);
		$criteria->compare('description',$this->description,true);
        $criteria->compare('visited',$this->visited,true);


        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeSave() {
        if(parent::beforeSave()) {
            $this->date_start = date('Y-m-d', strtotime($this->date_start));
            $this->date_end = date('Y-m-d', strtotime($this->date_end));
            return true;
        } else {
            return false;
        }
    }
}