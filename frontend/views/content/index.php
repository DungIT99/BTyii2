<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title ="Contents";
?>
<div class="container" >
<div class="content-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',    
              'header'=>"STT",
              'headerOptions'=>[
                'style'=>'width:15px; text-align:center;color:blue',
            ],
        
        ],
           
            'file',
            'description',
            ['class' => 'yii\grid\ActionColumn',
            'buttons'=>[
                'view' => function($Url,$model){
                    return Html::a('View',$Url,['class'=>'btn btn-xs btn-primary']);
                },
                'update' =>function($Url,$model){
                    return Html::a('Edit',$Url,['class'=>'btn btn-xs btn-success']);
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
               
               
            ],
            'headerOptions'=>[
                'style'=>'width:15px; text-align:center;'
            ]
        ],
        ],
    ]); 
    ?>



</div>
</div>




<?php

