<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = "咨询/专题 展示页面";

?>

<h1><center> <?= Html::encode($this->title)?> </center></h1>

<div class="card">
                  
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr align="center">
                    <th>ID</th>
					<th>标题</th>
					<th>关键词</th>
					<th>描述</th>
					<th>内容</th>
					<th>浏览次数</th>
					<th>类型</th>
					<th>修改时间</th>
			        <th>操作</th>
	            </tr>
              </thead>
              <tbody>
             
               <?php foreach ($info as $v): ?>  
				<tr>
		
				    <td> <?= $v->id ;?></td>  
				    <td> <?= $v->title ;?></td>  
				    <td> <?= $v->keywords ;?></td>  
				    <td> <?= $v->description ;?></td>  
				    <td> <?= $v->content ;?></td>  
				    <td> <?= $v->browse ;?></td>  
				    <td> <?= $v->type ;?></td>  
				    <td> <?= date('Y-m-d',$v->created_at);?></td>  
				
					<td> 
						 <a href="/special/edit?id=<?php echo $v->id ;?>">修改</a> |
						 <a href="/special/del?id=<?php  echo  $v->id ;?>">删除</a>
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