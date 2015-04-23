<?php
namespace app\components;

use Yii;
use yii\web\Controller;
use common\models\Category;
class CController extends Controller
{
	public $title = '';
    public function init() {
        parent::init();
        Yii::$app->params['left_menu'] = $this->_getLeftMenu();
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
}
