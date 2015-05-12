<?php
namespace app\components;

use Yii;
use yii\web\Controller;
use common\models\Category;
use common\models\News;
use common\models\Support;

class CController extends Controller
{
	public $title = '';
    public function init() {
        parent::init();
        Yii::$app->params['left_menu'] = $this->_getLeftMenu();
        Yii::$app->params['top_news'] = $this->_getTopNews();
        Yii::$app->params['top_supports'] = $this->_getTopSupports();
    }
  /**
   * get left menu
   */
	public function _getLeftMenu(){
         return Category::find()
         	->indexBy('id')
         	->orderBy('priority ASC')
         	->all();
    }
    
    public function _getTopNews()
    {
    	$news = News::find()
    		->orderBy('created_date DESC')
    		->limit(5)
    		->all();

    	$html = '';
    	foreach( $news as $new )
    	{
    		$html .= '<li><i class="fa fa-edit"></i><a href="'.Yii::$app->params['site_url'].'news/'.urlencode($new->title).'-'.$new->id .'">'.$new->title.'</a></li>';    		
    	}
    	
    	return $html;
    }
    
	public function _getTopSupports()
    {
    	$supports = Support::find()
    		->orderBy('created_date DESC')
    		->limit(5)
    		->all();
    	$html = '';
    	foreach( $supports as $support )
    	{
    		$html .= '<li><a href="'.Yii::$app->params['site_url'].'support/'.urlencode($support->title).'-'.$support->id .'">'.$support->title.'</a></li>';
    	}
    	return $html;
    }
}
