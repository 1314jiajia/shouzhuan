<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->title = 'app类型添加';

?>
<style>

    .add_div {
        width: 400px;
        height: 500px;
        border: solid #ccc 1px;
        margin-top: 40px;
        margin-left: 170px;
        padding-left: 20px;
    }

    .file-list {
        height: 125px;
        display: none;
        list-style-type: none;
    }

    .file-list img {
        max-width: 70px;
        vertical-align: middle;
    }

    .file-list .file-item {
        margin-bottom: 10px;
        float: left;
        margin-left: 20px;
    }


    .file-list .file-item .file-del {
        display: block;
        margin-left: 20px;
        margin-top: 5px;
        cursor: pointer;
    }

/*多图上次*/
</style>
<!-- <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script src="https://cdn.bootcss.com/layer/2.3/layer.js"></script> -->
<script>

    $(function () {
        ////////////////////////////////////////////////图片上传//////////////////////////////////////////////
        //声明变量
        var $button = $('#upload'),
            //选择文件按钮
            $file = $("#choose-file"),
            //回显的列表
            $list = $('.file-list'),
            //选择要上传的所有文件
            fileList = [];
        //当前选择上传的文件
        var curFile;
        // 选择按钮change事件，实例化fileReader,调它的readAsDataURL并把原生File对象传给它，
        // 监听它的onload事件，load完读取的结果就在它的result属性里了。它是一个base64格式的，可直接赋值给一个img的src.
        $file.on('change', function (e) {
            //上传过图片后再次上传时限值数量
            var numold = $list.find('li').length;
            console.log(numold);
            if(numold >= 6){
                layer.alert('最多上传6张图片');
                return;
            }
            //限制单次批量上传的数量
            var num = e.target.files.length;
            var numall = numold + num;
            if(num >6 ){
               layer.alert('最多上传6张图片');
               return;
            }else if(numall > 6){
                layer.alert('最多上传6张图片');
                return;
            }
            //原生的文件对象，相当于$file.get(0).files;//files[0]为第一张图片的信息;
            curFile = this.files;
            //curFile = $file.get(0).files;
            //console.log(curFile);
            //将FileList对象变成数组
            fileList = fileList.concat(Array.from(curFile));
            //console.log(fileList);
            for (var i = 0, len = curFile.length; i < len; i++) {
                reviewFile(curFile[i])
            }
            $('.file-list').fadeIn(2500);
        })


        function reviewFile(file) {
            //实例化fileReader,
            var fd = new FileReader();
            //获取当前选择文件的类型
            var fileType = file.type;
            //调它的readAsDataURL并把原生File对象传给它，
            fd.readAsDataURL(file);//base64
            //监听它的onload事件，load完读取的结果就在它的result属性里了
            fd.onload = function () {
                if (/^image\/[jpeg|png|jpg|gif]/.test(fileType)) {
                    $list.append('<li style="border:solid red px; margin:5px 5px;" class="file-item"><img src="' + this.result + '" alt="" height="70"><span class="file-del">删除</span></li>').children(':last').hide().fadeIn(2500);
                } else {
                    $list.append('<li class="file-item"><span class="file-name">' + file.name + '</span><span class="file-del">删除</span></li>')
                }

            }
        }

        //点击删除按钮事件：
        $(".file-list").on('click', '.file-del', function () {
            let $parent = $(this).parent();
            console.log($parent);
            let index = $parent.index();
            fileList.splice(index, 1);
            $parent.fadeOut(850, function () {
                $parent.remove()
            });
            //$parent.remove()
        });
        //点击上传按钮事件：
        $button.on('click', function () {
            var name = $('#name').val();
            // var catgory = $('#catgory').val();
            // var price = $('#price').val();
            // var desc = $('#desc').val();
            // var stock = $('#stock').val();
            // var status = $("input[type='radio']:checked").val();
            // var reg = /^[1-9]\d*$/;
            // if (!(reg.test(stock))) {
            //     layer.alert('商品库存为整数!');
            //     return;
            // }
            if (name == '') {
                layer.alert('请输入商品名称');
                return;
            }
            // else if (status == null) {
            //     layer.alert('请输入商品显示状态');
            //     return;
            // }
            // else if (catgory == '') {
            //     layer.alert('请输入商品分类');
            //     return;
            // }
            // else if (price == '') {
            //     layer.alert('请输入商品价格');
            //     return;
            // }
            // else if (stock == '') {
            //     layer.alert('请输入商品库存');
            //     return;
            // }
            // else if (fileList.length == 0) {
            //     layer.alert('请选择商品图片');
            //     return;
            // }
             if(fileList.length > 6){
                    layer.alert('最多允许上传6张图片');
                    return;
            } else {
                var formData = new FormData();
                for (var i = 0, len = fileList.length; i < len; i++) {
                    //console.log(fileList[i]);
                    formData.append('upfile[]', fileList[i]);
                }
                formData.append('name', name);
                // formData.append('catgory', catgory);
                // formData.append('price', price);
                // formData.append('desc', desc);
                // formData.append('stock', stock);
                // formData.append('status', status);
                //console.log(formData);
                $.ajax({
                    url: './product_add.php',
                    type: 'post',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.status == '1') {
                            layer.msg(data.content, {icon: 6});
                        } else if (data.status == '2') {
                            layer.msg(data.content, {icon: 1});
                        }
                    }
                })
            }
        })
    })


</script>
<!-- <script type="text/javascript" charset="utf-8" src="/jquery-1.12.4.js"></script> -->
<script typet="text/javascript" src="http://libs.useso.com/js/jquery/1.9.1/jquery.min.js"></script>

</script>
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

        // 这里需要修改applist是表名-introduce是字段名
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
              <!-- 多图片上传插件 -->
                <!-- 添加信息的字段 autofocus 自动获取光标位置  -->
      <!--   <p>
        <span>图片：</span>
        <input type="file" name="a" id="choose-file" multiple="multiple"/>
        <input type="file" name="" id="choose-file" />

    </p>
    <p>
    <ul class="file-list">

    </ul>
    </p> -->

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($uploadsModel, 'img')->fileInput() ?>
                <!-- 单图片上传 -->
                <?= $form->field($uploads, 'images[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
                 
               <?= $form->field($model, 'tag[]')->dropDownList(['0'=>'请选择','1' => '安卓', '2' => 'iOS']); ?>
                <!-- 下来菜单 -->
                <?= $form->field($model, 'size')->textInput() ?>
              
                <?= $form->field($model, 'score[]')->dropDownList(['0'=>'请评价','1' => '一颗星', '2' => '二颗星','3'=>'三颗星','4'=>'四颗星','5'=>'五颗星']); ?>
               
              
                <!-- 下载地址 -->
                <?= $form->field($model, 'qrcode')->textInput() ?>
                <!-- 多图上传 -->
               
               
                <!-- 百度富文本编辑器(内容) -->               
                <?= $form->field($model, 'introduce')->textarea() ?>

                 <div class="form-group" style="margin-left: 800px">
                    <?= Html::submitButton('添加', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>