<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<?php 
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','id'=>'id_dropzone','class'=>"dropzone"]]); ?>

 

<?= $form->field($model, 'username')->textInput(['multiple' => true]) ?>
<?= $form->field($model, 'filea')->textInput() ?>



<?= \kato\DropZone::widget([
       'options' => [
           'maxFilesize' => '2',

       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file){alert(file.name + ' is removed')}"
       ],
   ]);

 ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

