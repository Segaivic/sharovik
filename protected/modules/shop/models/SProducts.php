<?php

/**
 * This is the model class for table "{{shop_products}}".
 *
 * The followings are the available columns in table '{{shop_products}}':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $characters
 * @property double $price
 * @property string $created_at
 * @property string $updated_at
 * @property integer $category_id
 */
class SProducts extends CActiveRecord implements IECartPosition
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 2;
    const TITLE_LENGTH_LIMIT = 27;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    function getId(){
        return $this->id;
    }

    function getPrice(){
        return $this->price;
    }

    function getTitle(){
        return $this->title;
    }

    public function scopes(){
        return array(
            'activeOnly' => array(
              'condition' => 't.active ='.self::STATUS_ACTIVE
            ),
            'showByAdded' => array(
              'order' => 't.created_at DESC'
            ),
        );
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{shop_products}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('category_id , in_stock', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('title , meta_description , meta_keywords, alias_url', 'length', 'max'=>255),
            array('active', 'length', 'max'=>1),
			array('description, characters', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, characters, price, created_at, updated_at, category_id', 'safe', 'on'=>'search'),
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
            'attrs'=>array(self::HAS_MANY, 'SAttrs', 'product_id' , 'together'=>true),
            'category'=>array(self::BELONGS_TO, 'SCategories', 'category_id'),
            'image'=>array(self::HAS_ONE, 'SProductsimg', 'product_id'),
            'gallery'=>array(self::HAS_MANY, 'SGallery', 'product_id'),
            'accessories'=>array(self::HAS_MANY, 'SAccessories', 'product_id'),
            'rating'=>array(self::HAS_MANY, 'SProductRating', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Наименование',
			'description' => 'Описание',
			'characters' => 'Характеристики',
			'price' => 'Цена',
			'created_at' => 'Создано',
			'updated_at' => 'Обновлено',
			'category_id' => 'Категория',
            'category' => 'Категория',
            'active' => 'Активен',
            'meta_keywords' => 'Мета: ключевые слова',
            'meta_description' => 'Мета: описание',
            'image' => 'Изображение',
            'alias_url' => 'Псевдоним',
            'in_stock' => 'Количество на складе',
		);
	}

    public function getUrl()
    {
        if($this->alias_url){
            return Yii::app()->createUrl('shop/product/view', array(
                'alias_url' => $this->alias_url,
            ));
        }
        else {
            return Yii::app()->createUrl('/shop/product/view', array(
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



    public static function getLink($id){
        $model = self::model()->find(array(
           'select' => 'id, title',
           'condition' => 'id = :id',
           'params' => array(':id' => $id),
        ));

        return $model->getUrl();
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('characters',$this->characters,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('category_id',$this->category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>'50',
            )
		));
	}


    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if ($this->alias_url){
                if($this->hasDuplicated($this->alias_url) === true){
                    $this->alias_url = uniqid().'-'.CTranslit::translit(CHtml::encode($this->alias_url));
                }
                else {
                    $this->alias_url = CTranslit::translit(CHtml::encode($this->alias_url));
                }
            }
            else {
                $this->alias_url = null;
            }

            if($this->isNewRecord)
            {
                $this->created_at=date( "Y-m-d H:i:s" );
            }
            else
                $this->updated_at=date( "Y-m-d H:i:s" );

            return true;
        }
        else
            return false;
    }

    protected  function afterDelete() {
        parent::afterDelete();
        $image=SProductsimg::model()->find(
            'product_id = :id',
            array(
                ':id' => $this->id
            ));
        if ($image){
            CImageHandler::delete($image->image);
            CImageHandler::delete($image->thumbnail);
            $image->delete();
        }

//        Удаление атрибутов
        SAttrs::model()->deleteAll(array(
           'condition' => 'product_id = :id',
           'params' => array(':id' => $this->id),
        ));
    }

    public static function getTitleById($id){
        $criteria = new CDbCriteria();
        $criteria->select='title';
        $criteria->condition='id=:id';
        $criteria->params=array(':id' => $id);
        $title = self::model()->find($criteria);

        if(!$title) { return false; }

        return $title->title;

    }

    public static function getAccessoriesForProduct($id) {

        $accessories = Yii::app()->db->createCommand()
            ->select('i.product_id as i_product_id, i.thumbnail , p.id, p.price, p.title, u.product_id,  u.acc_id, u.id as u_id')
            ->from(Yii::app()->db->tablePrefix.'shop_accessories u')
            ->join(Yii::app()->db->tablePrefix.'shop_products p', 'u.acc_id=p.id')
            ->join(Yii::app()->db->tablePrefix.'shop_productsimg i', 'i.product_id=p.id')
            ->where('u.product_id=:id', array(':id'=>$id))
            ->queryAll();

        return $accessories;
    }
}