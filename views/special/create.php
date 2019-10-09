<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = "咨询/专题 添加页面";

?>

<h1><center><?= Html::encode($this->title) ?></center></h1><br>

<div class="site-signup">
    <div class="row">
        <!-- 占位 -->
        <div class="col-lg-3"></div>
        <!-- 表单开始 -->
         <div class="col-lg-6">
                  <div class="card">
                 
                 
                    <div class="card-body">
                      <?php $form = ActiveForm::begin(); ?>
    
                        <div class="form-group">
                      
                              <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
                      
                        </div>
                      
                        <div class="form-group">       
                       
                             <?= $form->field($model, 'keywords')->textInput() ?>
                
                        </div>
                		
                	    <div class="form-group">       
                       
                             <?= $form->field($model, 'description')->textInput() ?>
                
                        </div>
                		
                         <div class="form-group">       
                       
                             <?= $form->field($model, 'content')->textInput() ?>
                
                        </div>	
                		
                		  <div class="form-group">       
                       
                             <?= $form->field($model, 'browse')->textInput() ?>
                
                        </div>	
                     
                		  <div class="form-group">
                           <?= $form->field($model, 'type[]')->dropDownList(['0'=>'请选择','1' => '咨询', '2' => '专题']) ?>
                           </div>

                         <div class="form-group">
                            <?= Html::submitButton('添加', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

                             <?=Html::resetButton('重置',['class'=>'btn btn-primary']);?>


                        </div>
                      
                       <?php ActiveForm::end(); ?>
                    </div>
       </div>
    </div>
</div>