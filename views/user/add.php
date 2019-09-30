<?php

// 表单的添加按钮
use yii\helpers\Html;

// 表单基于这个模型
use yii\widgets\ActiveForm;

$this->title = '欢迎来到用户注册页面';
?>

<!-- 这个添加信息的标题 -->
<h1> <center><?= Html::encode($this->title) ?></center></h1>

<!-- 动态生成表单 -->

<div class="site-signup">
    <div class="row">
        <div class="col-lg-3"></div>
         <div class="col-lg-6">
                  <div class="card">
                 
                 
                    <div class="card-body">
                      <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    
                        <div class="form-group">
                      
                          <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                      
                        </div>
                      
                        <div class="form-group">       
                       
                       <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                
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