<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\assets\EventsAsset;
use yii\bootstrap\Modal;
EventsAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
Modal::begin([
  
  'header'=>'<h4>Job Created</h4>',
  'id'=>'modal',
  'size'=>'modal-lg',
]);

echo "<div id='modalContent'></div>";
Modal::end();



$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
  )); 
?>
   


</div>
