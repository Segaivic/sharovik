<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property string $id
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 */
class Menu extends CActiveRecord
{

    const ACCESS_ALL = 1;
    const ACCESS_AUTHENTICATED = 2;
    const ACCESS_ADMINS = 3;

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 2;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
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
		return '{{menu}}';
	}


    public function behaviors()
    {
        return array(
            'nestedSetBehavior'=>array(
                'class'=>'ext.yiiext.behaviors.model.trees.NestedSetBehavior',
                'leftAttribute'=>'lft',
                'rightAttribute'=>'rgt',
                'levelAttribute'=>'level',
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
			array('title , link', 'required'),
			array('access', 'numerical', 'integerOnly'=>true),
            array('link', 'length', 'max'=>400),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lft, rgt, level', 'safe', 'on'=>'search'),
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
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'level' => 'Level',
            'title' => 'Заголовок',
            'link' => 'Ссылка',
            'access' => 'Доступ',
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
		$criteria->compare('lft',$this->lft,true);
		$criteria->compare('rgt',$this->rgt,true);
		$criteria->compare('level',$this->level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getMenuValues($value) {
        switch($value) {
            case 1:
                $value = 'Для всех';
                break;

            case 2:
                $value = 'Для зарег. пользователей';
                break;

            case 3:
                $value = 'Для админов';
                break;
        }
        echo $value;
    }

    public static function accessList() {
        return array(
            self::ACCESS_ALL => 'Для всех пользователей',
            self::ACCESS_AUTHENTICATED => 'Для зарег. пользователей',
            self::ACCESS_ADMINS => 'Для администраторов',

        );
    }

    public static function rootItems() {
        $category=Menu::model()->findByPk(1);
        $model = $category->children()->findAll();
        $items = array();
        $items[1] = 'Корень';
        foreach ($model as $m) {
            $items[$m->id] = $m->title;
        }

        return $items;
    }

    /*
     * Check if previous or next node exists
     * @return boolean
     */
    public static function checkNeighborNode($id , $node) {
        $category=self::model()->findByPk($id);
        switch ($node) {
            case 'prev':
                $model = $category->prev()->find();
                break;
            case 'next':
                $model = $category->next()->find();
                break;
        }

        if($model === null) { return false;} else {return true;}
    }
}