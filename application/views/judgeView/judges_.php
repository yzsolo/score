<?php print_r($this->datas);?>
<body>
	<div class="row-fluid" id="con">
		<div class="container" id="container">
			<div class="body-con">
				<span class="label label-info" id="span-info-con">当前选手</span>
				<div class="hero-unit" id="hero-unit">
					<!-- <div class="row" id="judge-con"> -->
						<h1>rale</h1>
						<img src="img/2.jpg">
						<p>热爱生活，热爱大自然，热爱集体！！
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
								<p>我是冉雷哦哈</p>
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</button>

							</div>
						</div>
					
					<!--老师打分-->
					<div class="row" id="judge-score">
						<h1>打分啦：</h1>
						<table class="table">
							<tr>
								<td>演讲才能</td>
								<td>口语表达能力</td>
								<td>文字能力</td>
								<td>文字能力</td>

							</tr>
							<form method="post">
								<tr>
									<td>
										<input type="text" class="input-small" id="num1">

									</td>
									<td>
										<input type="text" class="input-small" id="num2">
									</td>
									<td>
										<input type="text" class="input-small" id="num3">
									</td>
									<td>
										<input type="text" class="input-small" id="num4">

									</td>
									

								</tr>
							</form>

						</table>
						<button class="btn btn-primary" style="float:right">提交</button>
					</div>

				</div>

			</div>
		</div>


	</div>
	
</body>
