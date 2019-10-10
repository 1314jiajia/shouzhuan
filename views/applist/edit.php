<?php

	use  yii\helpers\Html;
	use  yii\widgets\ActiveForm;
	$this->title = '添加应用修改界面';
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
                <!-- 添加信息的字段 autofocus 自动获取光标位置  -->
                <?= $form->field($edit, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($uploads, 'img')->fileInput() ?>
                
                
               <?php echo $form->field($edit, 'tag')->dropDownList(['0'=>'请选择','1' => '安卓', '2' => 'iOS']); ?>
                <!-- 下来菜单 -->
                <?= $form->field($edit, 'size')->textInput() ?>
              
                <?php echo $form->field($edit, 'score')->dropDownList(['0'=>'请评价','1' => '一颗星', '2' => '二颗星','3'=>'三颗星','4'=>'四颗星','5'=>'五颗星']); ?>
               
              
                <!-- 下载地址 -->
                <?= $form->field($edit, 'qrcode')->textInput() ?>
                <!-- 多图上传 -->
               
                <!-- 百度富文本编辑器(内容) -->               
                <?= $form->field($edit, 'introduce')->textarea() ?>
                 
                <div class="form-group">
	                 <?= Html::submitButton('修改',['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
	            </div>
	                      
            <?php ActiveForm::end(); ?>
            </div>
       </div>
    </div>
</div>