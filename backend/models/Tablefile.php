<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tablefile".
 *
 * @property int $id
 * @property string $username
 * @property string $file
 */
class Tablefile extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tablefile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'string'],
            [['filea'],'string'],
            [['username', 'filea'], 'required'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Name',
            'filea' => 'File',
        ];
    }
public function uploadForm(){
  
    $model = new Tablefile();


    foreach ($this->filea as  $value) {

        $model->username = $this->username;
         $model->filea = time().$value->name;
         return $model->save(false);

    }

  
 
}
   
}
