
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<ul class="nav" style="font-size:20px;">
					
					<li>
						<a href="<?php echo base_url().'index.php/admin/info_list';?>">列表清单</a>
					</li>
					<li>
						<a href="<?php echo base_url().'index.php/admin/add';?>">增加数据</a>
					</li>
					<li>
						<a href="<?php echo base_url().'index.php/admin/score_exit';?>">退出系统</a>
					</li>
				</ul>
			</div>
		</div>

	</div>
	
	<div class="container" style="margin-top:50px;">
		<!-- <h1>信息汇总表：</h1> -->
		<table class="table table-striped table-bordered" 
				style="font-family:微软雅黑 text-align:center ">
			<thead>
				<tr>
					<th>序号</th>
					<th>编号</th>
					<th>学生姓名</th>
					<th>比赛控制</th>
					<th>操作</th>
					
				</tr>
			</thead>
			
			<?php foreach ($this->res[1] as $key => $value): ?>
			<tr>		
				<th><?php echo $value['id'];?></th>
				<td><?php echo $value['number'];?></td>
				<td><?php echo $value['name'];?></td>

				<td style="float:center">
					<a href="<?php echo base_url().'index.php/admin/stu_info/'.$value['number'];?>" role="button" class="btn btn-primary span1" onclick="change_flag(1)">开始</a>
					<a href="<?php echo base_url().'index.php/admin/stu_scoring/'.$value['number'];?>" role="button" class="btn btn-primary span1" onclick="change_flag(2)">评分</a>
					<a href="<?php echo base_url().'index.php/admin/stu_fin_score/'.$value['number'];?>" role="button" class="btn btn-primary span1" onclick="change_flag(3)">最后成绩</a>
					<!-- <a href="#" role="button" class="btn btn-primary span1" onclick="change_flag(4)">时间开始</a>
					<a href="#" role="button" class="btn btn-primary span1" onclick="change_flag(5)">时间结束</a>
 -->
				</td>
				<td>
					<a href="<?php echo base_url().'index.php/admin/modify/'.$value['id'].'/1';?>" role="button" class="btn btn-success">修改</a>
					<a href="<?php echo base_url().'index.php/admin/delete_info/'.$value['id'].'/1';?>" role="button" class="btn">删除</a>
				</td>
			</tr>
			<?php endforeach ?>
			
			
		</table>
		<hr id="hr">
		<h5>评委区：</h5>
		
		<table class="table table-striped table-bordered">
			
		
	
			<thead>
				
				<tr>
					<th>序号</th>
					<th>编号</th>
					<th>评委姓名</th>
					<th>操作</th>
					
				</tr>
			</thead>
			<?php foreach ($this->res[2] as $key => $value): ?>
			<tr>
				<td><?php echo $value['ju_id'];?></td>
				<td><?php echo $value['ju_number'];?></td>
				<td><?php echo $value['ju_name'];?></td>
				<td>
					<a href="<?php echo base_url().'index.php/admin/modify/'.$value['ju_id'].'/2';?>" role="button" class="btn btn-success">修改</a>
					<a href="<?php echo base_url().'index.php/admin/delete_info/'.$value['ju_id'].'/2';?>" role="button" class="btn">删除</a>
				</td>
			</tr>

			<?php endforeach ?>
		</table>
	</div>
	
</body>
