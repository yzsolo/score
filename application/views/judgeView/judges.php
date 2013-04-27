
<body sytle="background:url(http://localhost/score/data/img/background_1.jpg)">
	
	<div class="row-fluid" id="con">
		<div class="container" id="container">
			<div class="body-con">
				<span class="label label-info" id="span-info-con">当前选手</span>
				<span class="judge_number"><?php print_r($this->datas);?></span>
				<div class="athlete_number"></div>
				<div class="hero-unit" id="hero-unit">
					<!-- <div class="row" id="judge-con"> -->
						<h1>rale</h1>
						<img src="img/2.jpg">
						<p name="judges_p1">热爱生活，热爱大自然，热爱集体！！
							热爱生活，热爱大自然，热爱集体！！热爱生活，热爱大自然，热爱集体！！热爱生活，热爱大自然，热爱集体！！热爱生活，热爱大自然，热爱集体！！热爱生活，热爱大自然，热爱集体！！热爱生活，热爱大自然，热爱集体！！
						</p>
					<!-- </div> -->
					<!--选手信息-->
					
						<a href="#myModal" role="button" class="btn btn-primary btn-large" data-toggle="modal">选手更多信息</a>
						<div id="myModal" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
								<h3 id="myModalLabel">冉雷</h3>
							</div>
							<div class="modal-body">
								<!-- <p>我是冉雷哦哈</p> -->
								<div class="span4" style="margin-top:15px;">
        <blockquote>
              <p name="judges_p2" style="width:400px">姓名：彭慧星</p>
        </blockquote>
        <blockquote>
              <p name="judges_p3" style="width:400px">学校：中南民族大学</p>
        </blockquote>
        <blockquote>
              <p name="judges_p4" style="width:400px">主题：一头会飞翔的猪</p>
        </blockquote>
        <blockquote>
              <p name="judges_p5" style="width:450px">apple fallin love with me,everything is alrightfor you.</p>
              <!-- <small>Someone famous <cite title="Source Title">Source Title</cite></small> -->
        </blockquote>
  </div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</button>

							</div>
						</div>
					
					<!--老师打分-->
					<div class="row" id="judge-score">
						<!-- <h3>打分啦：</h3> -->
						<div class="judge_score_div" style="margin-top:20px;margin-left:28px;">
						<label style="float:left;font-size:20px;margin-top:10px;">老师评分：</label>
						<input type="text" class="input-large" id="num1">
						<div class="warning" style="color:red;display:none;">
							请重新填写
						</div>
						<!-- <div id="key_borad_box">
									<div class="key_borad_text" style="width:300px;height:30px;font-size:20px;"></div>
									<div class="key_borad">
									      <ul>
									            <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value=" 1 "></li>
									            <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value=" 2 "></li>
									            <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value=" 3 "></li>
									             <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value=" 4 "></li>
									            <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value=" 5 "></li>
									            
									      </ul>
									       <ul>
									            <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value=" 6 "></li>
									            <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value=" 7 "></li>
									            <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value=" 8 "></li>
									            <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value=" 9 "></li>
									            <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value=" 0 "></li>
								
									      </ul>
									      <ul>
									           
									            <li><input class="key_borad_submit btn btn-large btn-info" name="put" type="button" value="提交"></li>
									         
									            <li><input class="key_borad_reset btn btn-large btn-info" name="put" type="button" value="重置"></li>
									            <li><input class="key_borad_input btn btn-large btn-info" name="put" type="button" value="  .  "></li>
									      </ul>
									</div>
						</div> -->
					</div>
						<button class="btn btn-primary btn-large" style="float:right" id="judges-submit">提交</button>
					</div>

				</div>

			</div>
		</div>


	</div>
	
</body>
