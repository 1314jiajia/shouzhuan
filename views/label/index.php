<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\widgets\LinkPager;


	$this->title = '标签列表';
?>

<h1><center><?= Html::encode($this->title);?></center></h1><br>

<div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>标签</th>
                    <th>标签类型</th>
                    <th>添加时间</th>
                    <th>操作</th>
                  </tr>
              </thead>
              <tbody>

                <?php foreach ($info as $v): ?>  
				   <tr>
		
  				    <td> <?= $v->id ;?></td>  
  				    <td> <?= $v->label ;?></td>  
  				    <td>
  				     <?php

  				     if($v->pid == 1){
  				     	echo '安卓';
  				     }else{
  				     	echo 'ios';
  				     }
  				      ;?>
  				    		
  				    </td>  
  				    <td> <?= date('Y-m-d',$v->updated_at);?></td>  
					
    					<td> 
    						 <a href="/label/edit?id=<?php echo $v->id ;?>">修改</a> |
    						 <a href="/label/del?id=<?php  echo  $v->id ;?>">删除</a>
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