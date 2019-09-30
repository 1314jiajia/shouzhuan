<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = '轮播图页面展示';

?>

<h1> <center><?= Html::encode($this->title);?></center> </h1><br>
<div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr align="center">
                 	<th>ID</th>
					<th>关键词</th>
					<th>描述</th>
					<th>图片</th>
					<th>修改时间</th>
					<th>操作</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach ($info as $v): ?>  
				<tr align="center">
					
				    <td> <?= $v->id ;?></td>  
				    <td> <?= $v->keywords ;?></td>  
				    <td> <?= $v->description ;?></td>  
				    <td> <img src="/<?= $v->images ;?>" style="height: 80px"></td>  
				    <td> <?= date('Y-m-d',$v->updated_at) ;?></td>
					
				<td> 
						 <a href="/img/edit?id=<?php echo $v->id ;?>">修改</a> |
						 <a href="/img/del?id=<?php  echo  $v->id ;?>">删除</a>
				</td>
				
				</tr>

				<?php endforeach; ?>  
            
              </tbody>
            </table>
          </div>
        </div>
      </div>