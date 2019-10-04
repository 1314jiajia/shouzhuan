<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'app类型展示';

?>

<h1> <center><?= Html::encode($this->title);?></center> </h1>


<div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr align="center">
                  <th>ID</th>
                  <th>标题</th>
                  <th>logo</th>
                  <th>分类</th>
                  <th>文件大小</th>
                  <th>浏览次数</th>
                  <th>评分</th>
                  <th>下载次数</th>
                  <th>内容</th>
                  <th>下载地址</th>
                  <th>内容图片</th>
                  <th>修改时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach ($info as $v): ?>  
        <tr align="center">
          
            <td> <?= $v->id ;?></td>  
            <td> <?= $v->name ;?></td>  
            <td> <img src="/<?= $v->images ;?>" style="height: 80px"></td>  
            <td> <?= $v->tag ;?></td>  
            <td> <?= $v->size ;?></td>  
            <td> <?= $v->browse ;?></td>  
            <td> <?= $v->score ;?></td>  
            <td> <?= $v->download ;?></td>  
            <td> <?= $v->introduce ;?></td>  
            <td> <?= $v->qrcode ;?></td>  
            <td> <?= $v->img ;?></td>  
            <td> <?= date('Y-m-d',$v->updated_at) ;?></td>
          
        <td> 
             <a href="/applist/edit?id=<?php echo $v->id ;?>">修改</a> |
             <a href="/applist/del?id=<?php  echo  $v->id ;?>">删除</a>
        </td>
        
        </tr>

        <?php endforeach; ?>  
            
              </tbody>
            </table>
             <div style="margin-left: 800px;"> 
              <!-- 分页 -->
                <?= 
                   LinkPager::widget(['pagination' => $pagination,]);
                ?>
                  
            </div>
          </div>
        </div>
     
  </div>