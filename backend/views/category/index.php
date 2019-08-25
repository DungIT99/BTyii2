<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
               
                'attribute' => 'name',
                "format"=>"raw",
                
                "value"=>function($model){
                    return '<div class="nameCategory"  data-id="idCate'.$model->id.'">'.$model->name.'</div>';
                },
                'contentOptions'=>[
                   'class'=>'nameCategory',
                ]
            ],
            
            'status',
            'created_at',
            'updated_at',
          
            ['class' => 'yii\grid\ActionColumn'],
           
        ],
    ]); ?>


</div>
