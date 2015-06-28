<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property integer $category_id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $size
 * @property string $details
 * @property string $original_url
 * @property string $created_ts
 * @property string $deteled_ts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['price'], 'number'],
            [['name'], 'required'],
            [['description', 'size', 'details'], 'string'],
            [['created_ts', 'deteled_ts'], 'safe'],
            [['name', 'original_url', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'image' => 'Image',
            'description' => 'Description',
            'size' => 'Size',
            'price' => 'Price',
            'details' => 'Details',
            'original_url' => 'Original Url',
            'created_ts' => 'Created Ts',
            'deteled_ts' => 'Deteled Ts',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id']);
    }
    
    /**
     * get image url
     */
    public function getImageUrl()
    {
    	$url = $this->image;
    	if( !empty($url) )
    	{
    		$path = explode('/',$url);
    		if( isset($path[0]) && in_array($path[0],array('http:','https:')) )
    		{
    			return $url;
    		} else {
    			return Yii::$app->params['frontendUrl'] . '/uploads/products/'. $url;
    		}
    	}
    	return $url;
    }

}
