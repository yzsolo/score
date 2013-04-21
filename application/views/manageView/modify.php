
<body id="body">
	<div class="container">
	<div class="row">
		<blockquote>
			<h4>骚年，修改资料慎重啊~~</h4>
		</blockquote>
	</div>
		<div class="hero-unit">
			<form class="form-vertical" enctype="multipart/form-data" method="post" style="text-align:left">
				<?php 
						if(isset($this->res[0]['motto']))
						 echo "<h5>属性:演讲人员</h5>";
						else{
							echo "<h5>属性:评委</h5>";
						}
				?>

				
				<label>姓名：</label>
				<h3><?php echo $this->res[0]['name'];?><h3>

				<label>选手（或评委）编号：</label>
				<input name="number" type="text" class="span4" value="<?php echo $this->res[0]['number'];?>">

				<label>选手（或评委）学校：</label>
				<input name="school" type="text" class="span4" value="<?php echo $this->res[0]['school'];?>">

				<!-- <label>演讲标题：</label> -->
				<!-- <input style="text-align:left" name="lecture" type="text" class="span4" value=" -->

						<?php if(isset($this->res[0]['lecture'])){ ?>
							<label>演讲标题：</label>
							<input style="text-align:left" name="lecture" type="text" class="span4" 
							value="<?php echo $this->res[0]['lecture']; ?>">
						 
						<?php }else{ echo null;}?>
					

				
					<?php if(isset($this->res[0]['motto'])){ ?>
						<label>座右铭：</label>
						<input name="motto" type="text" class="span6" 
						value="<?php echo $this->res[0]['lecture'];?>">
					<?php }else{ echo null;} ?>

				

				<label>个人信息：</label>
				<textarea name="man_info" class="span6" value="<?php echo $this->res[0]['info'];?>"></textarea>
			
			<?php echo form_open_multipart('admin/add');?>
				<label>私房照：</label>
				<input type="file" name="userfile">
				<input class="btn btn-large btn-primary" type="submit" name="submit" value="提交信息">
				<input class="btn btn-large btn-warning" type="reset" name="reset" value="重置">
			</form>

		</div>


	</div>
</body>
