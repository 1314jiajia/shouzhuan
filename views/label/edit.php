<?php
	
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	$this->title = '标签修改';

?>
<H1> <center> <?= Html::encode($this->title) ?></center></H1>

<div class="site-signup">
    <div class="row">
        <div class="col-lg-3">
           
        </div>
         <div class="col-lg-6">
                  <div class="card">
                 
                 
                    <div class="card-body">
	                      <?php $form = ActiveForm::begin(); ?>
	    
	                        <div class="form-group">
	                     	 <?= $form->field($edit, 'label')->textInput(['autofocus'=>true]) ?>
	                      
	                        </div>
	                         <div class="form-group">
	                      
	                          <?= $form->field($edit, 'pid')->dropDownList(['0'=>'请选择','1' => '安卓', '2' => 'iOS']);  ?>
	                       	
	                        </div>
	                        
	                         <div class="form-group">
	                             <?= Html::submitButton('修改',['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
	                             
	                        </div>
	                      
	                       <?php ActiveForm::end(); ?>
                    </div>
       </div>
    </div>
</div>