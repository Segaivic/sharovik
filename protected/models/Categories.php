<?php

/**
 * This is the model class for table "{{categories}}".
 *
 * The followings are the available columns in table '{{categories}}':
 * @property integer $id
 * @property string $title
 * @property string $is_enabled
 * @property string $is_inbloglist
 */
class Categories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Categories the static model class
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
		return '{{categories}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'length', 'max'=>300),
			array('is_enabled, is_inbloglist', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, is_enabled, is_inbloglist', 'safe', 'on'=>'search'),
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
            'posts'=>array(self::HAS_MANY, 'News', 'catid'),
        );
    }

    protected function afterDelete() {
        parent::afterDelete();
        News::model()->deleteAll('catid='.$this->id);
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Заголовок',
            'is_enabled' => 'Опубликован',
            'is_inbloglist' => 'Отображать в списке блогов'
        );
    }


    /**
     * @return link to page
     */
    public function getUrl()
    {
        return Yii::app()->createUrl('news/blog', array(
            'id'=>$this->id,
            'alias'=>CTranslit::translit($this->title),
        ));
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('is_enabled',$this->is_enabled,true);
		$criteria->compare('is_inbloglist',$this->is_inbloglist,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}