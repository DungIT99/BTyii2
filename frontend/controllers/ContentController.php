<?php

namespace frontend\controllers;

use Yii;
use frontend\models\content;
use frontend\models\ContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;


/**
 * ContentController implements the CRUD actions for content model.
 */
class ContentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'view','delete'],
                        'roles' => ['@'],
                    ],
                  
                    [
                        'actions' => ['logout', 'index' ,'call-back'], // add all actions to take guest to login page
                        'denyCallback' => function () {
                            return Yii::$app->response->redirect(['site/logincustomer']);
                        },
                    ],
                   
                ],
            ],
           
        ];
    }
    

    

    /**
     * Lists all content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
       
            $dataProvider = $searchModel->search(Yii::$app->User->identity->id);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
     
       
  
    }

    /**
     * Displays a single content model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
 
            $model = new content();
        if ($model->load(Yii::$app->request->post())) {
    
        $model->userId = Yii::$app->User->identity->id;
        $model->file =  UploadedFile::getInstance($model, 'file');

        if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
         
        }
        if($model->file ){
            $model->file->saveAs('public/'.$model->file->name);
           
        }


    }
    return $this->renderAjax('create', [
        'model' => $model,
    ]);
    // return $this->render('create', [
    //     'model' => $model,
    // ]);
}

    /**
     * Updates an existing content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
            $model = $this->findModel($id);
            $file = $model->file;
            $model->file = $file;
            if ($model->load(Yii::$app->request->post())) {
               
                $model->file =  UploadedFile::getInstance($model, 'file');

                if($model->save()){
                   
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                if($model->file){
                    $model->file->saveAs('public/'. $model->file->name);
                //    echo $model->file;die;
                   
                    }else{
                        $model->file =$file;
                        $model->save(false);
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
             
            }

            return $this->render('update', [
                'model' => $model,
            ]);
    }

    /**
     * Deletes an existing content model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = content::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
