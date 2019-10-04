<?php
	
	use yii\helpers\Html;
    // 表单基于这个模型
	use yii\widgets\ActiveForm;
	use yii\widgets\LinkPager;
	$this->title = '用户信息列表';
?>
<h1> <center><?= Html::encode($this->title) ?></center></h1><br/>

<div class="card">
                  
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr align="center">
                    <th>ID</th>
					<th>姓名</th>
			        <th>操作</th>
	            </tr>
              </thead>
              <tbody>
             
               <?php foreach ($info as $v): ?>  
				<tr align="center">
		
				    <td> <?= $v->id ;?></td>  
				    <td> <?= $v->username ;?></td>  
		
					<td> 
						 <a href="/user/edit?id=<?php echo $v->id ;?>">修改</a> |
						 <a href="/user/del?id=<?php  echo  $v->id ;?>">删除</a>
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