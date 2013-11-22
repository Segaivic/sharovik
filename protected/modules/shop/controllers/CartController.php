    <?php

class CartController extends Controller
{
    public $layout = 'application.modules.shop.views.layouts.shop';
    protected $session_id;


    public function actions() {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
        );
    }
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('captcha','index','DeleteItemFromCartById' , 'Update' , 'cart' , 'add'),
                'users'=>array('*'),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }



    public function actionIndex() {
        $orders = new SOrders();
        $items = new  SOrderItems();

        if(isset($_POST['SOrders']))
        {
            // if cart is empty, stop saving
            if(Yii::app()->shoppingCart->isEmpty()) {
                echo "Ваша корзина пуста. ".CHtml::link('вернуться к покупкам','/shop');
                return;
            }

            $orders->attributes = $_POST['SOrders'];
            if(Yii::app()->user->isGuest) { $orders->user_id = null; } else { $orders->user_id = Yii::app()->getModule('user')->user()->id; }
            if($orders->save()) {
                $positions = Yii::app()->shoppingCart->getPositions();
                foreach ($positions as $position) {
                    $items->isNewRecord = true;
                    $items->id = null;
                    $items->order_id = $orders->id;
                    $items->product_id = $position->getProductId();
                    $items->quantity = $position->getQuantity();
                    $items->price = $position->getPrice();
                    $items->optionkit_id = $position->getOptionkit_id();
                    $items->sum = $items->quantity * $items->price;
                    $items->save();
                }

                //Очистка корзину!
                Yii::app()->shoppingCart->clear();

                Yii::app()->user->setFlash('success_shopping', "Спасибо, ваш заказ принят в обработку!");
                $this->redirect('/shop/cart');
            }
        }
        $this->render('index' , array('model' => $orders));
    }

    public function actionDeleteItemFromCartById() {
        Yii::app()->shoppingCart->remove(intval($_POST['id']));
        SAddsSessions::model()->deleteByPk(intval($_POST['id']));
        if (Yii::app()->shoppingCart->isEmpty()){
            echo "Ваша корзина пуста ".CHtml::link('вернуться к покупкам.','/shop');

        }
        $this->renderPartial('application.modules.shop.views.cart._carttable', array(), false, true);
    }


    public function actionUpdate() {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        $product = SAddsSessions::model()->findByPk(intval($_POST['id']));
        Yii::app()->shoppingCart->update($product , intval($_POST['quantity']));
        $position = Yii::app()->shoppingCart->itemAt($_POST['id']);
        $price = $position->getSumPrice();
        echo CJSON::encode(array(
            'summa' =>  $price,
            'total' => Yii::app()->shoppingCart->getCost(),
            'itemscount' => Yii::app()->shoppingCart->getItemsCount()
        ));
    }

    public function actionAdd() {
        var_dump($_POST);
        if(!isset($_POST['product_id'])) throw new CHttpException(404,'Такой страницы не существует!');
        $this->session_id = Yii::app()->session->sessionID;
        if(isset($_POST['options']) && !empty($_POST['options'])) {
            $optionkit_id = $this->addOptions($_POST['options']);
        }
          else {
            $optionkit_id = 0;
        }
        $order = $this->OrderExists($this->session_id , $optionkit_id , (int)$_POST['product_id']);
        if($order === false){
            $model = new SAddsSessions();
            $model->product_id = (int)$_POST['product_id'];
            $model->session_id = Yii::app()->session->sessionID;
            $model->optionkit_id = $optionkit_id;
            $model->save();
            $product = SAddsSessions::model()->findByPk($model->id);
            Yii::app()->shoppingCart->put($product);
            Yii::app()->user->setFlash('success_cart_add', "Товар добавлен в корзину");

        }
        else {
            $position = Yii::app()->shoppingCart->itemAt($order);
            if($position){
                Yii::app()->shoppingCart->put($position);
                Yii::app()->user->setFlash('success_cart_add', "Товар добавлен в корзину");
            }

        }

//        редирект на страницу с товаром
          $product = SProducts::model()->findByPk(CHtml::encode($_POST['product_id']));
          if($product){
              $this->redirect($product->url);
          }
    }

    public function addOptions($options = array()) {
        $options = CArray::array2string($options);

        if($this->OptionsExists($options) === true){
            $model= SOptionkits::model()->find(
                'options = :options',
                array(':options' => $options)
            );
        }
        else {
            $model = new SOptionkits();
            $model->options = $options;
            $model->save();
        }

        return $model->id;

    }


    protected function OrderExists($session_id , $optionkit_id , $product_id){
        $model = SAddsSessions::model()->find(
            'session_id = :session_id AND optionkit_id = :optionkit_id AND product_id = :product_id',

            array(
              ':session_id' => $session_id,
              ':optionkit_id' => $optionkit_id,
              ':product_id' => $product_id,
            )
        );
        if($model === null) { return false; } else { return $model->id; }

    }


    protected function OptionsExists($options){
       $model = SOptionkits::model()->find(
           'options = :options',
           array(':options' => $options)
       );
       if($model === null) { return false; } else { return true; };

    }



    protected function deleteExistingOptionsIfExists($session_id , $product_id){
        $model = SAddsSessions::model()->deleteAll(array(
            'condition' => 'session_id = :session_id AND product_id = :product_id',
            'params' => array(
                ':session_id' => $session_id,
                ':product_id' => $product_id,
                           )
        ));
    }


}