<?php 

// 转码显示纯文本,用于安全验证 
use yii\helpers\Html;

// 加载表单的基类
use yii\widgets\ActiveForm;

$this->title = '用户修改界面';

?>
<!-- html::endcode 在这里用于标题安全转码标题显示 -->
<h1> <center><?= Html::encode($this->title);?> </center> </h1>


<div class="site-signup">
    <div class="row">
        <div class="col-lg-3">
           
        </div>
         <div class="col-lg-6">
                  <div class="card">
                 
                 
                    <div class="card-body">
	                      <?php $form = ActiveForm::begin(); ?>
	    
	                        <div class="form-group">
	                      
	                          <?= $form->field($edit, 'username')->textInput(['autofocus' => true]) ?>
	                      
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



