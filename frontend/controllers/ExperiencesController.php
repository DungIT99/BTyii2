<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Experiences;
use frontend\models\ExperiencesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * ExperiencesController implements the CRUD actions for Experiences model.
 */
class ExperiencesController extends Controller
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
                               
                            // ],
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
     * Lists all Experiences models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new ExperiencesSearch();
        if(Yii::$app->User->identity){
        $dataProvider = $searchModel->search(Yii::$app->User->identity->id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    $dataProvider = $searchModel->search(   $searchModel );
    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
    }

    /**
     * Displays a single Experiences model.
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
     * Creates a new Experiences model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Experiences();
        if(Yii::$app->request->isAjax && $mdoel->load($_POST)){
            Yii::$app->response->request->format = "json";
            return \yii2\widgets\Activeform::validate($model);

        }
  
        $id = Yii::$app->User->identity->id;
    if ($model->load(Yii::$app->request->post())) {
        $model->userId = $id ;
        if( $model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
        }
       

    return $this->render('create', [
        'model' => $model,
    ]);
}
return $this->render('create', [
    'model' => $model,
]);
}
     

    /**
     * Updates an existing Experiences model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Experiences model.
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
     * Finds the Experiences model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Experiences the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Experiences::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
