
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/redactor/redactor.min.js' , CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/redactor/ru.js' , CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clickedit.js' , CClientScript::POS_HEAD);


if(Yii::app()->getModule('user')->isAdmin()){
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/bootstrap-tooltip.js' , CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/bootstrap-popover.js' , CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/priceedit.js' , CClientScript::POS_END);
}


Yii::app()->clientScript->registerCssFile('/css/redactor.css', 'screen' , CClientScript::POS_HEAD);
    $this->pageTitle = $model->title.' - '.Yii::app()->name;

//description и keywords
if (!empty($model->meta_keywords) && !empty($model->meta_description)) {
    Yii::app()->clientScript->registerMetaTag($model->meta_keywords, 'description');
    Yii::app()->clientScript->registerMetaTag($model->meta_description, 'keywords');
} else {
    Yii::app()->clientScript->registerMetaTag(Yii::app()->params['meta_description'], 'description');
    Yii::app()->clientScript->registerMetaTag(Yii::app()->params['meta_keywords'], 'keywords');
}
unset($this->breadcrumbs);
    $this->widget('SBreadcrumbs', array(
        'params'=>array(
            'id'=>$model->category->id,
        )
    ));
    $this->header = $model->title;
?>



<?php if(Yii::app()->user->hasFlash('success_cart_add')): ?>

    <?php Yii::app()->clientScript->registerScript("modal","
    $(document).ready(function(){
         $('#myModal').modal({
              keyboard: false
            });
    })",
        CClientScript::POS_END);
    ?>
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h2 id="myModalLabel"><b>Товар добавлен в корзину</b></h2>
        </div>
        <div class="modal-body">
            <p>Товары в корзине:</p>
            <p>
                <?php $this->renderPartial('_cartitems'); ?>
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Продолжить покупки</button>
            <a class="btn btn-primary" href="/shop/cart">Оформить заказ</a>
        </div>
    </div>

<?php endif; ?>



<div class="row">
    <div class="span2">
            <?php echo CHtml::link(CHtml::image(
                    isset($model->image->thumbnail) ? $model->image->thumbnail : Yii::app()->params['nophoto']),
                    isset($model->image->image) ? $model->image->image : Yii::app()->params['nophoto'],
                    array('rel'=>'fbox')); ?>
    </div>

    <div class="span7">


        <p class="description">
            <?php echo $model->description; ?>
        </p>
    </div>
    <div class="span3">
        <div class="price_block">
            <?php echo CHtml::beginForm('/shop/cart/add' , 'post') ?>
            <?php echo CHtml::hiddenField('product_id' , $model->id); ?>
            <div class="price">
                <?php if(Yii::app()->getModule('user')->isAdmin()){ ?>
                    <div class="popover-markup">
                        <a href="javascript:" class="trigger" id="<?php echo $model->id; ?>"><?php echo $model->price; ?></a></span><span class="rur">p<span>уб.</span></span>
                        <div class="head hide">Смена цены</div>
                        <div class="content hide">
                            <input type="text" id="pricetag" name="price" value="<?php echo $model->price; ?>">
                            <button type="submit" class="btn" onclick="savePrice()">ОК</button>
                        </div>
                        <div class="footer hide"></div>
                    </div>
                <?php } else { ?>
                    <?php echo $model->price; ?><span class="rur">p<span>уб.</span></span>
                <?php } ?>
            </div>
            <div class="stock">
                <?php if($model->in_stock > 0){ ?>
                   <span class="in_stock">есть в наличии</span>
                <?php } else { ?>
                    <span class="not_in_stock">под заказ</span>
                <?php } ?>
            </div>
            <div>
                <?php $this->widget('options' , array('product_id' => $model->id)); ?>
            </div>
            <div class="add-btn">
                <?php echo CHtml::submitButton('Добавить в корзину' , array('class' => 'btn btn-info')); ?>
            </div>
            <?php echo CHtml::endForm(); ?>
        </div>
    </div>
</div>

