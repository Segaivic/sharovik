<?php

/**
 * This is the model class for table "{{galleryphotos}}".
 *
 * The followings are the available columns in table '{{galleryphotos}}':
 * @property string $id
 * @property string $title
 * @property string $thumb
 * @property string $image
 * @property string $gallery_id
 */
class Galleryphotos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Galleryphotos the static model class
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
		return '{{galleryphotos}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_id', 'required'),
			array('title', 'length', 'max'=>255),
			array('thumb, image', 'length', 'max'=>500),
			array('gallery_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, thumb, image, gallery_id', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'thumb' => 'Thumb',
			'image' => 'Image',
			'gallery_id' => 'Gallery',
            'created' => 'создано'
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('gallery_id',$this->gallery_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected  function afterDelete() {
        parent::afterDelete();
        CImageHandler::delete($this->thumb);
        CImageHandler::delete($this->image);
    }

}