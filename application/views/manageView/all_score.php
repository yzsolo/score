
<div class="row"id="all_bk" style="font-family:微软雅黑;margin-top:20px">
<div class="container">
	<h1 class="btn btn-large btn-block btn-primary">所有选手最后得分</h1>
	<table class="table table-striped table-bordered table-hover" >
		<thead style="text-align:center" class="success">
			<tr>
				<th>姓名</th>
				<th>学校</th>
				<th>编号</th>
				<th>演讲标题</th>
				<th>成绩</th>
				<th>排名</th>

			</tr>
		</thead>
		<tbody style="line-height:25px;font-size:16px">
				
				<?php for($i=0;$i<count($this->res);$i++){ ?>
					
					<tr>
						<td><?php echo $this->res[$i]['name'] ?></td>
						<td><?php echo $this->res[$i]['school'] ?></td>
						<td><?php echo $this->res[$i]['number'] ?></td>
						<td><?php echo $this->res[$i]['lecture'] ?></td>
						<td><?php echo $this->res[$i]['final_score'] ?></td>
						<td>第<?php echo $i+1;?>名</td>
					</tr>
					
				<?php }?>
				
			
		</tbody>

	</table>




	</div>
</div>
