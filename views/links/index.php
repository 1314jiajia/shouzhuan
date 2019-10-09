<?php
	
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
  use yii\widgets\LinkPager;

	$this->title = '友链列表';
?>
<h1> <center> <?= Html::encode($this->title)?></center></h1>
<br>
<div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>url地址</th>
                    <th>网站名称</th>
                    <th>操作</th>
                  </tr>
              </thead>
              <tbody>

                <?php foreach ($info as $v): ?>  
            <tr>		
  				    <td> <?= $v->id ;?></td>  
  				    <td> <?= $v->links ;?></td>  
  				    <td> <?= $v->titile ;?></td>  
					
    					<td> 
    						 <a href="/links/edit?id=<?php echo $v->id ;?>">修改</a> |
    						 <a href="/links/del?id=<?php  echo  $v->id ;?>">删除</a>
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