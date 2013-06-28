<?php

class SearchController extends Controller
{
    /**
     * @var string index dir as alias path from <b>application.</b>  , default to <b>runtime.search</b>
     */
    public $layout = 'application.modules.shop.views.layouts.shop';
    private $_indexFiles = 'runtime.search';
    /**
     * (non-PHPdoc)
     * @see CController::init()
     */
    public function init(){
        Yii::import('application.vendors.*');
        require_once('Zend/Search/Lucene.php');
        parent::init();
    }

    /**
     * Search index creation
     */
    public function actionCreate()
    {
        setlocale(LC_CTYPE, 'ru_RU.utf-8');
        Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new  Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());

        $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles), true);

        $products = SProducts::model()
            ->with('category' , 'image')
            ->findAll();
        foreach($products as $product){
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Text('title',
                    CHtml::encode($product->title), 'UTF-8')
            );


            $doc->addField(Zend_Search_Lucene_Field::Text('link',
                   CHtml::encode($product->url)
                    , 'UTF-8')
            );

            $doc->addField(Zend_Search_Lucene_Field::Text('content',
                    CHtml::encode($product->description)
                    , 'UTF-8')
            );

            $doc->addField(Zend_Search_Lucene_Field::Text('category',
                    CHtml::encode($product->category->title)
                    , 'UTF-8')
            );

            $doc->addField(Zend_Search_Lucene_Field::Text('categorylink',
                                CHtml::encode($product->category->url)
                                , 'UTF-8')
                        );

            $doc->addField(Zend_Search_Lucene_Field::Text('thumbnail',
                                CHtml::encode($product->image['thumbnail'])
                                , 'UTF-8')
                        );


            $index->addDocument($doc);
        }
        $index->optimize();
        $index->commit();
        echo 'Lucene index создан успешно';
    }

    public function actionSearch()
    {
        setlocale(LC_CTYPE, 'ru_RU.utf-8');
        Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new  Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());

        if (($term = Yii::app()->getRequest()->getParam('q', null)) !== null) {
            $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            $results = $index->find($term);
            $query = Zend_Search_Lucene_Search_QueryParser::parse($term);


            $this->render('search', compact('results', 'term', 'query'));
        }
    }


    private function preview_content($data, $limit = 400) {
        return substr($data, 0, $limit) . '...';
    } // End of preview_content() function.
// Function for stripping junk out of content:
    private function clean_content($data) {
        return strip_tags($data);
    }
}