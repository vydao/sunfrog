<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * NewsSearch represents the model behind the search form about `common\models\News`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','created_ts', 'category_id'], 'integer'],
            [['name', 'description', 'details', 'size'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $products = Product::find()
                      ->select('id, image, name, original_url, price')
                      ->where("`name` LIKE '%{$params}%'")
                      ->orderBy('created_ts DESC')
                      ->all();
        return $products;
    }
}
