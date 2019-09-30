<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = '链接修改';
?>
<H1> <center> <?= Html::encode($this->title) ?></center></H1>

<?php $form = ActiveForm::begin(); ?>
	
    <?= $form->field($edit, 'links')->textInput(['autofocus'=>true]) ?>
    <?= $form->field($edit, 'titile') ?>
   
    <?= Html::submitButton('修改',['class'=>'btn btn-primary']) ?>
    <?=Html::resetButton('重置',['class'=>'btn btn-primary']);?>

<?php ActiveForm::end(); ?>
