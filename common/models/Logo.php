<?php

namespace common\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "logo1".
 *
 * @property integer $id
 * @property string $photo
 */
class Logo extends \yii\db\ActiveRecord
{
	 public $old_photo;
	 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logo1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Photo',
        ];
    }
    
	public function afterFind()
    {
    	$this->old_photo = $this->photo;
    }
    
    /**
     * before save model
     * @param bool $insert
     */
	public function beforeSave($insert)
    {
    	if( !empty( $this->photo ) && $this->photo instanceof UploadedFile )
		{
			$photo = null;
			if( !$insert )
			{
				$photo = $this->old_photo;
			}
			
			$this_photo = UploadedFile::getInstance($this,'photo');              
			if( $this_photo )
			{
    			$img_dir = Yii::getAlias('@uploadPath') . '/logo/';
    			$file_link = md5(time()) . '.' . $this_photo->extension;
    			$save_to = $img_dir . $file_link;
    			$this_photo->saveAs($save_to);
    			$this->photo = $file_link;
    			if( !empty( $photo ) && file_exists($img_dir . $photo) )
    			{
    				unlink($img_dir . $photo);
    			}
			} else {
				$this->photo = $photo;
			}
		} else {
			$this->photo = $this->old_photo;
		}
		
		return true;
    }
    
    public function beforeValidate()
    {
    	$this->photo = UploadedFile::getInstance($this, 'photo');
    	return parent::beforeValidate();
    }
    
	public function imageUrl()
    {
    	if( $this->photo )
    		return Yii::$app->params['site_url'] . 'uploads/logo/' . $this->photo;
    	else 
    		return '/images/SunFrogShirts-Logo1.svg';
    }
}
