<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->title = '标签添加';
?>

<h1><center><?= Html::encode($this->title);?></center></h1><br>

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
                      
                              <?= $form->field($model, 'label')->textInput(['autofocus' => true]) ?>
                      
                        </div>
                      
                        <div class="form-group">       
                       
                             <?= $form->field($model, 'pid[]')->dropDownList(['0'=>'请选择','1' => '安卓', '2' => 'iOS']);  ?>
                
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