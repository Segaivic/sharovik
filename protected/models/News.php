<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property string $introtext
 * @property string $fulltext
 * @property string $is_published
 * @property string $is_onfrontpage
 * @property integer $user_id
 * @property string $catid
 * @property string $created
 * @property string $modified
 * @property string $metakey
 * @property string $metadesc
 */
class News extends CActiveRecord

{
    const STATUS_ACTIVE=1;
    const STATUS_DISABLED=2;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return '{{news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('introtext , title ', 'required'),
            array('user_id', 'numerical', 'integerOnly'=>true),
            array('title, alias, metakey, metadesc, alias_url', 'length', 'max'=>255),
            array('is_published, is_onfrontpage', 'length', 'max'=>1),
            array('catid', 'length', 'max'=>11),
            array('created, modified , fulltext', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, alias, introtext, fulltext, is_published, is_onfrontpage, user_id, catid, created, modified, metakey, metadesc, category', 'safe', 'on'=>'search'),
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
            'category'=>array(self::BELONGS_TO, 'Categories', 'catid'),
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
			'alias' => 'Алиас',
			'introtext' => 'Вступление',
			'fulltext' => 'Продолжение',
			'is_published' => 'Опубликовано',
			'is_onfrontpage' => 'Отображать в общем списке новостей',
			'user_id' => 'User',
			'catid' => 'Категория',
			'created' => 'Создано',
			'modified' => 'modified',
			'metakey' => 'Ключевые слова',
			'metadesc' => 'Описание',
            'category' => 'категория',
            'alias_url' => 'Псевдоним',
		);
	}

    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if ($this->alias_url){
                if($this->hasDuplicated($this->alias_url) === true){
                    $this->alias_url = $this->id.'-'.CHtml::encode($this->alias_url);
                }
                else {
                    $this->alias_url = CHtml::encode($this->alias_url);
                }
            }
            else {
                $this->alias_url = null;
            }


            if($this->isNewRecord)
            {
                $this->created=$this->modified=date( "Y-m-d H:i:s" );
                $this->user_id=Yii::app()->getModule('user')->user()->id;
            }
            else
                $this->modified=date( "Y-m-d H:i:s" );
            return true;
        }
        else
            return false;
    }


    public function getUrl()
    {
        if($this->alias_url){
            return Yii::app()->createUrl('news/view', array(
                'alias_url' => $this->alias_url,
            ));
        }
        else {
            return Yii::app()->createUrl('news/view', array(
                'id'=>$this->id,
                'alias'=>CTranslit::translit($this->title),
            ));
        }

    }

    public function hasDuplicated($alias) {
        $criteria = new CDbCriteria();
        $criteria->condition = "alias_url = :alias";
        $criteria->params = array('alias' => $alias);
        if (!$this->isNewRecord){
            $criteria->addCondition('id <>'.$this->id);
        }
        $m = self::model()->findAll($criteria);

        if($m != null){
            return true;
        }
        elseif(!$this->isNewRecord && count($m) == 1) {
            return false;
        }
        else {
            return false;
        }
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
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('introtext',$this->introtext,true);
		$criteria->compare('fulltext',$this->fulltext,true);
		$criteria->compare('is_published',$this->is_published,true);
		$criteria->compare('is_onfrontpage',$this->is_onfrontpage,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('catid',$this->catid,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('metakey',$this->metakey,true);
		$criteria->compare('metadesc',$this->metadesc,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>'50',)
		));
	}
}