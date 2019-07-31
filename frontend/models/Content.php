<?php

namespace frontend\models;
use yii\web\UploadedFile;
use Yii;


/**
 * This is the model class for table "content"
 *
 * @property int $id
 * @property int $userId
 * @property string $file
 * @property string $description
 */
class Content extends \yii\db\ActiveRecord
{
// public $fi;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'description'], 'required'],
            ['file', 'required',
            // 'when' => function ($model) {
            //     return $model->file == '';
            // },
            'whenClient' => "function (attribute, value) {
                return $('#file').val() == '';
            }"
        ],
            [['userId'], 'integer'],
            [['file'], 'file','extensions' => 'png, jpg,doc, docx,pdf'],
        
        ];
    }

  



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'file' => 'File',
            'description' => 'Description',
        ];
    }
  
}
