<?php

namespace backend\controllers;

use Yii;
use backend\models\Events;
use backend\models\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;


/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends Controller
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
        ];
    }

    /**
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex()
    {
        $events = events::find()->all();
        $tack=[];
        // $searchModel = new EventsSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        foreach($events as $e){
          
            $Events = new \yii2fullcalendar\models\Event();
            $Events->id = $e->id;
            $Events->title =$e->title;
            $Events->start = $e->created_date;
            $tack[]= $Events;
          
        }
    
        return $this->render('index', [
            'events'=> $tack
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
        ]);
    }
    public function actionJsoncalendar($start=NULL,$_=NULL){
        $times = \app\modules\timetrack\models\Timetable::find()->where(array('events'=>\app\modules\timetrack\models\Timetable::CAT_TIMETRACK))->all();
    
        $events = array();
    
        foreach ($times AS $time){
          //Testing
          $Event = new \yii2fullcalendar\models\Event();
          $Event->id = $time->id;
          $Event->title = $time->categoryAsString;
          $Event->start = date('Y-m-d\Th:m:s\Z',strtotime($time->date_start.' '.$time->time_start));
        
          $events[] = $Event;
        }
    
        header('Content-type: application/json');
        echo Json::encode($events);
        
        Yii::$app->end();
      }

    /**
     * Displays a single Events model.
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
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date)
    
    {
        $model = new Events();
    
        $model->created_date = $date;

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
             Yii::$app->response->format='json';
        
             return ActiveForm::validate($model);

        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Events model.
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
     * Deletes an existing Events model.
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
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
