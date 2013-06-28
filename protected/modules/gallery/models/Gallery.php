<?php

/**
 * This is the model class for table "{{img}}".
 *
 * The followings are the available columns in table '{{img}}':
 * @property string $id
 * @property string $big
 * @property string $thumbnail
 */
class Gallery extends CActiveRecord
{
    const STATUS_ACTIVE=1;
    const STATUS_DISABLED=2;
    const TMP_PATH = '/uploads/gallery/tmp/';

    public $thumbnail;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Img the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function scopes() {
       return array(
        'onlyActive' => array(
            'condition'=>'is_published='.self::STATUS_ACTIVE,
            'order'=>'t.created DESC',
            ));
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{gallery}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('thumbnail', 'file', 'types'=>'jpg, gif, png' , 'allowEmpty' => true),
			array('thumbnail , title', 'length', 'max'=>500),
            array('is_published', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, thumbnail', 'safe', 'on'=>'search'),
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
            'photos' => array(self::HAS_MANY, 'Galleryphotos', 'gallery_id'),
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
			'thumbnail' => 'Изображение',
            'is_published' => 'Опубликовано',
            'created' => 'создано'
		);
	}

    public function getUrl()
    {
        return Yii::app()->createUrl('gallery/album/view', array(
            'id'=>$this->id,
            'alias'=>CTranslit::translit($this->title),
        ));
    }

    public static function getStatus($status) {

        $status == self::STATUS_ACTIVE ? $status = 'Да' : $status = 'Нет';
        return $status;
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
        $criteria->compare('created',$this->created,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
        $criteria->order = 'created DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected  function afterDelete() {
        parent::afterDelete();
        CImageHandler::delete($this->thumbnail);
        $model =Galleryphotos::model()->findAll(
            'gallery_id = :id', array(':id' => $this->id)
        );

        foreach($model as $m) {
            CImageHandler::delete($m->thumb);
            CImageHandler::delete($m->image);
            $m->delete();
        }
    }
}