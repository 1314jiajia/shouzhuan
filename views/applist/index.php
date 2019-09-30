<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'app类型展示';

?>

<!-- <h1> <center><?= Html::encode($this->title);?></center> </h1> -->
<html>
 <head></head>
 <body>
  <div class="card"> 
 
   <div class="card-header d-flex align-items-center"> 
    <h3 class="h4">APP类型添加</h3> 
   </div> 
   <div class="card-body"> 
    <form class="form-horizontal" action="/index" method="post"> 
     <div class="form-group row"> 
      <label class="col-sm-3 form-control-label">姓名</label> 
      <div class="col-sm-9"> 
       <input type="text" class="form-control" /> 
      </div> 
     </div> 
     <div class="line"></div> 
   
     <div class="line"></div> 
     <div class="form-group row"> 
      <label class="col-sm-3 form-control-label">密码</label> 
      <div class="col-sm-9"> 
       <input type="password" name="password" class="form-control" /> 
      </div> 
     </div> 

     <!-- 下拉框 -->
     <div class="form-group row"> 
      <label class="col-sm-3 form-control-label">分类</label> 
      <div class="col-sm-9"> 
       <select name="account" class="form-control mb-3"> 
       		<option value="1">安卓</option> 
       		<option value="2">IOS</option>
       		<option value="3">综合</option>
       </select> 
      </div> 
    <!--   <div class="col-sm-9 offset-sm-3"> 
       <select multiple="" class="form-control"> <option>option 1</option> <option>option 2</option> <option>option 3</option> <option>option 4</option> </select> 
      </div>  -->
     </div> 
     <div class="line"></div> 
     <!-- 文件上传 -->
     <div class="form-group row"> 
      <label for="fileInput" class="col-sm-3 form-control-label">图片</label> 
      <div class="col-sm-9"> 
       <input id="fileInput" type="file" class="form-control-file" /> 
      </div> 
     </div> 
   
     <!-- <div class="line"></div>  -->
    
   
   
    <div class="col-sm-4 offset-sm-3">
            <button type="submit" class="btn btn-primary">提交</button>
            <button type="resert" class="btn btn-secondary">重置</button>

    </div>
 
    </form> 
   </div>
  </div>
 </body>
</html>

