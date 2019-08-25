<?php

namespace backend\controllers;

use Yii;
use backend\models\tableFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

class FileController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

   public function actionIndex(){


       return $this->render('index');
   }
//    public function actionUpload(){
//     $tabelFile = new Tablefile(); 

//        return $this->render('upload',['model'=>$tabelFile]);
//    }


   public function actionUpload()
{
    $fileName = 'file';
    $uploadPath = 'uploads';
    $tabelFile = new Tablefile(); 
    if (isset($_FILES[$fileName])) {
        $file = \yii\web\UploadedFile::getInstanceByName($fileName);

        //Print file data
        print_r($file);

        if ($file->saveAs($uploadPath . '/' . $file->name)) {
            //Now save file data to database

            echo \yii\helpers\Json::encode($file);
        }else{
          
        }
    }
    return $this->render('upload',['model'=>$tabelFile]);
    

  
}

   public function actionForm(){
    $tabelFile = new Tablefile(); 
       if($tabelFile->load(Yii::$app->request->post())){

         $tabelFile->filea = UploadedFile::getInstances($tabelFile, 'filea');
         $image = $tabelFile->filea;
         if($tabelFile->uploadForm()){
            for($i =0 ; $i < count($image) ; $i++){
                $image[$i]->saveAs('uploads/' .$image[$i]->name);
            
            }
            return  $this->render("form",['model'=>$tabelFile]);
         }
       
        
       
      }
       
    return  $this->render("form",['model'=>$tabelFile]);
   }
}
