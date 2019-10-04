<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	$this->title = 'app类型添加';

?>
<h1><center><?= Html::encode($this->title)?></center></h1>	
<br>
<div class="site-signup">
    <div class="row">
        <div class="col-lg-9">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <!-- 添加信息的字段 autofocus 自动获取光标位置  -->
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($uploadsModel, 'img')->fileInput() ?>
               <?php echo $form->field($model, 'tag[]')->dropDownList(['0'=>'请选择','1' => '安卓', '2' => 'iOS']); ?>
                <!-- 下来菜单 -->
                <?= $form->field($model, 'size')->textInput() ?>
                <?= $form->field($model, 'browse')->textInput() ?>
                <?php echo $form->field($model, 'score[]')->dropDownList(['0'=>'请评价','1' => '一颗星', '2' => '二颗星','3'=>'三颗星','4'=>'四颗星','5'=>'五颗星']); ?>
                <?= $form->field($model, 'download')->textInput() ?>
                <?= $form->field($model, 'introduce')->textInput() ?>
                <?= $form->field($model, 'qrcode')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('添加', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>