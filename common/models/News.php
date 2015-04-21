<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $meta_keyword
 * @property string $meta_description
 * @property string $meta_title
 * @property integer $updated_date
 * @property integer $created_date
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content', 'meta_keyword', 'meta_description', 'meta_title'], 'string'],
            [['updated_date', 'created_date'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'meta_keyword' => 'Meta Keyword',
            'meta_description' => 'Meta Description',
            'meta_title' => 'Meta Title',
            'updated_date' => 'Updated Date',
            'created_date' => 'Created Date',
        ];
    }
    
    public function beforeSave($insert)
    {
    	if( parent::beforeSave($insert) )
    	{
    		if( $insert )
    		{
    			$this->updated_date = time();
    			$this->created_date = time();
    		} else {
    			$this->updated_date = time();
    		}
    		return true;
    	} else {
    		return false;
    	}
    }
}
