<?php

	use  yii\helpers\Html;
	use  yii\widgets\ActiveForm;
	$this->title = '轮播图修改界面';
?>
<h1><center> <?= Html::encode($this->title); ?></center></h1><br>
<div class="site-signup">
    <div class="row">
        <div class="col-lg-3">
           
        </div>
         <div class="col-lg-6">
                  <div class="card">
                 
                 
                    <div class="card-body">
	                      <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	    
	                        <div class="form-group">
	                      
							    <?= $form->field($edit, 'keywords')->textInput(['autofocus'=>true]) ?>
	                      
	                        </div>
	                        
	                        <div class="form-group">
	                        	    
	                        	    <?= $form->field($edit, 'description') ?>

	                        </div>
	                        
	                        <div class="form-group">
	                        		
	                        		  <?= $form->field($uploadsModel, 'img')->fileInput() ?>

	                        </div>
	                         <div class="form-group">
	                             <?= Html::submitButton('修改',['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
	                               <?=Html::resetButton('重置',['class'=>'btn btn-primary']);?>
	                        </div>
	                      
	                       <?php ActiveForm::end(); ?>
                    </div>
       </div>
    </div>
</div>