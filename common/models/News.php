<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $image
 * @property string $meta_keyword
 * @property string $meta_description
 * @property string $meta_title
 * @property integer $view_count
 * @property integer $featured
 * @property integer $updated_date
 * @property integer $created_date
 */
class News extends \yii\db\ActiveRecord
{
	public $old_image;
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
            [['title', 'description', 'content', 'meta_keyword', 'meta_description', 'meta_title'], 'string'],
            [['view_count', 'featured', 'updated_date', 'created_date'], 'integer'],
            [['image'], 'file', 'skipOnEmpty' => true]
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
            'description' => 'Description',
            'content' => 'Content',
            'image' => 'Image',
            'meta_keyword' => 'Meta Keyword',
            'meta_description' => 'Meta Description',
            'meta_title' => 'Meta Title',
            'view_count' => 'View Count',
            'featured' => 'Featured',
            'updated_date' => 'Updated Date',
            'created_date' => 'Created Date',
        ];
    }
    
    public function afterFind()
    {
    	$this->old_image = $this->image;
    }
    
    /**
     * before save model
     * @param bool $insert
     */
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
    		
    		if( !empty( $this->image ) && $this->image instanceof UploadedFile )
    		{
    			$image = null;
    			if( !$insert )
    			{
    				$image = $this->old_image;
    			}
    			
    			$this->image = UploadedFile::getInstance($this,'image');
    			if( $this->image )
    			{
	    			$img_dir = Yii::getAlias('@frontend') . '/../uploads/news/';
	    			$file_link = md5(time()) . '.' . $this->image->extension;
	    			$save_to = $img_dir . $file_link;
	    			$this->image->saveAs($save_to);
	    			$this->image = $file_link;
	    			if( !empty( $image ) && file_exists($img_dir . $image) )
	    			{
	    				unlink($img_dir . $image);
	    			}
    			} else {
    				$this->image = $image;
    			}
    		} else {
    			$this->image = $this->old_image;
    		}
    		
    		return true;
    	} else {
    		return false;
    	}
    }
    
    public function beforeValidate()
    {
    	$this->image = UploadedFile::getInstance($this, 'image');
    	return parent::beforeValidate();
    }
    
    public function imageUrl()
    {
    	return Yii::$app->params['site_url'] . 'uploads/news/' . $this->image;
    }
}
