
<body id="body">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<ul class="nav" style="font-size:20px;">
					<!-- <li>
						<a href="<?php echo base_url().'index.php/admin/console';?>">主控制台</a>
					</li> -->
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
		<!-- <h2>增加信息：</h2> -->
		<div class="hero-unit">
			<form class="form-vertical" enctype="multipart/form-data" method="post">
				<label>人员属性</label>
				<label class="radio">
					<input type="radio" name="optionsRadios" value="1">
					评委
				</label>
				<label class="radio">
					<input type="radio" name="optionsRadios" value="2">
					演讲人员
				</label>
				<label>姓名：</label>
				<input name="user-name" type="text" class="span4" placeholder="请输入文字（必填）...">

				<label>选手（或评委）编号：</label>
				<input name="number" type="text" class="span4" placeholder="请输入文字（非必填）...">

				<label>选手（或评委）学校：</label>
				<input name="school" type="text" class="span4" placeholder="请输入文字（非必填）...">

				<label>演讲标题：</label>
				<input name="lecture" type="text" class="span4" placeholder="请输入文字（选手填）...">

				<label>座右铭：</label>
				<input name="motto" type="text" class="span6" placeholder="（非必填）...">

				<label >个人信息：</label>
				<textarea name="man_info" class="span6" placeholder="请输入文字..."></textarea>
			
			<?php echo form_open_multipart('admin/add');?>
				<label>私房照：</label>
				<input type="file" name="userfile">
				<input class="btn btn-large btn-primary" type="submit" name="submit" value="提交信息">
				<input class="btn btn-large btn-warning" type="reset" name="reset" value="重置">
			</form>

		</div>


	</div>
</body>
