<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title ="Contents";
?>

<div class="container" >
<div class="content-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Create Content', ['value'=>'create','class' => 'btn btn-success createContent','id'=>'modelButton']) ?>
    </p>
  <?php

        Modal::begin([
            'header' => '<h2>create Content</h2>',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
  ?>
   
<?php Pjax::begin() ?>
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
    <?php Pjax::end() ?>
    <!-- <div class="modal fade Mymodel" id="modal-id" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
              
                <div class="test">click</div>
            </div>
            <div class="modal-body" id="form_create"> 
               
            </div>
            <div class="modal-footer">
            <button type="button" class="test">Luwu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary ">Save changes</button>
            </div>
        </div>
    </div>
</div>
 -->


</div>
</div>







<?php

