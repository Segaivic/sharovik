<?php Yii::app()->clientScript->registerCssFile('/modal/modal.css', 'screen' , CClientScript::POS_HEAD);
      Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/modal/js/jquery.simplemodal.js' , CClientScript::POS_END);

      if(!isset(Yii::app()->request->cookies['modal']->value) || (Yii::app()->request->cookies['modal']->value !== 'true')){
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/modal/js/osx.js' , CClientScript::POS_END);
        $modal =  new CHttpCookie('modal', 'true');
        $modal->expire = time()+60*60*24*1;
        Yii::app()->request->cookies['modal'] = $modal;
    }
?>
        <!-- modal content -->
        <div id="osx-modal-content">
            <div id="osx-modal-title">Заголовок окна</div>
            <div class="close"><a href="#" class="simplemodal-close">x</a></div>
            <div id="osx-modal-data">
                <h2>Заголовок Контента</h2>
                <p>
                    Лорем ипсум долор сит амет, cонсеcтетур адиписиcинг элит, сед до эиусмод темпор инcидидунт ут лаборе эт долоре магна аликуа.Лорем ипсум долор сит амет, cонсеcтетур адиписиcинг элит, сед до эиусмод темпор инcидидунт ут лаборе эт долоре магна аликуа.Лорем ипсум долор сит амет, cонсеcтетур адиписиcинг элит, сед до эиусмод темпор инcидидунт ут лаборе эт долоре магна аликуа.
                </p>
                <p><button class="simplemodal-close">Закрыть</button> <span>(или нажмите ESC)</span></p>
            </div>
        </div>
