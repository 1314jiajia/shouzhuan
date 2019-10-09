<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = "咨询/专题 修改页面";

?>

<h1><center> <?= Html::encode($this->title)?> </center></h1>

<div class="site-signup">
    <div class="row">
        <div class="col-lg-3">
           
        </div>
         <div class="col-lg-6">
                  <div class="card">
                 
                 
                    <div class="card-body">
	                      <?php $form = ActiveForm::begin(); ?>
	    
	                        <div class="form-group">
	                      
	                          <?= $form->field($edit, 'title')->textInput(['autofocus' => true]) ?>
	                      
	                        </div>
	                         <div class="form-group">
	                      
	                          <?= $form->field($edit, 'keywords')->textInput() ?>
	                      
	                        </div>
	                         <div class="form-group">
	                      
	                          <?= $form->field($edit, 'description')->textInput() ?>
	                      
	                        </div>

	                         <div class="form-group">
	                      
	                          <?= $form->field($edit, 'content')->textInput() ?>
	                      
	                        </div>
	                         <div class="form-group">
	                      
	                          <?= $form->field($edit, 'browse')->textInput() ?>
	                      
	                        </div>
	                        
	                        <div class="form-group">
                           <?= $form->field($edit, 'type')->dropDownList(['0'=>'请选择','1' => '咨询', '2' => '专题']) ?>
                           </div>
	                         <div class="form-group">
	                             <?= Html::submitButton('修改',['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
	                             
	                        </div>
	                      
	                       <?php ActiveForm::end(); ?>
                    </div>
       </div>
    </div>
</div>