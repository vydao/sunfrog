<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property string $id
 * @property string $content
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $com
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'com'], 'required'],
            [['content', 'description', 'keyword'], 'string'],
            [['title'], 'string', 'max' => 250],
            [['com'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'title' => 'SEO(Title)',
            'description' => 'SEO(Description)',
            'keyword' => 'SEO(Keyword)',
            'com' => 'Pages',
        ];
    }
}
