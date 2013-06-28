<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Каталог'
);
$this->pageTitle = "Каталог - ".Yii::app()->name;
$this->header= "Каталог";
?>
<div class="row show-grid">
    <div class="span12">
        <div class="row show-grid clear-both">
            <!-- BEGIN LEFT-SIDEBAR -->
            <div id="left-sidebar" class="span3 sidebar">
                <!-- LEFT-SIDEBAR: SIDEBAR NAVIGATION -->
                <div class="side-nav sidebar-block left-side-nav">
                    <ul>
                        <?php foreach($children as $child): ?>
                            <li><a href="<?php echo $child->url ?>"><?php echo $child->title; ?></a><div class="side-tick left-side-tick"></div></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- END LEFT-SIDEBAR -->

            <!-- BEGIN ARTICLE CONTENT AREA -->

            <div class="span9 main-column two-columns-left">
                <article>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                    <p>Donec ullamcorper nulla non metus auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui.</p>

                    <p>Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis. Curabitur blandit tempus porttitor. Donec ullamcorper nulla non metus auctor fringilla. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vestibulum id ligula porta felis euismod semper. Nullam quis risus eget urna mollis ornare vel eu leo.</p>

                </article>
            </div>
            <!-- END ARTICLE CONTENT AREA -->


        </div>
    </div>
</div>










