<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ExperiencesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Experiences';

?>
<div class="container" >
<div class="experiences-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Experiences', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
             'header'=>'STT',
             'headerOptions'=>[
                 'style'=>' text-align:center'
             ]
        ],
            'start_at',
            'end_at',
            'namecompany',
            'aboutjob',
            ['class' => 'yii\grid\ActionColumn',
          'buttons'=>[
              'view'=>function($Url,$model){
                  return Html::a('View',$Url, ['class'=>'btn btn-xs btn-success']);

              },
              'update'=>function($Url,$model){
                  return Html::a('Edit',$Url, ['class'=>'btn btn-xs btn-primary']);

              },
              'delete' =>function($Url,$model){
                return Html::a('Delete', ['delete', 'id' => $model->id], [
                     'class' => 'btn  btn-xs btn-danger',
                     'data' => [
                         'confirm' => 'Are you sure you want to delete this item?',
                         'method' => 'post',
                     ],
                 ]);
             },
          ]
        ],
        ],
    ]); ?>


</div>
</div>
