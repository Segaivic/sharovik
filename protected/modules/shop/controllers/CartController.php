    <?php

class CartController extends Controller
{
    public $layout = 'application.modules.shop.views.layouts.shop';


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
        $items = new SOrderItems();

        if(isset($_POST['SOrders']))
        {

            // if cart is empty, stop saving
            if(Yii::app()->shoppingCart->isEmpty()) {
                echo "Ваша корзина пуста. ".CHtml::link('вернуться к покупкам','/shop');
                return;
            }
            $orders->attributes = $_POST['SOrders'];


            if($orders->save()) {
                $positions = Yii::app()->shoppingCart->getPositions();
                foreach ($positions as $position) {
                    $items->isNewRecord = true;
                    $items->id = null;
                    $items->order_id = $orders->id;
                    $items->product_id = $position->getId();
                    $items->quantity = $position->getQuantity();
                    $items->price = $position->getPrice();
                    $items->sum = $items->quantity * $items->price;
                    $items->save();
                }
                //Почистим корзину!
                Yii::app()->shoppingCart->clear();
                Yii::app()->user->setFlash('success_shopping', "Спасибо, ваш заказ принят в обработку!");
                $this->redirect('/shop/cart');
            }

        }
        $this->render('index' , array('model' => $orders));
    }

    public function actionDeleteItemFromCartById() {
        Yii::app()->shoppingCart->remove(intval($_POST['id']));
        if (Yii::app()->shoppingCart->isEmpty()){
            echo "Ваша корзина пуста ".CHtml::link('вернуться к покупкам.','/shop');

        }
        $this->renderPartial('application.modules.shop.views.cart._carttable', array(), false, true);
    }


    public function actionUpdate() {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        $product = SProducts::model()->findByPk(intval($_POST['id']));
        Yii::app()->shoppingCart->update($product , intval($_POST['quantity']));
        $position = Yii::app()->shoppingCart->itemAt($_POST['id']);
        $price = $position->getSumPrice();
        echo CJSON::encode(array(
            'summa' =>  $price,
            'total' => Yii::app()->shoppingCart->getCost(),
            'itemscount' => Yii::app()->shoppingCart->getItemsCount()
        ));
    }

    public function actionAdd($id) {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        $product = SProducts::model()->findByPk($id);
        Yii::app()->shoppingCart->put($product);
    }

}