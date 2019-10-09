<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->title = 'app类型添加';

?>
<!-- 使用富文本编辑器开始(ueditor在入口文件) -->
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">

    window.UEDITOR_HOME_URL = "/uploads/"; // 存储图片的位置
    window.onload = function(){
        window.UEDITOR_CONFIG.initialFrameHeight = 100;//编辑器高度设置

        // 这里需要修改applist是表名-img是字段名
        UE.getEditor('applist-introduce',{ initialFrameWidth: null });//编辑器宽度自适应
    }
</script>
<!-- 使用富文本编辑器结束 -->
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
              
                <?php echo $form->field($model, 'score[]')->dropDownList(['0'=>'请评价','1' => '一颗星', '2' => '二颗星','3'=>'三颗星','4'=>'四颗星','5'=>'五颗星']); ?>
               
              
                <!-- 下载地址 -->
                <?= $form->field($model, 'qrcode')->textInput() ?>
                <!-- 多图上传 -->
               <!--    <?= $form->field($uploadsModel, 'img[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?> -->
                <!-- 百度富文本编辑器(内容) -->               
                <?= $form->field($model, 'introduce')->textarea() ?>
                 
                 <div class="form-group" style="margin-left: 800px">
                    <?= Html::submitButton('添加', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>