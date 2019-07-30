<?php 
use frontend\assets\IndexAsset;
IndexAsset::register($this);
use yii\widgets\ActiveForm;


?>
<?php  if($ex) :?>
<body>
	<div class="container-contact100">
		<div class="wrap-contact100">
        <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    
				<span class="contact100-form-title">
					Update Information
                </span>
				<div class="form-group">
    
        <?= $form->field($model, 'image')->fileInput( ['value' => $ex[0]->image ]) ?>
       <img style=" width:120px" src="<?=Yii::$app->getUrlManager()->getBaseUrl() ?>/public/<?php  echo $ex[0]->image ?>" alt="">
    </div>
    <div class="form-group">
        <?= $form->field($model, 'firstname')->textInput(['value' => $ex[0]->firstname]) ?>
        
    </div>
    <div class="form-group">
      
        <?= $form->field($model, 'lastname')->textInput(['id'=>'lastname' ,'value' => $ex[0]->lastname]) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'phone')->textInput(['value' => $ex[0]->phone]) ?>
    </div>
 
    <div class="form-group">
        <?= $form->field($model, 'email')->textInput(['value' => $ex[0]->email]) ?>
    </div>
 

    <div class="form-group">
        <?= $form->field($model, 'birthday')->textInput(['class'=>'date','value' => $ex[0]->birthday]) ?>
        
    </div>

    <input type="submit" value="update"  class ="btn btn-success"style="width:20% "><br/>
  
    <?php ActiveForm::end(); ?>
      
		</div>
	</div>






<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>

<?php else: ?>
<body>
	<div class="container-contact100">
		<div class="wrap-contact100">
			
            <?php $form = ActiveForm::begin(['class'=>'contact100-form validate-form']); ?>
				<span class="contact100-form-title">
					Update Information
                </span>
				<div class="form-group">
    
        <?= $form->field($model, 'image')->fileInput( ) ?>
      
    </div>
    <div class="form-group">
        <?= $form->field($model, 'firstname')->textInput() ?>
        
    </div>
    <div class="form-group">
      
        <?= $form->field($model, 'lastname')->textInput(['id'=>'lastname' ]) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'phone')->textInput() ?>
    </div>
 
    <div class="form-group">
        <?= $form->field($model, 'email')->textInput() ?>
    </div>
 

    <div class="form-group">
        <?= $form->field($model, 'birthday')->textInput(['class'=>'date']) ?>
        
    </div>

    <input type="submit" value="update"  class ="btn btn-success"style="width:20% "><br/>
  
    <?php ActiveForm::end(); ?>
      
		</div>
	</div>






<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>

<?php endif; ?>