<!--фото товара-->
<div class="row">
    <div class="span12 product_gallery">
        <?php if($model->gallery): ?>
            <div id="accordion" class="accordion in collapse" style="height: auto;">
               <div class="accordion-group">
                    <div class="accordion-heading">
                        <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                            Фотографии товара
                        </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                        <div>

                                <?php foreach ($model->gallery as $gallery): ?>
                                    <?php echo CHtml::link(CHtml::image($gallery->thumbnail),$gallery->image, array('rel' => 'fbox')); ?>
                                <?php endforeach; ?>

                            <br />
                            <p>
                                <?php if(Yii::app()->getModule('user')->isAdmin()){
                                    echo CHtml::link('Добавить / удалить фото',Yii::app()->createUrl('/shop/admin/product/gallery/',array('id'=>$model->id)));
                                }?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row" style="margin-top: 50px">
    <div class="span6">
        <?php if (!empty($products->attrs)) { ?>
        <h4>Характеристики:</h4>
        <table class="table table-bordered table-striped" border="0" align="center">
            <tbody>
                <?php foreach($products->attrs as $attr) { ?>
                    <tr align="center" valign="middle">
                        <td style="text-align: left; width: 30%;"><?php echo CHtml::encode($attr->attrTitles->title); ?></td>
                        <td style="text-align: justify; width: 70%;">
                            <?php
                            switch ($attr->attrTitles->type) {

                                case SAttributeTitles::DIGITALFIELD :
                                    echo CHtml::encode($attr->attrValues->value).' ';
                                    break;

                                case SAttributeTitles::TEXTFIELD :
                                    echo CHtml::encode($attr->attrValues->value).' ';
                                    break;

                                case SAttributeTitles::BOOLEANFIELD :
                                    echo CHtml::encode(SAttrs::convertCheckboxValue($attr->attrValues->value)).' ';
                                    break;
                            }
                            ?>
                            <?php if(isset($attr->attrTitles->measure)) { echo CHtml::encode($attr->attrTitles->measure); } ?>
                        </td>
                    </tr>
                <? };  ?>
            <? };  ?>
            </tbody>
        </table>


        <?php if(Yii::app()->getModule('user')->isAdmin()){
//            ссылка для добавления параметров
            echo CHtml::link('Редактировать',Yii::app()->createUrl('/shop/admin/attributes/',array('id' => $model->id)), array('target' => 'blank'));
        } ?>
    </div>


    <div class="span6">
             <h4>К этому товару рекомендуем:</h4>
                <div class="portfolio-grid-1 main-block">
                    <ul id="gallery" class="thumbnails">
                        <?php foreach ($accessories as $accessory) : ?>
                            <?php $link = SProducts::getLink($accessory['i_product_id']); ?>
                            <li class="span3 small hp-wrapper web">
                                <a href="<?php echo $link ?>"><img alt="" src="/img/220_arrow_hover.png" class="hover-shade">
                                </a>
                                <center>
                                    <a href="<?php  ?>" class="top-link"><img alt="" src="<?php echo $accessory['thumbnail']; ?>"></a>
                                </center>
                                <div class="bottom-block">
                                    <a href="<?php  ?>"><?php echo $accessory['title']; ?></a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
        <?php if(Yii::app()->getModule('user')->isAdmin()): ?>
            <?php echo CHtml::link('Добавить / удалить товары',Yii::app()->createUrl('/shop/admin/accessories/view',array('id'=>$model->id)), array('target' => 'blank')); ?>
        <?php endif; ?>
    </div>
</div>

<!--Расширенное описание товаров-->
<div class="row">
    <div class="span12">
        <?php  if (Yii::app()->getModule('user')->isAdmin()) : ?>
        <p>
            <button class="btn" onclick="clickToEditProduct();">Быстрое редактирование</button>
            <button class="btn" onclick="clickToSaveProduct();">Сохранить</button>
        </p>
        <?php endif; ?>
        <div class="characters" id="ch<?php echo $model->id; ?>">
            <?php echo $model->characters; ?>
        </div>
    </div>
</div>
<?php  if (Yii::app()->getModule('user')->isAdmin()) : ?>
    <div class="row">
        <div class="span3">
            <?php echo CHtml::link('<i class="icon-plus"></i> Добавить фотографии',Yii::app()->createUrl('/shop/admin/product/gallery/', array('id' => $model->id)),array('class' => 'btn btn-primary')); ?>
        </div>
        <div class="span3">
           <?php echo CHtml::link('Продублировать',Yii::app()->createUrl('/shop/admin/product/duplicate/', array('id' => $model->id)),array('confirm' => 'Подтвердите копирование','class' => 'btn btn-primary')); ?>
        </div>
        <div class="span3">
            <?php echo CHtml::link('<i class="icon-edit"></i> Редактировать',Yii::app()->createUrl('/shop/admin/product/update/', array('id' => $model->id)),array('class' => 'btn btn-info')); ?>
        </div>
        <div class="span3">
            <?php echo CHtml::link('<i class="icon-remove"></i> Удалить',Yii::app()->createUrl('/shop/admin/product/delete/', array('id' => $model->id)),array('confirm' => 'Подтвердите удаление','class' => 'btn btn-danger')); ?>
        </div>
    </div>
<?php endif; ?>